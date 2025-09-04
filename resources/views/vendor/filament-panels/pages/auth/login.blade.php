<x-filament-panels::page.simple>
    @php
        $panelId = filament()->getCurrentPanel()->getId();
    @endphp

    @if ($panelId === 'pegawai')
        <x-slot name="subheading">
            Belum punya akun?
            <a href="{{ url('/pegawai/register') }}" class="text-primary-600 hover:underline">
                Daftar di sini
            </a>
        </x-slot>
    @elseif ($panelId === 'admin' && filament()->hasRegistration())
        <x-slot name="subheading">
            Belum punya akun?
            <a href="{{ url('/admin/register') }}" class="text-primary-600 hover:underline">
                Daftar di sini
            </a>
        </x-slot>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(
        \Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
        scopes: $this->getRenderHookScopes()
    ) }}

    <x-filament-panels::form id="form" wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook(
        \Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
        scopes: $this->getRenderHookScopes()
    ) }}
</x-filament-panels::page.simple>
