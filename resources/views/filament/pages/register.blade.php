<x-filament::page>
    <form wire:submit.prevent="register" class="space-y-6">
        <div>
    <label for="nip" class="block text-sm font-medium text-black">NIP</label>
    <input wire:model="nip" id="nip" type="text"
        class="mt-1 block w-full rounded-lg border-white-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm text-black bg-transparent placeholder-gray-400" />
    @error('nip') 
        <span class="text-red-500 text-sm">{{ $message }}</span> 
    @enderror
</div>


        <div>
            <label for="name" class="block text-sm font-medium text-black-700">Nama</label>
            <input wire:model="name" id="name" type="text"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm text-black bg-transparent placeholder-gray-400" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-black-700">Email</label>
            <input wire:model="email" id="email" type="email"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm text-black bg-transparent placeholder-gray-400" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-black-700">Password</label>
            <input wire:model="password" id="password" type="password"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm text-black bg-transparent placeholder-gray-400" />
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-black-700">Konfirmasi Password</label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm text-black bg-transparent placeholder-gray-400" />
            @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <x-filament::button type="submit" class="w-full">
            Register
        </x-filament::button>

        <div class="text-center mt-4">
            <a href="{{ route('filament.admin.auth.login') }}" class="text-primary-600">
                Sudah punya akun? Login di sini
            </a>
        </div>
    </form>
</x-filament::page>
