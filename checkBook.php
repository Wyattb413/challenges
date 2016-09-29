<?php

echo"===================================================================================" . PHP_EOL;
echo"------------------Hello! Welcome to Wyatt's CheckBook Application------------------" . PHP_EOL;
echo"===================================================================================" . PHP_EOL;

//                     USER INPUT PROMPTS
  fwrite(STDOUT, "Would you like to Deposit (d) or Withdrawl (w)?" . PHP_EOL);
  $userInput = trim(fgets(STDIN));
//
