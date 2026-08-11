```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Employee Performance Evaluation</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Employee Performance Evaluation System</h1>

        <p>CS23C10 - Web Design and Development</p>

    </div>


    <!-- Form -->

    <div class="form-box">

        <h2>Enter Performance Scores</h2>

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
                    placeholder="Enter employee name"
                    required
                >

            </div>


            <!-- Employee ID -->

            <div class="form-group">

                <label for="employee_id">
                    Employee ID
                </label>

                <input
                    type="text"
                    id="employee_id"
                    name="employee_id"
                    placeholder="Enter employee ID"
                    required
                >

            </div>


            <!-- Quality Score -->

            <div class="form-group">

                <label for="quality_score">
                    Work Quality Score
                </label>

                <input
                    type="number"
                    id="quality_score"
                    name="quality_score"
                    placeholder="Enter score (0-100)"
                    min="0"
                    max="100"
                    step="0.01"
                    required
                >

            </div>


            <!-- Productivity Score -->

            <div class="form-group">

                <label for="productivity_score">
                    Productivity Score
                </label>

                <input
                    type="number"
                    id="productivity_score"
                    name="productivity_score"
                    placeholder="Enter score (0-100)"
                    min="0"
                    max="100"
                    step="0.01"
                    required
                >

            </div>


            <!-- Teamwork Score -->

            <div class="form-group">

                <label for="teamwork_score">
                    Teamwork Score
                </label>

                <input
                    type="number"
                    id="teamwork_score"
                    name="teamwork_score"
                    placeholder="Enter score (0-100)"
                    min="0"
                    max="100"
                    step="0.01"
                    required
                >

            </div>


            <!-- Submit -->

            <button type="submit">
                Evaluate Performance
            </button>

        </form>

    </div>


    <!-- Footer -->

    <div class="footer">

        <p>
            Employee Performance Evaluation System |
            PHP, HTML & CSS
        </p>

    </div>

</div>

</body>

</html>
```
