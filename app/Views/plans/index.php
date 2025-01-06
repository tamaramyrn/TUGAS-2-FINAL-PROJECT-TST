<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoBuddy - Your Travel Plans</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #ffffff;
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

        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .log-out {
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            border-radius: 4px;
            text-align: center;
            min-width: 120px;
            background: #1a73e8;
            color: white;
            border: 1px solid #1a73e8;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
        }

        .log-out:hover {
            background: #1557b0;
            color: white;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline {
            border: 1px solid #007bff;
            color: #007bff;
        }

        .btn-outline:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-header h1, 
        .section-header h2 {
            font-size: 1.5rem;
            color: #333;
            font-weight: 600;
        }

        .create-plan {
            background: #1a73e8;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 0.875rem;
        }

        .create-plan:hover {
            background: #1557b0;
        }

        .plan-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .plan-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .detail-group {
            margin-bottom: 1rem;
        }

        .detail-group h3 {
            color: #666;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }

        .detail-group p {
            font-size: 0.875rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .detail-group p:last-child {
            margin-bottom: 0;
        }

        .activities-list {
            list-style: none;
            padding-left: 0;
            margin-top: 0.25rem;
        }

        .activities-list li {
            font-size: 0.875rem;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .activities-list li:last-child {
            margin-bottom: 0;
        }

        .shared-users {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .shared-users div {
            font-size: 0.875rem;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .shared-users div:last-child {
            margin-bottom: 0;
        }

        .shared-user-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.25rem 0;
        }

        .shared-user-item:not(:last-child) {
            border-bottom: 1px solid #eee;
        }

        .btn-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-remove:hover {
            background: #fee2e2;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.875rem;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #1a73e8;
            color: white;
        }

        .btn-edit:hover {
            background: #1557b0;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .btn-add {
            background: #1a73e8;
            color: white;
        }

        .btn-add:hover {
            background: #1557b0;
        }

        .add-user-form {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .add-user-form input {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            flex: 1;
            font-size: 0.875rem;
        }

        .add-user-form input:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px rgba(26,115,232,0.2);
        }

        .shared-user-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.25rem 0;
        }

        .shared-user-item:not(:last-child) {
            border-bottom: 1px solid #eee;
        }

        .btn-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-remove:hover {
            background: #fee2e2;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1001;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal h3 {
            margin-bottom: 1rem;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background: #5a6268;
        }

        footer {
            text-align: center;
            padding: 2rem;
            background: white;
            color: #666;
            border-top: 1px solid #ddd;
            margin-top: 2rem;
        }

        footer p {
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        footer p:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .plan-details {
                grid-template-columns: 1fr;
            }

            .nav-links {
                gap: 1rem;
            }

            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .create-plan {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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
        <div class="user-section">
            <span>Welcome, <?= session()->get('name') ?>!</span>
            <a href="<?= base_url('logout') ?>" class="log-out">Log Out</a>
        </div>
    </nav>

        <div class="container">
        <!-- My Trips Section -->
        <div class="section-header">
            <h1>My trips</h1>
            <a href="<?= base_url('plans/create') ?>" class="create-plan">Create New Plan</a>
        </div>

        <?php foreach ($yourPlans as $plan): ?>
        <div class="plan-card">
            <div class="plan-details">
                <div class="detail-group">
                    <h3>Destination</h3>
                    <p><?= esc($plan['destination']) ?></p>
                    <h3>Start Date</h3>
                    <p><?= esc($plan['start_date']) ?></p>
                    <h3>End Date</h3>
                    <p><?= esc($plan['end_date']) ?></p>
                </div>
                
                <div class="detail-group">
                    <h3>Activities</h3>
                    <ul class="activities-list">
                        <?php 
                        $activities = explode(',', $plan['activities']);
                        foreach ($activities as $activity): 
                        ?>
                            <li><?= trim(esc($activity)) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="detail-group">
                    <h3>Shared Users</h3>
                    <div class="shared-users">
                        <?php if (!empty($plan['shared_users'])): ?>
                            <?php foreach ($plan['shared_users'] as $email): ?>
                                <div class="shared-user-item">
                                    <span><?= esc($email) ?></span>
                                    <a 
                                        href="#" 
                                        class="btn-remove"
                                        onclick="showModal('Are you sure you want to remove this user?', '<?= base_url('plans/remove-user/' . $plan['id'] . '/' . urlencode($email)) ?>')"
                                    >
                                        Remove
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No users added yet.</p>
                        <?php endif; ?>
                        
                        <form class="add-user-form" method="post" action="<?= base_url('plans/add-user/' . $plan['id']) ?>">
                            <input type="email" name="email" placeholder="Enter email address" required>
                            <button type="submit" class="btn btn-add">Add User</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="<?= base_url('plans/edit/' . $plan['id']) ?>" class="btn btn-edit">Edit</a>
                <button class="btn btn-delete" onclick="showModal('Are you sure you want to delete this plan?', '<?= base_url('plans/delete/' . $plan['id']) ?>')">Delete</button>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Shared Plans Section -->
        <div class="section-header">
            <h2>Shared Plans to Me</h2>
        </div>

        <?php foreach ($plansSharedToYou as $plan): ?>
        <div class="plan-card">
            <div class="plan-details">
                <div class="detail-group">
                    <h3>Destination</h3>
                    <p><?= esc($plan['destination']) ?></p>
                    <h3>Start Date</h3>
                    <p><?= esc($plan['start_date']) ?></p>
                    <h3>End Date</h3>
                    <p><?= esc($plan['end_date']) ?></p>
                </div>
                
                <div class="detail-group">
                    <h3>Activities</h3>
                    <ul class="activities-list">
                        <?php 
                        $activities = explode(',', $plan['activities']);
                        foreach ($activities as $activity): 
                        ?>
                            <li><?= trim(esc($activity)) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="detail-group">
                    <h3>Shared Users</h3>
                    <div class="shared-users">
                        <?php if (!empty($plan['shared_users'])): ?>
                            <?php foreach ($plan['shared_users'] as $email): ?>
                                <div class="shared-user-item">
                                    <span><?= esc($email) ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No users added yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal -->
    <div class="modal" id="confirmationModal">
        <div class="modal-content">
            <h3 id="modalMessage">Are you sure?</h3>
            <div class="modal-buttons">
                <button class="btn btn-cancel" onclick="closeModal()">Cancel</button>
                <a href="#" id="modalConfirmButton" class="btn btn-delete">Delete</a>
            </div>
        </div>
    </div>

    <script>
        function showModal(message, confirmUrl) {
            document.getElementById('modalMessage').innerText = message;
            document.getElementById('modalConfirmButton').setAttribute('href', confirmUrl);
            document.getElementById('confirmationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }
    </script>

    <footer>
        <p>Explore the world with GoBuddy</p>
        <p>&copy; 2024 GoBuddy.com</p>
    </footer>
</body>
</html>