<?php

// ==========================================
// CHECK REQUEST METHOD
// ==========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// GET TITLE
// ==========================================

$title = trim(
    $_POST["title"] ?? ""
);


// ==========================================
// VALIDATION
// ==========================================

$errors = [];

if (empty($title)) {

    $errors[] =
        "Title is required.";

}


// ==========================================
// STRING ANALYSIS FUNCTION
// ==========================================

function analyzeString($text)
{
    $vowelCount = 0;

    $consonantCount = 0;

    $digitCount = 0;

    $specialCharacterCount = 0;


    // Convert the string to lowercase

    $lowercaseText = strtolower($text);


    // Get the length of the string

    $stringLength = strlen($lowercaseText);


    // Loop through every character

    for ($index = 0; $index < $stringLength; $index++) {

        $character = $lowercaseText[$index];


        // Check whether the character is a vowel

        if (
            $character === "a" ||
            $character === "e" ||
            $character === "i" ||
            $character === "o" ||
            $character === "u"
        ) {

            $vowelCount++;

        }


        // Check whether the character is a digit

        elseif (ctype_digit($character)) {

            $digitCount++;

        }


        // Check whether the character is an alphabet

        elseif (ctype_alpha($character)) {

            $consonantCount++;

        }


        // Check for special characters

        elseif (!ctype_space($character)) {

            $specialCharacterCount++;

        }

    }


    return [

        "vowels" => $vowelCount,

        "consonants" => $consonantCount,

        "digits" => $digitCount,

        "special_characters" =>
            $specialCharacterCount

    ];

}


// ==========================================
// ANALYZE STRING IF VALID
// ==========================================

if (empty($errors)) {

    $analysisResult =
        analyzeString($title);

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

    <title>String Analysis Result</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>


            <!-- ERROR MESSAGE -->

            <div class="error-message">

                <div class="error-icon">
                    !
                </div>

                <h1>
                    Analysis Failed
                </h1>

                <p>
                    Please correct the following error:
                </p>


                <ul>

                    <?php foreach ($errors as $error): ?>

                        <li>

                            <?php

                            echo htmlspecialchars(
                                $error
                            );

                            ?>

                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>


            <a
                href="index.php"
                class="back-button"
            >
                ← Back to Analysis
            </a>


        <?php else: ?>


            <!-- SUCCESS MESSAGE -->

            <div class="success-header">

                <div class="success-icon">
                    ✓
                </div>

                <h1>
                    String Analysis Completed
                </h1>

                <p>
                    The entered title has been analyzed successfully.
                </p>

            </div>


            <!-- Input String -->

            <div class="input-display">

                <span>
                    Entered Title
                </span>

                <strong>

                    <?php

                    echo htmlspecialchars(
                        $title
                    );

                    ?>

                </strong>

            </div>


            <!-- Results -->

            <div class="results-section">

                <h2>
                    Analysis Result
                </h2>


                <div class="result-grid">


                    <!-- Vowels -->

                    <div class="result-box">

                        <div class="result-icon">
                            A
                        </div>

                        <h3>
                            Vowels
                        </h3>

                        <p>

                            <?php

                            echo $analysisResult[
                                "vowels"
                            ];

                            ?>

                        </p>

                    </div>


                    <!-- Consonants -->

                    <div class="result-box">

                        <div class="result-icon">
                            B
                        </div>

                        <h3>
                            Consonants
                        </h3>

                        <p>

                            <?php

                            echo $analysisResult[
                                "consonants"
                            ];

                            ?>

                        </p>

                    </div>


                    <!-- Digits -->

                    <div class="result-box">

                        <div class="result-icon">
                            1
                        </div>

                        <h3>
                            Digits
                        </h3>

                        <p>

                            <?php

                            echo $analysisResult[
                                "digits"
                            ];

                            ?>

                        </p>

                    </div>


                    <!-- Special Characters -->

                    <div class="result-box">

                        <div class="result-icon">
                            #
                        </div>

                        <h3>
                            Special Characters
                        </h3>

                        <p>

                            <?php

                            echo $analysisResult[
                                "special_characters"
                            ];

                            ?>

                        </p>

                    </div>


                </div>

            </div>


            <!-- Explanation -->

            <div class="info-box">

                <h3>
                    Analysis Details
                </h3>

                <p>
                    Vowels include A, E, I, O and U.
                    Alphabetic characters that are not vowels
                    are counted as consonants.
                    Numeric characters are counted as digits.
                    Symbols and punctuation marks are counted
                    as special characters. Spaces are not included
                    in the special-character count.
                </p>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    Analyze Another String
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