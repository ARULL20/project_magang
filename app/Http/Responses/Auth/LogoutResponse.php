<?php

namespace App\Http\Responses\Auth;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Http\RedirectResponse;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        // Arahkan ke landing setelah logout
        return redirect()->to('/');
        // Jika pakai named route:
        // return redirect()->route('landing');
    }
}
