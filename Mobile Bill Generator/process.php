<?php

/*
    ==========================================
    MOBILE BILL GENERATOR
    ==========================================

    This program:
    - Validates customer details
    - Selects tariff plan
    - Calculates usage charges
    - Calculates tax
    - Generates final bill
*/


/*
    Function to return the monthly plan charge.
*/

function getPlanCharge($tariffPlan)
{
    switch ($tariffPlan) {

        case "basic":
            return 199;

        case "standard":
            return 399;

        case "premium":
            return 599;

        default:
            return 0;
    }
}


/*
    Function to return the name of the plan.
*/

function getPlanName($tariffPlan)
{
    switch ($tariffPlan) {

        case "basic":
            return "Basic";

        case "standard":
            return "Standard";

        case "premium":
            return "Premium";

        default:
            return "Unknown";
    }
}


/*
    Function to calculate additional
    call charges.

    Basic plan:
    First 200 minutes are included.
    Extra minutes = ₹0.50 per minute.

    Standard plan:
    First 500 minutes are included.
    Extra minutes = ₹0.40 per minute.

    Premium plan:
    First 1000 minutes are included.
    Extra minutes = ₹0.25 per minute.
*/

function calculateCallCharge(
    $tariffPlan,
    $callMinutes
) {

    if ($tariffPlan === "basic") {

        $includedMinutes = 200;

        $extraRate = 0.50;

    } elseif ($tariffPlan === "standard") {

        $includedMinutes = 500;

        $extraRate = 0.40;

    } else {

        $includedMinutes = 1000;

        $extraRate = 0.25;
    }


    if ($callMinutes > $includedMinutes) {

        $extraMinutes =
            $callMinutes - $includedMinutes;

        return $extraMinutes * $extraRate;

    }


    return 0;
}


/*
    Function to calculate data charges.

    Basic:
    2 GB included.
    Extra = ₹30 per GB.

    Standard:
    10 GB included.
    Extra = ₹25 per GB.

    Premium:
    25 GB included.
    Extra = ₹20 per GB.
*/

function calculateDataCharge(
    $tariffPlan,
    $dataUsage
) {

    if ($tariffPlan === "basic") {

        $includedData = 2;

        $extraRate = 30;

    } elseif ($tariffPlan === "standard") {

        $includedData = 10;

        $extraRate = 25;

    } else {

        $includedData = 25;

        $extraRate = 20;
    }


    if ($dataUsage > $includedData) {

        $extraData =
            $dataUsage - $includedData;

        return $extraData * $extraRate;

    }


    return 0;
}


/*
    Function to calculate SMS charges.

    First 100 SMS are free.
    Extra SMS = ₹0.50 each.
*/

function calculateSmsCharge($smsCount)
{

    $freeSms = 100;

    $smsRate = 0.50;


    if ($smsCount > $freeSms) {

        $extraSms =
            $smsCount - $freeSms;

        return $extraSms * $smsRate;
    }


    return 0;
}


/*
    Function to calculate GST.

    GST = 18%
*/

function calculateTax($amount)
{
    return $amount * 0.18;
}


/*
    Function to determine bill category.
*/

function getBillCategory($totalAmount)
{
    if ($totalAmount <= 300) {

        return "Low Usage";

    } elseif ($totalAmount <= 700) {

        return "Moderate Usage";

    } else {

        return "High Usage";
    }
}


/*
    Check whether form was submitted using POST.
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


/*
    Get form values.
*/

$customerName =
    trim($_POST["customer_name"] ?? "");

$mobileNumber =
    trim($_POST["mobile_number"] ?? "");

$tariffPlan =
    $_POST["tariff_plan"] ?? "";

$callMinutes =
    $_POST["call_minutes"] ?? "";

$dataUsage =
    $_POST["data_usage"] ?? "";

$smsCount =
    $_POST["sms_count"] ?? "";


/*
    Validation errors.
*/

$errors = [];


/*
    Validate customer name.
*/

if ($customerName === "") {

    $errors[] =
        "Customer name is required.";

} elseif (!preg_match(
    "/^[a-zA-Z ]+$/",
    $customerName
)) {

    $errors[] =
        "Customer name should contain only letters and spaces.";

}


/*
    Validate mobile number.
*/

if ($mobileNumber === "") {

    $errors[] =
        "Mobile number is required.";

} elseif (!preg_match(
    "/^[0-9]{10}$/",
    $mobileNumber
)) {

    $errors[] =
        "Mobile number must contain exactly 10 digits.";

}


/*
    Validate tariff plan.
*/

$validPlans = [
    "basic",
    "standard",
    "premium"
];


if (!in_array(
    $tariffPlan,
    $validPlans
)) {

    $errors[] =
        "Please select a valid tariff plan.";

}


/*
    Validate call minutes.
*/

if (
    $callMinutes === "" ||
    !is_numeric($callMinutes)
) {

    $errors[] =
        "Please enter a valid call usage.";

} elseif ($callMinutes < 0) {

    $errors[] =
        "Call minutes cannot be negative.";

}


/*
    Validate data usage.
*/

if (
    $dataUsage === "" ||
    !is_numeric($dataUsage)
) {

    $errors[] =
        "Please enter a valid data usage.";

} elseif ($dataUsage < 0) {

    $errors[] =
        "Data usage cannot be negative.";

}


/*
    Validate SMS count.
*/

if (
    $smsCount === "" ||
    !is_numeric($smsCount)
) {

    $errors[] =
        "Please enter a valid SMS count.";

} elseif ($smsCount < 0) {

    $errors[] =
        "SMS count cannot be negative.";

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

    <title>Input Error</title>

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
    Convert numeric values.
*/

$callMinutes =
    (float) $callMinutes;

$dataUsage =
    (float) $dataUsage;

$smsCount =
    (int) $smsCount;


/*
    Calculate individual charges.
*/

$planCharge =
    getPlanCharge($tariffPlan);

$callCharge =
    calculateCallCharge(
        $tariffPlan,
        $callMinutes
    );

$dataCharge =
    calculateDataCharge(
        $tariffPlan,
        $dataUsage
    );

$smsCharge =
    calculateSmsCharge(
        $smsCount
    );


/*
    Calculate subtotal.
*/

$subtotal =
    $planCharge +
    $callCharge +
    $dataCharge +
    $smsCharge;


/*
    Calculate GST.
*/

$tax =
    calculateTax($subtotal);


/*
    Calculate final bill.
*/

$totalBill =
    $subtotal + $tax;


/*
    Get plan name.
*/

$planName =
    getPlanName($tariffPlan);


/*
    Determine bill category.
*/

$billCategory =
    getBillCategory($totalBill);

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mobile Bill Summary</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="container">


    <!-- Result Card -->

    <div class="result-card">


        <div class="success-icon">
            ✓
        </div>


        <h1>
            Mobile Bill Generated
        </h1>


        <p class="result-message">
            Your monthly bill has been calculated successfully.
        </p>


        <!-- Customer Information -->

        <div class="customer-details">


            <h2>
                Customer Details
            </h2>


            <div class="detail-row">

                <span>
                    Customer Name
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $customerName
                    );
                    ?>
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    Mobile Number
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $mobileNumber
                    );
                    ?>
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    Tariff Plan
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $planName
                    );
                    ?>
                </strong>

            </div>


        </div>


        <!-- Usage Details -->

        <div class="customer-details">


            <h2>
                Usage Details
            </h2>


            <div class="detail-row">

                <span>
                    Call Usage
                </span>

                <strong>
                    <?php
                    echo number_format(
                        $callMinutes,
                        0
                    );
                    ?>
                    minutes
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    Data Usage
                </span>

                <strong>
                    <?php
                    echo number_format(
                        $dataUsage,
                        1
                    );
                    ?>
                    GB
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    SMS Usage
                </span>

                <strong>
                    <?php
                    echo $smsCount;
                    ?>
                    SMS
                </strong>

            </div>


        </div>


        <!-- Bill Details -->

        <div class="bill-details">


            <h2>
                Bill Summary
            </h2>


            <div class="bill-row">

                <span>
                    Monthly Plan Charge
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $planCharge,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="bill-row">

                <span>
                    Additional Call Charges
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $callCharge,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="bill-row">

                <span>
                    Additional Data Charges
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $dataCharge,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="bill-row">

                <span>
                    Additional SMS Charges
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $smsCharge,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="bill-row">

                <span>
                    Subtotal
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $subtotal,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="bill-row">

                <span>
                    GST (18%)
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $tax,
                        2
                    );
                    ?>
                </strong>

            </div>


            <div class="total-row">

                <span>
                    Total Bill
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $totalBill,
                        2
                    );
                    ?>
                </strong>

            </div>


        </div>


        <!-- Bill Category -->

        <div class="category-box">

            <span>
                Bill Category
            </span>

            <strong>
                <?php
                echo htmlspecialchars(
                    $billCategory
                );
                ?>
            </strong>

        </div>


        <!-- Back Button -->

        <a
            href="index.php"
            class="back-button"
        >
            Generate Another Bill
        </a>


    </div>


    <!-- Footer -->

    <footer class="footer">

        <p>
            &copy; 2026 Mobile Bill Generator
        </p>

        <p>
            Developed using PHP, HTML5 and CSS3
        </p>

    </footer>


</div>


</body>

</html>