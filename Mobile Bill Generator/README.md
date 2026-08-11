# Mobile Bill Generator

## Student Name

[Enter Your Name]

## Register Number

[Enter Your Register Number]

## Program Title

Mobile Bill Generator

## Objective

To develop a PHP-based Mobile Bill Generator that accepts
customer usage details, calculates the mobile bill based
on different tariff plans, applies additional usage
charges and GST, and displays a detailed bill summary.

## Software/Tools Used

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP
- Google Chrome
- GitHub

## Features

- Customer information form
- Mobile number validation
- Tariff plan selection
- Call usage calculation
- Data usage calculation
- SMS usage calculation
- Additional usage charges
- GST calculation
- Total bill calculation
- PHP user-defined functions
- Decision-making statements
- Input validation
- Success/error messages
- Responsive interface
- External CSS

## Tariff Plans

### Basic Plan

Monthly charge: ₹199

Included call minutes: 200

Extra call charge: ₹0.50/minute

Included data: 2 GB

Extra data charge: ₹30/GB

### Standard Plan

Monthly charge: ₹399

Included call minutes: 500

Extra call charge: ₹0.40/minute

Included data: 10 GB

Extra data charge: ₹25/GB

### Premium Plan

Monthly charge: ₹599

Included call minutes: 1000

Extra call charge: ₹0.25/minute

Included data: 25 GB

Extra data charge: ₹20/GB

### SMS

First 100 SMS are free.

Additional SMS charge: ₹0.50/SMS

### GST

GST is calculated at 18%.

## PHP Functions Used

### getPlanCharge()

Returns the monthly charge according to
the selected tariff plan.

### getPlanName()

Returns the name of the selected tariff plan.

### calculateCallCharge()

Calculates additional call charges.

### calculateDataCharge()

Calculates additional data charges.

### calculateSmsCharge()

Calculates additional SMS charges.

### calculateTax()

Calculates 18% GST.

### getBillCategory()

Determines whether the bill is Low Usage,
Moderate Usage or High Usage.

## Calculation

The application calculates:

Subtotal =
Plan Charge
+ Call Charges
+ Data Charges
+ SMS Charges

GST =
Subtotal × 18%

Total Bill =
Subtotal + GST

## Example

Customer Name:

Arun

Mobile Number:

9876543210

Tariff Plan:

Standard

Call Usage:

650 minutes

Data Usage:

12 GB

SMS Usage:

150

The application calculates the additional
usage charges and displays the final bill.

## Folder Structure

Mobile Bill Generator/
│
├── index.php
├── process.php
├── style.css
└── README.md

## How to Run

1. Install XAMPP.
2. Start Apache from the XAMPP Control Panel.
3. Copy the "Mobile Bill Generator" folder into
   the XAMPP `htdocs` folder.
4. Open Google Chrome.
5. Enter:

http://localhost/Mobile%20Bill%20Generator/

6. Enter customer details.
7. Select a tariff plan.
8. Enter usage details.
9. Click "Generate Mobile Bill".
10. The detailed bill summary will be displayed.

## Test Cases

### Test Case 1 – Valid Input

Customer Name: Arun

Mobile Number: 9876543210

Plan: Standard

Call Usage: 650

Data Usage: 12

SMS: 150

Expected Result:

Detailed bill summary is displayed.

### Test Case 2 – Invalid Mobile Number

Mobile Number: 98765

Expected Result:

An error message is displayed asking for
a valid 10-digit mobile number.

### Test Case 3 – Empty Customer Name

Customer Name: [Blank]

Expected Result:

Customer name required message is displayed.

### Test Case 4 – Negative Usage

Call Usage: -50

Expected Result:

An error message is displayed.

## Output Screenshots

### Input Page

[Insert input.png here]

### Bill Summary

[Insert output.png here]

### Validation

[Insert validation.png here]

## GitHub Repository Link

[Paste your GitHub repository link here]