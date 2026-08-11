<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Membership Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <header>
        <h1>Library Membership Registration</h1>
        <p>Register as a member of our library</p>
    </header>

    <main class="registration-card">

        <h2>Member Registration Form</h2>

        <form action="process.php" method="POST">

            <div class="form-group">
                <label for="member_name">Full Name</label>
                <input
                    type="text"
                    id="member_name"
                    name="member_name"
                    placeholder="Enter your full name"
                    minlength="3"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

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

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    required
                >
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                    rows="4"
                    required
                ></textarea>
            </div>

            <div class="form-group">
                <label for="membership_type">Membership Type</label>

                <select
                    id="membership_type"
                    name="membership_type"
                    required
                >
                    <option value="">-- Select Membership --</option>
                    <option value="Student">Student</option>
                    <option value="General">General</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>

            <button type="submit">Register Member</button>

        </form>

    </main>

    <footer>
        <p>&copy; 2026 Library Membership System</p>
    </footer>

</div>

</body>
</html>