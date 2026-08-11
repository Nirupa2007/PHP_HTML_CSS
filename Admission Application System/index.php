<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admission Application</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Header -->
    <header class="header">

        <div class="container">

            <h1>Admission Application System</h1>

            <p>
                Apply for admission by filling out the application form
                below.
            </p>

        </div>

    </header>


    <!-- Navigation -->
    <nav class="navbar">

        <div class="container nav-container">

            <div class="logo">
                ABC College
            </div>

            <ul class="nav-links">
                <li><a href="index.php">Application</a></li>
            </ul>

        </div>

    </nav>


    <!-- Application Form -->
    <main class="container">

        <div class="form-box">

            <h2>Admission Application Form</h2>

            <p class="form-description">
                Please enter your details carefully. All fields marked
                with <span class="required">*</span> are mandatory.
            </p>


            <form action="process.php" method="POST">

                <!-- Applicant Name -->
                <div class="form-group">

                    <label for="applicant_name">
                        Applicant Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="applicant_name"
                        name="applicant_name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <!-- Date of Birth -->
                <div class="form-group">

                    <label for="date_of_birth">
                        Date of Birth <span class="required">*</span>
                    </label>

                    <input
                        type="date"
                        id="date_of_birth"
                        name="date_of_birth"
                        required
                    >

                </div>


                <!-- Gender -->
                <div class="form-group">

                    <label>
                        Gender <span class="required">*</span>
                    </label>

                    <div class="radio-group">

                        <label>
                            <input
                                type="radio"
                                name="gender"
                                value="Male"
                                required
                            >
                            Male
                        </label>

                        <label>
                            <input
                                type="radio"
                                name="gender"
                                value="Female"
                            >
                            Female
                        </label>

                        <label>
                            <input
                                type="radio"
                                name="gender"
                                value="Other"
                            >
                            Other
                        </label>

                    </div>

                </div>


                <!-- Email -->
                <div class="form-group">

                    <label for="email">
                        Email Address <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="example@email.com"
                        required
                    >

                </div>


                <!-- Phone -->
                <div class="form-group">

                    <label for="phone">
                        Phone Number <span class="required">*</span>
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


                <!-- Address -->
                <div class="form-group">

                    <label for="address">
                        Address <span class="required">*</span>
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                        placeholder="Enter your complete address"
                        required
                    ></textarea>

                </div>


                <!-- Course -->
                <div class="form-group">

                    <label for="course">
                        Course Applied For <span class="required">*</span>
                    </label>

                    <select
                        id="course"
                        name="course"
                        required
                    >

                        <option value="">
                            -- Select Course --
                        </option>

                        <option value="B.Sc Computer Science">
                            B.Sc Computer Science
                        </option>

                        <option value="BCA">
                            BCA
                        </option>

                        <option value="B.Com">
                            B.Com
                        </option>

                        <option value="BBA">
                            BBA
                        </option>

                        <option value="B.Sc Mathematics">
                            B.Sc Mathematics
                        </option>

                    </select>

                </div>


                <!-- Qualification -->
                <div class="form-group">

                    <label for="qualification">
                        Previous Qualification
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="qualification"
                        name="qualification"
                        placeholder="Example: Higher Secondary"
                        required
                    >

                </div>


                <!-- Percentage -->
                <div class="form-group">

                    <label for="percentage">
                        Previous Exam Percentage
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="percentage"
                        name="percentage"
                        placeholder="Enter percentage"
                        min="0"
                        max="100"
                        step="0.01"
                        required
                    >

                </div>


                <!-- Submit -->
                <div class="button-group">

                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Submit Application
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
            &copy; 2026 ABC College. All Rights Reserved.
        </p>

    </footer>

</body>

</html>