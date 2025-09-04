<?php

namespace App\Filament\Pegawai\Pages\Auth;

use App\Models\User;
use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Register extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $slug = 'register';

    protected static string $view = 'filament.pegawai.pages.auth.register';

    public ?string $nip = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $password_confirmation = null;

    public function mount(): void
    {
        // tidak perlu $this->form->fill(); supaya tidak assign null ke properties
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nip')
                ->label('NIP')
                ->required()
                ->maxLength(30)
                ->unique(User::class, 'nip'),

            Forms\Components\TextInput::make('name')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->unique(User::class, 'email')
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->required()
                ->minLength(6),

            Forms\Components\TextInput::make('password_confirmation')
                ->label('Konfirmasi Password')
                ->password()
                ->same('password')
                ->required(),
        ];
    }

    public function register()
{
    $data = $this->form->getState();

    $user = User::create([
        'nip'      => $data['nip'],
        'name'     => $data['name'],
        'email'    => $data['email'],
        'password' => Hash::make($data['password']),
        'role'     => 'pegawai',
    ]);

    Auth::login($user);

    return redirect()->intended('/pegawai');
}


    protected function getFormModel(): string
    {
        return User::class;
    }
}
