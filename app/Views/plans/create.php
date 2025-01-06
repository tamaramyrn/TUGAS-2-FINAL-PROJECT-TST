<!DOCTYPE html>
<html>
<head>
    <title>Add Plan - GoBuddy</title>
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
            height: auto;
            line-height: 1.5;
            padding: 0.625rem;
            border: none;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 0.875rem;
            width: 100%;
            box-sizing: border-box;
            resize: none;
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

        .alert {
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        input[type="date"] {
            padding-right: 0.5rem;
        }

        @media (max-width: 640px) {
            .container {
                margin: 1rem auto;
            }

            .form-group {
                margin-bottom: 0.75rem;
            }

            h1 {
                margin-bottom: 1rem;
            }
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
        </a><h1>Add Plan</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('plans/store') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="destination">Destination</label>
                <input 
                    type="text" 
                    id="destination" 
                    name="destination" 
                    value="<?= old('destination') ?>" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input 
                    type="date" 
                    id="start_date" 
                    name="start_date" 
                    value="<?= old('start_date') ?>" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input 
                    type="date" 
                    id="end_date" 
                    name="end_date" 
                    value="<?= old('end_date') ?>" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="activities">Activities</label>
                <textarea 
                    id="activities" 
                    name="activities" 
                    required
                ><?= old('activities') ?></textarea>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>