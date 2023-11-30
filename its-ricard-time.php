<?php

$nbrRicard = 0;
do {
  echo "Come on ricard number ", $nbrRicard, "\n";
  $nbrRicard++;
  if ($nbrRicard == 3):
    echo "I'll have to stop soon! \n";
    elseif ($nbrRicard ==5):
        echo "I am no longer very fresh ... \n";
    endif;
} while($nbrRicard < 8);