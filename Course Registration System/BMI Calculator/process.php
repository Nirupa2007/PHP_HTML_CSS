<?php

/*
    User-defined function to calculate BMI.

    Formula:
    BMI = Weight (kg) / Height (m)²
*/

function calculateBMI($weight, $heightInCm)
{
    $heightInMeters = $heightInCm / 100;

    return $weight / ($heightInMeters * $heightInMeters);
}


/*
    Function to determine BMI category.
*/

function determineHealthStatus($bmi)
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
    Function to provide general recommendations.
*/

function getRecommendation($bmi)
{
    if ($bmi < 18.5) {

        return "Consider maintaining a balanced nutritious diet and consult a healthcare professional if you have concerns about your weight.";

    } elseif ($bmi < 25) {

        return "Maintain a balanced diet, regular physical activity, adequate sleep, and a healthy lifestyle.";

    } elseif ($bmi < 30) {

        return "Consider regular physical activity and a balanced diet. A healthcare professional can provide personalized guidance.";

    } else {

        return "Consider discussing healthy weight-management options with a qualified healthcare professional.";

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
    Get submitted values.
*/

$height = $_POST["height"] ?? "";

$weight = $_POST["weight"] ?? "";


/*
    Create an empty array for validation errors.
*/

$errors = [];


/*
    Validate height.
*/

if ($height === "") {

    $errors[] = "Height is required.";

} elseif (!is_numeric($height)) {

    $errors[] = "Height must be a valid number.";

} elseif ($height <= 0) {

    $errors[] = "Height must be greater than zero.";

} elseif ($height < 50 || $height > 250) {

    $errors[] = "Height must be between 50 cm and 250 cm.";

}


/*
    Validate weight.
*/

if ($weight === "") {

    $errors[] = "Weight is required.";

} elseif (!is_numeric($weight)) {

    $errors[] = "Weight must be a valid number.";

} elseif ($weight <= 0) {

    $errors[] = "Weight must be greater than zero.";

} elseif ($weight < 10 || $weight > 300) {

    $errors[] = "Weight must be between 10 kg and 300 kg.";

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
    Convert input values to floating-point numbers.
*/

$height = (float) $height;

$weight = (float) $weight;


/*
    Call the user-defined BMI function.
*/

$bmi = calculateBMI(
    $weight,
    $height
);


/*
    Determine health status.
*/

$healthStatus = determineHealthStatus($bmi);


/*
    Get recommendation.
*/

$recommendation = getRecommendation($bmi);

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

    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="container">


        <!-- Result Card -->

        <div class="result-card">


            <div class="success-icon">
                ✓
            </div>


            <h1>
                BMI Calculation Complete
            </h1>


            <p class="result-message">
                Your BMI has been calculated successfully.
            </p>


            <!-- BMI Value -->

            <div class="bmi-display">

                <span>
                    Your BMI
                </span>

                <strong>
                    <?php
                    echo number_format(
                        $bmi,
                        2
                    );
                    ?>
                </strong>

            </div>


            <!-- Details -->

            <div class="result-details">


                <div class="result-row">

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


                <div class="result-row">

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


                <div class="result-row">

                    <span>
                        Health Status
                    </span>

                    <strong class="status">
                        <?php
                        echo htmlspecialchars(
                            $healthStatus
                        );
                        ?>
                    </strong>

                </div>


            </div>


            <!-- Recommendation -->

            <div class="recommendation">

                <h2>
                    💡 General Recommendation
                </h2>

                <p>
                    <?php
                    echo htmlspecialchars(
                        $recommendation
                    );
                    ?>
                </p>

            </div>


            <!-- BMI Information -->

            <div class="bmi-table">

                <h2>
                    BMI Categories
                </h2>


                <div class="category">

                    <span>
                        Underweight
                    </span>

                    <strong>
                        Below 18.5
                    </strong>

                </div>


                <div class="category">

                    <span>
                        Normal Weight
                    </span>

                    <strong>
                        18.5 – 24.9
                    </strong>

                </div>


                <div class="category">

                    <span>
                        Overweight
                    </span>

                    <strong>
                        25.0 – 29.9
                    </strong>

                </div>


                <div class="category">

                    <span>
                        Obesity
                    </span>

                    <strong>
                        30.0 and above
                    </strong>

                </div>

            </div>


            <a
                href="index.php"
                class="back-button"
            >
                Calculate Again
            </a>


            <p class="disclaimer">
                BMI is a general screening measure and does
                not by itself diagnose health conditions.
                For personalized health advice, consult a
                qualified healthcare professional.
            </p>


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