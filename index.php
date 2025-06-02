<?php
    include_once 'config/settings-configuration.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Access</title>
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
        
        .forgot-password {
            display: block;
            text-align: right;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
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
        <div class="row justify-content-center gy-4">
            <!-- Sign In Form -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-5">
                <div class="form-section">
                    <h2 class="form-title">SIGN IN</h2>
                    <form action="dashboard/admin/authentication/admin-class.php" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                       
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        
                        <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                       
                        <button type="submit" class="btn btn-submit" name="btn-signin">SIGN IN</button>
                    </form>
                </div>
            </div>
           
            <!-- Registration Form -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-5">
                <div class="form-section">
                    <h2 class="form-title">REGISTRATION</h2>
                    <form action="dashboard/admin/authentication/admin-class.php" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                       
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="reg-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="reg-email" name="email" placeholder="Enter your email" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="reg-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="reg-password" name="password" placeholder="Create a password" required>
                        </div>
                       
                        <button type="submit" class="btn btn-submit" name="btn-signup">SIGN UP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>