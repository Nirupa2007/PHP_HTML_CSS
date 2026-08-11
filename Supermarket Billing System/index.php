<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Supermarket Billing System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


<!-- Header -->

<header class="header">

    <div class="container">

        <h1>Supermarket Billing System</h1>

        <p>
            Enter customer and product details to generate an invoice.
        </p>

    </div>

</header>


<!-- Navigation -->

<nav class="navbar">

    <div class="container nav-container">

        <div class="logo">
            FreshMart Supermarket
        </div>

        <div>
            Billing System
        </div>

    </div>

</nav>


<!-- Main Content -->

<main class="container">

    <div class="form-box">

        <h2>Customer Billing Form</h2>

        <p class="description">
            Enter the details below to calculate the bill.
        </p>


        <form action="process.php" method="POST">


            <!-- Customer Name -->

            <div class="form-group">

                <label for="customer_name">
                    Customer Name
                </label>

                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    placeholder="Enter customer name"
                    required
                >

            </div>


            <!-- Phone Number -->

            <div class="form-group">

                <label for="phone">
                    Phone Number
                </label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Enter 10-digit phone number"
                    pattern="[0-9]{10}"
                    maxlength="10"
                    required
                >

            </div>


            <!-- Product 1 -->

            <div class="product-box">

                <h3>Product 1</h3>

                <div class="product-grid">

                    <div>

                        <label for="product_name_1">
                            Product Name
                        </label>

                        <input
                            type="text"
                            id="product_name_1"
                            name="product_name[]"
                            placeholder="Example: Rice"
                            required
                        >

                    </div>


                    <div>

                        <label for="quantity_1">
                            Quantity
                        </label>

                        <input
                            type="number"
                            id="quantity_1"
                            name="quantity[]"
                            min="1"
                            required
                        >

                    </div>


                    <div>

                        <label for="price_1">
                            Price per Unit (₹)
                        </label>

                        <input
                            type="number"
                            id="price_1"
                            name="price[]"
                            min="0.01"
                            step="0.01"
                            placeholder="0.00"
                            required
                        >

                    </div>

                </div>

            </div>


            <!-- Product 2 -->

            <div class="product-box">

                <h3>Product 2</h3>

                <div class="product-grid">

                    <div>

                        <label for="product_name_2">
                            Product Name
                        </label>

                        <input
                            type="text"
                            id="product_name_2"
                            name="product_name[]"
                            placeholder="Example: Milk"
                        >

                    </div>


                    <div>

                        <label for="quantity_2">
                            Quantity
                        </label>

                        <input
                            type="number"
                            id="quantity_2"
                            name="quantity[]"
                            min="1"
                        >

                    </div>


                    <div>

                        <label for="price_2">
                            Price per Unit (₹)
                        </label>

                        <input
                            type="number"
                            id="price_2"
                            name="price[]"
                            min="0.01"
                            step="0.01"
                            placeholder="0.00"
                        >

                    </div>

                </div>

            </div>


            <!-- Product 3 -->

            <div class="product-box">

                <h3>Product 3</h3>

                <div class="product-grid">

                    <div>

                        <label for="product_name_3">
                            Product Name
                        </label>

                        <input
                            type="text"
                            id="product_name_3"
                            name="product_name[]"
                            placeholder="Example: Sugar"
                        >

                    </div>


                    <div>

                        <label for="quantity_3">
                            Quantity
                        </label>

                        <input
                            type="number"
                            id="quantity_3"
                            name="quantity[]"
                            min="1"
                        >

                    </div>


                    <div>

                        <label for="price_3">
                            Price per Unit (₹)
                        </label>

                        <input
                            type="number"
                            id="price_3"
                            name="price[]"
                            min="0.01"
                            step="0.01"
                            placeholder="0.00"
                        >

                    </div>

                </div>

            </div>


            <!-- Discount -->

            <div class="form-group">

                <label for="discount">
                    Discount Percentage
                </label>

                <input
                    type="number"
                    id="discount"
                    name="discount"
                    min="0"
                    max="100"
                    step="0.01"
                    value="10"
                    required
                >

                <small>
                    Enter a value between 0 and 100.
                </small>

            </div>


            <!-- Tax -->

            <div class="form-group">

                <label for="tax">
                    Tax Percentage
                </label>

                <input
                    type="number"
                    id="tax"
                    name="tax"
                    min="0"
                    max="100"
                    step="0.01"
                    value="5"
                    required
                >

                <small>
                    Enter a value between 0 and 100.
                </small>

            </div>


            <!-- Buttons -->

            <div class="button-group">

                <button
                    type="submit"
                    class="submit-button"
                >
                    Generate Invoice
                </button>


                <button
                    type="reset"
                    class="reset-button"
                >
                    Clear Form
                </button>

            </div>

        </form>

    </div>

</main>


<!-- Footer -->

<footer class="footer">

    <p>
        &copy; 2026 FreshMart Supermarket
    </p>

</footer>


</body>

</html>