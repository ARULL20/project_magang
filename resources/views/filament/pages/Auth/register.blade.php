<x-filament-panels::page>
    <form wire:submit.prevent="register" class="space-y-4">
        {{ $this->form }}

        <x-filament::button type="submit" class="w-full">
            Daftar Akun
        </x-filament::button>

        <div class="text-center">
            <a href="{{ route('filament.pegawai.auth.login') }}" class="text-sm text-primary-600">
                Sudah punya akun? Login di sini
            </a>
        </div>
    </form>
</x-filament-panels::page>
