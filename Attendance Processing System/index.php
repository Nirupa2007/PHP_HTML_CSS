```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Processing System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>Attendance Processing System</h1>
            <p>CS23C10 - Web Design and Development</p>
        </div>

        <div class="form-box">

            <h2>Enter Attendance Details</h2>

            <form action="process.php" method="POST">

                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input
                        type="text"
                        id="student_name"
                        name="student_name"
                        placeholder="Enter student name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="register_number">Register Number</label>
                    <input
                        type="text"
                        id="register_number"
                        name="register_number"
                        placeholder="Enter register number"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="working_days">Total Working Days</label>
                    <input
                        type="number"
                        id="working_days"
                        name="working_days"
                        placeholder="Enter total working days"
                        min="1"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="present_days">Days Present</label>
                    <input
                        type="number"
                        id="present_days"
                        name="present_days"
                        placeholder="Enter days present"
                        min="0"
                        required
                    >
                </div>

                <button type="submit">Calculate Attendance</button>

            </form>

        </div>

        <div class="footer">
            <p>Attendance Processing System | PHP, HTML & CSS</p>
        </div>

    </div>

</body>
</html>
```
