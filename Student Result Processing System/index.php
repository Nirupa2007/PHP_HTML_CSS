<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Result Processing System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="form-card">

            <h1>Student Result Processing System</h1>

            <p class="subtitle">
                Enter student details and marks
            </p>

            <form action="process.php" method="POST">

                <!-- Student Name -->

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


                <!-- Register Number -->

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


                <h2>Enter Marks</h2>

                <!-- HTML -->

                <label for="html">
                    HTML
                </label>

                <input
                    type="number"
                    id="html"
                    name="html"
                    min="0"
                    max="100"
                    placeholder="Enter marks"
                    required
                >


                <!-- CSS -->

                <label for="css">
                    CSS
                </label>

                <input
                    type="number"
                    id="css"
                    name="css"
                    min="0"
                    max="100"
                    placeholder="Enter marks"
                    required
                >


                <!-- PHP -->

                <label for="php">
                    PHP
                </label>

                <input
                    type="number"
                    id="php"
                    name="php"
                    min="0"
                    max="100"
                    placeholder="Enter marks"
                    required
                >


                <!-- Database -->

                <label for="database">
                    Database
                </label>

                <input
                    type="number"
                    id="database"
                    name="database"
                    min="0"
                    max="100"
                    placeholder="Enter marks"
                    required
                >


                <!-- Web Design -->

                <label for="web_design">
                    Web Design
                </label>

                <input
                    type="number"
                    id="web_design"
                    name="web_design"
                    min="0"
                    max="100"
                    placeholder="Enter marks"
                    required
                >


                <div class="buttons">

                    <button type="submit">
                        Calculate Result
                    </button>

                    <button
                        type="reset"
                        class="reset-button"
                    >
                        Clear
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>