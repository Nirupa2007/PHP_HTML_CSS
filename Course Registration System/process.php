<?php

// Check whether the form was submitted using POST

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// GET FORM DATA
// ==========================================

$studentName = trim(
    $_POST["student_name"] ?? ""
);

$registerNumber = trim(
    $_POST["register_number"] ?? ""
);

$email = trim(
    $_POST["email"] ?? ""
);

$phone = trim(
    $_POST["phone"] ?? ""
);

$gender = trim(
    $_POST["gender"] ?? ""
);

$course = trim(
    $_POST["course"] ?? ""
);

$mode = trim(
    $_POST["mode"] ?? ""
);

$address = trim(
    $_POST["address"] ?? ""
);


// ==========================================
// VALIDATION
// ==========================================

$errors = [];


// Validate student name

if (empty($studentName)) {

    $errors[] =
        "Student name is required.";

} elseif (!preg_match(
    "/^[a-zA-Z ]+$/",
    $studentName
)) {

    $errors[] =
        "Student name should contain only letters and spaces.";
}


// Validate register number

if (empty($registerNumber)) {

    $errors[] =
        "Register number is required.";

}


// Validate email

if (empty($email)) {

    $errors[] =
        "Email address is required.";

} elseif (!filter_var(
    $email,
    FILTER_VALIDATE_EMAIL
)) {

    $errors[] =
        "Please enter a valid email address.";
}


// Validate phone

if (empty($phone)) {

    $errors[] =
        "Phone number is required.";

} elseif (!preg_match(
    "/^[0-9]{10}$/",
    $phone
)) {

    $errors[] =
        "Phone number must contain exactly 10 digits.";
}


// Validate gender

$allowedGenders = [
    "Male",
    "Female",
    "Other"
];

if (
    empty($gender) ||
    !in_array($gender, $allowedGenders)
) {

    $errors[] =
        "Please select a valid gender.";
}


// Validate course

$allowedCourses = [

    "Web Development",

    "Python Programming",

    "Data Science",

    "Artificial Intelligence",

    "Cyber Security"

];

if (
    empty($course) ||
    !in_array($course, $allowedCourses)
) {

    $errors[] =
        "Please select a valid course.";
}


// Validate course mode

$allowedModes = [

    "Online",

    "Offline",

    "Hybrid"

];

if (
    empty($mode) ||
    !in_array($mode, $allowedModes)
) {

    $errors[] =
        "Please select a valid course mode.";
}


// Validate address

if (empty($address)) {

    $errors[] =
        "Address is required.";

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


<div class="page-container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>


            <!-- ERROR MESSAGE -->

            <div class="error-message">

                <div class="error-icon">
                    !
                </div>

                <h1>
                    Registration Failed
                </h1>

                <p>
                    Please correct the following errors:
                </p>


                <ul>

                    <?php foreach ($errors as $error): ?>

                        <li>

                            <?php

                            echo htmlspecialchars(
                                $error
                            );

                            ?>

                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>


            <a
                href="index.php"
                class="back-button"
            >
                ← Back to Registration Form
            </a>


        <?php else: ?>


            <!-- SUCCESS MESSAGE -->

            <div class="success-header">

                <div class="success-icon">
                    ✓
                </div>

                <h1>
                    Registration Successful!
                </h1>

                <p>
                    Your course registration has been completed successfully.
                </p>

            </div>


            <!-- Registration Details -->

            <div class="details-section">

                <h2>
                    Registration Details
                </h2>


                <div class="detail-row">

                    <span>
                        Student Name
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $studentName
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Register Number
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $registerNumber
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Email Address
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $email
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Phone Number
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $phone
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Gender
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $gender
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Selected Course
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $course
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Course Mode
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $mode
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row address-row">

                    <span>
                        Address
                    </span>

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


            <!-- Registration Status -->

            <div class="status-box">

                <h3>
                    Registration Status
                </h3>

                <p>
                    Your registration has been received.
                    Please keep these details for future reference.
                </p>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    Register Another Student
                </a>


                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print Details
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>