<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Wishlist;
use App\Observers\ModelActivityObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cart::observe(ModelActivityObserver::class);
        Category::observe(ModelActivityObserver::class);
        Customer::observe(ModelActivityObserver::class);
        Order::observe(ModelActivityObserver::class);
        OrderProduct::observe(ModelActivityObserver::class);
        Payment::observe(ModelActivityObserver::class);
        Product::observe(ModelActivityObserver::class);
        Wishlist::observe(ModelActivityObserver::class);
    }
}
