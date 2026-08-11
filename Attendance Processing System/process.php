```php
<?php

// Function to calculate attendance percentage
function calculateAttendancePercentage($presentDays, $workingDays)
{
    return ($presentDays / $workingDays) * 100;
}

// Function to determine examination eligibility
function checkEligibility($attendancePercentage)
{
    if ($attendancePercentage >= 75) {
        return "Eligible for Examination";
    } else {
        return "Not Eligible for Examination";
    }
}

// Function to return CSS class based on eligibility
function getEligibilityClass($attendancePercentage)
{
    if ($attendancePercentage >= 75) {
        return "eligible";
    } else {
        return "not-eligible";
    }
}

// Check whether form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values
    $studentName = trim($_POST["student_name"] ?? "");
    $registerNumber = trim($_POST["register_number"] ?? "");
    $workingDays = $_POST["working_days"] ?? "";
    $presentDays = $_POST["present_days"] ?? "";

    // Validation
    if (
        empty($studentName) ||
        empty($registerNumber) ||
        $workingDays === "" ||
        $presentDays === ""
    ) {
        $errorMessage = "Please fill in all required fields.";

    } elseif (!is_numeric($workingDays) || !is_numeric($presentDays)) {
        $errorMessage = "Working days and present days must be numbers.";

    } elseif ($workingDays <= 0) {
        $errorMessage = "Total working days must be greater than zero.";

    } elseif ($presentDays < 0) {
        $errorMessage = "Days present cannot be negative.";

    } elseif ($presentDays > $workingDays) {
        $errorMessage = "Days present cannot be greater than total working days.";

    } else {

        // Calculate attendance percentage
        $attendancePercentage = calculateAttendancePercentage(
            $presentDays,
            $workingDays
        );

        // Determine eligibility
        $eligibility = checkEligibility($attendancePercentage);

        // Determine CSS class
        $eligibilityClass = getEligibilityClass($attendancePercentage);
    }

} else {

    // If process.php is opened directly
    $errorMessage = "Invalid request. Please submit the attendance form.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance Result</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Attendance Processing System</h1>
        <p>Attendance Calculation Result</p>
    </div>

    <?php if (isset($errorMessage)): ?>

        <div class="result-box error-box">

            <h2>Error</h2>

            <p>
                <?php echo htmlspecialchars($errorMessage); ?>
            </p>

            <a href="index.php" class="back-button">
                Go Back
            </a>

        </div>

    <?php else: ?>

        <div class="result-box">

            <h2>Attendance Result</h2>

            <div class="result-item">
                <span>Student Name</span>
                <strong>
                    <?php echo htmlspecialchars($studentName); ?>
                </strong>
            </div>

            <div class="result-item">
                <span>Register Number</span>
                <strong>
                    <?php echo htmlspecialchars($registerNumber); ?>
                </strong>
            </div>

            <div class="result-item">
                <span>Total Working Days</span>
                <strong>
                    <?php echo htmlspecialchars($workingDays); ?>
                </strong>
            </div>

            <div class="result-item">
                <span>Days Present</span>
                <strong>
                    <?php echo htmlspecialchars($presentDays); ?>
                </strong>
            </div>

            <div class="percentage">
                <?php echo number_format($attendancePercentage, 2); ?>%
            </div>

            <div class="attendance-label">
                Attendance Percentage
            </div>

            <div class="<?php echo $eligibilityClass; ?>">
                <?php echo $eligibility; ?>
            </div>

            <a href="index.php" class="back-button">
                Calculate Again
            </a>

        </div>

    <?php endif; ?>

    <div class="footer">
        <p>CS23C10 - Web Design and Development</p>
    </div>

</div>

</body>
</html>
```
