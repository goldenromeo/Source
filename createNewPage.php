<?php




$site = $GET("site")

checkIfValidURL($site);



function checkIfValidURL($siteName){



    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
    echo "is url";
}else{
        echo "not a url";
        //header("location:javascript://history.go(-1)");

    }
}


function createNewPage($siteName){

    //create an html file and redirect to it

//set some basic html content
$shtml_header = "<html><head><title>Souece: " . $siteName ."</title></head><body>";
$shtml_content = "<h1><center>Source for: " . $siteName ."</center></h1><br /><hr />";
$shtml_footer =  "</body></html>";

$filename = "results/" . $siteName .".html";

// let's make sure the file exists and is writable first.
if (is_writable($filename)) {

   // in our example we're opening $filename in append mode.
   // the file pointer is at the bottom of the file hence
   // that's where $somecontent will go when we fwrite() it.
   if (!$handle = fopen($filename, 'w')) {
         echo "cannot open file ($filename)";
         exit;
   }

   // write $somecontent to our opened file.
   if (fwrite($handle, $shtml_header) === false) {
       echo "cannot write to file ($filename)";
       exit;
   }else{
      //file is ok so write the other elements to it
      fwrite($handle, $shtml_content);
      fwrite($handle, $shtml_footer);
   }

   fclose($handle);

}else{
   echo "the file $filename is not writable";
}

//redirect the user to the html page
header("location:$filename");

//source http://psoug.org/snippet/create_an_html_page_on_demand_419.htm
}


?<
