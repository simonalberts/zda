<?php
function capturecritical($error)
{
   switch (STATUS) 
   {
      case 'production': 
      {	
         echo "The site is currently not reachable. Please try again later.";
         die();
      }
      case 'testing': 
      {
         $last_error = error_get_last();
         print('Error description: "' .$error. '"<br>');
         print('Last error info: ('. $last_error['type'] .') "'. $last_error['message'] .'" in file '. $last_error['file'] .' at line: '. $last_error['line'] .'<br>');				
         die();
      }
   }
}
?>