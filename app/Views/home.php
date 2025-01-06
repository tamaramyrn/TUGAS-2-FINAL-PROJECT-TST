<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoBuddy - Travel Planner</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #333;
            line-height: 1.6;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
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


        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #666;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #1a73e8;
        }

        .user-section, .auth-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .log-out, .btn-outline, .btn-primary {
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            border-radius: 4px;
            text-align: center;
            min-width: 120px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
        }

        .log-out {
            background: #1a73e8;
            color: white;
            border: 1px solid #1a73e8;
        }

        .log-out:hover {
            background: #1557b0;
            color: white;
        }

        .btn-outline {
            border: 1px solid #007bff;
            color: #007bff;
            background: none;
        }

        .btn-outline:hover {
            background: #007bff;
            color: white;
        }

        .btn-primary {
            background: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            padding: 8rem 6rem 4rem;
            align-items: center;
            min-height: 100vh;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: #333;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: #666;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
        }

        .why-choose-us {
            padding: 4rem 6rem;
            background-color: #f8f9fa;
            text-align: center;
        }

        .why-choose-us h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .why-choose-us p {
            color: #666;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .why-choose-us-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 6rem;
        background-color: #f8f9fa;
    }

    .why-choose-us-image img {
        width: 100%;
        height: auto;
        max-width: 400px;
    }

    .why-choose-us-content {
        text-align: left;
    }

    .features {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    align-items: center;
}

.feature {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 150px;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.feature img {
    width: 50px;
    height: 50px;
    margin-bottom: 0.5rem;
}

.feature h3 {
    margin: 0;
    font-size: 1rem;
    font-weight: bold;
    color: #333;
}

    @media (max-width: 768px) {
        .why-choose-us-container {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .why-choose-us-image img {
            margin: 0 auto;
        }

        .features {
            align-items: center;
        }
    }

        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .feature img {
            width: 40px;
            height: 40px;
        }

        .plan-vacation {
            padding: 4rem 6rem;
            text-align: center;
        }

        .plan-vacation h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .plan-vacation p {
            color: #666;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .map-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .map-container img {
            width: 100%;
            height: auto;
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: #666;
            background-color: #f8f9fa;
        }

        @media (max-width: 1024px) {
            .navbar {
                padding: 1rem 2rem;
            }

            .hero, .why-choose-us, .plan-vacation {
                padding: 4rem 2rem;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <a href="<?= base_url('/') ?>" class="logo">
            <img src="assets/images/GoBuddy.png" alt="GoBuddy Logo" class="logo-img">
        </a>
        <div class="nav-links">
            <a href="<?= base_url('/') ?>">Home</a>
            <a href="<?= base_url('plans') ?>">Plan</a>
            <a href="<?= base_url('recommendation') ?>">Recommendation</a>
            <a href="<?= base_url('about') ?>" >About</a>
        </div>
        <?php if ($isLoggedIn): ?>
            <div class="user-section">
                <span>Welcome, <?= esc($userName) ?>!</span>
                <a href="<?= base_url('logout') ?>" class="log-out">Log Out</a>
            </div>
        <?php else: ?>
            <div class="auth-buttons">
                <a href="<?= base_url('signup') ?>" class="btn btn-outline">Register</a>
                <a href="<?= base_url('signin') ?>" class="btn btn-primary">Sign in</a>
            </div>
        <?php endif; ?>
    </nav>


    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Plan your journey with us, explore the world!</h1>
                <p>Plan and book your perfect trip with us!</p>
            </div>

            <div class="hero-image">
                <img src="<?= base_url('assets/images/home1.png') ?>" alt="Travel Planning">
            </div>
        </section>

        <section class="why-choose-us">
        <div class="why-choose-us-container">
            <!-- Gambar di sebelah kiri -->
            <div class="why-choose-us-image">
                <img src="<?= base_url('assets/images/home2.png') ?>" alt="Why Choose Us Image">
            </div>

            <div class="why-choose-us-content">
                <h2>Why Choose Us</h2>
                <p>Enjoy great recommendation from us to make your planning easier</p>
                
                <div class="features">
                    <div class="feature">
                        <img src="<?= base_url('assets/images/home3.png') ?>" alt="Flight Ticket">
                        <h3>Flight Ticket</h3>
                    </div>
                    <div class="feature">
                        <img src="<?= base_url('assets/images/home4.png') ?>" alt="Accommodation">
                        <h3>Accommodation</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="plan-vacation">
            <h2>Plan Your Vacation!</h2>
            <p>For many people organizing a trip is a headache. Register to be able to jointly determine vacation destinations and dates</p>
            
            <div class="map-container">
                <img src="<?= base_url('assets/images/home5.png') ?>" alt="Travel Map">
            </div>
        </section>

        <footer>
            <p>Explore the world with GoBuddy</p>
            <p>&copy; 2024 GoBuddy.com</p>
        </footer>
    </main>
</body>
</html>