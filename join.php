<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajr-database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST['fname'] ?? '');
    $lname = trim($_POST['lname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $dob = $_POST['dob'] ?? '';
    $province = $_POST['province'] ?? '';
    $district = $_POST['district'] ?? '';


    // Phone validation (Sri Lanka 07xxxxxxxx)
    if (!preg_match("/^07[0-9]{8}$/", $phone)) {
        $error_message = "Enter valid 10-digit phone number starting with 07";
    } elseif (empty($fname) || empty($lname) || empty($email)) {
        $error_message = "Please fill required fields";
    } else {
        $full_name = $fname . ' ' . $lname;

        $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, dob, province, district) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $phone, $dob, $province, $district);

        if ($stmt->execute()) {
            $success_message = "Registration successful! Welcome to AJR Foundations.";
            // Optional: Clear form by not preserving values
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Join Us - AJR Foundations</title>
    <link rel="stylesheet" href="styles.css">    
</head>
<body>
    <!-- Menu Bar -->
    <div class="navbar">
        <a href="index.html">Home</a>
        <a href="services.html">Services</a>
        <a href="gallery.html">Gallery</a>
        <a href="join.php" class="active">Join Us</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact us</a>
    </div>
    
    <!-- Main Content -->
    <div class="Main">
        <center><h1>Welcome to AJR Foundations</h1></center>
    </div>

    <div class="form-container">
        <?php if ($success_message): ?>
            <p style="color: green; text-align: center;"><?php echo htmlspecialchars($success_message); ?></p>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <h2>Registration Form</h2>

            <div class="form-group">
                <label for="fname">First Name <span class="required">*</span></label>
                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>" placeholder="John" required>
            </div>

            <div class="form-group">
                <label for="lname">Last Name <span class="required">*</span></label>
                <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>" placeholder="David" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" placeholder="you@example.com" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone <span class="required">*</span></label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" placeholder="07X XXX XXXX" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($_POST['dob'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <select id="province" name="province">
                    <option value="">Choose Province</option>
                    <option value="Central" <?php echo ($_POST['province'] ?? '') == 'Central' ? 'selected' : ''; ?>>Central</option>
                    <option value="Eastern" <?php echo ($_POST['province'] ?? '') == 'Eastern' ? 'selected' : ''; ?>>Eastern</option>
                    <option value="Northern" <?php echo ($_POST['province'] ?? '') == 'Northern' ? 'selected' : ''; ?>>Northern</option>
                    <option value="North Central" <?php echo ($_POST['province'] ?? '') == 'North Central' ? 'selected' : ''; ?>>North Central</option>
                    <option value="North Western" <?php echo ($_POST['province'] ?? '') == 'North Western' ? 'selected' : ''; ?>>North Western</option>
                    <option value="Sabaragamuwa" <?php echo ($_POST['province'] ?? '') == 'Sabaragamuwa' ? 'selected' : ''; ?>>Sabaragamuwa</option>
                    <option value="Southern" <?php echo ($_POST['province'] ?? '') == 'Southern' ? 'selected' : ''; ?>>Southern</option>
                    <option value="Western" <?php echo ($_POST['province'] ?? '') == 'Western' ? 'selected' : ''; ?>>Western</option>
                    <option value="Uva" <?php echo ($_POST['province'] ?? '') == 'Uva' ? 'selected' : ''; ?>>Uva</option>
                </select>
            </div>

            <div class="button-group">
                <button type="reset" class="reset-btn">Reset</button>
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>
    </div>
    
    <!-- Footer -->
    <footer>
        © 2026 AJR Foundations | All Rights Reserved
    </footer>
</body>
</html>
