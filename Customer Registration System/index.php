```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Customer Registration System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- Header -->

    <div class="header">

        <h1>Customer Registration System</h1>

        <p>CS23C10 - Web Design and Development</p>

    </div>


    <!-- Registration Form -->

    <div class="form-box">

        <h2>Customer Registration</h2>

        <p class="form-description">
            Please enter your details to register.
        </p>


        <form
            action="process.php"
            method="POST"
        >


            <!-- Customer Name -->

            <div class="form-group">

                <label for="customer_name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    placeholder="Enter your full name"
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
                    placeholder="Enter your email address"
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


            <!-- City -->

            <div class="form-group">

                <label for="city">
                    City
                </label>

                <input
                    type="text"
                    id="city"
                    name="city"
                    placeholder="Enter your city"
                    required
                >

            </div>


            <!-- State -->

            <div class="form-group">

                <label for="state">
                    State
                </label>

                <select
                    id="state"
                    name="state"
                    required
                >

                    <option value="">
                        -- Select State --
                    </option>

                    <option value="Tamil Nadu">
                        Tamil Nadu
                    </option>

                    <option value="Kerala">
                        Kerala
                    </option>

                    <option value="Karnataka">
                        Karnataka
                    </option>

                    <option value="Andhra Pradesh">
                        Andhra Pradesh
                    </option>

                    <option value="Telangana">
                        Telangana
                    </option>

                    <option value="Maharashtra">
                        Maharashtra
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>


            <!-- Pincode -->

            <div class="form-group">

                <label for="pincode">
                    Pincode
                </label>

                <input
                    type="text"
                    id="pincode"
                    name="pincode"
                    placeholder="Enter 6-digit pincode"
                    pattern="[0-9]{6}"
                    maxlength="6"
                    required
                >

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
                    placeholder="Enter your complete address"
                    required
                ></textarea>

            </div>


            <!-- Terms -->

            <div class="checkbox-group">

                <label>

                    <input
                        type="checkbox"
                        name="terms"
                        value="accepted"
                        required
                    >

                    I confirm that the information provided
                    is correct.

                </label>

            </div>


            <!-- Submit -->

            <button type="submit">
                Register Now
            </button>

        </form>

    </div>


    <!-- Footer -->

    <div class="footer">

        <p>
            Customer Registration System |
            PHP, HTML & CSS
        </p>

    </div>

</div>

</body>

</html>
```
