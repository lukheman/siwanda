@component('layouts.guest', ['type' => 'auth', 'title' => 'Login - PANDUWA'])
<div class="login-container">
    <div class="login-card">
        <!-- Brand Logo -->
        <div class="brand-logo">
            <div class="icon-wrapper">
                <i class="fas fa-landmark"></i>
            </div>
            <h1>Masuk Sistem</h1>
            <p>Silakan masuk ke portal <strong>{{ ucwords(str_replace('_', ' ', $role)) }}</strong></p>
        </div>


        <!-- Login Form -->
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            
            <input type="hidden" name="role" value="{{ $role }}">

            <!-- Email Field -->
            <div class="form-floating position-relative mt-2">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="Alamat Email" autocomplete="email" autofocus required>
                <label for="email">Alamat Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-floating position-relative mb-4" x-data="{ showPassword: false }">
                <i class="fas fa-lock input-icon"></i>
                <input :type="showPassword ? 'text' : 'password'" name="password"
                    class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Kata Sandi" autocomplete="current-password" required>
                <label for="password">Kata Sandi</label>
                <button type="button" class="password-toggle" @click="showPassword = !showPassword">
                    <i class="fas" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-login">
                <span>Masuk <i class="fas fa-sign-in-alt"></i></span>
            </button>
        </form>
    </div>
</div>
@endcomponent
