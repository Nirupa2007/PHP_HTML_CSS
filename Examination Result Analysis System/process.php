```php
<?php

// Function to calculate total marks
function calculateTotalMarks($marks)
{
    return array_sum($marks);
}


// Function to calculate percentage
function calculatePercentage($totalMarks, $maximumMarks)
{
    return ($totalMarks / $maximumMarks) * 100;
}


// Function to determine class
function determineClass($percentage)
{
    if ($percentage >= 75) {

        return "Distinction";

    } elseif ($percentage >= 60) {

        return "First Class";

    } elseif ($percentage >= 50) {

        return "Second Class";

    } elseif ($percentage >= 40) {

        return "Third Class";

    } else {

        return "Fail";
    }
}


// Function to determine result status
function determineResultStatus($marks)
{
    foreach ($marks as $mark) {

        if ($mark < 40) {

            return "Fail";
        }
    }

    return "Pass";
}


// Function to determine grade
function determineGrade($mark)
{
    if ($mark >= 90) {

        return "A+";

    } elseif ($mark >= 80) {

        return "A";

    } elseif ($mark >= 70) {

        return "B";

    } elseif ($mark >= 60) {

        return "C";

    } elseif ($mark >= 50) {

        return "D";

    } elseif ($mark >= 40) {

        return "E";

    } else {

        return "F";
    }
}


// Check form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get student details

    $studentName =
        trim($_POST["student_name"] ?? "");

    $registerNumber =
        trim($_POST["register_number"] ?? "");


    // Get marks

    $marks = [

        "Programming" =>
            $_POST["subject1"] ?? "",

        "Data Structures" =>
            $_POST["subject2"] ?? "",

        "Database Management" =>
            $_POST["subject3"] ?? "",

        "Computer Networks" =>
            $_POST["subject4"] ?? "",

        "Web Development" =>
            $_POST["subject5"] ?? ""

    ];


    // Validation

    if (
        empty($studentName) ||
        empty($registerNumber)
    ) {

        $errorMessage =
            "Please enter student name and register number.";

    } else {

        foreach ($marks as $subject => $mark) {

            if ($mark === "") {

                $errorMessage =
                    "Please enter marks for all subjects.";

                break;
            }

            if (!is_numeric($mark)) {

                $errorMessage =
                    "Marks must contain valid numbers.";

                break;
            }

            if ($mark < 0 || $mark > 100) {

                $errorMessage =
                    "Each mark must be between 0 and 100.";

                break;
            }
        }
    }


    // If there is no error

    if (!isset($errorMessage)) {

        // Convert marks to numbers

        foreach ($marks as $subject => $mark) {

            $marks[$subject] = (float)$mark;
        }


        // Maximum marks

        $maximumMarks = count($marks) * 100;


        // Calculate total

        $totalMarks =
            calculateTotalMarks($marks);


        // Calculate percentage

        $percentage =
            calculatePercentage(
                $totalMarks,
                $maximumMarks
            );


        // Determine class

        $classObtained =
            determineClass($percentage);


        // Determine result

        $resultStatus =
            determineResultStatus($marks);


        // Determine grades

        $grades = [];

        foreach ($marks as $subject => $mark) {

            $grades[$subject] =
                determineGrade($mark);
        }

    }

} else {

    $errorMessage =
        "Invalid request. Please submit the result form.";

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

    <title>Examination Result</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Examination Result Analysis System</h1>

        <p>Student Result</p>

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

        <!-- Result -->

        <div class="result-box">

            <h2>Examination Result</h2>


            <!-- Student Details -->

            <div class="student-details">

                <div class="detail-item">

                    <span>Student Name</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($studentName);
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>Register Number</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $registerNumber
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <!-- Marks Table -->

            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>Subject</th>

                            <th>Marks</th>

                            <th>Grade</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach (
                            $marks as $subject => $mark
                        ): ?>

                            <tr>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $subject
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo number_format(
                                        $mark,
                                        0
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $grades[$subject]
                                    );
                                    ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- Total -->

            <div class="summary-box">

                <div class="summary-item">

                    <span>Total Marks</span>

                    <strong>
                        <?php
                        echo number_format(
                            $totalMarks,
                            0
                        );
                        ?>
                        / <?php
                        echo $maximumMarks;
                        ?>
                    </strong>

                </div>


                <div class="summary-item">

                    <span>Percentage</span>

                    <strong>
                        <?php
                        echo number_format(
                            $percentage,
                            2
                        );
                        ?>%
                    </strong>

                </div>

            </div>


            <!-- Class -->

            <div class="class-box">

                <p>Class Obtained</p>

                <h3>
                    <?php
                    echo htmlspecialchars(
                        $classObtained
                    );
                    ?>
                </h3>

            </div>


            <!-- Result Status -->

            <?php if ($resultStatus == "Pass"): ?>

                <div class="pass-box">

                    <p>Result</p>

                    <h3>PASS</h3>

                </div>

            <?php else: ?>

                <div class="fail-box">

                    <p>Result</p>

                    <h3>FAIL</h3>

                </div>

            <?php endif; ?>


            <a href="index.php" class="back-button">
                Calculate Another Result
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
