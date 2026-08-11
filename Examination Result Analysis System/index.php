```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Examination Result Analysis System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Examination Result Analysis System</h1>

        <p>CS23C10 - Web Design and Development</p>

    </div>


    <!-- Form -->

    <div class="form-box">

        <h2>Enter Student Marks</h2>

        <form action="process.php" method="POST">


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


            <!-- Subject 1 -->

            <div class="form-group">

                <label for="subject1">
                    Subject 1 - Programming
                </label>

                <input
                    type="number"
                    id="subject1"
                    name="subject1"
                    placeholder="Enter mark (0-100)"
                    min="0"
                    max="100"
                    required
                >

            </div>


            <!-- Subject 2 -->

            <div class="form-group">

                <label for="subject2">
                    Subject 2 - Data Structures
                </label>

                <input
                    type="number"
                    id="subject2"
                    name="subject2"
                    placeholder="Enter mark (0-100)"
                    min="0"
                    max="100"
                    required
                >

            </div>


            <!-- Subject 3 -->

            <div class="form-group">

                <label for="subject3">
                    Subject 3 - Database Management
                </label>

                <input
                    type="number"
                    id="subject3"
                    name="subject3"
                    placeholder="Enter mark (0-100)"
                    min="0"
                    max="100"
                    required
                >

            </div>


            <!-- Subject 4 -->

            <div class="form-group">

                <label for="subject4">
                    Subject 4 - Computer Networks
                </label>

                <input
                    type="number"
                    id="subject4"
                    name="subject4"
                    placeholder="Enter mark (0-100)"
                    min="0"
                    max="100"
                    required
                >

            </div>


            <!-- Subject 5 -->

            <div class="form-group">

                <label for="subject5">
                    Subject 5 - Web Development
                </label>

                <input
                    type="number"
                    id="subject5"
                    name="subject5"
                    placeholder="Enter mark (0-100)"
                    min="0"
                    max="100"
                    required
                >

            </div>


            <!-- Submit -->

            <button type="submit">
                Calculate Result
            </button>

        </form>

    </div>


    <!-- Footer -->

    <div class="footer">

        <p>
            Examination Result Analysis System |
            PHP, HTML & CSS
        </p>

    </div>

</div>

</body>

</html>
```
