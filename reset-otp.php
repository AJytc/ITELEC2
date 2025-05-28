<?php
include_once 'config/settings-configuration.php';
// Check if the reset OTP session variable is set
if (!isset($_SESSION['RESET_OTP'])) {
    echo "<script>alert('No OTP found. Please request a new OTP.'); window.location.href='reset-password.php';</script>";
    exit;
}
// Initialize variables
$showResetForm = false;
$successMessage = '';
// Check if the OTP is submitted
if (isset($_POST['btn-reset-verify'])) {
    $otp = trim($_POST['otp']);
    if ($otp == $_SESSION['RESET_OTP']) {
        // OTP is correct, show the password reset form
        unset($_SESSION['RESET_OTP']); // Clear the OTP from session
        $successMessage = 'OTP verified successfully!'; // Set success message
        $showResetForm = true; // Set the flag to show the reset form
    } else {
        echo "<script>alert('Invalid OTP.'); window.location.href='reset-otp.php';</script>";
        exit;
    }
}
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Your Password</h1>
    
    <?php if ($successMessage): ?>
        <script>
            alert('<?php echo $successMessage; ?>');
        </script>
    <?php endif; ?>
    <?php if (!$showResetForm): ?>
        <!-- OTP Verification Form -->
        <form action="reset-otp.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <div>
                <label for="otp">Enter OTP</label>
                <input type="number" id="otp" name="otp" placeholder="Enter OTP" required>
            </div>
            <button type="submit" name="btn-reset-verify">VERIFY OTP</button>
        </form>
    <?php else: ?>
        <!-- Password Reset Form -->
        <form action="dashboard/admin/authentication/admin-class.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            
            <div>
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new_password" placeholder="Enter new password" required>
            </div>
            
            <div>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm new password" required>
            </div>
            
            <button type="submit" name="btn-reset-password">RESET PASSWORD</button>
        </form>
    <?php endif; ?>
</body>
</html>