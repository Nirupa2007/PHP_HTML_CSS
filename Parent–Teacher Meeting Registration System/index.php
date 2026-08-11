```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Parent-Teacher Meeting Registration</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Parent–Teacher Meeting</h1>

        <p>Appointment Registration System</p>

    </div>


    <!-- Registration Form -->

    <div class="form-box">

        <h2>Meeting Registration</h2>

        <p class="description">
            Please enter the details and select a suitable
            meeting slot.
        </p>


        <form
            action="process.php"
            method="POST"
        >


            <!-- Parent Name -->

            <div class="form-group">

                <label for="parent_name">
                    Parent Name
                </label>

                <input
                    type="text"
                    id="parent_name"
                    name="parent_name"
                    placeholder="Enter parent name"
                    required
                >

            </div>


            <!-- Student Name -->

            <div class="form-group">

                <label for="student_name">
                    Student Name
                </label>

                <input
                    type="text"
                    id="student_name"
                    name="student_name"
                    placeholder="Enter student name"
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
                    placeholder="Enter register number"
                    required
                >

            </div>


            <!-- Email -->

            <div class="form-group">

                <label for="email">
                    Parent Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
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
                    maxlength="10"
                    required
                >

            </div>


            <!-- Meeting Date -->

            <div class="form-group">

                <label for="meeting_date">
                    Meeting Date
                </label>

                <input
                    type="date"
                    id="meeting_date"
                    name="meeting_date"
                    required
                >

            </div>


            <!-- Teacher -->

            <div class="form-group">

                <label for="teacher">
                    Select Teacher
                </label>

                <select
                    id="teacher"
                    name="teacher"
                    required
                >

                    <option value="">
                        -- Select Teacher --
                    </option>

                    <option value="Dr. Priya">
                        Dr. Priya
                    </option>

                    <option value="Mr. Kumar">
                        Mr. Kumar
                    </option>

                    <option value="Ms. Anitha">
                        Ms. Anitha
                    </option>

                    <option value="Mrs. Kavitha">
                        Mrs. Kavitha
                    </option>

                    <option value="Mr. Arjun">
                        Mr. Arjun
                    </option>

                </select>

            </div>


            <!-- Meeting Slot -->

            <div class="form-group">

                <label>
                    Select Meeting Slot
                </label>

                <div class="slot-container">


                    <label class="slot">

                        <input
                            type="radio"
                            name="meeting_slot"
                            value="09:00 AM - 09:15 AM"
                            required
                        >

                        <span>
                            09:00 AM - 09:15 AM
                        </span>

                    </label>


                    <label class="slot">

                        <input
                            type="radio"
                            name="meeting_slot"
                            value="09:15 AM - 09:30 AM"
                        >

                        <span>
                            09:15 AM - 09:30 AM
                        </span>

                    </label>


                    <label class="slot">

                        <input
                            type="radio"
                            name="meeting_slot"
                            value="09:30 AM - 09:45 AM"
                        >

                        <span>
                            09:30 AM - 09:45 AM
                        </span>

                    </label>


                    <label class="slot">

                        <input
                            type="radio"
                            name="meeting_slot"
                            value="10:00 AM - 10:15 AM"
                        >

                        <span>
                            10:00 AM - 10:15 AM
                        </span>

                    </label>


                    <label class="slot">

                        <input
                            type="radio"
                            name="meeting_slot"
                            value="10:15 AM - 10:30 AM"
                        >

                        <span>
                            10:15 AM - 10:30 AM
                        </span>

                    </label>


                    <label class="slot">

                        <input
                            type="radio"
                            name="meeting_slot"
                            value="10:30 AM - 10:45 AM"
                        >

                        <span>
                            10:30 AM - 10:45 AM
                        </span>

                    </label>

                </div>

            </div>


            <!-- Purpose -->

            <div class="form-group">

                <label for="purpose">
                    Meeting Purpose
                </label>

                <select
                    id="purpose"
                    name="purpose"
                    required
                >

                    <option value="">
                        -- Select Purpose --
                    </option>

                    <option value="Academic Performance">
                        Academic Performance
                    </option>

                    <option value="Attendance">
                        Attendance
                    </option>

                    <option value="Behaviour">
                        Behaviour
                    </option>

                    <option value="General Discussion">
                        General Discussion
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>


            <!-- Message -->

            <div class="form-group">

                <label for="message">
                    Additional Message
                </label>

                <textarea
                    id="message"
                    name="message"
                    rows="4"
                    placeholder="Enter any additional information"
                ></textarea>

            </div>


            <!-- Confirmation -->

            <div class="checkbox-group">

                <label>

                    <input
                        type="checkbox"
                        name="confirmation"
                        value="confirmed"
                        required
                    >

                    I confirm that the appointment details
                    are correct.

                </label>

            </div>


            <!-- Submit -->

            <button type="submit">
                Book Appointment
            </button>

        </form>

    </div>


    <!-- Footer -->

    <div class="footer">

        <p>
            CS23C10 - Web Design and Development
        </p>

    </div>

</div>

</body>

</html>
```
