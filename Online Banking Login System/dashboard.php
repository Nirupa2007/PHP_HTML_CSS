<?php

/*
    Sample personalized customer information.

    In a real application, this information
    would normally be retrieved from a database
    after authentication.
*/

$customerName = "Nirupa";

$customerId = "CUST1001";

$accountType = "Savings Account";

$accountNumber = "XXXX XXXX 4587";

$branchName = "Main Branch";

$availableBalance = 58450.75;

$lastLogin = "10 August 2026, 10:45 PM";


/*
    Format the balance.
*/

$formattedBalance = number_format(
    $availableBalance,
    2
);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Customer Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


    <div class="dashboard-container">


        <!-- Navigation -->

        <nav class="navbar">


            <div class="bank-name">

                🏦

                <span>
                    MyBank
                </span>

            </div>


            <a
                href="logout.php"
                class="logout-button"
            >
                Logout
            </a>


        </nav>


        <!-- Welcome Section -->

        <section class="welcome-section">

            <p>
                Welcome back,
            </p>

            <h1>
                <?php
                echo htmlspecialchars($customerName);
                ?>!
            </h1>

            <p class="last-login">
                Last login:
                <?php
                echo htmlspecialchars($lastLogin);
                ?>
            </p>

        </section>


        <!-- Account Summary -->

        <section class="account-summary">


            <div class="balance-card">


                <div class="balance-icon">
                    💳
                </div>


                <div>

                    <p>
                        Available Balance
                    </p>

                    <h2>
                        ₹<?php
                        echo $formattedBalance;
                        ?>
                    </h2>

                </div>


            </div>


        </section>


        <!-- Customer Information -->

        <section class="details-card">


            <h2>
                Customer Information
            </h2>


            <div class="details-grid">


                <div class="detail-item">

                    <span>
                        Customer Name
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $customerName
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Customer ID
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $customerId
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Account Type
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $accountType
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Account Number
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $accountNumber
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Branch
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $branchName
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Account Status
                    </span>

                    <strong class="active-status">
                        Active
                    </strong>

                </div>


            </div>


        </section>


        <!-- Quick Services -->

        <section class="services-card">


            <h2>
                Quick Services
            </h2>


            <div class="services-grid">


                <div class="service">

                    <span>
                        💰
                    </span>

                    <p>
                        Balance
                    </p>

                </div>


                <div class="service">

                    <span>
                        📄
                    </span>

                    <p>
                        Statement
                    </p>

                </div>


                <div class="service">

                    <span>
                        👤
                    </span>

                    <p>
                        Profile
                    </p>

                </div>


                <div class="service">

                    <span>
                        📞
                    </span>

                    <p>
                        Support
                    </p>

                </div>


            </div>


        </section>


        <!-- Security Message -->

        <div class="security-footer">

            🔒
            For your security, always log out after
            using online banking.

        </div>


    </div>


</body>

</html>