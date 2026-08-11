<?php

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Get submitted form data
$studentName = trim($_POST["student_name"] ?? "");
$registerNumber = trim($_POST["register_number"] ?? "");
$department = trim($_POST["department"] ?? "");
$year = trim($_POST["year"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");

// Store validation errors
$errors = [];

// Validate Student Name
if (empty($studentName)) {
    $errors[] = "Student name is required.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $studentName)) {
    $errors[] = "Student name should contain only letters and spaces.";
}

// Validate Register Number
if (empty($registerNumber)) {
    $errors[] = "Register number is required.";
}

// Validate Department
if (empty($department)) {
    $errors[] = "Please select a department.";
}

// Validate Year
if (empty($year)) {
    $errors[] = "Please select your year.";
}

// Validate Email
if (empty($email)) {
    $errors[] = "Email address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

// Validate Phone Number
if (empty($phone)) {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Phone number must contain exactly 10 digits.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Details Result</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="result-box">

        <?php if (!empty($errors)): ?>

            <!-- Error Message -->
            <div class="error-message">
                <h2>⚠ Submission Error</h2>
                <p>Please correct the following errors:</p>

                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li>
                            <?php echo htmlspecialchars($error); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <a href="index.php" class="back-button">
                ← Go Back to Form
            </a>

        <?php else: ?>

            <!-- Success Message -->
            <div class="success-message">
                <h2>✓ Details Submitted Successfully!</h2>
                <p>The student details were received using the POST method.</p>
            </div>

            <h1>Student Details</h1>

            <div class="details-table">

                <div class="detail-row">
                    <div class="detail-label">Student Name</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($studentName); ?>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Register Number</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($registerNumber); ?>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Department</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($department); ?>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Year</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($year); ?>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($email); ?>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Phone Number</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($phone); ?>
                    </div>
                </div>

            </div>

            <a href="index.php" class="back-button">
                ← Enter New Details
            </a>

        <?php endif; ?>

    </div>

</div>

</body>
</html>