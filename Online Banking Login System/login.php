<?php

/*
    Sample customer credentials.

    These are used only for this classroom
    demonstration.
*/

$validCustomerId = "CUST1001";

$validPassword = "bank123";


/*
    Check whether the form was submitted
    using the POST method.
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


/*
    Get the submitted login details.
*/

$customerId = trim(
    $_POST["customer_id"] ?? ""
);

$password = $_POST["password"] ?? "";


/*
    Create an array for validation errors.
*/

$errors = [];


/*
    Validate Customer ID.
*/

if ($customerId === "") {

    $errors[] = "Customer ID is required.";

}


/*
    Validate Password.
*/

if ($password === "") {

    $errors[] = "Password is required.";

}


/*
    If fields are empty, display errors.
*/

if (!empty($errors)) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>Login Error</title>

        <link rel="stylesheet" href="style.css">

    </head>


    <body>

        <div class="page-container">

            <div class="message-card error-card">

                <div class="message-icon">
                    ❌
                </div>

                <h1>
                    Login Error
                </h1>

                <p>
                    Please correct the following:
                </p>


                <ul class="error-list">

                    <?php foreach ($errors as $error): ?>

                        <li>
                            <?php
                            echo htmlspecialchars($error);
                            ?>
                        </li>

                    <?php endforeach; ?>

                </ul>


                <a
                    href="index.php"
                    class="back-button"
                >
                    ← Back to Login
                </a>

            </div>

        </div>

    </body>

    </html>

    <?php

    exit();

}


/*
    Authenticate the customer.

    password_verify() is normally recommended
    for passwords stored as hashes. For this
    simple classroom demonstration, the sample
    password is directly compared.
*/

if (
    $customerId === $validCustomerId &&
    $password === $validPassword
) {

    /*
        Redirect to the personalized dashboard.
    */

    header(
        "Location: dashboard.php"
    );

    exit();

}


/*
    Display authentication failure.
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Authentication Failed</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="page-container">


        <div class="message-card error-card">


            <div class="message-icon">
                ❌
            </div>


            <h1>
                Authentication Failed
            </h1>


            <p>
                The Customer ID or password is incorrect.
                Please try again.
            </p>


            <a
                href="index.php"
                class="back-button"
            >
                ← Try Again
            </a>


        </div>


    </div>


</body>

</html>