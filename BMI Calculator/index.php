<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>BMI Calculator</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <!-- Header -->

        <header class="header">

            <div class="bmi-icon">
                ⚖️
            </div>

            <h1>
                BMI Calculator
            </h1>

            <p>
                Calculate your Body Mass Index
            </p>

        </header>


        <!-- Calculator Card -->

        <main class="card">

            <h2>
                Enter Your Details
            </h2>

            <p class="instruction">
                Enter your height and weight to calculate your BMI.
            </p>


            <form
                action="process.php"
                method="POST"
            >

                <!-- Height -->

                <div class="form-group">

                    <label for="height">
                        Height (cm)
                    </label>

                    <input
                        type="number"
                        id="height"
                        name="height"
                        placeholder="Example: 170"
                        min="50"
                        max="250"
                        step="0.1"
                        required
                    >

                    <small>
                        Enter your height in centimetres.
                    </small>

                </div>


                <!-- Weight -->

                <div class="form-group">

                    <label for="weight">
                        Weight (kg)
                    </label>

                    <input
                        type="number"
                        id="weight"
                        name="weight"
                        placeholder="Example: 65"
                        min="10"
                        max="300"
                        step="0.1"
                        required
                    >

                    <small>
                        Enter your weight in kilograms.
                    </small>

                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="calculate-button"
                >
                    Calculate BMI
                </button>

            </form>

        </main>


        <!-- Footer -->

        <footer class="footer">

            <p>
                &copy; 2026 BMI Calculator
            </p>

            <p>
                Developed using PHP, HTML5 and CSS3
            </p>

        </footer>

    </div>

</body>

</html>