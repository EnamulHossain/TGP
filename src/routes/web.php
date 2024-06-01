<?php

use App\Http\Controllers\Website\ContactUsController as WebsiteContactUsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Website\GrantProviderController;
use App\Http\Controllers\Website\GrantWriterController;
use App\Http\Controllers\Website\HireGrantWriterController;
use App\Http\Controllers\Website\CookieConsentController;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\Website\PricePlanController;
use App\Http\Controllers\Website\CreateSubscriptionController;
use App\Http\Controllers\Website\ForgotPasswordController as WebsiteForgotPasswordController;
use App\Http\Controllers\Website\GrantController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ImportCSVController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\ShiftForShopWebhookController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/home', '/');

/*
|------------------------------------------
| Website
|------------------------------------------
*/
Route::get('/login', function () {
    return view('website.auth.login');
});
Route::post('/login', [LoginController::class, 'authenticate'])->name('website.login');
Route::post('/twofactor', [LoginController::class, 'twofactor'])->name('twofactor.compare');
Route::get('/auth/two-factor', [LoginController::class, 'showTwoFactorForm'])->name('website.auth.two_factor');

Route::get('/signup', function () {
    return view('website.auth.signup');
})->name('website.signup');


Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail']);


Route::get('forget-password', [WebsiteForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [WebsiteForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [WebsiteForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [WebsiteForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('change-password', [WebsiteForgotPasswordController::class, 'showChangePasswordForm'])->name('change.password.get');
Route::post('change-password', [WebsiteForgotPasswordController::class, 'submitChangePasswordForm'])->name('change.password.post');

Route::post('/grant-signup', [RegisterController::class, 'register'])->name('grant.signup');
Route::get('grant/clear-filter', [GrantController::class, 'clearFilter'])->name('grants.clear');

Route::view('/upload-csv', 'website.upload-csv');
Route::post('/upload-csv', [ImportCSVController::class, 'upload'])->name('csv.upload');

Route::group(['namespace' => 'Website'], function () {
    Route::post('/store-consent', [CookieConsentController::class, 'store'])->name('store.consent');
    Route::get('/', [HomeController::class, 'index'])->name('website.home');
    Route::get('get-states', [HomeController::class, 'getProvices'])->name('website.home');
    Route::get('pricing-and-plans', [PricePlanController::class, 'index'])->name('pricing.plans');

    Route::get('privacy_policy', function () {
        return view('website.privacy_policy');
    })->name('privacy_policy');


    Route::get('contact_us', function () {
        return view('website.contact_us');
    })->name('contact_us');

    Route::post('contact_us/store', [WebsiteContactUsController::class, 'feedback'])->name('contact_us.store');
    Route::get('terms-service', function () {
        return view('website.terms_service');
    })->name('terms_service');

    Route::get('about-us', function () {
        return view('website.about-us');
    })->name('about-us');


    Route::get('grants-subscriptin-required', function () {
        return view('website.grants-subscriptin-required');
    })->name('grants-subscriptin-required');

    Route::get('hire-a-grant-writer', [HireGrantWriterController::class, 'index'])->name('hire-a-grant-writer');
    Route::post('hire-grant-writers.store', [HireGrantWriterController::class, 'store'])->name('hire_grant_writers.store');


    Route::get('cookie-policy', function () {
        return view('website.cookie_policy');
    })->name('cookie_policy');

    Route::get('i-am-a-grant-provider', [GrantProviderController::class, 'index'])->name('i-am-a-grant-provider');
    Route::post('i-am-a-grant-provider.store', [GrantProviderController::class, 'store'])->name('grantprovider.store');


    Route::get('i-am-a-grant-writer', [GrantWriterController::class, 'index'])->name('i-am-a-grant-writer');
    Route::post('i-am-a-grant-writer.store', [GrantWriterController::class, 'store'])->name('grant-writer.store');



    Route::group(['middleware' => 'auth'], function () {
        Route::post('update-profile', 'ProfileController@update')->name('update.profile');
        Route::post('update-profile-api', 'ProfileController@updateApi')->name('update.profile-api');
        Route::get('profile', 'ProfileController@index')->name('my-profile');
        Route::delete('profile-destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // s4s integration
        Route::get('subscribe', [CreateSubscriptionController::class, 'subscribe'])->name('customer-subscribe');
    });

    //webhook
    Route::post('new-order', [ShiftForShopWebhookController::class, 'newOrderWebhook'])->name('new-order');
    Route::post('order-status-change', [ShiftForShopWebhookController::class, 'orderStatusWebhook'])->name('order-status-change');

    Route::get('search-grants', function () {
        return view('website.search-grants');
    })->name('search-grants');

    // Route::get('pricing-plans', function () {
    //     return view('website.pricing-plans');
    // })->name('pricing-plans');

    Route::get('cookie-policy', function () {
        return view('website.cookie_policy');
    })->name('cookie_policy');



    Route::get('faqs', function () {
        return view('website.faqs');
    })->name('faqs');

    Route::get('grant-details/{id}/{title}', 'GrantController@showDetails')->name('grant-details');
    // grant
    Route::group(['middleware' => 'auth'], function () {
        Route::get('create/grant', [GrantController::class, 'add'])->name('website.add.grant');
        Route::post('store/grant', [GrantController::class, 'store'])->name('website.store.grant');
        Route::post('preview-store/grant', [GrantController::class, 'storePreview'])->name('website.store.grant.preview');
        Route::get('favourite-unfavourite-grant/{id}', [GrantController::class, 'favouriteUnfavourite'])->name('favourite-unfavourite-grant');
        Route::post('preview', [GrantController::class, 'previewData'])->name('preview-data');
    });

    // Route to add new funding agency
    Route::post('add-new-agency-ajax', 'GrantController@storeNewFundingAgency');



    // clear cache 
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
        // return what you want
        return redirect("/");
    });
});

/*
|------------------------------------------
| Authenticate User
|------------------------------------------
*/
Route::group(['prefix' => 'auth'], function () {
    Auth::routes(['verify' => true]);
    Route::any('logout', 'Auth\LoginController@logout')->name('auth.logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('update-profile',  [ProfileController::class, 'update'])->name('update.profile');
    Route::get('profile', [ProfileController::class, 'index'])->name('my-profile');
    Route::get('my-plan', [ProfileController::class, 'myplan'])->name('my-plan');
});
Route::get('title-slug',[GrantController::class, 'titleSlug'])->name('title.slug');

/*
|------------------------------------------
| Dynamic Pages - up to 3 slugs
|------------------------------------------
*/
Route::group(['namespace' => 'Website'], function () {
    // un-comment the "if (!App::runningInConsole())" statement ONLY once project is set up and migrations have been run
    // run "php artisan cache:clear", "php artisan route:clear", "php artisan config:clear" in order to load custom templates
    // avoid running "php artisan optimize" as this created cached files and causes issues when renaming pages
    if (!App::runningInConsole()) {
        $pages = Page::whereNotNull('template_id')->get();

        foreach ($pages as $page) {
            $name = $page->slug;

            if (isset($page->template->controller_action) && $page->template->controller_action != 'Auth') {
                Route::get($page->url, $page->template->controller_action)->name($name);
            } elseif (!isset($page->template->controller_action)) {
                Route::get($page->url, 'PagesController@index')->name($name);
            }
        }
    }

    Route::get('{slug1}/{slug2?}/{slug3?}', 'PagesController@index');
});
