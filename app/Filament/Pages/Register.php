<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Livewire\Attributes\Validate;

class Register extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static string $view = 'filament.pages.register';
    protected static bool $shouldRegisterNavigation = false; // supaya tidak muncul di sidebar

    // ✨ Tambah field NIP
    #[Validate('required|string|max:30|unique:users,nip')]
    public $nip;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string|email|max:255|unique:users,email')]
    public $email;

    #[Validate('required|string|min:8|same:password_confirmation')]
    public $password;

    #[Validate('required|string|min:8')]
    public $password_confirmation;

    public function register()
    {
        $this->validate();

        User::create([
            'nip' => $this->nip, // simpan NIP
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Notification::make()
            ->title('Registrasi berhasil! Silakan login.')
            ->success()
            ->send();

        return redirect()->route('filament.admin.auth.login');
    }
}
