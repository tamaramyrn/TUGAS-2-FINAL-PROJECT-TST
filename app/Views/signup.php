<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GoBuddy</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 0.75rem 6rem;
            background-color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
            color: #1a73e8;
        }

        .logo-img {
            width: 80px;
            height: auto;
        }

        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .register-form {
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        h1 {
            font-size: 1.75rem;
            color: #333;
            margin-bottom: 1rem;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        label {
            font-size: 0.9rem;
            color: #333;
        }

        input {
            padding: 0.6rem;
            border: none;
            border-radius: 4px;
            background-color: #f1f3f5;
            font-size: 0.9rem;
        }

        input:focus {
            outline: 2px solid #007bff;
            background-color: #fff;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 0.6rem;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 0.5rem;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .signin-link {
            text-align: center;
            margin-top: 0.75rem;
            color: #666;
            font-size: 0.9rem;
        }

        .signin-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signin-link a:hover {
            text-decoration: underline;
        }

        .error {
            color: #dc3545;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <a href="<?= base_url('/') ?>" class="logo">
            <img src="assets/images/GoBuddy.png" alt="GoBuddy Logo" class="logo-img">
        </a>
    </nav>

    <div class="container">
        <form action="<?= base_url('/signup/store') ?>" method="post" class="register-form">
            <h1>Register</h1>
            
            <?= csrf_field() ?>
            
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="error">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="<?= old('name') ?>" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="<?= old('email') ?>" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input 
                    type="password" 
                    id="confirmpassword" 
                    name="confirmpassword" 
                    required
                >
            </div>

            <button type="submit" class="submit-btn">Sign Up</button>

            <div class="signin-link">
                Already have an account? <a href="<?= base_url('signin') ?>">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>