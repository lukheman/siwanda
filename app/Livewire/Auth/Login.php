<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Login')]
class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public string $role = 'admin';
    public bool $remember = false;

    public function mount()
    {
        $routeName = request()->route()->getName();
        $roleMap = [
            'login.admin' => 'admin',
            'login.bendahara' => 'bendahara',
            'login.kepala_desa' => 'kepala_desa',
            'login.kaur_umum' => 'kaur_umum',
        ];

        $this->role = $roleMap[$routeName] ?? 'admin';
    }

    public function submit($email = null, $password = null)
    {
        if ($email !== null) $this->email = $email;
        if ($password !== null) $this->password = $password;

        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::guard($this->role)->attempt($credentials, $this->remember)) {
            session()->regenerate();
            return redirect()->route($this->role . '.dashboard');
        }

        $this->addError('email', __('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layoutData(['type' => 'auth']);
    }
}
