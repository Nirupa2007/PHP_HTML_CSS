<?php

// Check whether the form was submitted using POST

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit();

}


// Get customer details

$customerName = trim($_POST["customer_name"] ?? "");

$phone = trim($_POST["phone"] ?? "");


// Get product arrays

$productNames = $_POST["product_name"] ?? [];

$quantities = $_POST["quantity"] ?? [];

$prices = $_POST["price"] ?? [];


// Get discount and tax

$discountRate = (float) ($_POST["discount"] ?? 0);

$taxRate = (float) ($_POST["tax"] ?? 0);


// Store validation errors

$errors = [];


// Validate customer name

if (empty($customerName)) {

    $errors[] = "Customer name is required.";

} elseif (!preg_match("/^[a-zA-Z ]+$/", $customerName)) {

    $errors[] =
        "Customer name should contain only letters and spaces.";

}


// Validate phone

if (empty($phone)) {

    $errors[] = "Phone number is required.";

} elseif (!preg_match("/^[0-9]{10}$/", $phone)) {

    $errors[] =
        "Phone number must contain exactly 10 digits.";

}


// Validate discount

if ($discountRate < 0 || $discountRate > 100) {

    $errors[] =
        "Discount percentage must be between 0 and 100.";

}


// Validate tax

if ($taxRate < 0 || $taxRate > 100) {

    $errors[] =
        "Tax percentage must be between 0 and 100.";

}


// Store valid products

$products = [];


// Calculate subtotal

$subtotal = 0;


// Loop through products

for ($i = 0; $i < count($productNames); $i++) {

    $productName = trim($productNames[$i] ?? "");

    $quantity = trim($quantities[$i] ?? "");

    $price = trim($prices[$i] ?? "");


    // Skip completely empty optional product rows

    if (
        empty($productName) &&
        empty($quantity) &&
        empty($price)
    ) {

        continue;

    }


    // Validate product name

    if (empty($productName)) {

        $errors[] =
            "Product name is required for product " . ($i + 1) . ".";

        continue;

    }


    // Validate quantity

    if (
        $quantity === "" ||
        !is_numeric($quantity) ||
        $quantity <= 0
    ) {

        $errors[] =
            "Quantity must be greater than zero for product "
            . ($i + 1) . ".";

        continue;

    }


    // Validate price

    if (
        $price === "" ||
        !is_numeric($price) ||
        $price <= 0
    ) {

        $errors[] =
            "Price must be greater than zero for product "
            . ($i + 1) . ".";

        continue;

    }


    // Convert values

    $quantity = (int) $quantity;

    $price = (float) $price;


    // Calculate product total

    $productTotal = $quantity * $price;


    // Add product to array

    $products[] = [

        "name" => $productName,

        "quantity" => $quantity,

        "price" => $price,

        "total" => $productTotal

    ];


    // Add to subtotal

    $subtotal += $productTotal;

}


// Check if at least one product exists

if (empty($products)) {

    $errors[] =
        "Please enter at least one product.";

}


// Calculate billing amounts only if there are no errors

if (empty($errors)) {


    // Calculate discount

    $discountAmount =
        ($subtotal * $discountRate) / 100;


    // Amount after discount

    $amountAfterDiscount =
        $subtotal - $discountAmount;


    // Calculate tax

    $taxAmount =
        ($amountAfterDiscount * $taxRate) / 100;


    // Calculate grand total

    $grandTotal =
        $amountAfterDiscount + $taxAmount;


    // Generate invoice number

    $invoiceNumber =
        "INV" . date("Ymd") . rand(1000, 9999);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Customer Invoice</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page-container">


    <div class="invoice-box">


        <?php if (!empty($errors)): ?>


            <!-- Error Message -->

            <div class="error-message">

                <h2>
                    ⚠ Billing Error
                </h2>

                <p>
                    Please correct the following errors:
                </p>

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
                ← Back to Billing Form
            </a>


        <?php else: ?>


            <!-- Invoice Header -->

            <div class="invoice-header">

                <h1>
                    FreshMart Supermarket
                </h1>

                <p>
                    Customer Invoice
                </p>

                <div class="invoice-info">

                    <span>
                        Invoice No:
                        <strong>
                            <?php
                            echo htmlspecialchars(
                                $invoiceNumber
                            );
                            ?>
                        </strong>
                    </span>

                    <span>
                        Date:
                        <strong>
                            <?php
                            echo date("d-m-Y");
                            ?>
                        </strong>
                    </span>

                </div>

            </div>


            <!-- Customer Information -->

            <div class="customer-info">

                <h2>
                    Customer Details
                </h2>

                <p>
                    <strong>Name:</strong>
                    <?php
                    echo htmlspecialchars($customerName);
                    ?>
                </p>

                <p>
                    <strong>Phone:</strong>
                    <?php
                    echo htmlspecialchars($phone);
                    ?>
                </p>

            </div>


            <!-- Product Table -->

            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>
                                S.No
                            </th>

                            <th>
                                Product
                            </th>

                            <th>
                                Quantity
                            </th>

                            <th>
                                Unit Price
                            </th>

                            <th>
                                Total
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        $serialNumber = 1;

                        foreach ($products as $product):

                        ?>

                            <tr>

                                <td>
                                    <?php
                                    echo $serialNumber++;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $product["name"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $product["quantity"];
                                    ?>
                                </td>

                                <td>
                                    ₹<?php
                                    echo number_format(
                                        $product["price"],
                                        2
                                    );
                                    ?>
                                </td>

                                <td>
                                    ₹<?php
                                    echo number_format(
                                        $product["total"],
                                        2
                                    );
                                    ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- Bill Summary -->

            <div class="bill-summary">

                <div class="summary-row">

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


                <div class="summary-row discount-row">

                    <span>
                        Discount
                        (<?php
                        echo $discountRate;
                        ?>%)
                    </span>

                    <strong>
                        - ₹<?php
                        echo number_format(
                            $discountAmount,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Amount After Discount
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $amountAfterDiscount,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <div class="summary-row tax-row">

                    <span>
                        Tax
                        (<?php
                        echo $taxRate;
                        ?>%)
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $taxAmount,
                            2
                        );
                        ?>
                    </strong>

                </div>


                <div class="grand-total">

                    <span>
                        Grand Total
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $grandTotal,
                            2
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <!-- Thank You -->

            <div class="thank-you">

                <h3>
                    Thank You for Shopping!
                </h3>

                <p>
                    Please keep this invoice for your records.
                </p>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <a
                    href="index.php"
                    class="back-button"
                >
                    ← New Bill
                </a>

                <button
                    onclick="window.print()"
                    class="print-button"
                >
                    Print Invoice
                </button>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>