<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use App\Http\Responses\Auth\LogoutResponse as CustomLogoutResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Css;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponseContract::class, CustomLogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Saat user berhasil login
        Event::listen(Login::class, function (Login $event) {
            // Hanya untuk panel pegawai
            if (filament()->getCurrentPanel()?->getId() === 'pegawai') {
                session()->flash(
                    'login_success_message',
                    'Selamat Datang, ' . ($event->user->name ?? 'Pegawai') . '!'
                );
            }
        });

        // ✅ Daftarkan custom CSS dengan FilamentAsset
      // Filament::serving(function () {
    //FilamentAsset::register([
        //Css::make('app-custom-styles', asset('css/custom-filament.css')),
        //]);
   // });

    }
}
