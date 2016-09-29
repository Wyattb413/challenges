<?php

echo"===================================================================================" . PHP_EOL;
echo"------------------Hello! Welcome to Wyatt's CheckBook Application------------------" . PHP_EOL;
echo"===================================================================================" . PHP_EOL;

//                     USER INPUT PROMPTS
  fwrite(STDOUT, "Would you like to Deposit (d) or Withdrawl (w)?" . PHP_EOL);
  $userInput = trim(fgets(STDIN));
//

//                     FUNCTION DEFINITIONS
  function deposit() {
    fwrite(STDOUT, "How much would you like to deposit?" . PHP_EOL);
  }

  function withdrawl() {
    fwrite(STDOUT, "How much would you like to withdrawl?" . PHP_EOL);
  }

  function userInputCheck() {
    do {
      fwrite(STDOUT, "Please enter either 'd' or 'w', thank you!" . PHP_EOL);
      $userInput = trim(fgets(STDIN));
    } while ($userInput != "d" && $userInput != "w");
    if ($userInput == "d") {
      deposit();
    } else if ($userInput == "w") {
      withdrawl();
    }
  }
//

//                    SWITCH CASE TO DEAL WITH USERINPUT
switch ($userInput) {
  case "d": {
    deposit();
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
//
