<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>String Analysis System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- Header -->

    <header class="header">

        <div class="container">

            <h1>String Analysis System</h1>

            <p>
                Analyze vowels, consonants, digits and special characters
            </p>

        </div>

    </header>


    <!-- Main Content -->

    <main class="container">

        <div class="form-card">

            <h2>Enter a Title</h2>

            <p class="description">
                Enter any title containing letters, numbers and special characters.
            </p>


            <form
                action="process.php"
                method="POST"
            >

                <div class="form-group">

                    <label for="title">
                        Title
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Example: Web Design 2026!"
                        required
                    >

                </div>


                <div class="button-group">

                    <button
                        type="submit"
                        class="analyze-button"
                    >
                        Analyze String
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

    </main>


    <!-- Footer -->

    <footer class="footer">

        <p>
            &copy; 2026 String Analysis System
        </p>

    </footer>


</body>

</html>