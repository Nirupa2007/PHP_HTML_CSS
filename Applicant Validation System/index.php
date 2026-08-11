<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Applicant Validation System</title>

    <!-- External CSS -->

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- Header -->

    <header class="header">

        <div class="container">

            <h1>
                Applicant Validation System
            </h1>

            <p>
                Validate applicant email, password and mobile number
            </p>

        </div>

    </header>


    <!-- Main Content -->

    <main class="container">

        <div class="form-card">

            <h2>
                Applicant Login Details
            </h2>

            <p class="description">
                Enter your details below for validation.
            </p>


            <form
                action="process.php"
                method="POST"
            >


                <!-- Email -->

                <div class="form-group">

                    <label for="email">
                        Email ID
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="example@gmail.com"
                        required
                    >

                    <small>
                        Example: student@gmail.com
                    </small>

                </div>


                <!-- Password -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                    <small>
                        Minimum 8 characters, including one uppercase,
                        one lowercase and one digit.
                    </small>

                </div>


                <!-- Mobile -->

                <div class="form-group">

                    <label for="mobile">
                        Mobile Number
                    </label>

                    <input
                        type="tel"
                        id="mobile"
                        name="mobile"
                        placeholder="Enter 10-digit mobile number"
                        pattern="[0-9]{10}"
                        required
                    >

                    <small>
                        Enter exactly 10 digits.
                    </small>

                </div>


                <!-- Buttons -->

                <div class="button-group">

                    <button
                        type="submit"
                        class="validate-button"
                    >
                        Validate Details
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

    </main>


    <!-- Footer -->

    <footer class="footer">

        <p>
            &copy; 2026 Applicant Validation System
        </p>

    </footer>


</body>

</html>