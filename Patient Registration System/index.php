<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient Registration System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- Header -->

    <header class="header">

        <div class="container">

            <h1>Patient Registration System</h1>

            <p>
                Register your details for hospital services
            </p>

        </div>

    </header>


    <!-- Main -->

    <main class="container">

        <div class="form-card">

            <h2>Patient Registration Form</h2>

            <p class="description">
                Please enter your details carefully.
            </p>


            <form
                action="process.php"
                method="POST"
            >


                <!-- Patient Name -->

                <div class="form-group">

                    <label for="patient_name">
                        Patient Name
                    </label>

                    <input
                        type="text"
                        id="patient_name"
                        name="patient_name"
                        placeholder="Enter patient's full name"
                        required
                    >

                </div>


                <!-- Date of Birth -->

                <div class="form-group">

                    <label for="date_of_birth">
                        Date of Birth
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


                <!-- Blood Group -->

                <div class="form-group">

                    <label for="blood_group">
                        Blood Group
                    </label>

                    <select
                        id="blood_group"
                        name="blood_group"
                        required
                    >

                        <option value="">
                            -- Select Blood Group --
                        </option>

                        <option value="A+">A+</option>

                        <option value="A-">A-</option>

                        <option value="B+">B+</option>

                        <option value="B-">B-</option>

                        <option value="AB+">AB+</option>

                        <option value="AB-">AB-</option>

                        <option value="O+">O+</option>

                        <option value="O-">O-</option>

                    </select>

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
                            -- Select Department --
                        </option>

                        <option value="General Medicine">
                            General Medicine
                        </option>

                        <option value="Cardiology">
                            Cardiology
                        </option>

                        <option value="Dermatology">
                            Dermatology
                        </option>

                        <option value="Orthopedics">
                            Orthopedics
                        </option>

                        <option value="Pediatrics">
                            Pediatrics
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
                        placeholder="Enter complete address"
                        required
                    ></textarea>

                </div>


                <!-- Emergency Contact -->

                <div class="form-group">

                    <label for="emergency_contact">
                        Emergency Contact Number
                    </label>

                    <input
                        type="tel"
                        id="emergency_contact"
                        name="emergency_contact"
                        placeholder="Enter 10-digit emergency contact"
                        pattern="[0-9]{10}"
                        required
                    >

                </div>


                <!-- Buttons -->

                <div class="button-group">

                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Register Patient
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
            &copy; 2026 Patient Registration System
        </p>

    </footer>


</body>

</html>