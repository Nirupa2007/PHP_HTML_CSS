<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package Booking System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <header>
            <h1>Travel Package Booking System</h1>
            <p>Plan your journey with our exciting travel packages</p>
        </header>

        <main class="booking-card">

            <h2>Book Your Travel Package</h2>

            <form action="process.php" method="POST">

                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <input
                        type="text"
                        id="customer_name"
                        name="customer_name"
                        placeholder="Enter your name"
                        required
                        minlength="3"
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
                    <label for="package">Select Travel Package</label>
                    <select id="package" name="package" required>
                        <option value="">-- Select Package --</option>
                        <option value="Goa">Goa - ₹15,000 per person</option>
                        <option value="Manali">Manali - ₹18,000 per person</option>
                        <option value="Ooty">Ooty - ₹10,000 per person</option>
                        <option value="Kerala">Kerala - ₹20,000 per person</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="persons">Number of Persons</label>
                    <input
                        type="number"
                        id="persons"
                        name="persons"
                        min="1"
                        max="20"
                        placeholder="Enter number of persons"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="travel_date">Travel Date</label>
                    <input
                        type="date"
                        id="travel_date"
                        name="travel_date"
                        required
                    >
                </div>

                <button type="submit">Book Now</button>

            </form>

        </main>

        <footer>
            <p>&copy; 2026 Travel Package Booking System</p>
        </footer>

    </div>

</body>
</html>