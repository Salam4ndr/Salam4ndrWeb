<?php
function caesarCipher($message, $shift) {
    $result = "";

    // Loop through each character in the message
    for ($i = 0; $i < strlen($message); $i++) {
        $char = $message[$i];

        // Check if the character is an uppercase letter
        if (ctype_upper($char)) {
            // Find the position in the alphabet for the character
            $position = ord($char) - ord('A');

            // Apply the shift
            $newPosition = ($position + $shift) % 26;

            // Convert the new position to a character
            $newChar = chr($newPosition + ord('A'));

            // Append the new character to the result
            $result .= $newChar;
        }
        // Check if the character is a lowercase letter
        elseif (ctype_lower($char)) {
            // Find the position in the alphabet for the character
            $position = ord($char) - ord('a');

            // Apply the shift
            $newPosition = ($position + $shift) % 26;

            // Convert the new position to a character
            $newChar = chr($newPosition + ord('a'));

            // Append the new character to the result
            $result .= $newChar;
        }
        // If the character is not a letter, add it to the result as is
        else {
            $result .= $char;
        }
    }

    // Return the encrypted/decrypted message
    return $result;
}

// Example usage:
$message = $_POST['Text'];
$shift = $_POST['Shift'];
$encryptedMessage = caesarCipher($message, $shift);
$decryptedMessage = caesarCipher($encryptedMessage, -$shift);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher Results</title>
    <style>
      * {
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
      }
      body {
        font-family: montserrat;
        background-color: black;
        color: orange;
        padding: 20px;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }

      h2 {
        text-align: center;
        font-size: 2.5em;
        color: orange;
        margin-bottom: 40px;
      }

      .result-container {
        background-color: black;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 20px rgba(255, 165, 0, 0.5);
      }

      .result-container p {
        font-size: 1.2em;
        color: orange;
        line-height: 1.6;
        margin-bottom: 20px;
      }

      .message {
        font-weight: bold;
        color: orange;
      }

      footer {
        text-align: center;
        margin-top: 50px;
        color: orange;
        font-size: 0.9em;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Caesar Cipher Results</h2>

      <div class="result-container">
        <p><span class="message">Original Message:</span> <?php echo htmlspecialchars($message); ?></p>
        <p><span class="message">Encrypted Message:</span> <?php echo htmlspecialchars($encryptedMessage); ?></p>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 Caesar Cipher Blog. All rights reserved.</p>
    </footer>
  </body>
</html>
