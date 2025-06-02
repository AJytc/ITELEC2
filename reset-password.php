<?php
    include_once 'config/settings-configuration.php';

    if(isset($_SESSION['adminSession'])){
        header("Location: dashboard/admin/");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .form-section {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .form-title {
            text-align: center;
            margin-bottom: 1.25rem;
            color: #212529;
            font-weight: 500;
            font-size: 1.5rem;
        }

        .btn-submit {
            background-color: #0d6efd;
            color: white;
            width: 100%;
            padding: 0.5rem 0;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .form-links {
            font-size: 0.95rem;
        }

        @media (max-width: 575.98px) {
            .form-section {
                padding: 1rem;
            }

            .form-title {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .btn-submit {
                padding: 0.4rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4 py-sm-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-5">
                <div class="form-section">
                    <h2 class="form-title">Reset Password</h2>

                    <form action="dashboard/admin/authentication/admin-class.php" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        <input type="hidden" name="token" value="<?php echo $_GET['token'] ?? ''; ?>">

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Enter your new password" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_new_password" placeholder="Confirm your new password" required>
                        </div>

                        <button type="submit" class="btn btn-submit" name="btn-reset-password">
                            Reset Password
                        </button>
                    </form>

                    <div class="text-center mt-3 form-links">
                        Remember your password? <a href="index.php" class="text-decoration-none">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
