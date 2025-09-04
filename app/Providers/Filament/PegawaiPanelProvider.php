<?php

namespace App\Providers\Filament;

use App\Filament\Pegawai\Pages\Auth\Register;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PegawaiPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pegawai')
            ->path('pegawai')

            // Auth bawaan + halaman register kustom
            ->login()
            ->registration(Register::class)

            ->colors(['primary' => Color::Blue])

            ->discoverResources(
                in: app_path('Filament/Pegawai/Resources'),
                for: 'App\\Filament\\Pegawai\\Resources',
            )
            ->discoverPages(
                in: app_path('Filament/Pegawai/Pages'),
                for: 'App\\Filament\\Pegawai\\Pages',
            )
            ->discoverWidgets(
                in: app_path('Filament/Pegawai/Widgets'),
                for: 'App\\Filament\\Pegawai\\Widgets',
            )
            ->widgets([
                Widgets\AccountWidget::class,
                \App\Filament\Widgets\KunjunganStats::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    public function afterLoginRedirectPath(): string
    {
        return '/pegawai';
    }
}
