# BMI Calculator

## Student Name

[Enter Your Name]

## Register Number

[Enter Your Register Number]

## Program Title

BMI Calculator

## Objective

To develop a PHP-based BMI Calculator that accepts
height and weight from the user, calculates Body Mass
Index (BMI), determines the health status and provides
appropriate health recommendations.

## Software/Tools Used

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP
- Google Chrome
- GitHub

## Features

- Accepts height in centimetres
- Accepts weight in kilograms
- Calculates BMI
- Determines BMI category
- Displays health status
- Provides health recommendations
- Uses PHP user-defined functions
- Uses decision-making statements
- Validates input fields
- Displays validation errors
- Responsive design
- External CSS

## BMI Formula

BMI is calculated using the formula:

BMI = Weight / (Height in metres × Height in metres)

For example:

Height = 170 cm

Height in metres = 170 / 100 = 1.70 m

Weight = 65 kg

BMI = 65 / (1.70 × 1.70)

BMI = 22.49

Therefore, the BMI category is Normal Weight.

## BMI Categories

| BMI Range | Health Status |
|-----------|---------------|
| Below 18.5 | Underweight |
| 18.5 - 24.9 | Normal Weight |
| 25.0 - 29.9 | Overweight |
| 30.0 and above | Obesity |

## PHP Functions Used

### calculateBMI()

Calculates BMI using height and weight.

### getBMIStatus()

Determines the BMI category using
if-elseif-else statements.

### getRecommendation()

Displays a recommendation based on
the BMI category.

### getStatusMessage()

Displays a suitable message according
to the BMI result.

## Decision-Making Statements Used

The application uses:

- if
- elseif
- else

These statements are used to determine
the BMI category and recommendation.

## Input Validation

The application validates:

- Empty height
- Empty weight
- Non-numeric height
- Non-numeric weight
- Height outside the allowed range
- Weight outside the allowed range

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
   XAMPP htdocs folder.
4. Open Google Chrome.
5. Enter:

http://localhost/BMI%20Calculator/

6. Enter height and weight.
7. Click "Calculate BMI".
8. The BMI result and health recommendation
   will be displayed.

## Test Cases

### Test Case 1 – Normal Weight

Height: 170 cm

Weight: 65 kg

Expected BMI: 22.49

Expected Status:

Normal Weight

### Test Case 2 – Underweight

Height: 170 cm

Weight: 50 kg

Expected Status:

Underweight

### Test Case 3 – Overweight

Height: 170 cm

Weight: 80 kg

Expected Status:

Overweight

### Test Case 4 – Obesity

Height: 170 cm

Weight: 90 kg

Expected Status:

Obesity

### Test Case 5 – Invalid Height

Height: -170 cm

Weight: 65 kg

Expected Result:

Validation error message.

### Test Case 6 – Empty Input

Height: [Blank]

Weight: [Blank]

Expected Result:

Validation error message.

## Output Screenshots

### Input Page

[Insert input.png here]

### BMI Result

[Insert output.png here]

### Validation

[Insert validation.png here]

## GitHub Repository Link

[Paste your GitHub repository link here]