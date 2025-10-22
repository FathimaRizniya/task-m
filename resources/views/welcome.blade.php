<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Times New Roman', Times, serif;
            color: #fff;
            overflow: hidden;
            background: url('/backround1.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.65);
            box-shadow: inset 0 0 150px rgba(0, 255, 255, 0.15);
            z-index: 1;
        }

        .welcome-card {
            position: relative;
            z-index: 10;
            max-width: 750px;
            width: 90%;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(15px);
            border-radius: 2.5rem;
            padding: 5rem 3rem;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .welcome-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 20px 60px rgba(0, 255, 255, 0.3);
        }

        h1 {
            font-size: 3.8rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(90deg, #00ffff, #3b82f6, #4ade80);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        }

        p {
            font-size: 1.25rem;
            margin-bottom: 3rem;
            color: #d1d5db;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 9999px;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-login {
            background: #00ffff;
            color: #000;
            box-shadow: 0 0 25px #00ffff;
        }

        .btn-login:hover {
            background: #22c55e;
            transform: scale(1.05);
            box-shadow: 0 0 50px #00ffff;
        }

        .btn-register {
            border: 2px solid #00ffff;
            color: #00ffff;
            box-shadow: 0 0 25px #00ffff40;
        }

        .btn-register:hover {
            background: #00ffff;
            color: #000;
            transform: scale(1.05);
            box-shadow: 0 0 50px #00ffff;
        }

        .footer {
            margin-top: 3rem;
            font-size: 0.9rem;
            color: #9ca3af;
        }

        @media (max-width: 768px) {
            h1 { font-size: 3rem; }
            .welcome-card { padding: 4rem 2.5rem; }
        }

        @media (max-width: 480px) {
            h1 { font-size: 2.2rem; }
            .welcome-card { padding: 3rem 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <h1>Task Management </h1>
        <p>Task Management System using laravel </p>

        <div class="btn-group">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-login">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
            @endauth
        </div>

        
    </div>
</body>
</html>
