```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insurance Premium Calculator</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <!-- Header -->

        <div class="header">

            <h1>Insurance Premium Calculator</h1>

            <p>CS23C10 - Web Design and Development</p>

        </div>


        <!-- Form -->

        <div class="form-box">

            <h2>Enter Policy Details</h2>

            <form action="process.php" method="POST">

                <!-- Age -->

                <div class="form-group">

                    <label for="age">
                        Age
                    </label>

                    <input
                        type="number"
                        id="age"
                        name="age"
                        placeholder="Enter your age"
                        min="18"
                        max="100"
                        required
                    >

                </div>


                <!-- Policy Term -->

                <div class="form-group">

                    <label for="policy_term">
                        Policy Term (Years)
                    </label>

                    <input
                        type="number"
                        id="policy_term"
                        name="policy_term"
                        placeholder="Enter policy term"
                        min="1"
                        max="50"
                        required
                    >

                </div>


                <!-- Coverage Amount -->

                <div class="form-group">

                    <label for="coverage_amount">
                        Coverage Amount (₹)
                    </label>

                    <input
                        type="number"
                        id="coverage_amount"
                        name="coverage_amount"
                        placeholder="Enter coverage amount"
                        min="1000"
                        step="0.01"
                        required
                    >

                </div>


                <!-- Submit -->

                <button type="submit">
                    Calculate Premium
                </button>

            </form>

        </div>


        <!-- Footer -->

        <div class="footer">

            <p>
                Insurance Premium Calculator | PHP, HTML & CSS
            </p>

        </div>

    </div>

</body>

</html>
```
