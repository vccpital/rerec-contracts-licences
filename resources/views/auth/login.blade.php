<x-guest-layout>
    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 bg-light" :status="session('status')" />

    <style>
        /* Default styles for the entire page */
        .container-fluid {
            padding: 0;
        }

        .col-6 {
            padding: 0; /* Adjust padding as needed */
        }

        /* Media queries for responsive design */
        @media (max-width: 768px) {
            .col-6 {
                max-width: 100%; /* Adjust max-width for smaller screens */
            }
            .form-control {
                width: 100%; /* Make form controls full width on smaller screens */
            }
        }

        @media (min-width: 768px) {
            .col-6 {
                max-width: 50%; /* Adjust max-width for medium screens */
            }
        }

        @media (min-width: 992px) {
            .col-6 {
                max-width: 50%; /* Adjust max-width for larger screens */
            }
        }
    </style>

    <div class="container container-fluid">
        <div class="row justify-content-center align-items-stretch p-1">
            <div class="col col-6 col-lg-6 border-transparent mb-auto px-4 py-5 rounded" style="background-color: #22864D;">
                <div class="row mt-0 p-0 border-transparent">
                    <span class="ms-2" style="font-family: 'Inter', sans-serif; font-weight: 700; font-size: 20px; color: white; padding: 2px; display:inline;">
                        Your gateway to seamless <span style="color: #ee662a;">Contract</span>,
                        <span style="color: #ee662a;">Licence tracking</span> <span style="color: #ee662a;">Platform</span>
                    </span>
                </div>

                <div class="row text-center">
                    <img src="{{ asset('images/loginlogo.png') }}" style="max-width: 248px; height: auto; margin-left: 132px;" alt="Image description">
                </div>
            </div>

            <div class="col col-6 col-lg-6 border-transparent rounded mb-auto ms-auto" style="background-color: transparent; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                <div>
                    <h4 class="text-center fw-bolder mt-3" style="color: #22864D;">Get Started</h4>
                </div>
                <form method="POST" action="{{ route('login') }}" class="w-100">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3 px-9">
                        <x-input-label for="email" :value="__('Email')" class="fw-bold" />
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill text-sm"></i></span>
                            <x-text-input id="email" class="form-control block w-full text-success" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Enter your email') }}" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password -->
<div class="mb-4 px-9">
    <x-input-label for="password" :value="__('Password')" class="fw-bold" />
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-key-fill text-sm"></i></span>
        <x-text-input id="password" class="form-control block w-full text-muted" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Passcode') }}" />
        <button class="btn btn-outline-secondary" type="button" id="password-toggle">
            <i class="bi bi-eye text-sm"></i>
        </button>
    </div>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>


                    <!-- Remember Me -->
                    <div class="mb-3">
                        <label for="remember_me" class="form-check-label text-success">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        @if (Route::has('password.request'))
                        <a class="text-decoration-none text-center text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <button type="submit" class="btn btn-sm btn-primary">{{ __('Log in') }}</button>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                    <a href="/register"  class="text-sm text-center" style="text-decoration: none;"> Don't have an account? <b>Register</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('password-toggle');

    passwordToggle.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });
</script>

    <!-- jQuery for Search Functionality -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</x-guest-layout>
