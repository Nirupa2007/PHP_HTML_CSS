```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Information Portal</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <h1>Employee Information Portal</h1>
        <p>CS23C10 - Web Design and Development</p>
    </div>

    <!-- Employee Form -->
    <div class="form-box">

        <h2>Employee Details</h2>

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

            <!-- Email -->
            <div class="form-group">
                <label for="email">
                    Email Address
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
                    <option value="">-- Select Department --</option>
                    <option value="Computer Science">
                        Computer Science
                    </option>
                    <option value="Human Resources">
                        Human Resources
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

            <!-- Designation -->
            <div class="form-group">
                <label for="designation">
                    Designation
                </label>

                <input
                    type="text"
                    id="designation"
                    name="designation"
                    placeholder="Enter designation"
                    required
                >
            </div>

            <!-- Date of Joining -->
            <div class="form-group">
                <label for="joining_date">
                    Date of Joining
                </label>

                <input
                    type="date"
                    id="joining_date"
                    name="joining_date"
                    required
                >
            </div>

            <!-- Gender -->
            <div class="form-group">

                <label>Gender</label>

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

            <!-- Address -->
            <div class="form-group">

                <label for="address">
                    Address
                </label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    placeholder="Enter employee address"
                    required
                ></textarea>

            </div>

            <!-- Submit -->
            <button type="submit">
                Create Employee Profile
            </button>

        </form>

    </div>

    <!-- Footer -->
    <div class="footer">
        <p>
            Employee Information Portal | PHP, HTML & CSS
        </p>
    </div>

</div>

</body>
</html>
```
