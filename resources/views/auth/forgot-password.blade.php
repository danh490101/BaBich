

<div class="container" style="margin-top: 150px;">
     <div class="heading">Quên mật khẩu</div>
     <x-auth-session-status class="mb-4" :status="session('status')" />
     <form class="form" method="POST" action="{{ route('password.email') }}">
         @csrf
         <input required="" class="input" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
         <input class="login-button" type="submit" value="Liên kết đặt lại mật khẩu">
     </form>
 </div>

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
