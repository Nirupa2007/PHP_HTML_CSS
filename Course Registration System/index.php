<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Course Registration System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- Header -->

    <header class="header">

        <div class="container">

            <h1>Course Registration System</h1>

            <p>
                Register for your preferred course
            </p>

        </div>

    </header>


    <!-- Main Content -->

    <main class="container">

        <div class="form-card">

            <h2>Registration Form</h2>

            <p class="form-description">
                Please enter your details and select a course.
            </p>


            <form
                action="process.php"
                method="POST"
            >


                <!-- Student Name -->

                <div class="form-group">

                    <label for="student_name">
                        Student Name
                    </label>

                    <input
                        type="text"
                        id="student_name"
                        name="student_name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <!-- Register Number -->

                <div class="form-group">

                    <label for="register_number">
                        Register Number
                    </label>

                    <input
                        type="text"
                        id="register_number"
                        name="register_number"
                        placeholder="Enter your register number"
                        required
                    >

                </div>


                <!-- Email -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="example@gmail.com"
                        required
                    >

                </div>


                <!-- Phone -->

                <div class="form-group">

                    <label for="phone">
                        Phone Number
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="Enter 10-digit phone number"
                        pattern="[0-9]{10}"
                        required
                    >

                </div>


                <!-- Gender -->

                <div class="form-group">

                    <label>
                        Gender
                    </label>

                    <div class="radio-group">

                        <label class="radio-option">

                            <input
                                type="radio"
                                name="gender"
                                value="Male"
                                required
                            >

                            Male

                        </label>


                        <label class="radio-option">

                            <input
                                type="radio"
                                name="gender"
                                value="Female"
                            >

                            Female

                        </label>


                        <label class="radio-option">

                            <input
                                type="radio"
                                name="gender"
                                value="Other"
                            >

                            Other

                        </label>

                    </div>

                </div>


                <!-- Course -->

                <div class="form-group">

                    <label for="course">
                        Select Course
                    </label>

                    <select
                        id="course"
                        name="course"
                        required
                    >

                        <option value="">
                            -- Select a Course --
                        </option>

                        <option value="Web Development">
                            Web Development
                        </option>

                        <option value="Python Programming">
                            Python Programming
                        </option>

                        <option value="Data Science">
                            Data Science
                        </option>

                        <option value="Artificial Intelligence">
                            Artificial Intelligence
                        </option>

                        <option value="Cyber Security">
                            Cyber Security
                        </option>

                    </select>

                </div>


                <!-- Mode -->

                <div class="form-group">

                    <label for="mode">
                        Course Mode
                    </label>

                    <select
                        id="mode"
                        name="mode"
                        required
                    >

                        <option value="">
                            -- Select Mode --
                        </option>

                        <option value="Online">
                            Online
                        </option>

                        <option value="Offline">
                            Offline
                        </option>

                        <option value="Hybrid">
                            Hybrid
                        </option>

                    </select>

                </div>


                <!-- Address -->

                <div class="form-group">

                    <label for="address">
                        Address
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                        placeholder="Enter your address"
                        required
                    ></textarea>

                </div>


                <!-- Buttons -->

                <div class="button-group">

                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Register Now
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
            &copy; 2026 Course Registration System
        </p>

    </footer>


</body>

</html>