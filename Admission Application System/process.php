<?php

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();
}


// Get submitted values

$applicantName = trim($_POST["applicant_name"] ?? "");

$dateOfBirth = trim($_POST["date_of_birth"] ?? "");

$gender = trim($_POST["gender"] ?? "");

$email = trim($_POST["email"] ?? "");

$phone = trim($_POST["phone"] ?? "");

$address = trim($_POST["address"] ?? "");

$course = trim($_POST["course"] ?? "");

$qualification = trim($_POST["qualification"] ?? "");

$percentage = trim($_POST["percentage"] ?? "");


// Array to store validation errors

$errors = [];


// Validate Applicant Name

if (empty($applicantName)) {

    $errors[] = "Applicant name is required.";

} elseif (!preg_match("/^[a-zA-Z ]+$/", $applicantName)) {

    $errors[] = "Applicant name should contain only letters and spaces.";

}


// Validate Date of Birth

if (empty($dateOfBirth)) {

    $errors[] = "Date of birth is required.";

}


// Validate Gender

if (empty($gender)) {

    $errors[] = "Please select your gender.";

}


// Validate Email

if (empty($email)) {

    $errors[] = "Email address is required.";

} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errors[] = "Please enter a valid email address.";

}


// Validate Phone

if (empty($phone)) {

    $errors[] = "Phone number is required.";

} elseif (!preg_match("/^[0-9]{10}$/", $phone)) {

    $errors[] = "Phone number must contain exactly 10 digits.";

}


// Validate Address

if (empty($address)) {

    $errors[] = "Address is required.";

}


// Validate Course

if (empty($course)) {

    $errors[] = "Please select a course.";

}


// Validate Qualification

if (empty($qualification)) {

    $errors[] = "Previous qualification is required.";

}


// Validate Percentage

if ($percentage === "") {

    $errors[] = "Previous exam percentage is required.";

} elseif (!is_numeric($percentage) ||
          $percentage < 0 ||
          $percentage > 100) {

    $errors[] = "Percentage must be between 0 and 100.";

}


// Generate acknowledgement number

$acknowledgementNumber =
    "ADM" . date("Ymd") . rand(1000, 9999);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admission Acknowledgement</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">

    <div class="result-box">


        <?php if (!empty($errors)): ?>

            <!-- Error Section -->

            <div class="error-message">

                <h2>
                    ⚠ Application Submission Failed
                </h2>

                <p>
                    Please correct the following errors:
                </p>

                <ul>

                    <?php foreach ($errors as $error): ?>

                        <li>
                            <?php
                            echo htmlspecialchars($error);
                            ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>


            <a
                href="index.php"
                class="back-button"
            >
                ← Return to Application Form
            </a>


        <?php else: ?>


            <!-- Success Section -->

            <div class="success-message">

                <h2>
                    ✓ Application Submitted Successfully
                </h2>

                <p>
                    Your admission application has been received.
                </p>

            </div>


            <!-- Acknowledgement Header -->

            <div class="acknowledgement-header">

                <h1>
                    Admission Acknowledgement
                </h1>

                <p>
                    ABC College
                </p>

                <div class="acknowledgement-number">

                    Acknowledgement No:
                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $acknowledgementNumber
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <!-- Applicant Details -->

            <div class="acknowledgement-section">

                <h2>
                    Applicant Details
                </h2>


                <div class="details-table">


                    <div class="detail-row">

                        <div class="detail-label">
                            Applicant Name
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $applicantName
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Date of Birth
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $dateOfBirth
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Gender
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $gender
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Email
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $email
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Phone Number
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $phone
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Address
                        </div>

                        <div class="detail-value">
                            <?php
                            echo nl2br(
                                htmlspecialchars($address)
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Course Applied For
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $course
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Previous Qualification
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $qualification
                            );
                            ?>
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Previous Exam Percentage
                        </div>

                        <div class="detail-value">
                            <?php
                            echo htmlspecialchars(
                                $percentage
                            );
                            ?>%
                        </div>

                    </div>


                </div>

            </div>


            <!-- Important Message -->

            <div class="notice">

                <h3>
                    Important Notice
                </h3>

                <p>
                    Please keep this acknowledgement number for
                    future reference. The admission department will
                    contact you regarding the next steps in the
                    admission process.
                </p>

            </div>


            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    ← New Application
                </a>

                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print Acknowledgement
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>