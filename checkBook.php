<?php

echo"===================================================================================" . PHP_EOL;
echo"------------------Hello! Welcome to Wyatt's CheckBook Application------------------" . PHP_EOL;
echo"===================================================================================" . PHP_EOL;

//                     VARIBLE DEFINITION
  $depositObject = [];
  $userInput = "";

//                     FUNCTION DEFINITIONS
  //TRANSACTION PROMPT
    function transactionPrompt()
    {
      fwrite(STDOUT, "Would you like to Deposit (d) or Withdrawl (w)?" . PHP_EOL);
      $userInput = trim(fgets(STDIN));
  //SWITCH CASE TO DEAL WITH TRANSACTION PROMPT INPUT
      switch ($userInput) {
        case "d": {
          depositPrompt();
          break;
        }
        case "w": {
          withdrawl();
          break;
        }
        default: {
          userInputCheck();
          break;
        }
      }
    }

  //DEPOSIT FUNCTION DEFINITIONS
    function depositPrompt() {
      fwrite(STDOUT, "How much would you like to deposit?" . PHP_EOL);
      $depositAmount = intval(trim(fgets(STDIN)));
      fwrite(STDOUT, "Are you sure you would like to deposit $" . $depositAmount . "?" . " (Y/N)". PHP_EOL);
      $depositConformation = trim(strtolower((fgets(STDIN))));
      if ($depositConformation == "y") {
        $depositObject ['depositAmount'] = $depositAmount;
        $depositObject ['depositConformation'] = $depositConformation;
        deposit($depositObject);
      } else if ($depositConformation == "n") {
        transactionPrompt();
      }
    }

    function deposit($depositObject) {
      fwrite(STDOUT, "You have deposited $" . $depositObject['depositAmount'] . PHP_EOL);
    }

    function withdrawl() {
      fwrite(STDOUT, "How much would you like to withdrawl?" . PHP_EOL);
    }

    function userInputCheck() {
      do {
        fwrite(STDOUT, "Please enter either 'd' or 'w', thank you!" . PHP_EOL);
        $userInput = trim(fgets(STDIN));
      } while ($userInput != "d" && $userInput != "w");
    }
