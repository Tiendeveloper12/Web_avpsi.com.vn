<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        $viteManifest = [];
        $manifestPath = public_path('build/manifest.json');

        if (file_exists($manifestPath)) {
            $viteManifest = json_decode(file_get_contents($manifestPath), true) ?: [];
        }

        $viteDevServerUrl = env('VITE_DEV_SERVER_URL');
        $viteDevServerAvailable = false;

        if (!empty($viteDevServerUrl) && filter_var($viteDevServerUrl, FILTER_VALIDATE_URL)) {
            $host = parse_url($viteDevServerUrl, PHP_URL_HOST);
            $port = parse_url($viteDevServerUrl, PHP_URL_PORT) ?: 5173;
            $timeout = 0.2;

            if ($host && $port) {
                $connection = @fsockopen($host, $port, $errno, $errstr, $timeout);

                if ($connection !== false) {
                    fclose($connection);
                    $viteDevServerAvailable = true;
                }
            }
        }

        View::share('viteDevServerAvailable', $viteDevServerAvailable);
        View::share('viteManifest', $viteManifest);
    }
}
