<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('search', function ($string) {
            if ($string) {
                return $this->where('name', 'like', '%' . $string . '%')
                            ->orWhere('email', 'like', '%' . $string . '%');
            }else{
                return $this;
            }
        });
        Builder::macro('searchBooks', function ($string) {
            if ($string) {
                return $this->where('name', 'like', '%' . $string . '%')
                            ->orWhere('author', 'like', '%' . $string . '%');
            }else{
                return $this;
            }
        });
    }
}
