<?php

$nbrRicard = 1;
do {
  echo "Come on ricard number ", $nbrRicard, "\n";
  $nbrRicard++;
  if ($nbrRicard == 4):
    echo "I'll have to stop soon! \n";
    elseif ($nbrRicard ==6):
        echo "I am no longer very fresh ... \n";
    endif;
} while($nbrRicard < 8);