<?php

$site = $_GET["site"];

checkIfValidURL($site);

//check if string entered is a valid url 
function checkIfValidURL($siteName){
    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
        echo "is url";
    }else{
        echo "not an url";
    }
}//end check if valid url function
