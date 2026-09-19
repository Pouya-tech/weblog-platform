<?php

namespace App\Http\Requests\Auth; // ✅


use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    protected function credentials(): array
    {
        return [
            $this->loginType() => $this->input('login'),
            'password'         => $this->input('password'),
        ];
    }

    protected function loginType(): string
    {
        return filter_var($this->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('login')) . '|' . $this->ip());
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! User::attemptLogin($this->credentials(), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'login' => 'The Credentials Are Incorrect.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            throw ValidationException::withMessages([
                'login' => 'Too many login attempts. Try again in '
                    . RateLimiter::availableIn($this->throttleKey()) . ' seconds.',
            ]);
        }
    }
}
