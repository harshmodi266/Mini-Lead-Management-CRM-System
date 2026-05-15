<!DOCTYPE html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f7fb;
        }

        .navbar{
            background:#0d6efd;
        }

        .navbar-brand,
        .nav-link,
        .welcome-text{
            color:white !important;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .login-card{
            margin-top:100px;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="#">
            Mini CRM
        </a>

        @auth

        <div class="d-flex align-items-center gap-3">

            <span class="welcome-text">
                Welcome {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-light btn-sm">
                    Logout
                </button>
            </form>

        </div>

        @endauth

    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>