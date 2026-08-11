<?php

/*
    ==========================================
    BMI CALCULATOR
    ==========================================

    This program:
    - Accepts height and weight
    - Calculates BMI
    - Determines health status
    - Provides recommendations
    - Validates user input
*/


/*
    Function to calculate BMI.

    Formula:

    BMI = Weight / (Height in metres)^2
*/

function calculateBMI($height, $weight)
{
    // Convert height from centimetres to metres

    $heightInMetres = $height / 100;

    // Calculate BMI

    $bmi =
        $weight /
        ($heightInMetres * $heightInMetres);

    return $bmi;
}


/*
    Function to determine BMI category.
*/

function getBMIStatus($bmi)
{
    if ($bmi < 18.5) {

        return "Underweight";

    } elseif ($bmi < 25) {

        return "Normal Weight";

    } elseif ($bmi < 30) {

        return "Overweight";

    } else {

        return "Obesity";
    }
}


/*
    Function to provide health recommendation.
*/

function getRecommendation($bmi)
{
    if ($bmi < 18.5) {

        return "Consider maintaining a balanced diet with adequate nutrients and consult a healthcare professional if you have concerns about your weight.";

    } elseif ($bmi < 25) {

        return "Your BMI is within the normal range. Continue following a balanced diet and maintain regular physical activity.";

    } elseif ($bmi < 30) {

        return "Consider maintaining a balanced diet, increasing physical activity, and monitoring your weight regularly.";

    } else {

        return "Consider adopting healthy eating habits and regular physical activity. Consult a healthcare professional for personalized guidance.";
    }
}


/*
    Function to return a suitable message
    based on BMI category.
*/

function getStatusMessage($bmi)
{
    if ($bmi < 18.5) {

        return "Your BMI is below the normal range.";

    } elseif ($bmi < 25) {

        return "Your BMI is within the normal range.";

    } elseif ($bmi < 30) {

        return "Your BMI is above the normal range.";

    } else {

        return "Your BMI is in the obesity range.";
    }
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
    Get values from the form.

    The null coalescing operator prevents
    undefined index warnings.
*/

$height = $_POST["height"] ?? "";

$weight = $_POST["weight"] ?? "";


/*
    Create an empty error array.
*/

$errors = [];


/*
    Validate height.
*/

if (
    $height === "" ||
    !is_numeric($height)
) {

    $errors[] =
        "Please enter a valid height.";

} elseif ($height <= 0) {

    $errors[] =
        "Height must be greater than zero.";

}


/*
    Validate weight.
*/

if (
    $weight === "" ||
    !is_numeric($weight)
) {

    $errors[] =
        "Please enter a valid weight.";

} elseif ($weight <= 0) {

    $errors[] =
        "Weight must be greater than zero.";

}


/*
    Check realistic height range.
*/

if (
    is_numeric($height) &&
    ($height < 50 || $height > 250)
) {

    $errors[] =
        "Height should be between 50 cm and 250 cm.";

}


/*
    Check realistic weight range.
*/

if (
    is_numeric($weight) &&
    ($weight < 10 || $weight > 300)
) {

    $errors[] =
        "Weight should be between 10 kg and 300 kg.";

}


/*
    Display validation errors.
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

    <title>BMI Calculator - Error</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

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

            <p>
                Please correct the following errors:
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
    Convert input values into numbers.
*/

$height = (float) $height;

$weight = (float) $weight;


/*
    Calculate BMI using the function.
*/

$bmi =
    calculateBMI(
        $height,
        $weight
    );


/*
    Determine health status.
*/

$status =
    getBMIStatus($bmi);


/*
    Get recommendation.
*/

$recommendation =
    getRecommendation($bmi);


/*
    Get status message.
*/

$statusMessage =
    getStatusMessage($bmi);


/*
    Format BMI to two decimal places.
*/

$bmiFormatted =
    number_format(
        $bmi,
        2
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

    <title>BMI Result</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>

<body>

    <div class="container">

        <!-- Result Card -->

        <div class="result-card">


            <div class="success-icon">
                ✓
            </div>


            <h1>
                BMI Result
            </h1>


            <p class="result-message">
                Your BMI has been calculated successfully.
            </p>


            <!-- BMI Value -->

            <div class="bmi-result">

                <span>
                    Your BMI
                </span>

                <strong>
                    <?php
                    echo $bmiFormatted;
                    ?>
                </strong>

            </div>


            <!-- User Details -->

            <div class="details-box">

                <h2>
                    Your Details
                </h2>


                <div class="detail-row">

                    <span>
                        Height
                    </span>

                    <strong>
                        <?php
                        echo number_format(
                            $height,
                            1
                        );
                        ?>
                        cm
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Weight
                    </span>

                    <strong>
                        <?php
                        echo number_format(
                            $weight,
                            1
                        );
                        ?>
                        kg
                    </strong>

                </div>


            </div>


            <!-- Health Status -->

            <div class="status-box">

                <span>
                    Health Status
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $status
                    );
                    ?>
                </strong>

                <p>
                    <?php
                    echo htmlspecialchars(
                        $statusMessage
                    );
                    ?>
                </p>

            </div>


            <!-- BMI Table -->

            <div class="bmi-table-container">

                <h2>
                    BMI Categories
                </h2>


                <table>

                    <thead>

                        <tr>

                            <th>
                                BMI Range
                            </th>

                            <th>
                                Category
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                Below 18.5
                            </td>

                            <td>
                                Underweight
                            </td>

                        </tr>


                        <tr>

                            <td>
                                18.5 - 24.9
                            </td>

                            <td>
                                Normal Weight
                            </td>

                        </tr>


                        <tr>

                            <td>
                                25.0 - 29.9
                            </td>

                            <td>
                                Overweight
                            </td>

                        </tr>


                        <tr>

                            <td>
                                30.0 and above
                            </td>

                            <td>
                                Obesity
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- Recommendation -->

            <div class="recommendation-box">

                <h2>
                    Health Recommendation
                </h2>

                <p>
                    <?php
                    echo htmlspecialchars(
                        $recommendation
                    );
                    ?>
                </p>

            </div>


            <!-- Disclaimer -->

            <div class="disclaimer">

                <strong>
                    Note:
                </strong>

                BMI is a general screening measure and
                does not provide a complete assessment
                of individual health.

            </div>


            <!-- Back Button -->

            <a
                href="index.php"
                class="back-button"
            >
                Calculate Again
            </a>


        </div>


        <!-- Footer -->

        <footer class="footer">

            <p>
                &copy; 2026 BMI Calculator
            </p>

            <p>
                Developed using PHP, HTML5 and CSS3
            </p>

        </footer>

    </div>

</body>

</html>