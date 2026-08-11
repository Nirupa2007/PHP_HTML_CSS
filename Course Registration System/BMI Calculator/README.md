# BMI Calculator

## Student Name

[Enter Your Name]

## Register Number

[Enter Your Register Number]

## Program Title

BMI Calculator

## Objective

To develop a PHP-based BMI Calculator that accepts the
user's height and weight, calculates the Body Mass Index,
determines the corresponding BMI category, and displays
general health recommendations.

## Software/Tools Used

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP
- Google Chrome
- GitHub

## Features

- Accepts height
- Accepts weight
- Uses POST method
- Validates mandatory fields
- Validates numeric input
- Calculates BMI
- Uses user-defined PHP functions
- Uses decision-making statements
- Determines BMI category
- Displays general health recommendations
- Displays success/error messages
- Responsive user interface
- Uses external CSS

## BMI Formula

BMI is calculated using the following formula:

BMI = Weight (kg) / Height (m)²

For example:

Height = 170 cm
Weight = 65 kg

Height in metres = 170 / 100
                  = 1.70 m

BMI = 65 / (1.70 × 1.70)
    ≈ 22.49

Therefore, the BMI category is Normal Weight.

## BMI Categories

| BMI Range | Category |
|-----------|----------|
| Below 18.5 | Underweight |
| 18.5 – 24.9 | Normal Weight |
| 25.0 – 29.9 | Overweight |
| 30.0 and above | Obesity |

## User-Defined Functions

The application uses the following functions:

### calculateBMI()

Calculates the BMI from height and weight.

### determineHealthStatus()

Determines the BMI category using
if-else decision-making statements.

### getRecommendation()

Displays a general recommendation based on
the BMI category.

## Technologies Used

HTML5, CSS3 and PHP.

## Folder Structure

BMI Calculator/
│
├── index.php
├── process.php
├── style.css
└── README.md

## How to Run

1. Install XAMPP.
2. Start Apache from the XAMPP Control Panel.
3. Copy the "BMI Calculator" folder into the
   `htdocs` folder.
4. Open Google Chrome.
5. Enter:

http://localhost/BMI%20Calculator/

6. Enter height in centimetres.
7. Enter weight in kilograms.
8. Click "Calculate BMI".
9. The BMI result, health status and general
   recommendation will be displayed.

## Output Screenshots

### Input Page

[Insert input screenshot here]

### Successful Result

[Insert output screenshot here]

### Validation/Error Page

[Insert validation screenshot here]

## GitHub Repository Link

[Paste your GitHub repository link here]