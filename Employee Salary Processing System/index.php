```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Salary Processing System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <h1>Employee Salary Processing System</h1>
            <p>CS23C10 - Web Design and Development</p>
        </div>

        <!-- Form -->
        <div class="form-box">

            <h2>Employee Salary Details</h2>

            <form action="process.php" method="POST">

                <div class="form-group">
                    <label for="employee_name">Employee Name</label>

                    <input
                        type="text"
                        id="employee_name"
                        name="employee_name"
                        placeholder="Enter employee name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="employee_id">Employee ID</label>

                    <input
                        type="text"
                        id="employee_id"
                        name="employee_id"
                        placeholder="Enter employee ID"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="basic_salary">Basic Salary</label>

                    <input
                        type="number"
                        id="basic_salary"
                        name="basic_salary"
                        placeholder="Enter basic salary"
                        min="1"
                        step="0.01"
                        required
                    >
                </div>

                <button type="submit">
                    Calculate Salary
                </button>

            </form>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Employee Salary Processing System | PHP, HTML & CSS</p>
        </div>

    </div>

</body>

</html>
```
