<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 bg-light" :status="session('status')" />

    <div class="container container-fluid" style="background-color: #22864D;">
        <div class="row justify-content-center align-items-stretch p-1">
            <!-- Left Side Content -->
            <div class="col col-6 col-lg-6 border-transparent mb-auto px-4 py-5 rounded">
                <div class="row mt-0 p-2 border-transparent h-100">
                    <span class="ms-2" style="font-family: 'Inter', sans-serif; font-weight: 700; font-size: 20px; color: white; padding: 2px; display:inline;">
                        Your gateway to seamless <span style="color: #ee662a;">Contract</span>,
                        <span style="color: #ee662a;">Licence tracking</span> and efficient <span style="color: #ee662a;">platform</span>
                    </span>
                </div>

                <div class="row text-center h-100">
                    <img src="{{ asset('images/loginlogo.png') }}" style="max-width: 248px; height: auto; margin-left: 132px;" alt="REREC ICT Department Logo">
                </div>
            </div>

            <!-- Right Side Content -->
            <div class="col col-6 col-lg-6 border-transparent rounded mb-auto ms-auto" style="background-color: transparent; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                <div>
                    <h4 class="text-center fw-bolder mt-3" style="color: #22864D;">Get Started</h4>
                </div>
                <form method="POST" action="{{ route('register') }}" class="w-100">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <x-text-input id="name" class="form-control uppercase" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <x-text-input id="email" class="form-control lowercase" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            <button class="btn btn-sm btn-primary fw-bold" type="button" id="password-toggle">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <button type="submit" class="btn btn-primary ms-4">
            <i class="bi bi-person-plus-fill me-1"></i>{{ __('Register') }}
        </button>
    </div>
</form>

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

            </div>
        </div>
    </div>
    <!-- jQuery for Search Functionality -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</x-guest-layout>
