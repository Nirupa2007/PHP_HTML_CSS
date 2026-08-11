<?php

// Check whether the form was submitted using POST

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// GET FORM DATA
// ==========================================

$employeeName = trim(
    $_POST["employee_name"] ?? ""
);

$department = trim(
    $_POST["department"] ?? ""
);


// ==========================================
// VALIDATION
// ==========================================

$errors = [];


// Check employee name

if (empty($employeeName)) {

    $errors[] =
        "Employee name is required.";

}


// Check employee name contains only letters and spaces

elseif (!preg_match(
    "/^[a-zA-Z ]+$/",
    $employeeName
)) {

    $errors[] =
        "Employee name should contain only letters and spaces.";

}


// Check department

if (empty($department)) {

    $errors[] =
        "Please select a department.";

}


// ==========================================
// EMAIL GENERATION
// ==========================================

if (empty($errors)) {


    /*
     * Convert the complete name to lowercase.
     *
     * Example:
     * John Kumar
     * becomes
     * john kumar
     */

    $lowercaseName =
        strtolower($employeeName);


    /*
     * Remove extra spaces from the beginning
     * and end of the name.
     */

    $lowercaseName =
        trim($lowercaseName);


    /*
     * Replace multiple spaces with
     * a single space.
     */

    $lowercaseName =
        preg_replace(
            "/\s+/",
            " ",
            $lowercaseName
        );


    /*
     * Split the name into individual words.
     *
     * Example:
     * john kumar
     *
     * becomes:
     *
     * ["john", "kumar"]
     */

    $nameParts =
        explode(
            " ",
            $lowercaseName
        );


    /*
     * Get the first name.
     */

    $firstName =
        $nameParts[0];


    /*
     * Get the last name.
     *
     * If there is only one name,
     * use the same name.
     */

    if (count($nameParts) > 1) {

        $lastName =
            end($nameParts);

    } else {

        $lastName =
            $firstName;
    }


    /*
     * Create the username.
     *
     * Example:
     *
     * John Kumar
     *
     * becomes:
     *
     * john.kumar
     */

    $username =
        $firstName . "." . $lastName;


    /*
     * Remove any unwanted characters.
     */

    $username =
        preg_replace(
            "/[^a-z0-9.]/",
            "",
            $username
        );


    /*
     * Create the final email address.
     */

    $email =
        $username . "@abccompany.com";


    /*
     * Create a display name.
     */

    $displayName =
        ucwords($lowercaseName);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Generated Employee Email</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>


            <!-- Error Section -->

            <div class="error-message">

                <h2>
                    ⚠ Invalid Input
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
                ← Back to Form
            </a>


        <?php else: ?>


            <!-- Success Section -->

            <div class="success-header">

                <div class="icon">
                    ✓
                </div>

                <h1>
                    Email ID Generated
                </h1>

                <p>
                    Employee email address has been successfully created.
                </p>

            </div>


            <!-- Employee Details -->

            <div class="employee-details">

                <div class="detail-row">

                    <span>
                        Employee Name
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $displayName
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Department
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $department
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <!-- Email Display -->

            <div class="email-box">

                <p>
                    Generated Email ID
                </p>

                <h2>
                    <?php
                    echo htmlspecialchars($email);
                    ?>
                </h2>

            </div>


            <!-- String Processing -->

            <div class="processing-box">

                <h3>
                    String Processing
                </h3>

                <div class="processing-row">

                    <span>
                        Original Name
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $employeeName
                        );
                        ?>
                    </strong>

                </div>


                <div class="processing-row">

                    <span>
                        Lowercase Name
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $lowercaseName
                        );
                        ?>
                    </strong>

                </div>


                <div class="processing-row">

                    <span>
                        Generated Username
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $username
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    Generate Another Email
                </a>

                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>