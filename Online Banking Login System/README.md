# Online Banking Login System

## Student Name

[Enter Your Name]

## Register Number

[Enter Your Register Number]

## Program Title

Online Banking Login System

## Objective

To design and develop a simple PHP-based online banking
login module that accepts customer login credentials,
validates the credentials, and displays personalized
customer information after successful authentication.

## Software/Tools Used

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP
- Google Chrome
- GitHub

## Features

- Customer login form
- Customer ID validation
- Password validation
- Authentication using PHP
- Success and error messages
- Personalized customer dashboard
- Customer account information
- Account balance display
- Responsive design
- External CSS
- Logout functionality

## Demo Login Credentials

Customer ID:

CUST1001

Password:

bank123

## How the Application Works

1. The customer enters the Customer ID and password.
2. The form sends the data to `login.php` using POST.
3. PHP validates the input fields.
4. PHP checks the submitted credentials.
5. If the credentials are incorrect, an error message
   is displayed.
6. If the credentials are correct, the customer is
   redirected to `dashboard.php`.
7. The dashboard displays personalized customer
   information.
8. The customer can click Logout to return to the
   login page.

## Folder Structure

Online Banking Login System/
│
├── index.php
├── login.php
├── dashboard.php
├── logout.php
├── style.css
└── README.md

## How to Run

1. Install XAMPP.
2. Start Apache from the XAMPP Control Panel.
3. Copy the `Online Banking Login System` folder into
   the XAMPP `htdocs` folder.
4. Open Google Chrome.
5. Enter:

http://localhost/Online%20Banking%20Login%20System/

6. Enter the demo credentials.
7. Click `Login Securely`.
8. The personalized customer dashboard will be displayed.

## Test Cases

### Test Case 1 – Successful Login

Customer ID:

CUST1001

Password:

bank123

Expected Result:

Login successful and customer dashboard is displayed.

### Test Case 2 – Incorrect Password

Customer ID:

CUST1001

Password:

wrong123

Expected Result:

Authentication failed message is displayed.

### Test Case 3 – Empty Customer ID

Customer ID:

[Blank]

Password:

bank123

Expected Result:

Customer ID required message is displayed.

### Test Case 4 – Empty Password

Customer ID:

CUST1001

Password:

[Blank]

Expected Result:

Password required message is displayed.

## Output Screenshots

### Login Page

[Insert login screenshot here]

### Successful Login / Dashboard

[Insert dashboard screenshot here]

### Authentication Error

[Insert error screenshot here]

## GitHub Repository Link

[Paste your GitHub repository link here]