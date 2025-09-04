<x-filament-panels::page.simple>
    <x-slot name="subheading">
        Sudah punya akun?
        <a href="{{ url('/pegawai/login') }}" class="text-primary-600 hover:underline">
            Masuk di sini
        </a>
    </x-slot>

    <x-filament-panels::form id="form" wire:submit="register">
        {{ $this->form }}

        <x-filament::button type="submit" form="form" class="w-full mt-4">
            Daftar
        </x-filament::button>
    </x-filament-panels::form>
</x-filament-panels::page.simple>
