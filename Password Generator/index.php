<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Password Generator</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="container">


        <!-- Header -->

        <header class="header">

            <div class="lock-icon">
                🔐
            </div>

            <h1>
                Secure Password Generator
            </h1>

            <p>
                Generate a strong password using
                different character types.
            </p>

        </header>


        <!-- Main Card -->

        <main class="card">


            <h2>
                Password Settings
            </h2>

            <p class="instruction">
                Select the password length and generate
                a secure password.
            </p>


            <form
                action="generate.php"
                method="POST"
            >


                <!-- Password Length -->

                <div class="form-group">

                    <label for="password_length">
                        Password Length
                    </label>

                    <input
                        type="number"
                        id="password_length"
                        name="password_length"
                        min="8"
                        max="32"
                        value="12"
                        required
                    >

                    <small>
                        Choose a length between 8 and 32 characters.
                    </small>

                </div>


                <!-- Character Options -->

                <div class="options-box">


                    <h3>
                        Include Characters
                    </h3>


                    <label class="checkbox-option">

                        <input
                            type="checkbox"
                            name="include_uppercase"
                            value="yes"
                            checked
                        >

                        <span>
                            Uppercase Letters (A-Z)
                        </span>

                    </label>


                    <label class="checkbox-option">

                        <input
                            type="checkbox"
                            name="include_lowercase"
                            value="yes"
                            checked
                        >

                        <span>
                            Lowercase Letters (a-z)
                        </span>

                    </label>


                    <label class="checkbox-option">

                        <input
                            type="checkbox"
                            name="include_digits"
                            value="yes"
                            checked
                        >

                        <span>
                            Digits (0-9)
                        </span>

                    </label>


                    <label class="checkbox-option">

                        <input
                            type="checkbox"
                            name="include_special"
                            value="yes"
                            checked
                        >

                        <span>
                            Special Characters (!@#$%^&*)
                        </span>

                    </label>


                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="generate-button"
                >
                    Generate Password
                </button>


            </form>


        </main>


        <!-- Footer -->

        <footer class="footer">

            <p>
                &copy; 2026 Password Generator
            </p>

            <p>
                Developed using PHP, HTML5 and CSS3
            </p>

        </footer>


    </div>


</body>

</html>