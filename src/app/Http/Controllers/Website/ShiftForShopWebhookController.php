<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\PricePlan;
use App\Models\Profile;
use App\Models\Subscriber;
use App\Models\Subscription;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShiftForShopWebhookController extends Controller
{
    public function newOrderWebhook(Request $request)
    {
        Log::info("newOrderWebhook");
        $payload = json_decode($request->getContent(), true)[0]; // Get only the first item of the array directly
        Log::info($request->getContent());
        $itemID = $payload['OrderItemList'][0]['CatalogID'];
        $now = new DateTime();
        $pricePlan = PricePlan::where('sku', $itemID)->first();
        $planType = null;
        $expired_at = null;
        if ($pricePlan) {
            $expired_at = $now->add(new DateInterval($pricePlan->period));
            switch ($pricePlan->period) {
                case "P7D":
                    $planType = "Weekly";
                    break;
                case "P1M":
                    $planType = "Monthly";
                    break;
                case "P1Y":
                    $planType = "Annual";
                    break;
            }
        }

        $subscriptionData = [
            'type' => $planType,
            'user_name' => $payload['BillingEmail'],
            'order_number' => $payload['OrderID'],
            'subtotal' => $payload['OrderAmount'],
            'tax' => $payload['SalesTax'],
            'shipping' => $payload['ShipmentList'][0]['ShipmentMethodName'], // Get only the first shipment in the list directly
            'service_fee' => $payload['ShipmentList'][0]['ShipmentCost'], // Get only the cost of the first shipment in the list directly
            'discount' => $payload['OrderDiscount'],
            'total' => $payload['TransactionList'][0]['TransactionAmount'], // Get only the amount of the first transaction in the list directly
            'provider_customer_id' => $payload['CustomerID'],
            'transaction_id' => $payload['TransactionList'][0]['TransactionID'], // Get only the ID of the first transaction in the list directly
            'expired_at' => $expired_at,
            'is_active' => $payload['OrderStatusID'] == 1, // Simplify the condition directly
        ];

        $subscribers = null;
        $profiles = null;
        Subscription::updateOrCreate([
            'user_name' => $payload['BillingEmail']
        ], $subscriptionData);

        $user = User::where('email', $payload['BillingEmail'])->first();
        if ($user) {
            $subscribers = Subscriber::where('user_id', $user->id)->first();
            $profiles = Profile::where('user_id', $user->id)->first();
        }
        if ($subscribers) {
            $subscribers->update(['is_active' => true]);
        }
        if ($profiles) {
            $profiles->update(['is_active' => true]);
        }
    }

    public function orderStatusWebhook(Request $request)
    {
        Log::info("orderStatusWebhook");
        $payload = json_decode($request->getContent(), true)[0];
        Log::info($request->getContent());
        $subscription = Subscription::where('user_name', $payload['BillingEmail'])->where('provider_customer_id', $payload['CustomerID'])->first();
        if ($subscription && $payload['OrderStatusID'] == 5) {
            $subscription->update(['status' => 5]);
        }
    }
}
