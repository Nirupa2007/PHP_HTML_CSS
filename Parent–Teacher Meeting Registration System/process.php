```php
<?php

// Function to validate names
function validateName($name)
{
    return preg_match(
        "/^[a-zA-Z .]+$/",
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


// Function to format date
function formatMeetingDate($date)
{
    return date(
        "d-m-Y",
        strtotime($date)
    );
}


// Function to generate appointment ID
function generateAppointmentId()
{
    return "PTM" . rand(10000, 99999);
}


// Check form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Collect form data

    $parentName =
        trim($_POST["parent_name"] ?? "");

    $studentName =
        trim($_POST["student_name"] ?? "");

    $registerNumber =
        trim($_POST["register_number"] ?? "");

    $email =
        trim($_POST["email"] ?? "");

    $phone =
        trim($_POST["phone"] ?? "");

    $meetingDate =
        trim($_POST["meeting_date"] ?? "");

    $teacher =
        trim($_POST["teacher"] ?? "");

    $meetingSlot =
        trim($_POST["meeting_slot"] ?? "");

    $purpose =
        trim($_POST["purpose"] ?? "");

    $message =
        trim($_POST["message"] ?? "");

    $confirmation =
        $_POST["confirmation"] ?? "";


    // Validation

    if (
        empty($parentName) ||
        empty($studentName) ||
        empty($registerNumber) ||
        empty($email) ||
        empty($phone) ||
        empty($meetingDate) ||
        empty($teacher) ||
        empty($meetingSlot) ||
        empty($purpose)
    ) {

        $errorMessage =
            "Please fill in all required fields.";

    } elseif (!validateName($parentName)) {

        $errorMessage =
            "Parent name contains invalid characters.";

    } elseif (!validateName($studentName)) {

        $errorMessage =
            "Student name contains invalid characters.";

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
        strtotime($meetingDate) === false
    ) {

        $errorMessage =
            "Please select a valid meeting date.";

    } elseif (
        strtotime($meetingDate) < strtotime(date("Y-m-d"))
    ) {

        $errorMessage =
            "Meeting date cannot be in the past.";

    } elseif ($confirmation !== "confirmed") {

        $errorMessage =
            "Please confirm the appointment details.";

    } else {


        // Format date

        $formattedMeetingDate =
            formatMeetingDate($meetingDate);


        // Generate appointment ID

        $appointmentId =
            generateAppointmentId();


        // Success message

        $successMessage =
            "Your parent-teacher meeting has been booked successfully.";

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

    <title>Appointment Confirmation</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>

<body>

<div class="container">


    <!-- Header -->

    <div class="header">

        <h1>Parent–Teacher Meeting</h1>

        <p>Appointment Registration System</p>

    </div>


    <?php if (isset($errorMessage)): ?>


        <!-- Error -->

        <div class="result-box error-box">

            <div class="error-icon">
                !
            </div>

            <h2>
                Registration Failed
            </h2>

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


        <!-- Confirmation -->

        <div class="result-box confirmation-box">


            <div class="success-icon">
                ✓
            </div>


            <h2>
                Appointment Confirmed!
            </h2>


            <p class="success-message">
                <?php
                echo htmlspecialchars(
                    $successMessage
                );
                ?>
            </p>


            <!-- Appointment ID -->

            <div class="appointment-id">

                <p>
                    Appointment ID
                </p>

                <h3>
                    <?php
                    echo htmlspecialchars(
                        $appointmentId
                    );
                    ?>
                </h3>

            </div>


            <!-- Appointment Details -->

            <h3 class="details-title">
                Appointment Details
            </h3>


            <div class="appointment-details">


                <div class="detail-item">

                    <span>Parent Name</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $parentName
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Student Name</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $studentName
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Register Number</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $registerNumber
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

                    <span>Phone</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $phone
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Teacher</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $teacher
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Meeting Date</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $formattedMeetingDate
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Meeting Slot</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $meetingSlot
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Purpose</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $purpose
                        );
                        ?>
                    </strong>

                </div>


                <?php if (!empty($message)): ?>

                    <div class="detail-item full-width">

                        <span>Additional Message</span>

                        <strong>
                            <?php
                            echo nl2br(
                                htmlspecialchars(
                                    $message
                                )
                            );
                            ?>
                        </strong>

                    </div>

                <?php endif; ?>


            </div>


            <div class="confirmation-note">

                <p>
                    Please keep your appointment ID
                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $appointmentId
                        );
                        ?>
                    </strong>
                    for future reference.
                </p>

            </div>


            <a
                href="index.php"
                class="back-button"
            >
                Book Another Appointment
            </a>


        </div>


    <?php endif; ?>


    <!-- Footer -->

    <div class="footer">

        <p>
            CS23C10 - Web Design and Web Development
        </p>

    </div>

</div>

</body>

</html>
```
