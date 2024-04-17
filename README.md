# FinalPhp

1. Ingride Neslie Youadeu Noumbibou (Developer 1):

   - Creation of user accounts or registration (Sign-Up).
   - Real-time validation of information entered by the user in the user account creation form with AJAX.

2. Roland Kardouss (Developer 2):

   - Login to an existing user account (Sign-In).
   - Disconnect from a connected user account (Sign-Out and Time-Out).

3. Roland Kardouss (Developer 3):

   - Creation of the structure to create and exchange data with the database.
   - Changing the password of an existing user account.

4. Marilena Soussani (Developer 4):

   - Management of several levels of a question/answer game which follow one another.
   - Abandoning a game in progress.

5. Christopher Velasquez-Chavez (Developer 5):

   - Creation of the structure of web pages to display (e.g., head, header, nav, footer).
   - Display of the history of the results of all game rounds.

6. Christopher Velasquez-Chavez (Developer 6, Team Leader):
   - Creation and implementation of the GitHub account.
   - Creation of the structure of folders and files.
   - Management of several levels of a question/answer game which follow one another.
   - Coordination of the integration of different functionalities.
   - Customized display of features and addition of additional interactivity and attraction features.

Each teammate contributed to various aspects of the project, ensuring its successful development and integration of multiple functionalities.

## Game Release Date

The game was released on April 2, 2024.

## Website Features

1.User Account Creation (Sign-Up): - Registration form with input fields for username, password, first name, and last name. - Real-time AJAX validation for form input fields. - Server-side validation for required fields, username uniqueness, password length, and format.

2. User Account Login (Sign-In):
   - Login form with input fields for username and password.
   - Authentication with PHP sessions.
3. Logout (Sign-Out) and Timeout:
   - Logout functionality with session destruction.
   - Automatic timeout after 15 minutes of inactivity.
4. Password Change:
   - Password change form accessible before login.
   - Input fields for username, first name, new password, and confirm password.
5. Game Levels Management:
   - Six levels of a question-and-answer game.
   - Different challenges for each level (e.g., ordering letters/numbers).
6. Game Outcome Handling:
   - Three possible outcomes: win, game over, incomplete.
   - Game ends when lives are exhausted or if the player abandons the game.
7. Game Form Submission:
   - Processing of game form submissions with result calculation.
   - Feedback messages based on user input.
8. Abandonment of Game:
   - Ability to cancel a game in progress.
   - Recording of incomplete games in the database.
9. History Display:
   - Display of game results history for logged-in users.
   - Information includes outcome, lives used, and timestamp.
10. Database Manipulation:
    - MySQL database used for storing user and game data.
    - SQL code provided for database structure and manipulation.
11. Custom Display and Interactivity:
    - Integration of images, videos, and audio files.
    - CSS or Bootstrap styling for visual customization.
    - Client-side features using JavaScript and jQuery for interactivity.
12. Optional Functionality:
    - Use of cookies, file management, and real-time date/time handling.

## How the Game Works

The game consists of six levels, each with its own challenge:

1. Order 6 letters in ascending order.
2. Order 6 letters in descending order.
3. Order 6 numbers in ascending order.
4. Order 6 numbers in descending order.
5. Identify the first and last letters in a set of 6.
6. Identify the smallest and largest numbers in a set of 6.

Each level must be completed sequentially, and the player has six lives. The game ends if all lives are exhausted or if the player abandons the game.

## Technical Information

- Programming Languages: PHP, JavaScript, CSS
- Database Management System: MySQL
- PHP Version : PHP 8.1
- MySQL Version : MySQL 8.0

---

For more detailed technical specifications, please refer to the additional documents provided separately.
