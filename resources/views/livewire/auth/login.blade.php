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

        <!-- Alert Message -->
        @if ($errors->has('email'))
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 rounded-3 mb-3" style="font-size: 0.875rem;">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ $errors->first('email') }}</span>
            </div>
        @endif

        <!-- Login Form -->
        <form x-on:submit.prevent="$wire.submit(document.getElementById('email').value, document.getElementById('password').value)">

            <!-- Email Field -->
            <div class="form-floating position-relative mt-2">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" wire:model.blur="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="Alamat Email" autocomplete="email" autofocus>
                <label for="email">Alamat Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-floating position-relative mb-4" x-data="{ showPassword: false }">
                <i class="fas fa-lock input-icon"></i>
                <input :type="showPassword ? 'text' : 'password'" wire:model.blur="password"
                    class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Kata Sandi" autocomplete="current-password">
                <label for="password">Kata Sandi</label>
                <button type="button" class="password-toggle" @click="showPassword = !showPassword">
                    <i class="fas" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-login" wire:loading.attr="disabled">
                <span wire:loading.remove>Masuk <i class="fas fa-sign-in-alt"></i></span>
                <span wire:loading>
                    <i class="fas fa-spinner fa-spin me-2"></i> Memproses...
                </span>
            </button>
        </form>
    </div>
</div>
