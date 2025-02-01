<?php
// Function to encrypt a text with the Caesar Cipher
function caesarCipher($text, $shift)
{
    $result = "";
    
    // Normalize the shift to ensure it is always positive
    $shift = $shift % 26;
    if ($shift < 0) 
    {
        $shift += 26;
    }
    
    // Iterate through each character of the text
    for ($i = 0; $i < strlen($text); $i++) 
    {
        $character = $text[$i];
        
        // Check if the character is a letter
        if (ctype_alpha($character)) 
        {
            // Determine the ASCII offset for uppercase and lowercase letters
            $asciiOffset = ctype_upper($character) ? ord('A') : ord('a');
            
            // Calculate the new character considering the alphabet cycle
            $newCharacter = chr((ord($character) - $asciiOffset + $shift) % 26 + $asciiOffset);
            
            $result .= $newCharacter;
        } 
        else 
        {
            // If the character is not a letter, keep it unchanged
            $result .= $character;
        }
    }
    
    return $result;
}

// Check if the data has been sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Retrieve the data sent from the form and apply checks
    $text = $_POST["Text"];
    $shift = $_POST["Shift"];

    // Apply the Caesar cipher
    $encryptedText = caesarCipher($text, $shift);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher Result</title>
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
      }

      h2 {
        color: orange;
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 40px;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }

      .result-container {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
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
      
      /* Mobile and small screen styles */
      @media (max-width: 952px) {
        h2 {
          font-size: 30px;
        }

        .result-container p {
          font-size: 17px;
        }
      }

      /* Mobile hamburger menu */
      @media (max-width: 858px){
        .checkbtn {
          display: block;
        }
        nav ul {
          position: fixed;
          width: 100%;
          height: 100vh;
          background: #2c3e50;
          top: 80px;
          left: -100%;
          text-align: center;
          transition: all .5s;
        }
        nav ul li {
          display: block;
          margin: 50px 0;
          line-height: 30px;
        }
        nav ul li a {
          font-size: 20px;
        }
        a:hover, a.active {
          background: none;
          color: orange;
        }
        #check:checked ~ ul {
          left: 0;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Caesar Cipher Result</h2>

      <div class="result-container">
        <p><span class="message">Encrypted Text:</span> <?php echo htmlspecialchars($encryptedText); ?></p>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 Caesar Cipher Blog. All rights reserved.</p>
    </footer>
  </body>
</html>
