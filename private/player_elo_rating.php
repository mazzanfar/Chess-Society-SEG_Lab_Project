<?php

class PlayerEloRating 
{ 
  
  # calculate the Probability 
  static function probability($rating1, $rating2) 
  { 
      return 1.0 * 1.0 / (1 + 1.0 * (10 ** (1.0 * ($rating1 - $rating2) / 400)));
  }
    
  # calculate Elo rating 
  # K is a constant. 
  # d determines whether Player A wins 
  # or Player B.  
  static function eloRating($Ra, $Rb, $K, $d)
  {  
      
      # calculate the winning probability of Player A 
      $Pa = PlayerEloRating::probability($Rb, $Ra); 
      # calculate the winning probability of Player B 
      $Pb = PlayerEloRating::probability($Ra, $Rb); 
    
      # Case -1 When Player A wins.
      if ($d === true) 
      { 
          $Ra = $Ra + $K * (1 - $Pa); 
          $Rb = $Rb + $K * (0 - $Pb); 
      } 
      // Case -2 When Player B wins.
      else 
      { 
          $Ra = $Ra + $K * (0 - $Pa); 
          $Rb = $Rb + $K * (1 - $Pb); 
      } 
    
      echo "Updated Elo Ratings:-\n"; 
      echo "Ra = " . (round($Ra * 1000000.0) / 1000000.0) . " Rb = " . (round($Rb  * 1000000.0) / 1000000.0); 
  } 
  
} 
