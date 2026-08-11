<?php

// ==========================================
// CHECK REQUEST METHOD
// ==========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// ==========================================
// GET UNITS
// ==========================================

$unitsInput = trim(
    $_POST["units"] ?? ""
);


// ==========================================
// VALIDATION
// ==========================================

$errors = [];


// Check whether units were entered

if ($unitsInput === "") {

    $errors[] =
        "Electricity units are required.";

}


// Check whether the value is numeric

elseif (!is_numeric($unitsInput)) {

    $errors[] =
        "Please enter a valid numeric value.";

}


// Check whether units are not negative

elseif ((float)$unitsInput < 0) {

    $errors[] =
        "Electricity units cannot be negative.";

}


// Check whether units are a whole number

elseif ((float)$unitsInput !=
        (int)$unitsInput) {

    $errors[] =
        "Please enter units as a whole number.";

}


// ==========================================
// BILL CALCULATION FUNCTION
// ==========================================

function calculateElectricityBill($units)
{
    $remainingUnits = $units;

    $totalAmount = 0;

    $firstSlabCharge = 0;

    $secondSlabCharge = 0;

    $thirdSlabCharge = 0;

    $fourthSlabCharge = 0;


    // ======================================
    // FIRST SLAB
    // First 100 units × ₹2
    // ======================================

    if ($remainingUnits > 0) {

        $unitsInSlab =
            min($remainingUnits, 100);

        $firstSlabCharge =
            $unitsInSlab * 2;

        $totalAmount +=
            $firstSlabCharge;

        $remainingUnits -=
            $unitsInSlab;
    }


    // ======================================
    // SECOND SLAB
    // Next 100 units × ₹3
    // ======================================

    if ($remainingUnits > 0) {

        $unitsInSlab =
            min($remainingUnits, 100);

        $secondSlabCharge =
            $unitsInSlab * 3;

        $totalAmount +=
            $secondSlabCharge;

        $remainingUnits -=
            $unitsInSlab;
    }


    // ======================================
    // THIRD SLAB
    // Next 200 units × ₹5
    // ======================================

    if ($remainingUnits > 0) {

        $unitsInSlab =
            min($remainingUnits, 200);

        $thirdSlabCharge =
            $unitsInSlab * 5;

        $totalAmount +=
            $thirdSlabCharge;

        $remainingUnits -=
            $unitsInSlab;
    }


    // ======================================
    // FOURTH SLAB
    // Above 400 units × ₹7
    // ======================================

    if ($remainingUnits > 0) {

        $fourthSlabCharge =
            $remainingUnits * 7;

        $totalAmount +=
            $fourthSlabCharge;
    }


    return [

        "first_charge" =>
            $firstSlabCharge,

        "second_charge" =>
            $secondSlabCharge,

        "third_charge" =>
            $thirdSlabCharge,

        "fourth_charge" =>
            $fourthSlabCharge,

        "total" =>
            $totalAmount

    ];
}


// ==========================================
// CALCULATE BILL
// ==========================================

if (empty($errors)) {

    $units = (int)$unitsInput;

    $billDetails =
        calculateElectricityBill($units);
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

    <title>Electricity Bill Result</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">

    <div class="result-card">


        <?php if (!empty($errors)): ?>


            <!-- ==================================
                 ERROR MESSAGE
                 ================================== -->

            <div class="error-message">

                <div class="error-icon">
                    !
                </div>

                <h1>
                    Calculation Failed
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
                ← Back to Calculator
            </a>


        <?php else: ?>


            <!-- ==================================
                 SUCCESS
                 ================================== -->

            <div class="success-header">

                <div class="success-icon">
                    ✓
                </div>

                <h1>
                    Bill Calculated Successfully
                </h1>

                <p>
                    Your electricity bill has been calculated
                    based on the applicable slab rates.
                </p>

            </div>


            <!-- Units -->

            <div class="units-display">

                <span>
                    Total Units Consumed
                </span>

                <strong>

                    <?php

                    echo $units;

                    ?>

                    Units

                </strong>

            </div>


            <!-- Bill Details -->

            <div class="bill-section">

                <h2>
                    Bill Details
                </h2>


                <div class="bill-row">

                    <div>

                        <strong>
                            First 100 Units
                        </strong>

                        <span>
                            ₹2 × applicable units
                        </span>

                    </div>

                    <strong>

                        ₹<?php

                        echo number_format(
                            $billDetails[
                                "first_charge"
                            ],
                            2
                        );

                        ?>

                    </strong>

                </div>


                <div class="bill-row">

                    <div>

                        <strong>
                            Next 100 Units
                        </strong>

                        <span>
                            ₹3 × applicable units
                        </span>

                    </div>

                    <strong>

                        ₹<?php

                        echo number_format(
                            $billDetails[
                                "second_charge"
                            ],
                            2
                        );

                        ?>

                    </strong>

                </div>


                <div class="bill-row">

                    <div>

                        <strong>
                            Next 200 Units
                        </strong>

                        <span>
                            ₹5 × applicable units
                        </span>

                    </div>

                    <strong>

                        ₹<?php

                        echo number_format(
                            $billDetails[
                                "third_charge"
                            ],
                            2
                        );

                        ?>

                    </strong>

                </div>


                <div class="bill-row">

                    <div>

                        <strong>
                            Above 400 Units
                        </strong>

                        <span>
                            ₹7 × applicable units
                        </span>

                    </div>

                    <strong>

                        ₹<?php

                        echo number_format(
                            $billDetails[
                                "fourth_charge"
                            ],
                            2
                        );

                        ?>

                    </strong>

                </div>


            </div>


            <!-- Total -->

            <div class="total-box">

                <span>
                    Total Electricity Bill
                </span>

                <strong>

                    ₹<?php

                    echo number_format(
                        $billDetails["total"],
                        2
                    );

                    ?>

                </strong>

            </div>


            <!-- Note -->

            <div class="info-box">

                <h3>
                    Calculation Method
                </h3>

                <p>
                    The bill is calculated progressively.
                    The first 100 units are charged at ₹2 per unit,
                    the next 100 units at ₹3 per unit,
                    the next 200 units at ₹5 per unit,
                    and units above 400 at ₹7 per unit.
                </p>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    Calculate Another Bill
                </a>


                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print Bill
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>