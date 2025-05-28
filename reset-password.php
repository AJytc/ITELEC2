<?php
include_once 'config/settings-configuration.php';
    
// Check if token is present (for reset form)
$showResetForm = isset($_GET['token']) && !empty($_GET['token']);
$token = $showResetForm ? $_GET['token'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $showResetForm ? 'Reset Password' : 'Forgot Password'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
       
        .container {
            padding: 1rem;
        }
       
        .form-section {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
       
        .form-title {
            margin-bottom: 1.25rem;
            color: #212529;
            font-weight: 500;
            text-align: center;
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
        
        .form-text {
            margin-bottom: 1.5rem;
            text-align: center;
            color: #6c757d;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
        }
       
        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .form-section {
                padding: 1.25rem;
            }
           
            .form-title {
                font-size: 1.25rem;
            }
        }
       
        @media (max-width: 575.98px) {
            .container {
                padding: 0.75rem;
            }
           
            .form-section {
                padding: 1rem;
                margin-bottom: 1rem;
            }
           
            .form-title {
                font-size: 1.2rem;
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
                    <?php if ($showResetForm): ?>
                        <!-- Reset Password Form (when token is provided) -->
                        <h2 class="form-title">RESET PASSWORD</h2>
                        <p class="form-text">Enter your new password below.</p>
                        
                        <form action="dashboard/admin/authentication/admin-class.php" method="POST">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            <input type="hidden" name="reset_token" value="<?php echo htmlspecialchars($token); ?>">
                            
                            <div class="mb-3">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new-password" name="new_password" placeholder="Enter new password" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm new password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-submit" name="btn-reset-password">RESET PASSWORD</button>
                        </form>
                    <?php else: ?>
                        <!-- Forgot Password Form (request reset link) -->
                        <h2 class="form-title">FORGOT PASSWORD</h2>
                        <p class="form-text">Enter your email address and we'll send you a link to reset your password.</p>
                        
                        <form action="dashboard/admin/authentication/admin-class.php" method="POST">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            
                            <div class="mb-3">
                                <label for="reset-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="reset-email" name="reset_email" placeholder="Enter your email" required>
                            </div>
                            
                            <button type="submit" class="btn btn-submit" name="btn-forgot-password">SEND RESET LINK</button>
                        </form>
                    <?php endif; ?>
                    
                    <a href="index.php" class="back-link">Back to Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>