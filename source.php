<?php

$site = $_GET["site"];

checkIfValidURL($site);

//check if string entered is a valid url 
function checkIfValidURL($siteName){
   
     $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
    $regex .= "(\:[0-9]{2,5})?"; // Port 
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 
    
     if(preg_match("/^$regex$/", $siteName)) 
       { 
               echo "is url"; 
       } else {
         echo " is not an url";
     }
    
    
    
    
    
}//end check if valid url function. from http://www.php.net/manual/en/function.preg-match.php#93824
