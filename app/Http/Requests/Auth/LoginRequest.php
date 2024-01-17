<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }


    /*  public function authenticate(): void
       {
           $this->ensureIsNotRateLimited();

           if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
               RateLimiter::hit($this->throttleKey());

               throw ValidationException::withMessages([
                   'email' => trans('Email incorrect')
               ]);
           }

           RateLimiter::clear($this->throttleKey());
       }*/
       public function authenticate(): void
       {
           $this->ensureIsNotRateLimited();
       
           $credentials = $this->only('email', 'password');
       
           if (!Auth::attempt($credentials, $this->boolean('remember'))) {
               RateLimiter::hit($this->throttleKey());
       
               if (RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
                   $seconds = RateLimiter::availableIn($this->throttleKey());
                   throw ValidationException::withMessages([
                       'email' => trans('Votre compte est bloqué pour 10mn', [
                           'seconds' => $seconds,
                           'minutes' => ceil($seconds / 60),
                       ]),
                   ]);
               }
       
               throw ValidationException::withMessages([
                   'email' => trans('Email ou mot de passe incorrect'),
               ]);
           }
       
           RateLimiter::clear($this->throttleKey());
       }
       
 /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   /* public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');

        if (!Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            $errors = [];

            if (empty($credentials['email']) && empty($credentials['password'])) {
                $errors['email'] = trans('auth.failed');
            } elseif (empty($credentials['email'])) {
                $errors['email'] = trans('Email incorrect');
            } elseif (empty($credentials['password'])) {
                $errors['password'] = trans('Mot de passe incorrect');
            } else {
                $errors['auth'] = trans('Email et/ou mot de passe incorrect');
            }

            throw ValidationException::withMessages($errors);
        }
        ;
        RateLimiter::clear($this->throttleKey());
    }*/

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

   /*  public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('Votre compte est bloqué pour 10mn', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
*/
public function ensureIsNotRateLimited(): void
{
    if (RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'email' => trans('Votre compte est bloqué pour 10mn', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
}


    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')) . '|' . $this->ip());
    }
}
