<?php

class PlayerEloRating 
{ 
  
  // Function to calculate the Probability 
  static function probability($rating1, $rating2) 
  { 
      return 1.0 * 1.0 / (1 + 1.0 * (10 ** (1.0 * ($rating1 - $rating2) / 400)));
  }
    
  // Function to calculate Elo rating 
  // K is a constant. 
  // d determines whether Player A wins 
  // or Player B.  
  static function eloRating($Ra, $Rb, $K, $d)
  {  
    
      // To calculate the Winning 
      // Probability of Player B 
      $Pb = PlayerEloRating::probability($Ra, $Rb); 
    
      // To calculate the Winning 
      // Probability of Player A 
      $Pa = PlayerEloRating::probability($Rb, $Ra); 
    
      // Case -1 When Player A wins 
      // Updating the Elo Ratings 
      if ($d === true) 
      { 
          $Ra = $Ra + $K * (1 - $Pa); 
          $Rb = $Rb + $K * (0 - $Pb); 
      } 
    
      // Case -2 When Player B wins 
      // Updating the Elo Ratings 
      else 
      { 
          $Ra = $Ra + $K * (0 - $Pa); 
          $Rb = $Rb + $K * (1 - $Pb); 
      } 
    
      echo "Updated Ratings:-\n"; 
        
      echo "Ra = " . (round($Ra * 1000000.0) / 1000000.0) . " Rb = " . (round($Rb  * 1000000.0) / 1000000.0); 
  } 
  
} 

//driver code 

// Ra and Rb are current ELO ratings 
$Ra = 1200; 
$Rb = 1000; 
       
$K = 30; 
$d = true; 
        
PlayerEloRating::eloRating($Ra, $Rb, $K, $d); 

/*
<?php

class PlayerEloRating 
{ 
  
  // Function to calculate the Probability 
  static function probability($rating1, $rating2) 
  { 
      return 1.0 * 1.0 / (1 + 1.0 * (10 ** (1.0 * ($rating1 - $rating2) / 400)));
  }
    
  // Function to calculate Elo rating 
  // K is a constant. 
  // d determines whether Player A wins 
  // or Player B.  
  static function eloRating($Ra, $Rb, $K, $d)
  {  
    
      // To calculate the Winning 
      // Probability of Player B 
      $Pb = PlayerEloRating::probability($Ra, $Rb); 
    
      // To calculate the Winning 
      // Probability of Player A 
      $Pa = PlayerEloRating::probability($Rb, $Ra); 
    
      // Case -1 When Player A wins 
      // Updating the Elo Ratings 
      if ($d === true) 
      { 
          $Ra = $Ra + $K * (1 - $Pa); 
          $Rb = $Rb + $K * (0 - $Pb); 
      } 
    
      // Case -2 When Player B wins 
      // Updating the Elo Ratings 
      else 
      { 
          $Ra = $Ra + $K * (0 - $Pa); 
          $Rb = $Rb + $K * (1 - $Pb); 
      } 
    
      echo "Updated Ratings:-\n"; 
        
      echo "Ra = " . (round($Ra * 1000000.0) / 1000000.0) . " Rb = " . (round($Rb  * 1000000.0) / 1000000.0); 
  } 
  
} 

//driver code 

// Ra and Rb are current ELO ratings 
$Ra = 1200; 
$Rb = 1000; 
       
$K = 30; 
$d = true; 
        
PlayerEloRating::eloRating($Ra, $Rb, $K, $d); 
*/
