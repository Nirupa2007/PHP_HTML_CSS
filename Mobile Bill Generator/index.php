<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mobile Bill Generator</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="container">


        <!-- Header -->

        <header class="header">

            <div class="phone-icon">
                📱
            </div>

            <h1>
                Mobile Bill Generator
            </h1>

            <p>
                Calculate your monthly mobile bill
            </p>

        </header>


        <!-- Main Form -->

        <main class="card">


            <h2>
                Customer Usage Details
            </h2>

            <p class="instruction">
                Enter your customer information and
                monthly usage details.
            </p>


            <form
                action="process.php"
                method="POST"
            >


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


                <!-- Mobile Number -->

                <div class="form-group">

                    <label for="mobile_number">
                        Mobile Number
                    </label>

                    <input
                        type="tel"
                        id="mobile_number"
                        name="mobile_number"
                        placeholder="Enter 10-digit mobile number"
                        pattern="[0-9]{10}"
                        maxlength="10"
                        required
                    >

                </div>


                <!-- Tariff Plan -->

                <div class="form-group">

                    <label for="tariff_plan">
                        Select Tariff Plan
                    </label>

                    <select
                        id="tariff_plan"
                        name="tariff_plan"
                        required
                    >

                        <option value="">
                            -- Select Plan --
                        </option>

                        <option value="basic">
                            Basic - ₹199
                        </option>

                        <option value="standard">
                            Standard - ₹399
                        </option>

                        <option value="premium">
                            Premium - ₹599
                        </option>

                    </select>

                </div>


                <!-- Call Minutes -->

                <div class="form-group">

                    <label for="call_minutes">
                        Call Usage (Minutes)
                    </label>

                    <input
                        type="number"
                        id="call_minutes"
                        name="call_minutes"
                        placeholder="Example: 250"
                        min="0"
                        required
                    >

                </div>


                <!-- Data Usage -->

                <div class="form-group">

                    <label for="data_usage">
                        Data Usage (GB)
                    </label>

                    <input
                        type="number"
                        id="data_usage"
                        name="data_usage"
                        placeholder="Example: 8"
                        min="0"
                        step="0.1"
                        required
                    >

                </div>


                <!-- SMS Count -->

                <div class="form-group">

                    <label for="sms_count">
                        SMS Usage
                    </label>

                    <input
                        type="number"
                        id="sms_count"
                        name="sms_count"
                        placeholder="Example: 100"
                        min="0"
                        required
                    >

                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="calculate-button"
                >
                    Generate Mobile Bill
                </button>


            </form>


        </main>


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