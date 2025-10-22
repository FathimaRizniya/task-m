<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register | {{ config('app.name') }}</title>
  @vite('resources/css/app.css')

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Inter', sans-serif;
      background: url('/backround1.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      overflow: hidden;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);
      z-index: 0;
    }

    .register-container {
      position: relative;
      z-index: 10;
      width: 440px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      padding: 3rem 2.5rem;
      text-align: center;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
      transition: all 0.3s ease;
    }

    .register-container:hover {
      box-shadow: 0 0 40px rgba(0, 255, 255, 0.25);
      transform: translateY(-5px);
    }

    h1 {
      font-size: 2rem;
      background: linear-gradient(90deg, #06b6d4, #3b82f6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    p {
      font-size: 0.95rem;
      color: #d1d5db;
      margin-bottom: 2rem;
    }

    label {
      display: block;
      font-size: 0.9rem;
      color: #cbd5e1;
      text-align: left;
      margin-bottom: 0.3rem;
    }

    input {
      width: 100%;
      padding: 0.9rem 1rem;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background: rgba(255, 255, 255, 0.08);
      color: #fff;
      margin-bottom: 1.3rem;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: #06b6d4;
      box-shadow: 0 0 10px rgba(6, 182, 212, 0.4);
    }

    .register-btn {
      width: 100%;
      background: linear-gradient(90deg, #06b6d4, #3b82f6);
      border: none;
      border-radius: 10px;
      color: #000;
      padding: 0.9rem;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .register-btn:hover {
      transform: scale(1.03);
      box-shadow: 0 0 20px rgba(6, 182, 212, 0.4);
    }

    .links {
      margin-top: 1.3rem;
      font-size: 0.85rem;
      display: flex;
      justify-content: space-between;
    }

    .links a {
      color: #06b6d4;
      text-decoration: none;
      transition: 0.3s;
    }

    .links a:hover {
      color: #3b82f6;
    }

    @media (max-width: 480px) {
      .register-container {
        width: 90%;
        padding: 2.5rem 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="register-container">
    <h1>Create Account</h1>
    <p>if you are new user, create a account</p>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div>
        <label for="name">Full Name</label>
        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
      </div>

      <div>
        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
      </div>

      <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password" />
      </div>

      <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
      </div>

      <button type="submit" class="register-btn">Register</button>

      <div class="links">
        <span>Already registered?</span>
        <a href="{{ route('login') }}">Login here</a>
      </div>
    </form>
  </div>
</body>
</html>
