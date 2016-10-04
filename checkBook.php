<?php

echo"===================================================================================" . PHP_EOL;
echo"------------------Hello! Welcome to Wyatt's CheckBook Application------------------" . PHP_EOL;
echo"===================================================================================" . PHP_EOL;

//                     VARIBLE DEFINITION
  $transactionObject = [];
  $userInput = "";
  $balance = 0;

//                     FUNCTION DEFINITIONS
  //TRANSACTION PROMPT
    function transactionPrompt($balance  = 0)
    {
      fwrite(STDOUT, "Would you like to Deposit (d), Withdrawl (w), or Check Your Balance (b)?" . PHP_EOL);
      $userInput = trim(strtolower(fgets(STDIN)));
      userInputCheck($userInput, $balance);
    }

    function userInputCheck($userInput, $balance)
    {
      //SWITCH CASE TO DEAL WITH TRANSACTION PROMPT INPUT
      switch ($userInput) {
        case "d": {
          depositPrompt($balance);
          break;
        }
        case "w": {
          withdrawlPrompt($balance);
          break;
        }
        case "b": {
          fwrite(STDOUT, "Your current balance is: $" . $balance . PHP_EOL);
          transactionPrompt($balance);
          break;
        }
        default: {
          do {
            fwrite(STDOUT, "Please enter either 'd', 'w', or 'b' thank you!" . PHP_EOL);
            $userInput = trim(strtolower(fgets(STDIN)));
          } while ($userInput != "d" && $userInput != "w" && $userInput != "b");
          userInputCheck($userInput, $balance);
          break;
        }
      }
    }

  //DEPOSIT FUNCTION DEFINITIONS
    function depositPrompt($balance)
    {
      fwrite(STDOUT, "How much would you like to deposit?" . PHP_EOL);
      $depositAmount = intval(trim(fgets(STDIN)));
      fwrite(STDOUT, "Are you sure you would like to deposit $" . $depositAmount . "?" . " (Y/N)". PHP_EOL);
      $depositConformation = trim(strtolower(fgets(STDIN)));
      if ($depositConformation == "y") {
        $transactionObject ['depositAmount'] = $depositAmount;
        // $transactionObject ['depositConformation'] = $depositConformation;
        deposit($transactionObject, $balance);
      } else if ($depositConformation == "n") {
        transactionPrompt($balance);
      } else {
        do {
            fwrite(STDOUT, "Please enter either 'Y' or 'N', thank you!" . PHP_EOL);
            $userInput = trim(strtolower(fgets(STDIN)));
          } while ($userInput != "y" && $userInput != "n");
      }
    }

    function deposit($transactionObject, $balance = 0)
     {
      fwrite(STDOUT, "You have deposited $" . $transactionObject['depositAmount'] . PHP_EOL);
      $balance += $transactionObject['depositAmount'];
      additionalTransactionHandler($balance);
    }

  //WITHDRAWL FUNCTION DEFINITION
    function withdrawlPrompt($balance)
    {
      fwrite(STDOUT, "How much would you like to withdrawl?" . PHP_EOL);
      $withdrawlAmount = intval(trim(fgets(STDIN)));
      fwrite(STDOUT, "Are you sure you would like to withdrawl $" . $withdrawlAmount . "?" . " (Y/N)" . PHP_EOL);
      $withdrawlConformation = trim(strtolower(fgets(STDIN)));
      if ($withdrawlConformation == "y") {
        $transactionObject ['withdrawlAmount'] = $withdrawlAmount;
        // $transactionObject ['$withdrawlConformation'] = $withdrawlConformation;
        withdrawl($transactionObject, $balance);
      } else if ($withdrawlConformation == "n") {
        transactionPrompt($balance);
      } else {
        do {
            fwrite(STDOUT, "Please enter either 'Y' or 'N', thank you!" . PHP_EOL);
            $userInput = trim(strtolower(fgets(STDIN)));
          } while ($userInput != "y" && $userInput != "n");
      }
    }

    function withdrawl($transactionObject, $balance = 0)
     {
      fwrite(STDOUT, "You have withdrawn $" . $transactionObject['withdrawlAmount'] . PHP_EOL);
      $balance -= $transactionObject['withdrawlAmount'];
      additionalTransactionHandler($balance);
    }

    function additionalTransactionHandler ($balance) {
      fwrite(STDOUT, "You have $" . $balance . " in your account. Would you like to make another transaction? (Y/N)" . PHP_EOL);
      $userInput = trim(strtolower(fgets(STDIN)));
      if ($userInput == "y") {
        transactionPrompt($balance);
      } else if ($userInput == "n") {
        goodbye();
      } else {
        do {
            fwrite(STDOUT, "Please enter either 'Y' or 'N', thank you!" . PHP_EOL);
            $userInput = trim(strtolower(fgets(STDIN)));
          } while ($userInput != "y" && $userInput != "n");
          if ($userInput == "y") {
            transactionPrompt();
          } else if ($userInput == "n") {
            goodbye();
          }
      }
    }

  //GOODBYE FUNCTION
    function goodBye($userInput = NULL)
    {
      fwrite(STDOUT, "Are you sure you would like to disconnect? (Y/N)" . PHP_EOL);
      $userInput = trim(strtolower(fgets(STDIN)));
      switch ($userInput) {
        case "y": {
          fwrite(STDOUT, "Thank you for using Wyatt's CheckBook Application, have a nice day!" .PHP_EOL);
          break;
        }
        case "n": {
          transactionPrompt();
          break;
        }
        case "b": {
          fwrite(STDOUT, "Your current balance is: $" . $balance . PHP_EOL);
          transactionPrompt($balance);
          break;
        }
        default: {
          do {
              fwrite(STDOUT, "Please enter either 'Y' or 'N', thank you!" . PHP_EOL);
              $userInput = trim(strtolower(fgets(STDIN)));
            } while ($userInput != "y" && $userInput != "n");
          goodBye($userInput);
          break;
        }
      }
    }

    transactionPrompt();

//summation of all transactions instead of adding and subtracting from $balance
