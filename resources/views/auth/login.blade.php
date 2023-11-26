 <!-- <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> -->
 <style>
     .container {
         max-width: 350px;
         background: #F8F9FD;
         background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
         border-radius: 40px;
         padding: 25px 35px;
         border: 5px solid rgb(255, 255, 255);
         box-shadow: #b7472a 0px 30px 30px -20px;
         margin: 20px;
         margin: 0 auto;
     }

     .heading {
         text-align: center;
         font-weight: 900;
         font-size: 30px;
         color: #b7472a;
     }

     .form {
         margin-top: 20px;
     }

     .form .input {
         width: 100%;
         background: white;
         border: none;
         padding: 15px 20px;
         border-radius: 20px;
         margin-top: 15px;
         box-shadow: #f0af9e 0px 10px 10px -5px;
         border-inline: 2px solid transparent;
     }

     .form .input::-moz-placeholder {
         color: rgb(170, 170, 170);
     }

     .form .input::placeholder {
         color: rgb(170, 170, 170);
     }

     .form .input:focus {
         outline: none;
         border-inline: 2px solid #b7472a;
     }

     .form .forgot-password {
         display: block;
         margin-top: 10px;
         margin-left: 10px;
     }

     .form .forgot-password a {
         font-size: 11px;
         color: #b7472a;
         text-decoration: none;
     }

     .form .login-button {
         display: block;
         width: 100%;
         font-weight: bold;
         background: linear-gradient(45deg, #b7472a 0%, #f0af9e 100%);
         color: white;
         padding-block: 15px;
         margin: 20px auto;
         border-radius: 20px;
         box-shadow: #f0af9e 0px 20px 10px -15px;
         border: none;
         transition: all 0.2s ease-in-out;
     }

     .form .login-button:hover {
         transform: scale(1.03);
         box-shadow: #b7472a 0px 23px 10px -20px;
     }

     .form .login-button:active {
         transform: scale(0.95);
         box-shadow: #b7472a 0px 15px 10px -10px;
     }

     .social-account-container {
         margin-top: 25px;
     }

     .social-account-container .title {
         display: block;
         text-align: center;
         font-size: 10px;
         color: rgb(170, 170, 170);
     }

     .social-account-container .social-accounts {
         width: 100%;
         display: flex;
         justify-content: center;
         gap: 15px;
         margin-top: 5px;
     }

     .social-account-container .social-accounts .social-button {
         background: linear-gradient(45deg, rgb(0, 0, 0) 0%, rgb(112, 112, 112) 100%);
         border: 5px solid white;
         padding: 5px;
         border-radius: 50%;
         width: 40px;
         aspect-ratio: 1;
         display: grid;
         place-content: center;
         box-shadow: #b7472a 0px 12px 10px -8px;
         transition: all 0.2s ease-in-out;
     }

     .social-account-container .social-accounts .social-button .svg {
         fill: white;
         margin: auto;
     }

     .social-account-container .social-accounts .social-button:hover {
         transform: scale(1.2);
     }

     .social-account-container .social-accounts .social-button:active {
         transform: scale(0.9);
     }

     .agreement {
         display: block;
         text-align: center;
         margin-top: 15px;
     }

     .agreement a {
         text-decoration: none;
         color: #b7472a;
         font-size: 9px;
     }
 </style>
 <div class="container">
     <div class="heading">Đăng nhập</div>
     <form class="form" method="POST" action="{{ route('login') }}">
         @csrf
         <input required="" class="input" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail">
         <input required="" class="input" type="password" name="password" id="password" placeholder="Mật khẩu">
         <span class="forgot-password"><a href="{{route ('password.email')}}">Quên mật khẩu ?</a></span>
         <span class="forgot-password"><a href="{{route('register')}}">Chưa có tài khoản ?</a></span>
         <input class="login-button" type="submit" value="Sign In">

     </form>
     <div class="social-account-container">
         <span class="title">Hoặc đăng nhập với ?</span>
         <div class="social-accounts">
             <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="social-button google">
                 <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                     <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
                 </svg>
             </a>
             <!-- <button class="social-button apple">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                        <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
                    </svg>
                </button>
                <button class="social-button twitter">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                    </svg>
                </button> -->
         </div>
     </div>
 </div>