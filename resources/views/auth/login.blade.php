<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        @if(session('errormessage'))
            <div class=" mb-4 font-medium text-sm text-red-600">
                {{ session('errormessage') }}
            </div>
        @endif
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col items-start justify-start pt-10 pr-10 pb-10 pl-10 bg-white shadow-2xl rounded-xl relative z-10">
                <p class="w-full text-4xl font-medium text-center leading-snug font-serif">Login</p>
            <div class="w-full mt-6 mr-0 mb-0 ml-0 relative space-y-8"> 

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block ">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>   
            </div>
            <div>
                <x-button>
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justify-center ">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class=" block flex items-center justify-center mt-4">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Are you new here  ?') }} 
                    <a class=" text-sm text-orange-600 hover:text-orange-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" href="{{ route('register') }}"> {{ __('Register') }}
                    </span>
            </div>   
        </form>
    </x-authentication-card>
</x-guest-layout>
