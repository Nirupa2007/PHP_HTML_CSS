<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Email ID Generator</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- Header -->

    <header class="header">

        <div class="container">

            <h1>Employee Email ID Generator</h1>

            <p>
                Generate a professional email ID from an employee name.
            </p>

        </div>

    </header>


    <!-- Navigation -->

    <nav class="navbar">

        <div class="container nav-container">

            <div class="logo">
                ABC Company
            </div>

            <div>
                Employee Services
            </div>

        </div>

    </nav>


    <!-- Main Content -->

    <main class="container">

        <div class="form-card">

            <h2>Employee Information</h2>

            <p class="description">
                Enter the employee's name to generate an email ID.
            </p>


            <form action="process.php" method="POST">


                <!-- Employee Name -->

                <div class="form-group">

                    <label for="employee_name">
                        Employee Name
                    </label>

                    <input
                        type="text"
                        id="employee_name"
                        name="employee_name"
                        placeholder="Example: John Kumar"
                        required
                    >

                </div>


                <!-- Department -->

                <div class="form-group">

                    <label for="department">
                        Department
                    </label>

                    <select
                        id="department"
                        name="department"
                        required
                    >

                        <option value="">
                            Select Department
                        </option>

                        <option value="HR">
                            Human Resources
                        </option>

                        <option value="IT">
                            Information Technology
                        </option>

                        <option value="Finance">
                            Finance
                        </option>

                        <option value="Marketing">
                            Marketing
                        </option>

                        <option value="Sales">
                            Sales
                        </option>

                    </select>

                </div>


                <!-- Submit Buttons -->

                <div class="button-group">

                    <button
                        type="submit"
                        class="generate-button"
                    >
                        Generate Email ID
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
            &copy; 2026 ABC Company. All Rights Reserved.
        </p>

    </footer>


</body>

</html>