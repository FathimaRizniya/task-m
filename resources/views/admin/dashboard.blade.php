<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-bold text-3xl text-cyan-400 tracking-wide leading-tight animate__animated animate__fadeInDown">
            {{ __('Admin Dashboard') }}
        </h2> --}}
    </x-slot>

    <style>
        body {
            background: radial-gradient(circle at top left, #020617, #0f172a);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: calc(100vh - 4rem);
        }

        .sidebar {
            background: #111827;
            border-right: 1px solid rgba(6, 182, 212, 0.25);
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 4px 0 15px rgba(6, 182, 212, 0.05);
        }

        .sidebar h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #06b6d4;
            margin-bottom: 2rem;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: #fff;
            font-weight: 500;
            margin-bottom: 0.5rem;
            position: relative;
            transition: 0.3s;
        }

        .sidebar a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            border-radius: 0 4px 4px 0;
            background: linear-gradient(180deg, #06b6d4, #3b82f6);
            transform: scaleY(0);
            transition: 0.3s ease-in-out;
        }

        .sidebar a:hover::before {
            transform: scaleY(1);
        }

        .sidebar a:hover {
            color: #06b6d4;
            background: rgba(6, 182, 212, 0.1);
            transform: translateX(6px);
        }

        .sidebar button {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: #f87171;
            font-weight: 500;
            transition: 0.3s;
            background: none;
        }

        .sidebar button:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
            transform: translateX(5px);
        }

      
        .main-content {
            padding: 2.5rem;
            background: radial-gradient(circle at top right, #0f172a, #1e293b);
        }

        .card {
            background: #1e293b;
            border: 1px solid rgba(6, 182, 212, 0.25);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(6, 182, 212, 0.4);
            box-shadow: 0 15px 35px rgba(6, 182, 212, 0.2);
        }

        .card h4 {
            color: #06b6d4;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .card p {
            color: #fff;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 0.7rem 1.4rem;
            border-radius: 0.5rem;
            font-weight: 600;
            background: linear-gradient(90deg, #06b6d4, #3b82f6);
            color: #000;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.4);
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .main-content {
                padding: 1.5rem;
            }
        }
    </style>

    <div class="dashboard-container">
       
        <div class="sidebar">
            <h3>Admin Panel</h3>
            <a href="{{ route('categories.index') }}"> Manage Categories</a>
            <a href="{{ route('admin.tasks.index') }}"> Manage Tasks</a>
            <a href="{{ route('admin.users.index') }}"> Manage Users</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-auto w-full">
                @csrf
                <button type="submit"> Logout</button>
            </form>
        </div>

       
        <div class="main-content">
            <div class="card animate__animated animate__fadeIn">
                <h4>Welcome, Admin </h4>
                <p>
                    You have Manage the entire system including
                    <span class="text-cyan-400 font-semibold">Users</span>,
                    <span class="text-cyan-400 font-semibold">Categories</span>, and
                    <span class="text-cyan-400 font-semibold">Tasks</span> in the system.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="card">
                    <h4>Categories</h4>
                    <p>Manage the all Task categories.</p>
                    <a href="{{ route('categories.index') }}" class="btn mt-4">Manage</a>
                </div>

                <div class="card">
                    <h4>Tasks</h4>
                    <p>Assign, and Manage all tasks.</p>
                    <a href="{{ route('admin.tasks.index') }}" class="btn mt-4">Manage</a>
                </div>

                <div class="card">
                    <h4>Users</h4>
                    <p>View and manage the all registered users.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn mt-4">Manage</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
