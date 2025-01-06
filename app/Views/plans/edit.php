<!DOCTYPE html>
<html>
<head>
    <title>Edit Plan - GoBuddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background: #fff;
            color: #333;
            line-height: 1.5;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 0.75rem 5%;
            border-bottom: 1px solid #eee;
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
            max-width: 640px;
            margin: 1.5rem auto;
            padding: 0 1rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #333;
            text-decoration: none;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            margin-left: -0.5rem;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
            color: #333;
            font-size: 0.875rem;
        }

        input, textarea {
            width: 100%;
            padding: 0.625rem;
            border: none;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 0.875rem;
        }

        textarea {
            min-height: 80px;
            resize: vertical;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.625rem;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background: #1557b0;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 1rem;
            text-align: center;
        }

        .back-to-plans {
            color: #1a73e8;
            text-decoration: none;
            font-size: 0.875rem;
            display: block;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <a href="/" class="logo">
        <img src="<?= base_url('assets/images/GoBuddy.png') ?>" alt="GoBuddy Logo" class="logo-img">
        </a>
    </nav>

    <div class="container">
        <a href="<?= base_url('plans') ?>" class="back-link">
            ← Back To Plan
        </a>

        <?php if ($plan['user_id'] !== session()->get('id')): ?>
            <p class="error-message">You are not authorized to edit this plan.</p>
            <a href="<?= base_url('plans') ?>" class="back-to-plans">Go back to your plans</a>
        <?php else: ?>
            <h1>Edit Plan</h1>

            <form action="<?= base_url('plans/update/' . $plan['id']) ?>" method="post">
                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input 
                        type="text" 
                        id="destination" 
                        name="destination" 
                        value="<?= esc($plan['destination']) ?>" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        name="start_date" 
                        value="<?= esc($plan['start_date']) ?>" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input 
                        type="date" 
                        id="end_date" 
                        name="end_date" 
                        value="<?= esc($plan['end_date']) ?>" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="activities">Activities</label>
                    <textarea 
                        id="activities" 
                        name="activities" 
                        required
                    ><?= esc($plan['activities']) ?></textarea>
                </div>

                <button type="submit" class="btn">Submit</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>