# Electricity Bill Calculator

## Student Name

[Enter Your Name]

## Register Number

[Enter Your Register Number]

## Program Title

Electricity Bill Calculator

## Objective

To develop a PHP application that accepts electricity
units consumed by the user, calculates the electricity
charges based on slab rates, and displays the total
electricity bill amount.

## Software/Tools Used

- HTML5
- CSS3
- PHP
- XAMPP
- Visual Studio Code
- Google Chrome
- GitHub

## Features

- Accepts electricity units consumed
- Validates user input
- Calculates charges using slab rates
- Displays individual slab charges
- Displays total bill amount
- Shows success and error messages
- Responsive user interface
- Print bill option

## Slab Rates

| Units Consumed | Rate per Unit |
|---|---:|
| First 100 units | ₹2 |
| Next 100 units (101–200) | ₹3 |
| Next 200 units (201–400) | ₹5 |
| Above 400 units | ₹7 |

## Calculation Method

The electricity bill is calculated progressively.

For example, if the user consumes 350 units:

First 100 units:
100 × ₹2 = ₹200

Next 100 units:
100 × ₹3 = ₹300

Next 150 units:
150 × ₹5 = ₹750

Total:
₹200 + ₹300 + ₹750 = ₹1,250

## PHP Concepts Used

- Variables
- Functions
- `if` statements
- `elseif` / decision-making
- `min()` function
- `is_numeric()`
- Type casting
- POST method
- Input validation
- `number_format()`

## Folder Structure

Electricity Bill Calculator/
│
├── index.php
├── process.php
├── style.css
└── README.md

## How to Run

1. Install XAMPP.
2. Start Apache from the XAMPP Control Panel.
3. Place the project folder inside the `htdocs` folder.
4. Open Google Chrome.
5. Enter:

http://localhost/PHP_HTML_CSS/Electricity%20Bill%20Calculator/

6. Enter the electricity units consumed.
7. Click "Calculate Bill".
8. The calculated bill will be displayed.

## Output Screenshots

### Input Screen

[Insert input screenshot here]

### Validation Screen

[Insert validation screenshot here]

### Bill Result

[Insert output screenshot here]

## GitHub Repository Link

[Paste your GitHub repository link here]