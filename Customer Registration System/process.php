```php
<?php

// Function to validate customer name
function validateName($name)
{
    return preg_match(
        "/^[a-zA-Z ]+$/",
        $name
    );
}


// Function to validate phone number
function validatePhone($phone)
{
    return preg_match(
        "/^[0-9]{10}$/",
        $phone
    );
}


// Function to validate pincode
function validatePincode($pincode)
{
    return preg_match(
        "/^[0-9]{6}$/",
        $pincode
    );
}


// Function to format date
function formatDateOfBirth($date)
{
    return date(
        "d-m-Y",
        strtotime($date)
    );
}


// Check whether the form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Collect customer information

    $customerName =
        trim($_POST["customer_name"] ?? "");

    $email =
        trim($_POST["email"] ?? "");

    $phone =
        trim($_POST["phone"] ?? "");

    $dateOfBirth =
        trim($_POST["date_of_birth"] ?? "");

    $gender =
        trim($_POST["gender"] ?? "");

    $city =
        trim($_POST["city"] ?? "");

    $state =
        trim($_POST["state"] ?? "");

    $pincode =
        trim($_POST["pincode"] ?? "");

    $address =
        trim($_POST["address"] ?? "");

    $terms =
        $_POST["terms"] ?? "";


    // Validation

    if (
        empty($customerName) ||
        empty($email) ||
        empty($phone) ||
        empty($dateOfBirth) ||
        empty($gender) ||
        empty($city) ||
        empty($state) ||
        empty($pincode) ||
        empty($address)
    ) {

        $errorMessage =
            "Please fill in all required fields.";

    } elseif (!validateName($customerName)) {

        $errorMessage =
            "Name must contain only letters and spaces.";

    } elseif (
        !filter_var(
            $email,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        $errorMessage =
            "Please enter a valid email address.";

    } elseif (!validatePhone($phone)) {

        $errorMessage =
            "Phone number must contain exactly 10 digits.";

    } elseif (
        strtotime($dateOfBirth) === false ||
        strtotime($dateOfBirth) > time()
    ) {

        $errorMessage =
            "Please enter a valid date of birth.";

    } elseif (!validateName($city)) {

        $errorMessage =
            "City name must contain only letters and spaces.";

    } elseif (!validatePincode($pincode)) {

        $errorMessage =
            "Pincode must contain exactly 6 digits.";

    } elseif (strlen($address) < 10) {

        $errorMessage =
            "Please enter a complete address.";

    } elseif ($terms !== "accepted") {

        $errorMessage =
            "Please accept the confirmation checkbox.";

    } else {

        // Format date

        $formattedDate =
            formatDateOfBirth($dateOfBirth);


        // Generate registration number

        $registrationNumber =
            "CUS" . rand(10000, 99999);


        // Success message

        $successMessage =
            "Registration completed successfully.";

    }

} else {

    $errorMessage =
        "Invalid request. Please submit the registration form.";

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Registration Result</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">


    <!-- Header -->

    <div class="header">

        <h1>Customer Registration System</h1>

        <p>Registration Result</p>

    </div>


    <?php if (isset($errorMessage)): ?>


        <!-- Error Page -->

        <div class="result-box error-box">

            <div class="error-icon">
                !
            </div>

            <h2>Registration Failed</h2>

            <p>
                <?php
                echo htmlspecialchars(
                    $errorMessage
                );
                ?>
            </p>

            <a
                href="index.php"
                class="back-button"
            >
                Go Back
            </a>

        </div>


    <?php else: ?>


        <!-- Success Page -->

        <div class="result-box success-box">


            <div class="success-icon">
                ✓
            </div>


            <h2>
                Registration Successful!
            </h2>


            <p class="success-text">
                <?php
                echo htmlspecialchars(
                    $successMessage
                );
                ?>
            </p>


            <!-- Registration Number -->

            <div class="registration-number">

                <p>
                    Registration Number
                </p>

                <h3>
                    <?php
                    echo htmlspecialchars(
                        $registrationNumber
                    );
                    ?>
                </h3>

            </div>


            <!-- Customer Details -->

            <h3 class="details-title">
                Customer Details
            </h3>


            <div class="customer-details">


                <div class="detail-item">

                    <span>Full Name</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $customerName
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Email</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $email
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Phone Number</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $phone
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Date of Birth</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $formattedDate
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Gender</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $gender
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>City</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $city
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>State</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $state
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Pincode</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $pincode
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item address-item">

                    <span>Address</span>

                    <strong>
                        <?php
                        echo nl2br(
                            htmlspecialchars(
                                $address
                            )
                        );
                        ?>
                    </strong>

                </div>


            </div>


            <div class="success-note">

                <p>
                    Thank you for registering with us.
                    Your customer registration has been
                    completed successfully.
                </p>

            </div>


            <a
                href="index.php"
                class="back-button"
            >
                Register Another Customer
            </a>


        </div>


    <?php endif; ?>


    <!-- Footer -->

    <div class="footer">

        <p>
            CS23C10 - Web Design and Development
        </p>

    </div>

</div>

</body>

</html>
```
