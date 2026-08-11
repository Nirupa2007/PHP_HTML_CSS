<?php

/*
    ==========================================
    SECURE PASSWORD GENERATOR
    ==========================================

    This program:
    - Accepts password length
    - Includes uppercase letters
    - Includes lowercase letters
    - Includes digits
    - Includes special characters
    - Uses PHP string functions
    - Generates a random password
*/


/*
    Function to generate a secure password.
*/

function generateSecurePassword(
    $passwordLength,
    $includeUppercase,
    $includeLowercase,
    $includeDigits,
    $includeSpecial
) {

    /*
        Character sets.
    */

    $uppercaseLetters =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $lowercaseLetters =
        "abcdefghijklmnopqrstuvwxyz";

    $digits =
        "0123456789";

    $specialCharacters =
        "!@#$%^&*";


    /*
        Store selected character sets.
    */

    $characterPool = "";

    $requiredCharacters = [];


    /*
        Add uppercase characters.
    */

    if ($includeUppercase) {

        $characterPool .=
            $uppercaseLetters;

        $requiredCharacters[] =
            $uppercaseLetters[
                random_int(
                    0,
                    strlen($uppercaseLetters) - 1
                )
            ];
    }


    /*
        Add lowercase characters.
    */

    if ($includeLowercase) {

        $characterPool .=
            $lowercaseLetters;

        $requiredCharacters[] =
            $lowercaseLetters[
                random_int(
                    0,
                    strlen($lowercaseLetters) - 1
                )
            ];
    }


    /*
        Add digits.
    */

    if ($includeDigits) {

        $characterPool .=
            $digits;

        $requiredCharacters[] =
            $digits[
                random_int(
                    0,
                    strlen($digits) - 1
                )
            ];
    }


    /*
        Add special characters.
    */

    if ($includeSpecial) {

        $characterPool .=
            $specialCharacters;

        $requiredCharacters[] =
            $specialCharacters[
                random_int(
                    0,
                    strlen($specialCharacters) - 1
                )
            ];
    }


    /*
        Number of required characters.
    */

    $requiredCount =
        count($requiredCharacters);


    /*
        Generate remaining characters.
    */

    $remainingLength =
        $passwordLength - $requiredCount;


    $password = "";


    for (
        $i = 0;
        $i < $remainingLength;
        $i++
    ) {

        $randomIndex =
            random_int(
                0,
                strlen($characterPool) - 1
            );

        $password .=
            $characterPool[$randomIndex];
    }


    /*
        Add one character from every selected
        character type.
    */

    $password .=
        implode(
            "",
            $requiredCharacters
        );


    /*
        Convert password into an array.
    */

    $passwordCharacters =
        str_split($password);


    /*
        Shuffle the password characters using
        a cryptographically secure random index.
    */

    for (
        $i = count($passwordCharacters) - 1;
        $i > 0;
        $i--
    ) {

        $randomIndex =
            random_int(
                0,
                $i
            );


        $temporaryCharacter =
            $passwordCharacters[$i];

        $passwordCharacters[$i] =
            $passwordCharacters[$randomIndex];

        $passwordCharacters[$randomIndex] =
            $temporaryCharacter;
    }


    /*
        Convert the array back to a string.
    */

    return implode(
        "",
        $passwordCharacters
    );
}


/*
    Check whether the form was submitted.
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


/*
    Get password length.
*/

$passwordLength =
    $_POST["password_length"] ?? "";


/*
    Get character options.

    Checkbox values are checked using isset().
*/

$includeUppercase =
    isset($_POST["include_uppercase"]);

$includeLowercase =
    isset($_POST["include_lowercase"]);

$includeDigits =
    isset($_POST["include_digits"]);

$includeSpecial =
    isset($_POST["include_special"]);


/*
    Validation errors.
*/

$errors = [];


/*
    Validate password length.
*/

if (
    $passwordLength === "" ||
    !is_numeric($passwordLength)
) {

    $errors[] =
        "Password length is required.";

} else {

    $passwordLength =
        (int) $passwordLength;


    if ($passwordLength < 8) {

        $errors[] =
            "Password length must be at least 8 characters.";

    }


    if ($passwordLength > 32) {

        $errors[] =
            "Password length must not exceed 32 characters.";

    }

}


/*
    Check whether at least one character
    type has been selected.
*/

if (
    !$includeUppercase &&
    !$includeLowercase &&
    !$includeDigits &&
    !$includeSpecial
) {

    $errors[] =
        "Select at least one character type.";

}


/*
    Count selected character types.
*/

$selectedCharacterTypes = 0;


if ($includeUppercase) {

    $selectedCharacterTypes++;

}

if ($includeLowercase) {

    $selectedCharacterTypes++;

}

if ($includeDigits) {

    $selectedCharacterTypes++;

}

if ($includeSpecial) {

    $selectedCharacterTypes++;

}


/*
    Make sure the password length is enough
    to contain one character from every
    selected character type.
*/

if (
    empty($errors) &&
    $passwordLength < $selectedCharacterTypes
) {

    $errors[] =
        "Password length is too short for the selected character types.";

}


/*
    Display errors.
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

    <title>Password Generator - Error</title>

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
    Generate the password.
*/

$generatedPassword =
    generateSecurePassword(
        $passwordLength,
        $includeUppercase,
        $includeLowercase,
        $includeDigits,
        $includeSpecial
    );


/*
    Determine password strength.
*/

$passwordStrength = "Strong";

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Generated Password</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="container">


    <div class="result-card">


        <div class="success-icon">
            ✓
        </div>


        <h1>
            Password Generated
        </h1>


        <p class="result-message">
            Your secure password has been generated successfully.
        </p>


        <!-- Password Display -->

        <div class="password-box">

            <span>
                Generated Password
            </span>


            <div class="password">

                <?php
                echo htmlspecialchars(
                    $generatedPassword
                );
                ?>

            </div>

        </div>


        <!-- Password Information -->

        <div class="password-info">


            <div class="info-row">

                <span>
                    Password Length
                </span>

                <strong>
                    <?php
                    echo $passwordLength;
                    ?>
                    characters
                </strong>

            </div>


            <div class="info-row">

                <span>
                    Uppercase Letters
                </span>

                <strong>

                    <?php

                    echo $includeUppercase
                        ? "Included"
                        : "Not Included";

                    ?>

                </strong>

            </div>


            <div class="info-row">

                <span>
                    Lowercase Letters
                </span>

                <strong>

                    <?php

                    echo $includeLowercase
                        ? "Included"
                        : "Not Included";

                    ?>

                </strong>

            </div>


            <div class="info-row">

                <span>
                    Digits
                </span>

                <strong>

                    <?php

                    echo $includeDigits
                        ? "Included"
                        : "Not Included";

                    ?>

                </strong>

            </div>


            <div class="info-row">

                <span>
                    Special Characters
                </span>

                <strong>

                    <?php

                    echo $includeSpecial
                        ? "Included"
                        : "Not Included";

                    ?>

                </strong>

            </div>


        </div>


        <!-- Security Message -->

        <div class="security-message">

            🔒
            Store your password securely and never
            share it with anyone.

        </div>


        <!-- Back Button -->

        <a
            href="index.php"
            class="back-button"
        >
            Generate Another Password
        </a>


    </div>


    <!-- Footer -->

    <footer class="footer">

        <p>
            &copy; 2026 Secure Password Generator
        </p>

        <p>
            Developed using PHP, HTML5 and CSS3
        </p>

    </footer>


</div>


</body>

</html>