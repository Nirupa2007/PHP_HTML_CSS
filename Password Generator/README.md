# Password Generator

## Student Name

[Enter Your Name]

## Register Number

[Enter Your Register Number]

## Program Title

Password Generator

## Objective

To develop a PHP application that generates secure
random passwords containing uppercase letters,
lowercase letters, digits and special characters
using PHP string handling techniques.

## Software/Tools Used

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP
- Google Chrome
- GitHub

## Features

- Accepts password length
- Generates random passwords
- Includes uppercase letters
- Includes lowercase letters
- Includes digits
- Includes special characters
- Uses PHP string handling functions
- Uses user-defined functions
- Uses loops and decision-making statements
- Validates password length
- Validates character selection
- Displays success messages
- Displays error messages
- Responsive user interface
- Uses external CSS

## Character Sets Used

### Uppercase

ABCDEFGHIJKLMNOPQRSTUVWXYZ

### Lowercase

abcdefghijklmnopqrstuvwxyz

### Digits

0123456789

### Special Characters

!@#$%^&*

## PHP String Functions Used

### strlen()

Used to find the length of a character string.

Example:

strlen($uppercaseLetters)

### str_split()

Used to convert the generated password
into an array of individual characters.

### implode()

Used to combine the characters in an array
into a single password string.

### String Concatenation

The `.=` operator is used to combine
different character sets.

Example:

$characterPool .= $uppercaseLetters;

## Random Password Generation

The application uses PHP's `random_int()`
function to select random characters.

A character is selected from the available
character pool using a random index.

The program also ensures that at least one
character from every selected character type
is included in the generated password.

## How the Application Works

1. The user enters the required password length.
2. The user selects the character types.
3. The form sends the information to `generate.php`.
4. PHP validates the input.
5. PHP creates the selected character pool.
6. PHP generates random characters.
7. PHP ensures that every selected character
   type is represented.
8. The characters are shuffled.
9. The final password is displayed.

## Folder Structure

Password Generator/
│
├── index.php
├── generate.php
├── style.css
└── README.md

## How to Run

1. Install XAMPP.
2. Start Apache from the XAMPP Control Panel.
3. Copy the "Password Generator" folder into
   the XAMPP `htdocs` folder.
4. Open Google Chrome.
5. Enter:

http://localhost/Password%20Generator/

6. Enter a password length between 8 and 32.
7. Select the required character types.
8. Click "Generate Password".
9. The generated password will be displayed.

## Test Cases

### Test Case 1 – Valid Password Generation

Password Length:

12

Selected:

- Uppercase
- Lowercase
- Digits
- Special Characters

Expected Result:

A 12-character password containing all four
character types is generated.

### Test Case 2 – Short Password

Password Length:

5

Expected Result:

An error message states that the password
must contain at least 8 characters.

### Test Case 3 – No Character Type Selected

Password Length:

12

Selected:

None

Expected Result:

An error message asks the user to select
at least one character type.

### Test Case 4 – Maximum Length

Password Length:

32

Expected Result:

A 32-character password is generated.

## Output Screenshots

### Input Page

[Insert input.png here]

### Generated Password

[Insert output.png here]

### Validation Error

[Insert validation.png here]

## GitHub Repository Link

[Paste your GitHub repository link here]