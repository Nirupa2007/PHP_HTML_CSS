```php
<?php

// Function to calculate average score
function calculateAverageScore(
    $qualityScore,
    $productivityScore,
    $teamworkScore
) {
    return (
        $qualityScore +
        $productivityScore +
        $teamworkScore
    ) / 3;
}


// Function to determine employee rating
function determineRating($averageScore)
{
    // Decision-making statements

    if ($averageScore >= 90) {

        return "A+";

    } elseif ($averageScore >= 80) {

        return "A";

    } elseif ($averageScore >= 70) {

        return "B";

    } elseif ($averageScore >= 60) {

        return "C";

    } elseif ($averageScore >= 50) {

        return "D";

    } else {

        return "F";
    }
}


// Function to determine performance description
function getPerformanceDescription($rating)
{
    if ($rating == "A+") {

        return "Excellent";

    } elseif ($rating == "A") {

        return "Very Good";

    } elseif ($rating == "B") {

        return "Good";

    } elseif ($rating == "C") {

        return "Satisfactory";

    } elseif ($rating == "D") {

        return "Needs Improvement";

    } else {

        return "Poor";
    }
}


// Function to determine evaluation status
function getEvaluationStatus($averageScore)
{
    if ($averageScore >= 60) {

        return "Successful";

    } else {

        return "Needs Improvement";
    }
}


// Check form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values

    $employeeName =
        trim($_POST["employee_name"] ?? "");

    $employeeId =
        trim($_POST["employee_id"] ?? "");

    $qualityScore =
        $_POST["quality_score"] ?? "";

    $productivityScore =
        $_POST["productivity_score"] ?? "";

    $teamworkScore =
        $_POST["teamwork_score"] ?? "";


    // Validation

    if (
        empty($employeeName) ||
        empty($employeeId) ||
        $qualityScore === "" ||
        $productivityScore === "" ||
        $teamworkScore === ""
    ) {

        $errorMessage =
            "Please fill in all required fields.";

    } elseif (
        !is_numeric($qualityScore) ||
        !is_numeric($productivityScore) ||
        !is_numeric($teamworkScore)
    ) {

        $errorMessage =
            "All performance scores must be valid numbers.";

    } elseif (
        $qualityScore < 0 ||
        $qualityScore > 100 ||
        $productivityScore < 0 ||
        $productivityScore > 100 ||
        $teamworkScore < 0 ||
        $teamworkScore > 100
    ) {

        $errorMessage =
            "All scores must be between 0 and 100.";

    } else {

        // Calculate average

        $averageScore = calculateAverageScore(
            $qualityScore,
            $productivityScore,
            $teamworkScore
        );


        // Determine rating

        $rating =
            determineRating($averageScore);


        // Determine description

        $performanceDescription =
            getPerformanceDescription($rating);


        // Determine status

        $evaluationStatus =
            getEvaluationStatus($averageScore);
    }

} else {

    $errorMessage =
        "Invalid request. Please submit the evaluation form.";

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

    <title>Evaluation Result</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Employee Performance Evaluation System</h1>

        <p>Evaluation Result</p>

    </div>


    <?php if (isset($errorMessage)): ?>

        <!-- Error -->

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

        <!-- Result -->

        <div class="result-box">

            <h2>Performance Evaluation</h2>


            <!-- Employee Information -->

            <div class="result-item">

                <span>Employee Name</span>

                <strong>
                    <?php
                    echo htmlspecialchars($employeeName);
                    ?>
                </strong>

            </div>


            <div class="result-item">

                <span>Employee ID</span>

                <strong>
                    <?php
                    echo htmlspecialchars($employeeId);
                    ?>
                </strong>

            </div>


            <!-- Scores -->

            <div class="result-item">

                <span>Work Quality Score</span>

                <strong>
                    <?php
                    echo number_format(
                        $qualityScore,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="result-item">

                <span>Productivity Score</span>

                <strong>
                    <?php
                    echo number_format(
                        $productivityScore,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="result-item">

                <span>Teamwork Score</span>

                <strong>
                    <?php
                    echo number_format(
                        $teamworkScore,
                        2
                    );
                    ?>
                </strong>

            </div>


            <!-- Average -->

            <div class="average-box">

                <p>Average Performance Score</p>

                <h3>
                    <?php
                    echo number_format(
                        $averageScore,
                        2
                    );
                    ?>
                </h3>

            </div>


            <!-- Rating -->

            <div class="rating-box">

                <p>Employee Rating</p>

                <h3>
                    <?php
                    echo htmlspecialchars($rating);
                    ?>
                </h3>

            </div>


            <!-- Performance -->

            <div class="performance-box">

                <p>Performance Level</p>

                <h3>
                    <?php
                    echo htmlspecialchars(
                        $performanceDescription
                    );
                    ?>
                </h3>

            </div>


            <!-- Status -->

            <div class="status-box">

                <p>Evaluation Status</p>

                <h3>
                    <?php
                    echo htmlspecialchars(
                        $evaluationStatus
                    );
                    ?>
                </h3>

            </div>


            <a href="index.php" class="back-button">
                Evaluate Another Employee
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
