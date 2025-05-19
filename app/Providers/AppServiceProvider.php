<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

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
        Blueprint::macro('defaultMeta', function () {
            $this->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $this->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $this->enum('status', ['active', 'inactive'])->default('active');
            $this->timestamps();
        });

        // Blueprint::macro('observationFields', function () {
        //     $this->text('comment')->nullable();
        //     $this->json('images')->nullable();
        //     $this->defaultMeta();
        // });
    }
}

