<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Online Banking Login</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="page-container">


        <!-- Login Card -->

        <main class="login-card">


            <div class="bank-icon">
                🏦
            </div>


            <h1>
                Online Banking
            </h1>


            <p class="subtitle">
                Secure Customer Login
            </p>


            <div class="security-note">

                🔒
                Your banking information is protected.

            </div>


            <!-- Login Form -->

            <form
                action="login.php"
                method="POST"
            >


                <!-- Customer ID -->

                <div class="form-group">

                    <label for="customer_id">
                        Customer ID
                    </label>

                    <input
                        type="text"
                        id="customer_id"
                        name="customer_id"
                        placeholder="Enter your customer ID"
                        required
                    >

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

                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    class="login-button"
                >
                    Login Securely
                </button>


            </form>


            <p class="demo-note">

                <strong>Demo Credentials</strong><br>

                Customer ID: CUST1001<br>

                Password: bank123

            </p>


        </main>


        <!-- Footer -->

        <footer class="footer">

            <p>
                &copy; 2026 Online Banking System
            </p>

            <p>
                Developed using PHP, HTML5 and CSS3
            </p>

        </footer>


    </div>


</body>

</html>