<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Electricity Bill Calculator</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- Header -->

    <header class="header">

        <div class="container">

            <h1>
                Electricity Bill Calculator
            </h1>

            <p>
                Calculate your electricity bill based on units consumed
            </p>

        </div>

    </header>


    <!-- Main -->

    <main class="container">

        <div class="form-card">

            <h2>
                Electricity Bill
            </h2>

            <p class="description">
                Enter the number of electricity units consumed
                to calculate the total bill.
            </p>


            <form
                action="process.php"
                method="POST"
            >

                <div class="form-group">

                    <label for="units">
                        Electricity Units Consumed
                    </label>

                    <input
                        type="number"
                        id="units"
                        name="units"
                        min="0"
                        step="1"
                        placeholder="Enter units consumed"
                        required
                    >

                    <small>
                        Enter a value greater than or equal to 0.
                    </small>

                </div>


                <div class="button-group">

                    <button
                        type="submit"
                        class="calculate-button"
                    >
                        Calculate Bill
                    </button>


                    <button
                        type="reset"
                        class="reset-button"
                    >
                        Clear
                    </button>

                </div>

            </form>

        </div>


        <!-- Slab Information -->

        <div class="slab-card">

            <h2>
                Electricity Slab Rates
            </h2>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Units
                            </th>

                            <th>
                                Rate per Unit
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                First 100 units
                            </td>

                            <td>
                                ₹2.00
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Next 100 units (101–200)
                            </td>

                            <td>
                                ₹3.00
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Next 200 units (201–400)
                            </td>

                            <td>
                                ₹5.00
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Above 400 units
                            </td>

                            <td>
                                ₹7.00
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </main>


    <!-- Footer -->

    <footer class="footer">

        <p>
            &copy; 2026 Electricity Bill Calculator
        </p>

    </footer>


</body>

</html>