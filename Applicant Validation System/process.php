<?php

// ==========================================
// CHECK REQUEST METHOD
// ==========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// GET FORM DATA
// ==========================================

$email = trim(
    $_POST["email"] ?? ""
);

$password = $_POST["password"] ?? "";

$mobile = trim(
    $_POST["mobile"] ?? ""
);


// ==========================================
// ERROR ARRAY
// ==========================================

$errors = [];


// ==========================================
// EMAIL VALIDATION
// ==========================================

if (empty($email)) {

    $errors[] =
        "Email ID is required.";

} elseif (!filter_var(
    $email,
    FILTER_VALIDATE_EMAIL
)) {

    $errors[] =
        "Please enter a valid email ID.";

}


// ==========================================
// PASSWORD VALIDATION
// ==========================================

if (empty($password)) {

    $errors[] =
        "Password is required.";

} else {

    // Minimum 8 characters

    if (strlen($password) < 8) {

        $errors[] =
            "Password must contain at least 8 characters.";

    }


    // Check uppercase letter

    if (!preg_match(
        "/[A-Z]/",
        $password
    )) {

        $errors[] =
            "Password must contain at least one uppercase letter.";

    }


    // Check lowercase letter

    if (!preg_match(
        "/[a-z]/",
        $password
    )) {

        $errors[] =
            "Password must contain at least one lowercase letter.";

    }


    // Check digit

    if (!preg_match(
        "/[0-9]/",
        $password
    )) {

        $errors[] =
            "Password must contain at least one digit.";

    }

}


// ==========================================
// MOBILE NUMBER VALIDATION
// ==========================================

if (empty($mobile)) {

    $errors[] =
        "Mobile number is required.";

} elseif (!preg_match(
    "/^[0-9]{10}$/",
    $mobile
)) {

    $errors[] =
        "Mobile number must contain exactly 10 digits.";

}


// ==========================================
// DISPLAY RESULT
// ==========================================

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Validation Result</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>


            <!-- ==================================
                 VALIDATION FAILED
                 ================================== -->

            <div class="error-header">

                <div class="error-icon">
                    !
                </div>

                <h1>
                    Validation Failed
                </h1>

                <p>
                    Please correct the following errors.
                </p>

            </div>


            <!-- Error List -->

            <div class="error-list">

                <h2>
                    Validation Messages
                </h2>


                <ul>

                    <?php foreach ($errors as $error): ?>

                        <li>

                            <span class="error-bullet">
                                ×
                            </span>

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
                ← Go Back and Correct Details
            </a>


        <?php else: ?>


            <!-- ==================================
                 VALIDATION SUCCESS
                 ================================== -->

            <div class="success-header">

                <div class="success-icon">
                    ✓
                </div>

                <h1>
                    Validation Successful
                </h1>

                <p>
                    All applicant details have been validated successfully.
                </p>

            </div>


            <!-- Validated Details -->

            <div class="details-section">

                <h2>
                    Validated Applicant Details
                </h2>


                <!-- Email -->

                <div class="detail-row">

                    <span>
                        Email ID
                    </span>

                    <strong>

                        <?php

                        echo htmlspecialchars(
                            $email
                        );

                        ?>

                    </strong>

                </div>


                <!-- Mobile -->

                <div class="detail-row">

                    <span>
                        Mobile Number
                    </span>

                    <strong>

                        <?php

                        echo htmlspecialchars(
                            $mobile
                        );

                        ?>

                    </strong>

                </div>


                <!-- Password -->

                <div class="detail-row">

                    <span>
                        Password
                    </span>

                    <strong>
                        Valid ✓
                    </strong>

                </div>

            </div>


            <!-- Success Message -->

            <div class="success-message">

                <h3>
                    Applicant Details Accepted
                </h3>

                <p>
                    The email ID, password and mobile number
                    satisfy the required validation rules.
                </p>

            </div>


            <!-- Button -->

            <a
                href="index.php"
                class="back-button"
            >
                Validate Another Applicant
            </a>


        <?php endif; ?>


    </div>

</div>


</body>

</html>