```php
<?php

// Function to calculate HRA
function calculateHRA($basicSalary)
{
    return $basicSalary * 0.20;
}


// Function to calculate DA
function calculateDA($basicSalary)
{
    return $basicSalary * 0.10;
}


// Function to calculate Gross Salary
function calculateGrossSalary($basicSalary, $hra, $da)
{
    return $basicSalary + $hra + $da;
}


// Function to calculate PF deduction
function calculatePF($basicSalary)
{
    return $basicSalary * 0.12;
}


// Function to calculate Tax deduction
function calculateTax($grossSalary)
{
    return $grossSalary * 0.05;
}


// Function to calculate total deductions
function calculateTotalDeductions($pf, $tax)
{
    return $pf + $tax;
}


// Function to calculate Net Salary
function calculateNetSalary($grossSalary, $totalDeductions)
{
    return $grossSalary - $totalDeductions;
}


// Check whether the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values
    $employeeName = trim($_POST["employee_name"] ?? "");
    $employeeId = trim($_POST["employee_id"] ?? "");
    $basicSalary = $_POST["basic_salary"] ?? "";


    // Input validation
    if (
        empty($employeeName) ||
        empty($employeeId) ||
        $basicSalary === ""
    ) {

        $errorMessage = "Please fill in all required fields.";

    } elseif (!is_numeric($basicSalary)) {

        $errorMessage = "Basic salary must be a valid number.";

    } elseif ($basicSalary <= 0) {

        $errorMessage = "Basic salary must be greater than zero.";

    } else {

        // Calculate HRA
        $hra = calculateHRA($basicSalary);

        // Calculate DA
        $da = calculateDA($basicSalary);

        // Calculate Gross Salary
        $grossSalary = calculateGrossSalary(
            $basicSalary,
            $hra,
            $da
        );

        // Calculate PF
        $pf = calculatePF($basicSalary);

        // Calculate Tax
        $tax = calculateTax($grossSalary);

        // Calculate Total Deductions
        $totalDeductions = calculateTotalDeductions(
            $pf,
            $tax
        );

        // Calculate Net Salary
        $netSalary = calculateNetSalary(
            $grossSalary,
            $totalDeductions
        );
    }

} else {

    $errorMessage = "Invalid request. Please submit the salary form.";

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

    <title>Salary Result</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header">

            <h1>Employee Salary Processing System</h1>

            <p>Salary Calculation Result</p>

        </div>


        <?php if (isset($errorMessage)): ?>

            <!-- Error Message -->

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

            <!-- Salary Result -->

            <div class="result-box">

                <h2>Salary Details</h2>


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


                <div class="result-item">

                    <span>Basic Salary</span>

                    <strong>
                        ₹<?php
                        echo number_format($basicSalary, 2);
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>HRA (20%)</span>

                    <strong>
                        ₹<?php
                        echo number_format($hra, 2);
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>DA (10%)</span>

                    <strong>
                        ₹<?php
                        echo number_format($da, 2);
                        ?>
                    </strong>

                </div>


                <div class="result-item highlight">

                    <span>Gross Salary</span>

                    <strong>
                        ₹<?php
                        echo number_format($grossSalary, 2);
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>PF Deduction (12%)</span>

                    <strong>
                        ₹<?php
                        echo number_format($pf, 2);
                        ?>
                    </strong>

                </div>


                <div class="result-item">

                    <span>Tax Deduction (5%)</span>

                    <strong>
                        ₹<?php
                        echo number_format($tax, 2);
                        ?>
                    </strong>

                </div>


                <div class="result-item deduction">

                    <span>Total Deductions</span>

                    <strong>
                        ₹<?php
                        echo number_format($totalDeductions, 2);
                        ?>
                    </strong>

                </div>


                <div class="net-salary">

                    <p>Net Salary</p>

                    <h3>
                        ₹<?php
                        echo number_format($netSalary, 2);
                        ?>
                    </h3>

                </div>


                <a href="index.php" class="back-button">
                    Calculate Another Salary
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
