<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\StoreSetting;
use App\Models\Subscriber;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class CreateSubscriptionController extends Controller
{

    public $storeURL;
    public $privateKey;
    public $token;
    public $apiHost;

    public function __construct()
    {
        $storeSetting = Cache::get('store_settings');

        if (!$storeSetting) {
            $storeSetting = StoreSetting::where('is_active', true)
                ->orderBy('created_at', 'asc')
                ->limit(1)
                ->first();

            Cache::put('store_settings', $storeSetting, 60);
        }

        $this->storeURL = $storeSetting->store_url;
        $this->privateKey = $storeSetting->private_key;
        $this->token = $storeSetting->token;
        $this->apiHost = $storeSetting->host;
    }

    public function subscribe(Request $request)
    {

        $catalogID = $request->input('sku');
        if (!is_numeric($catalogID)) {
            throw new \Exception("Invalid SKU parameter.");
        }

        $user = auth()->user();
        if (!$user) {
            return redirect("/login")->with('success', 'Please login first.');
        }

        $profile = Profile::with('state', 'user')->where('user_id', $user->id)->first();
        if (!$profile) {
            return redirect("/profile")->with('success', 'Please complete your profile first.');
        }

        if ($profile && (!$profile->country || !$profile->country)) {
            return redirect("/profile")->with('success', 'Please complete your profile first.');
        }

        if ($catalogID == 0) {
            return redirect("/my-plan");
        }

        $country =  $profile->country;
        $state = $profile->state;
        $customerData = $this->getCustomerData($profile, $country, $state);

        Log::info("customerData");
        Log::info(json_encode($customerData));

        $customerEmail = null;
        if ($profile->user) {
            $customerEmail = $profile->user->email;
        }
        $existingCustomerResp = $this->getCustomer($customerEmail);
        $customerID = "";
        if ($existingCustomerResp) {
            $customerID = $existingCustomerResp[0]['CustomerID'];
        }

        Log::info("existingCustomerResp");
        Log::info($existingCustomerResp);

        if (!$customerID) {
            $customerResp = $this->createCustomer($customerData);
            if (!$customerResp) {
                throw new \Exception("Failed to create customer.");
            }

            Log::info("customerResp");
            Log::info($customerResp);

            $customerID = $customerResp[0]['Value'];
        }

        // Get store key from env config
        $STORE_KEY = env("STORE_KEY");
        // Decrypting data
        $password = Crypt::decryptString(auth()->user()->store_hash, $STORE_KEY);

        $subscriberData = [
            'password' => Hash::make($password),
            'first_name' => $profile->first_name,
            'last_name' => $profile->last_name,
            'email' => auth()->user()->email,
            'user_id' => auth()->user()->id,
            'company' => $profile->company,
            'address_line_1' => $profile->address_line_1,
            'address_line_2' => $profile->address_line_2,
            'city' => $profile->city,
            'postal_code' => $profile->postal_code,
            'state' => $state,
            'order_key' => '',
            'customer_id' => $customerID,
        ];

        // todo: user update or create 
        $subscriber = Subscriber::updateOrCreate([
            'user_id' => auth()->user()->id
        ], $subscriberData);

        $orderKeyResp = $this->createOrderKey($customerID, $profile, $country, $state);
        if (!$orderKeyResp) {
            throw new \Exception("Failed to get order key.");
        }

        Log::info("orderKeyResp");
        Log::info($orderKeyResp);

        $orderKey = $orderKeyResp[0]['Value'];
        Log::info("orderKey");
        Log::info($orderKey);
        Log::info("catalogID");
        Log::info($catalogID);
        $subscriber->update(['order_key' => $orderKey]);

        $cartItemResp = $this->createCartItem($orderKey, $catalogID);
        if (!$cartItemResp) {
            throw new \Exception("Failed to get cart item.");
        }

        Log::info("cartItemResp");
        Log::info($cartItemResp);

        $cartItemID = $cartItemResp[0]['Value'];

        $cartCheckoutResp = $this->cartCheckout($orderKey);
        if (!$cartCheckoutResp) {
            throw new \Exception("Failed to get cart checkout response.");
        }

        Log::info("cartCheckoutResp");
        Log::info($cartCheckoutResp);

        $url = $cartCheckoutResp[0]['CheckoutURL'];
        $urlParts = parse_url($url);
        parse_str($urlParts['query'], $query);
        $query['checkout'] = 0;
        $newQueryString = http_build_query($query);
        $checkoutURL = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $newQueryString;

        Log::info("checkoutURL");
        Log::info($checkoutURL);

        return redirect($checkoutURL);
    }

    public function cartCheckout($orderKey)
    {
        $client = new \GuzzleHttp\Client();

        $apiURL = $this->apiHost . '/3dCartWebAPI/v2/Cart/' . $orderKey;

        $response = $client->request('GET', $apiURL, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'SecureURL' => $this->storeURL,
                'PrivateKey' => $this->privateKey,
                'Token' => $this->token,
            ],
            'json' => '',
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException("Failed to get checkout URL. Status code: " . $response->getStatusCode());
        }

        $body = $response->getBody();
        return json_decode($body, true);
    }

    public function createCartItem($orderKey, $catalogID)
    {
        $client = new \GuzzleHttp\Client();

        $apiURL = $this->apiHost . '/3dCartWebAPI/v2/Cart/' . $orderKey . '/Item';

        $requestBody = [
            "CatalogID" => $catalogID,
            "ItemQuantity" => 1
        ];

        $response = $client->request('POST', $apiURL, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'SecureURL' => $this->storeURL,
                'PrivateKey' => $this->privateKey,
                'Token' => $this->token,
                'orderkey' => $orderKey,
            ],
            'json' => $requestBody,
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new \RuntimeException("Failed to create cart item. Status code: " . $response->getStatusCode());
        }

        $body = $response->getBody();
        return json_decode($body, true);
    }

    public function createOrderKey($customerID, $profile, $country, $state)
    {
        $client = new \GuzzleHttp\Client();

        $apiURL = $this->apiHost . '/3dCartWebAPI/v2/Cart';

        $requestBody = [
            "CustomerId" => $customerID,
            "BillingFirstName" => $profile->first_name,
            "BillingLastName" => $profile->last_name,
            "BillingCompany" => $profile->company,
            "BillingAddress" => $profile->address_line_1,
            "BillingAddress2" => $profile->address_line_2,
            "BillingCity" => $profile->city,
            "BillingState" => $state,
            "BillingZipCode" => $profile->postal_code,
            "BillingCountry" => $country,
            "BillingPhoneNumber" => auth()->user()->cellphone,
            "BillingEmail" => auth()->user()->email,
            "ShipmentFirstName" => $profile->first_name,
            "ShipmentLastName" => $profile->last_name,
            "ShipmentCompany" => $profile->company,
            "ShipmentAddress" => $profile->address_line_1,
            "ShipmentAddress2" => $profile->address_line_2,
            "ShipmentCity" => $profile->city,
            "ShipmentState" => $state,
            "ShipmentZipCode" => $profile->postal_code,
            "ShipmentCountry" => $country,
            "ShipmentPhone" => auth()->user()->cellphone,
            "ShipmentEmail" => auth()->user()->email
        ];

        $response = $client->request('POST', $apiURL, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'SecureURL' => $this->storeURL,
                'PrivateKey' => $this->privateKey,
                'Token' => $this->token,
            ],
            'json' => $requestBody,
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new \RuntimeException("Failed to create order key. Status code: " . $response->getStatusCode());
        }

        $body = $response->getBody();
        return json_decode($body, true);
    }

    public function getCustomerData($profile, $country, $state)
    {
        // Get store key from env config
        $STORE_KEY = env("STORE_KEY");
        // Decrypting data
        $password = Crypt::decryptString(auth()->user()->store_hash, $STORE_KEY);
        $customerData = [
            "CustomerID" => "",
            "Email" => auth()->user()->email,
            "Password" => $password,
            "BillingCompany" => $profile->company,
            "BillingFirstName" => $profile->first_name,
            "BillingLastName" => $profile->last_name,
            "BillingAddress1" => $profile->address_line_1,
            "BillingAddress2" => $profile->address_line_2,
            "BillingCity" => $profile->city,
            "BillingState" => $state,
            "BillingZipCode" => $profile->postal_code,
            "BillingCountry" => $country,
            "BillingPhoneNumber" => auth()->user()->cellphone,
            "ShippingCompany" => $profile->company,
            "ShippingFirstName" => $profile->first_name,
            "ShippingLastName" => $profile->last_name,
            "ShippingAddress1" => $profile->address_line_1,
            "ShippingAddress2" => $profile->address_line_2,
            "ShippingCity" => $profile->city,
            "ShippingState" => $state,
            "ShippingZipCode" => $profile->postal_code,
            "ShippingCountry" => $country,
            "ShippingPhoneNumber" => auth()->user()->cellphone,
            "Enabled" => true,
            "MailList" => true,
            "NonTaxable" => true,
            "DisableBillingSameAsShipping" => false,
            "ResetPassword" => false,
        ];

        return $customerData;
    }

    public function createCustomer($requestBody)
    {
        $client = new \GuzzleHttp\Client();

        $apiURL = $this->apiHost . '/3dCartWebAPI/v2/Customers';

        $response = $client->request('POST', $apiURL, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'SecureURL' => $this->storeURL,
                'PrivateKey' => $this->privateKey,
                'Token' => $this->token,
            ],
            'json' => $requestBody,
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new \RuntimeException("Failed to create customer. Status code: " . $response->getStatusCode());
        }

        $body = $response->getBody();
        return json_decode($body, true);
    }

    public function getCustomer($customerEmail)
    {
        try {
            $client = new \GuzzleHttp\Client();

            $apiURL = $this->apiHost . '/3dCartWebAPI/v2/Customers?limit=1&email=' . $customerEmail;

            $response = $client->request('GET', $apiURL, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'SecureURL' => $this->storeURL,
                    'PrivateKey' => $this->privateKey,
                    'Token' => $this->token,
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $body = $response->getBody();
                return json_decode($body, true);
            } elseif ($statusCode !== 404) {
                throw new \RuntimeException("Failed to get customer. Status code: " . $statusCode);
            }
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();

            if ($statusCode !== 404) {
                throw new \RuntimeException("Failed to get customer. Status code: " . $statusCode);
            }
        }
    }

    public function updateCustomer($customerEmail, $password)
    {
        $customerResp = $this->getCustomer($customerEmail);
        if (!$customerResp) {
            return;
            // throw new \Exception("Unable to get customer with this email");
        }

        $customerData = $customerResp[0];
        $customerData['Password'] = $password;
        $customerData['ResetPassword'] = false;

        Log::info("customerData");
        Log::info($customerData);

        $client = new \GuzzleHttp\Client();

        $apiURL = $this->apiHost . '/3dCartWebAPI/v2/Customers/' . $customerData['CustomerID'];

        $response = $client->request('PUT', $apiURL, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'SecureURL' => $this->storeURL,
                'PrivateKey' => $this->privateKey,
                'Token' => $this->token,
            ],
            'json' => $customerData,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException("Unable to udpate customer. Status code: " . $response->getStatusCode());
        }

        $body = $response->getBody();
        return json_decode($body, true);
    }
}
