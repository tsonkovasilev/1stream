<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .login-wrapper {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .login-wrapper h2 {
            margin-bottom: 20px;
        }

        .login-wrapper form {
            text-align: left;
        }

        .login-wrapper input[type="text"],
        .login-wrapper input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-wrapper button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            background-color: #2d89ef;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .login-wrapper button:hover {
            background-color: #1b5fbf;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <img src="https://assets.jobs.bg/assets/logo/2022-08-28/b_a11032cac6b606ddccf9e59c6688c506.png" alt="Logo" class="logo">

        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <label for="name">Username</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
