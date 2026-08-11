<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="form-box">

            <h1>Student Details Form</h1>
            <p class="subtitle">Enter your details below</p>

            <form action="process.php" method="POST">

                <!-- Student Name -->
                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input
                        type="text"
                        id="student_name"
                        name="student_name"
                        placeholder="Enter your name"
                        required
                    >
                </div>

                <!-- Register Number -->
                <div class="form-group">
                    <label for="register_number">Register Number</label>
                    <input
                        type="text"
                        id="register_number"
                        name="register_number"
                        placeholder="Enter your register number"
                        required
                    >
                </div>

                <!-- Department -->
                <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" name="department" required>
                        <option value="">-- Select Department --</option>
                        <option value="Computer Science and Engineering">
                            Computer Science and Engineering
                        </option>
                        <option value="Information Technology">
                            Information Technology
                        </option>
                        <option value="Electronics and Communication Engineering">
                            Electronics and Communication Engineering
                        </option>
                        <option value="Electrical and Electronics Engineering">
                            Electrical and Electronics Engineering
                        </option>
                        <option value="Mechanical Engineering">
                            Mechanical Engineering
                        </option>
                    </select>
                </div>

                <!-- Year -->
                <div class="form-group">
                    <label for="year">Year</label>
                    <select id="year" name="year" required>
                        <option value="">-- Select Year --</option>
                        <option value="I Year">I Year</option>
                        <option value="II Year">II Year</option>
                        <option value="III Year">III Year</option>
                        <option value="IV Year">IV Year</option>
                    </select>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address</label>
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
                    <label for="phone">Phone Number</label>
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

                <!-- Submit Button -->
                <button type="submit" class="submit-button">
                    Submit Details
                </button>

                <!-- Reset Button -->
                <button type="reset" class="reset-button">
                    Clear Form
                </button>

            </form>

        </div>

    </div>

</body>
</html>