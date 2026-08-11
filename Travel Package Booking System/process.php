<?php

// Function to clean user input
function cleanInput($input)
{
    return htmlspecialchars(trim($input));
}

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Get form values
$customerName = cleanInput($_POST["customer_name"] ?? "");
$email = cleanInput($_POST["email"] ?? "");
$phone = cleanInput($_POST["phone"] ?? "");
$package = cleanInput($_POST["package"] ?? "");
$persons = $_POST["persons"] ?? "";
$travelDate = cleanInput($_POST["travel_date"] ?? "");

// Travel package prices
$packagePrices = [
    "Goa" => 15000,
    "Manali" => 18000,
    "Ooty" => 10000,
    "Kerala" => 20000
];

$errors = [];

// Validate customer name
if (empty($customerName)) {
    $errors[] = "Customer name is required.";
} elseif (strlen($customerName) < 3) {
    $errors[] = "Customer name must contain at least 3 characters.";
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

// Validate package
if (empty($package)) {
    $errors[] = "Please select a travel package.";
} elseif (!array_key_exists($package, $packagePrices)) {
    $errors[] = "Invalid travel package selected.";
}

// Validate number of persons
if (empty($persons)) {
    $errors[] = "Number of persons is required.";
} elseif (!filter_var($persons, FILTER_VALIDATE_INT, [
    "options" => ["min_range" => 1, "max_range" => 20]
])) {
    $errors[] = "Number of persons must be between 1 and 20.";
}

// Validate travel date
if (empty($travelDate)) {
    $errors[] = "Travel date is required.";
} elseif ($travelDate < date("Y-m-d")) {
    $errors[] = "Travel date cannot be in the past.";
}

// Display errors if validation fails
if (!empty($errors)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Error</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="error-card">

        <h2>Booking Failed</h2>

        <div class="error-message">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <a href="index.php" class="back-button">Go Back</a>

    </div>

</div>

</body>
</html>

<?php
    exit();
}

// Calculate booking amount
$pricePerPerson = $packagePrices[$package];
$totalAmount = $pricePerPerson * (int)$persons;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="confirmation-card">

        <div class="success-icon">✓</div>

        <h1>Booking Confirmed!</h1>

        <p class="success-text">
            Your travel package has been successfully booked.
        </p>

        <div class="booking-details">

            <h2>Booking Details</h2>

            <div class="detail-row">
                <span>Customer Name</span>
                <strong><?php echo $customerName; ?></strong>
            </div>

            <div class="detail-row">
                <span>Email</span>
                <strong><?php echo $email; ?></strong>
            </div>

            <div class="detail-row">
                <span>Phone Number</span>
                <strong><?php echo $phone; ?></strong>
            </div>

            <div class="detail-row">
                <span>Travel Package</span>
                <strong><?php echo $package; ?></strong>
            </div>

            <div class="detail-row">
                <span>Number of Persons</span>
                <strong><?php echo $persons; ?></strong>
            </div>

            <div class="detail-row">
                <span>Travel Date</span>
                <strong><?php echo date("d-m-Y", strtotime($travelDate)); ?></strong>
            </div>

            <div class="detail-row">
                <span>Price Per Person</span>
                <strong>₹<?php echo number_format($pricePerPerson); ?></strong>
            </div>

            <div class="total-row">
                <span>Total Amount</span>
                <strong>₹<?php echo number_format($totalAmount); ?></strong>
            </div>

        </div>

        <a href="index.php" class="back-button">
            Book Another Package
        </a>

    </div>

</div>

</body>
</html>