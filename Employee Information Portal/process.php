```php
<?php

// Function to validate employee name
function validateEmployeeName($name)
{
    return preg_match("/^[a-zA-Z ]+$/", $name);
}


// Function to validate phone number
function validatePhoneNumber($phone)
{
    return preg_match("/^[0-9]{10}$/", $phone);
}


// Function to validate employee ID
function validateEmployeeId($employeeId)
{
    return preg_match("/^[A-Za-z0-9]+$/", $employeeId);
}


// Function to format the date
function formatJoiningDate($date)
{
    return date("d-m-Y", strtotime($date));
}


// Check whether form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values

    $employeeName = trim($_POST["employee_name"] ?? "");
    $employeeId = trim($_POST["employee_id"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $department = trim($_POST["department"] ?? "");
    $designation = trim($_POST["designation"] ?? "");
    $joiningDate = trim($_POST["joining_date"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $address = trim($_POST["address"] ?? "");


    // Validation

    if (
        empty($employeeName) ||
        empty($employeeId) ||
        empty($email) ||
        empty($phone) ||
        empty($department) ||
        empty($designation) ||
        empty($joiningDate) ||
        empty($gender) ||
        empty($address)
    ) {

        $errorMessage = "Please fill in all required fields.";

    } elseif (!validateEmployeeName($employeeName)) {

        $errorMessage =
            "Employee name must contain only letters and spaces.";

    } elseif (!validateEmployeeId($employeeId)) {

        $errorMessage =
            "Employee ID can contain only letters and numbers.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errorMessage =
            "Please enter a valid email address.";

    } elseif (!validatePhoneNumber($phone)) {

        $errorMessage =
            "Phone number must contain exactly 10 digits.";

    } elseif (strlen($designation) < 2) {

        $errorMessage =
            "Please enter a valid designation.";

    } elseif (strtotime($joiningDate) > time()) {

        $errorMessage =
            "Joining date cannot be a future date.";

    } elseif (strlen($address) < 5) {

        $errorMessage =
            "Please enter a valid address.";

    } else {

        // Format joining date
        $formattedDate = formatJoiningDate($joiningDate);

        $successMessage =
            "Employee profile created successfully.";

    }

} else {

    $errorMessage =
        "Invalid request. Please submit the employee form.";

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

    <title>Employee Profile</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Employee Information Portal</h1>

        <p>Employee Profile</p>

    </div>


    <?php if (isset($errorMessage)): ?>

        <!-- Error Message -->

        <div class="result-box error-box">

            <h2>Error</h2>

            <p>
                <?php
                echo htmlspecialchars($errorMessage);
                ?>
            </p>

            <a href="index.php" class="back-button">
                Go Back
            </a>

        </div>


    <?php else: ?>

        <!-- Success Message -->

        <div class="success-message">

            <?php
            echo htmlspecialchars($successMessage);
            ?>

        </div>


        <!-- Employee Profile -->

        <div class="profile-box">

            <div class="profile-heading">

                <div class="profile-icon">
                    <?php
                    echo strtoupper(
                        substr($employeeName, 0, 1)
                    );
                    ?>
                </div>

                <div>
                    <h2>
                        <?php
                        echo htmlspecialchars($employeeName);
                        ?>
                    </h2>

                    <p>
                        <?php
                        echo htmlspecialchars($designation);
                        ?>
                    </p>
                </div>

            </div>


            <div class="profile-details">

                <div class="detail-item">

                    <span>Employee ID</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($employeeId);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Email</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($email);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Phone Number</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($phone);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Department</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($department);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Designation</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($designation);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Date of Joining</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($formattedDate);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Gender</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($gender);
                        ?>
                    </strong>

                </div>


                <div class="detail-item address-item">

                    <span>Address</span>

                    <strong>
                        <?php
                        echo nl2br(
                            htmlspecialchars($address)
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <a href="index.php" class="back-button">
                Add Another Employee
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
