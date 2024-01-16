<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationItem;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Lime,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ])->navigationItems([
                // NavigationItem::make('Tabungan')
                //     ->icon('heroicon-o-banknotes')
                //     ->url('/admin/tabungans')
                //     ->isActiveWhen(fn () => request()->routeIs('*.tabungans.*')),
                NavigationItem::make('Transaksi')
                    ->icon('heroicon-o-calculator')
                    ->url('/admin/transactions')
                    ->isActiveWhen(fn () => request()->routeIs('*.transactions.*')),
                NavigationItem::make('Siswa')
                    ->icon('heroicon-o-users')
                    ->url('/admin/students')
                    ->isActiveWhen(fn () => request()->routeIs('*.students.*')),
                NavigationItem::make('Kelas')
                    ->icon('heroicon-o-academic-cap')
                    ->url('/admin/rombels')
                    ->isActiveWhen(fn () => request()->routeIs('*.rombels.*')),
                NavigationItem::make('Pengguna')
                    ->visible(fn (): bool => auth()->user()->isAdmin())
                    ->icon('heroicon-o-user-circle')
                    ->url('/admin/users')
                    ->isActiveWhen(fn () => request()->routeIs('*.users.*')),
            ]);
    }
}
