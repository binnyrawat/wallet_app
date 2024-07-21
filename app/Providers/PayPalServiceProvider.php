<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiContext::class, function ($app) {
            $config = config('paypal');

            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    $config['client_id'],
                    $config['secret']
                )
            );

            $apiContext->setConfig($config['settings']);

            return $apiContext;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
