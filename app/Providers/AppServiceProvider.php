<?php

namespace App\Providers;

use App\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Schema::defaultStringLength(191);
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
                $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
    
                return new LengthAwarePaginator(
                    $this->forPage($page, $perPage),
                    $total ?: $this->count(),
                    $perPage,
                    $page,
                    [
                        'path' => LengthAwarePaginator::resolveCurrentPath(),
                        'pageName' => $pageName,
                    ]
                );
            });
        Paginator::useBootstrap();
        Gate::define("admin", function (User $user) {
            return $user->is_admin;
        });
    }
}
