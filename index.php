<!--

* To Do: 
*
*Change this page so that instead of creating a new page 
*
*source code is displayed below 
*
*
*
*

-->


<?php

//variable names
$site = $_GET["site"];  //name of the website
$createNewDir = true;            //wheter to create $site.html or ./$site/index.html
$documentName = "index.html";        // name of the document to be created; default index.html but changed on preprocessor if $createNewDir set so false

echo '<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Source</title>
        <meta name="description" content="Source gives you the public source code of a given webpage">
        <link rel="stylesheet" href="main.css">

    </head>
    <body>

    <center>

        <h1>Welcome to source</h1>
        <h2>enter your site address below!</h2>


        <!--
        get the adress to be examined
        -->



        <form action="index.php" method="get">

            <fieldset>
                <input type="text" name="site" id="site">
                <br> <br>

                <input type="submit" value="Source">

            </fieldset>
        </form>


        </center>

    </body>
</html>
';
//preprocessor

if(!$createNewdir){
    
    $documentName = $site;
    
}

//main calls 
checkIfValidURL($site);




/*

            /              ***********************      Functions          ***************************            /

*/


//check if string entered is a valid url 
function checkIfValidURL($siteName){
    
    if(empty($siteName))
    {return 1;}
   
     $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
    $regex .= "(\:[0-9]{2,5})?"; // Port 
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 
    
     if(preg_match("/^$regex$/", $siteName)) 
       { 
                echo "is url\n";
                echo "<code>";
                echo showURL($siteName);
                echo "</code";
         
       } else {
         echo " is not an url";
     }
    
    
    
}//end check if valid url function. from http://www.php.net/manual/en/function.preg-match.php#93824




 function showURL($siteName){
    
        $pageLoaded = file_get_contents($siteName);
        
        return nl2br(htmlspecialchars($pageLoaded));
    }


















