<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Sales Calculator</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="container">


        <!-- Header -->

        <header class="header">

            <div class="icon">
                🛒
            </div>

            <h1>
                Sales Calculator
            </h1>

            <p>
                Calculate the total sales value easily
            </p>

        </header>


        <!-- Form -->

        <main class="card">

            <h2>
                Product Details
            </h2>

            <p class="instruction">
                Enter the product quantity and price
                to calculate the total sales value.
            </p>


            <form
                action="process.php"
                method="POST"
            >


                <!-- Product Name -->

                <div class="form-group">

                    <label for="product_name">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        placeholder="Enter product name"
                        required
                    >

                </div>


                <!-- Quantity -->

                <div class="form-group">

                    <label for="quantity">
                        Product Quantity
                    </label>

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        placeholder="Enter quantity"
                        min="1"
                        step="1"
                        required
                    >

                </div>


                <!-- Price -->

                <div class="form-group">

                    <label for="price">
                        Product Price (₹)
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        placeholder="Enter price"
                        min="0.01"
                        step="0.01"
                        required
                    >

                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="calculate-button"
                >
                    Calculate Sales
                </button>


            </form>

        </main>


        <!-- Footer -->

        <footer class="footer">

            <p>
                &copy; 2026 Sales Calculator
            </p>

            <p>
                Developed using PHP, HTML5 and CSS3
            </p>

        </footer>


    </div>


</body>

</html>