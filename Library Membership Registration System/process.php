<?php

// Function to clean user input
function cleanInput($input)
{
    return htmlspecialchars(trim($input));
}

// Check whether the form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Get submitted values
$memberName = cleanInput($_POST["member_name"] ?? "");
$email = cleanInput($_POST["email"] ?? "");
$phone = cleanInput($_POST["phone"] ?? "");
$dateOfBirth = cleanInput($_POST["date_of_birth"] ?? "");
$address = cleanInput($_POST["address"] ?? "");
$membershipType = cleanInput($_POST["membership_type"] ?? "");

$errors = [];

// Validate member name
if (empty($memberName)) {
    $errors[] = "Full name is required.";
} elseif (strlen($memberName) < 3) {
    $errors[] = "Full name must contain at least 3 characters.";
}

// Validate email
if (empty($email)) {
    $errors[] = "Email address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

// Validate phone number
if (empty($phone)) {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Phone number must contain exactly 10 digits.";
}

// Validate date of birth
if (empty($dateOfBirth)) {
    $errors[] = "Date of birth is required.";
} elseif ($dateOfBirth >= date("Y-m-d")) {
    $errors[] = "Please enter a valid date of birth.";
}

// Validate address
if (empty($address)) {
    $errors[] = "Address is required.";
} elseif (strlen($address) < 10) {
    $errors[] = "Address must contain at least 10 characters.";
}

// Validate membership type
$validMembershipTypes = [
    "Student",
    "General",
    "Premium"
];

if (empty($membershipType)) {
    $errors[] = "Please select a membership type.";
} elseif (!in_array($membershipType, $validMembershipTypes)) {
    $errors[] = "Invalid membership type selected.";
}

// Display validation errors
if (!empty($errors)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Error</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="error-card">

        <h2>Registration Failed</h2>

        <div class="error-message">

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>

        </div>

        <a href="index.php" class="back-button">
            Go Back
        </a>

    </div>

</div>

</body>
</html>

<?php
    exit();
}

// Generate membership ID
$membershipId = "LIB" . date("Y") . rand(1000, 9999);

// Generate registration date
$registrationDate = date("d-m-Y");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="confirmation-card">

        <div class="success-icon">✓</div>

        <h1>Registration Successful!</h1>

        <p class="success-text">
            Welcome to our library. Your membership has been successfully created.
        </p>

        <div class="membership-details">

            <h2>Membership Information</h2>

            <div class="detail-row">
                <span>Membership ID</span>
                <strong><?php echo $membershipId; ?></strong>
            </div>

            <div class="detail-row">
                <span>Member Name</span>
                <strong><?php echo $memberName; ?></strong>
            </div>

            <div class="detail-row">
                <span>Email Address</span>
                <strong><?php echo $email; ?></strong>
            </div>

            <div class="detail-row">
                <span>Phone Number</span>
                <strong><?php echo $phone; ?></strong>
            </div>

            <div class="detail-row">
                <span>Date of Birth</span>
                <strong>
                    <?php echo date("d-m-Y", strtotime($dateOfBirth)); ?>
                </strong>
            </div>

            <div class="detail-row">
                <span>Address</span>
                <strong><?php echo $address; ?></strong>
            </div>

            <div class="detail-row">
                <span>Membership Type</span>
                <strong><?php echo $membershipType; ?></strong>
            </div>

            <div class="detail-row">
                <span>Registration Date</span>
                <strong><?php echo $registrationDate; ?></strong>
            </div>

        </div>

        <a href="index.php" class="back-button">
            Register Another Member
        </a>

    </div>

</div>

</body>
</html>