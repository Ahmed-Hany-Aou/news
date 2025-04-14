<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Login</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container form div {
            margin-bottom: 15px;
        }
        .login-container form button {
            margin-top: 10px;
        }
        .social-buttons {
            display: flex;
            justify-content: space-between;
        }
        .social-buttons button {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Logind</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="social-buttons">
            <button>Facebookkkkkkkkkkkkkkkkkk</button>
            <button>Google Plusssssssssssssssssssssss</button>
        </div>
    </div>
</body>
</html>
