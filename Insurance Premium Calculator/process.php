```php
<?php

// Function to determine premium rate based on age
function getAgeRate($age)
{
    if ($age < 30) {
        return 0.02;
    } elseif ($age < 50) {
        return 0.03;
    } elseif ($age < 60) {
        return 0.05;
    } else {
        return 0.08;
    }
}


// Function to calculate base premium
function calculateBasePremium($coverageAmount, $ageRate)
{
    return $coverageAmount * $ageRate;
}


// Function to determine policy term adjustment rate
function getTermRate($policyTerm)
{
    if ($policyTerm <= 5) {
        return 0.00;
    } elseif ($policyTerm <= 10) {
        return 0.05;
    } else {
        return 0.10;
    }
}


// Function to calculate term adjustment
function calculateTermAdjustment($basePremium, $termRate)
{
    return $basePremium * $termRate;
}


// Function to calculate final premium
function calculateFinalPremium($basePremium, $termAdjustment)
{
    return $basePremium + $termAdjustment;
}


// Function to display age category
function getAgeCategory($age)
{
    if ($age < 30) {
        return "Young Adult";
    } elseif ($age < 50) {
        return "Adult";
    } elseif ($age < 60) {
        return "Senior Adult";
    } else {
        return "Senior Citizen";
    }
}


// Check whether form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values

    $age = $_POST["age"] ?? "";
    $policyTerm = $_POST["policy_term"] ?? "";
    $coverageAmount = $_POST["coverage_amount"] ?? "";


    // Validation

    if (
        $age === "" ||
        $policyTerm === "" ||
        $coverageAmount === ""
    ) {

        $errorMessage = "Please fill in all required fields.";

    } elseif (
        !is_numeric($age) ||
        !is_numeric($policyTerm) ||
        !is_numeric($coverageAmount)
    ) {

        $errorMessage = "Please enter valid numeric values.";

    } elseif ($age < 18 || $age > 100) {

        $errorMessage = "Age must be between 18 and 100.";

    } elseif ($policyTerm < 1 || $policyTerm > 50) {

        $errorMessage = "Policy term must be between 1 and 50 years.";

    } elseif ($coverageAmount < 1000) {

        $errorMessage = "Coverage amount must be at least ₹1,000.";

    } else {

        // Get age rate

        $ageRate = getAgeRate($age);


        // Calculate base premium

        $basePremium = calculateBasePremium(
            $coverageAmount,
            $ageRate
        );


        // Get term rate

        $termRate = getTermRate($policyTerm);


        // Calculate term adjustment

        $termAdjustment = calculateTermAdjustment(
            $basePremium,
            $termRate
        );


        // Calculate final premium

        $finalPremium = calculateFinalPremium(
            $basePremium,
            $termAdjustment
        );


        // Get age category

        $ageCategory = getAgeCategory($age);

    }

} else {

    $errorMessage =
        "Invalid request. Please submit the insurance form.";

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

    <title>Policy Summary</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <!-- Header -->

        <div class="header">

            <h1>Insurance Premium Calculator</h1>

            <p>Policy Summary</p>

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

            <!-- Policy Summary -->

            <div class="result-box">

                <h2>Policy Summary</h2>


                <div class="result-item">

                    <span>Age</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($age);
                        ?> years
                    </strong>

                </div>


                <div class="result-item">

                    <span>Age Category</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($ageCategory);
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>Policy Term</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($policyTerm);
                        ?> years
                    </strong>

                </div>


                <div class="result-item">

                    <span>Coverage Amount</span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $coverageAmount,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>Age Premium Rate</span>

                    <strong>
                        <?php
                        echo ($ageRate * 100);
                        ?>%
                    </strong>

                </div>


                <div class="result-item">

                    <span>Base Premium</span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $basePremium,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>Term Adjustment</span>

                    <strong>
                        <?php
                        echo ($termRate * 100);
                        ?>%
                    </strong>

                </div>


                <div class="result-item">

                    <span>Adjustment Amount</span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $termAdjustment,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <!-- Final Premium -->

                <div class="premium-box">

                    <p>Final Premium Amount</p>

                    <h3>
                        ₹<?php
                        echo number_format(
                            $finalPremium,
                            2
                        );
                        ?>
                    </h3>

                </div>


                <a href="index.php" class="back-button">
                    Calculate Another Policy
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
