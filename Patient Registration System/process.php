<?php

// Check whether the form was submitted using POST

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// GET FORM DATA
// ==========================================

$patientName = trim(
    $_POST["patient_name"] ?? ""
);

$dateOfBirth = trim(
    $_POST["date_of_birth"] ?? ""
);

$gender = trim(
    $_POST["gender"] ?? ""
);

$phone = trim(
    $_POST["phone"] ?? ""
);

$email = trim(
    $_POST["email"] ?? ""
);

$bloodGroup = trim(
    $_POST["blood_group"] ?? ""
);

$department = trim(
    $_POST["department"] ?? ""
);

$address = trim(
    $_POST["address"] ?? ""
);

$emergencyContact = trim(
    $_POST["emergency_contact"] ?? ""
);


// ==========================================
// VALIDATION
// ==========================================

$errors = [];


// Validate patient name

if (empty($patientName)) {

    $errors[] =
        "Patient name is required.";

} elseif (!preg_match(
    "/^[a-zA-Z ]+$/",
    $patientName
)) {

    $errors[] =
        "Patient name should contain only letters and spaces.";
}


// Validate date of birth

if (empty($dateOfBirth)) {

    $errors[] =
        "Date of birth is required.";

}


// Validate gender

$allowedGenders = [
    "Male",
    "Female",
    "Other"
];

if (
    empty($gender) ||
    !in_array($gender, $allowedGenders)
) {

    $errors[] =
        "Please select a valid gender.";
}


// Validate phone

if (empty($phone)) {

    $errors[] =
        "Phone number is required.";

} elseif (!preg_match(
    "/^[0-9]{10}$/",
    $phone
)) {

    $errors[] =
        "Phone number must contain exactly 10 digits.";
}


// Validate email

if (empty($email)) {

    $errors[] =
        "Email address is required.";

} elseif (!filter_var(
    $email,
    FILTER_VALIDATE_EMAIL
)) {

    $errors[] =
        "Please enter a valid email address.";
}


// Validate blood group

$allowedBloodGroups = [

    "A+",
    "A-",
    "B+",
    "B-",
    "AB+",
    "AB-",
    "O+",
    "O-"

];

if (
    empty($bloodGroup) ||
    !in_array($bloodGroup, $allowedBloodGroups)
) {

    $errors[] =
        "Please select a valid blood group.";
}


// Validate department

$allowedDepartments = [

    "General Medicine",
    "Cardiology",
    "Dermatology",
    "Orthopedics",
    "Pediatrics"

];

if (
    empty($department) ||
    !in_array($department, $allowedDepartments)
) {

    $errors[] =
        "Please select a valid department.";
}


// Validate address

if (empty($address)) {

    $errors[] =
        "Address is required.";

}


// Validate emergency contact

if (empty($emergencyContact)) {

    $errors[] =
        "Emergency contact number is required.";

} elseif (!preg_match(
    "/^[0-9]{10}$/",
    $emergencyContact
)) {

    $errors[] =
        "Emergency contact must contain exactly 10 digits.";
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

    <title>Patient Registration Confirmation</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>


            <!-- ERROR -->

            <div class="error-message">

                <div class="error-icon">
                    !
                </div>

                <h1>
                    Registration Failed
                </h1>

                <p>
                    Please correct the following errors:
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
                ← Back to Registration
            </a>


        <?php else: ?>


            <!-- SUCCESS -->

            <div class="success-header">

                <div class="success-icon">
                    ✓
                </div>

                <h1>
                    Registration Successful
                </h1>

                <p>
                    Patient details have been successfully registered.
                </p>

            </div>


            <!-- Confirmation Number -->

            <div class="confirmation-box">

                <span>
                    Registration Status
                </span>

                <strong>
                    CONFIRMED
                </strong>

            </div>


            <!-- Patient Details -->

            <div class="details-section">

                <h2>
                    Patient Confirmation Report
                </h2>


                <div class="detail-row">

                    <span>
                        Patient Name
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $patientName
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Date of Birth
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $dateOfBirth
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Gender
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $gender
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Phone Number
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $phone
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Email Address
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $email
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Blood Group
                    </span>

                    <strong class="blood-group">

                        <?php

                        echo htmlspecialchars(
                            $bloodGroup
                        );

                        ?>

                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Department
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $department
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Emergency Contact
                    </span>

                    <strong>
                        <?php

                        echo htmlspecialchars(
                            $emergencyContact
                        );

                        ?>
                    </strong>

                </div>


                <div class="detail-row address-row">

                    <span>
                        Address
                    </span>

                    <strong>
                        <?php

                        echo nl2br(
                            htmlspecialchars(
                                $address
                            )
                        );

                        ?>
                    </strong>

                </div>

            </div>


            <!-- Message -->

            <div class="info-box">

                <h3>
                    Registration Confirmed
                </h3>

                <p>
                    Your patient registration details have been
                    received successfully. Please keep this
                    confirmation report for your records.
                </p>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    Register Another Patient
                </a>


                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print Report
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>