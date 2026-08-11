<?php

// Check whether the form was submitted

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// FUNCTIONS
// ==========================================


// Function to calculate total marks

function calculateTotal($marks)
{
    return array_sum($marks);
}


// Function to calculate average marks

function calculateAverage($total, $numberOfSubjects)
{
    return $total / $numberOfSubjects;
}


// Function to determine grade

function determineGrade($average)
{
    if ($average >= 90) {

        return "A+";

    } elseif ($average >= 80) {

        return "A";

    } elseif ($average >= 70) {

        return "B";

    } elseif ($average >= 60) {

        return "C";

    } elseif ($average >= 50) {

        return "D";

    } elseif ($average >= 40) {

        return "E";

    } else {

        return "F";
    }
}


// Function to determine pass/fail

function determineResult($marks)
{
    foreach ($marks as $mark) {

        if ($mark < 40) {

            return "Fail";
        }
    }

    return "Pass";
}


// ==========================================
// GET FORM DATA
// ==========================================

$studentName = trim(
    $_POST["student_name"] ?? ""
);

$registerNumber = trim(
    $_POST["register_number"] ?? ""
);


// Store marks in an array

$marks = [

    "HTML" => $_POST["html"] ?? "",

    "CSS" => $_POST["css"] ?? "",

    "PHP" => $_POST["php"] ?? "",

    "Database" => $_POST["database"] ?? "",

    "Web Design" => $_POST["web_design"] ?? ""

];


// ==========================================
// VALIDATION
// ==========================================

$errors = [];


// Validate student name

if (empty($studentName)) {

    $errors[] = "Student name is required.";

}


// Validate register number

if (empty($registerNumber)) {

    $errors[] = "Register number is required.";

}


// Validate marks

foreach ($marks as $subject => $mark) {

    if ($mark === "") {

        $errors[] =
            $subject . " mark is required.";

    } elseif (!is_numeric($mark)) {

        $errors[] =
            $subject . " mark must be a number.";

    } elseif ($mark < 0 || $mark > 100) {

        $errors[] =
            $subject .
            " mark must be between 0 and 100.";
    }
}


// ==========================================
// CALCULATE RESULT
// ==========================================

if (empty($errors)) {


    // Convert marks to numbers

    foreach ($marks as $subject => $mark) {

        $marks[$subject] = (float)$mark;
    }


    // Calculate total

    $total = calculateTotal($marks);


    // Number of subjects

    $numberOfSubjects = count($marks);


    // Calculate average

    $average = calculateAverage(
        $total,
        $numberOfSubjects
    );


    // Determine grade

    $grade = determineGrade($average);


    // Determine result

    $result = determineResult($marks);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>

            <!-- Error Message -->

            <div class="error">

                <h2>Invalid Input</h2>

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
                Back to Form
            </a>


        <?php else: ?>


            <!-- Result Heading -->

            <div class="result-heading">

                <h1>
                    Student Result
                </h1>

                <p>
                    Result Processing Report
                </p>

            </div>


            <!-- Student Details -->

            <div class="student-info">

                <p>
                    <strong>Student Name:</strong>

                    <?php
                    echo htmlspecialchars($studentName);
                    ?>
                </p>


                <p>
                    <strong>Register Number:</strong>

                    <?php
                    echo htmlspecialchars($registerNumber);
                    ?>
                </p>

            </div>


            <!-- Marks Table -->

            <table>

                <thead>

                    <tr>

                        <th>
                            S.No
                        </th>

                        <th>
                            Subject
                        </th>

                        <th>
                            Marks
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php

                    $serialNumber = 1;

                    foreach ($marks as $subject => $mark):

                    ?>

                        <tr>

                            <td>
                                <?php
                                echo $serialNumber++;
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($subject);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo $mark;
                                ?>
                            </td>

                            <td>

                                <?php if ($mark >= 40): ?>

                                    <span class="pass">
                                        Pass
                                    </span>

                                <?php else: ?>

                                    <span class="fail">
                                        Fail
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>


            <!-- Result Summary -->

            <div class="summary">

                <div class="summary-box">

                    <span>
                        Total Marks
                    </span>

                    <strong>
                        <?php
                        echo $total;
                        ?>
                        / 500
                    </strong>

                </div>


                <div class="summary-box">

                    <span>
                        Average
                    </span>

                    <strong>
                        <?php
                        echo number_format(
                            $average,
                            2
                        );
                        ?>%
                    </strong>

                </div>


                <div class="summary-box">

                    <span>
                        Grade
                    </span>

                    <strong class="grade">
                        <?php
                        echo $grade;
                        ?>
                    </strong>

                </div>


                <div class="summary-box">

                    <span>
                        Result
                    </span>

                    <strong
                        class="<?php
                        echo strtolower($result);
                        ?>"
                    >
                        <?php
                        echo $result;
                        ?>
                    </strong>

                </div>

            </div>


            <!-- Buttons -->

            <div class="buttons">

                <a
                    href="index.php"
                    class="back-button"
                >
                    Process Another Result
                </a>

                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print Result
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>

</body>

</html>