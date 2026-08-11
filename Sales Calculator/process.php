<?php

/*
    User-defined function to calculate
    the total sales value.
*/

function calculateSalesValue($quantity, $price)
{
    return $quantity * $price;
}


/*
    Check whether the form was submitted
    using the POST method.
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


/*
    Get form values.
*/

$productName = trim($_POST["product_name"] ?? "");
$quantity = $_POST["quantity"] ?? "";
$price = $_POST["price"] ?? "";


/*
    Validation.
*/

$errors = [];


if ($productName === "") {

    $errors[] = "Product name is required.";

}


if ($quantity === "") {

    $errors[] = "Product quantity is required.";

} elseif (!filter_var(
    $quantity,
    FILTER_VALIDATE_INT,
    [
        "options" => [
            "min_range" => 1
        ]
    ]
)) {

    $errors[] = "Quantity must be a positive whole number.";

}


if ($price === "") {

    $errors[] = "Product price is required.";

} elseif (!is_numeric($price) || $price <= 0) {

    $errors[] = "Price must be greater than zero.";

}


/*
    If there are errors, display them.
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

        <title>Sales Calculator - Error</title>

        <link rel="stylesheet" href="style.css">

    </head>


    <body>

        <div class="container">

            <div class="result-card error-card">

                <div class="result-icon">
                    ❌
                </div>

                <h1>
                    Invalid Input
                </h1>

                <p class="result-message">
                    Please correct the following errors:
                </p>


                <ul class="error-list">

                    <?php foreach ($errors as $error): ?>

                        <li>
                            <?php echo htmlspecialchars($error); ?>
                        </li>

                    <?php endforeach; ?>

                </ul>


                <a
                    href="index.php"
                    class="back-button"
                >
                    ← Go Back
                </a>

            </div>

        </div>

    </body>

    </html>

    <?php

    exit();

}


/*
    Convert values to the required data types.
*/

$quantity = (int) $quantity;

$price = (float) $price;


/*
    Call the user-defined function.
*/

$totalSalesValue = calculateSalesValue(
    $quantity,
    $price
);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Sales Calculation Result</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="container">


        <div class="result-card">


            <div class="success-icon">
                ✓
            </div>


            <h1>
                Sales Calculation Successful
            </h1>


            <p class="result-message">
                The total sales value has been calculated successfully.
            </p>


            <!-- Result Details -->

            <div class="result-details">


                <div class="result-row">

                    <span>
                        Product Name
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars($productName);
                        ?>
                    </strong>

                </div>


                <div class="result-row">

                    <span>
                        Quantity
                    </span>

                    <strong>
                        <?php
                        echo $quantity;
                        ?>
                    </strong>

                </div>


                <div class="result-row">

                    <span>
                        Price per Unit
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $price,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <div class="total-row">

                    <span>
                        Total Sales Value
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $totalSalesValue,
                            2
                        );
                        ?>
                    </strong>

                </div>


            </div>


            <a
                href="index.php"
                class="back-button"
            >
                Calculate Again
            </a>


        </div>


        <footer class="footer">

            <p>
                &copy; 2026 Sales Calculator
            </p>

            <p>
                Developed using PHP, HTML5 and CSS3
            </p>

        </footer>


    </div>


</body>

</html>