<?php

namespace App\Providers;

use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public function getAll(){

       return $repositories = [
            UserRepositoryInterface::class => UserRepository::class
       ];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = $this->getAll();
        foreach($repositories as $key => $repository) {
            $this->app->bind( $key , $repository);
        }
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
