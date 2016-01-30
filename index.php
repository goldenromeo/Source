<!--
*Rommel Trejo  
*Source 
*Source gives you the public source code of a given webpage
*github @goldenromeo

-->


<?php

//variable names
$site = $_GET["site"];  //name of the website
         
//preprocessor
    //preprocessor was supposed to be the part where the decision to use $site.html or $site/index.html was executed 
    //through the use of a boolean flag.- This was later dropped and the decision to use a single page was adopted.
    //In the future I would like to expand Source and add this feature but for the moment that feature is out.
    //1/30/16



//main calls 

//echo the webpage
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
        
         <!-- end of 
        get the adress to be examined form
        -->
        
        </center>

    </body>
</html>
';

validateRequest($site);






        //              ***********************      Functions          ***************************            //




//checks if string entered is a valid url: if it has a valid format calls getURL else outputs and error
function validateRequest($siteName){
    
    //checkif its empty
    if(empty($siteName))
    {return 1;}
    
    //if its not empty check regex
   
     $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
    $regex .= "(\:[0-9]{2,5})?"; // Port 
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 
    
     if(preg_match("/^$regex$/", $siteName)) 
       { 
                
                echo "<code>";
                echo getURL($siteName);
                echo "</code";
         
       } else {
         echo "<center> <p> <br> Sorry that is not a URL</p></center>";
     }
    
    
    
}//end check if valid url function. from http://www.php.net/manual/en/function.preg-match.php#93824



//getURL is in charge of getting the url contents and/or returning an error in case the address entered
//matches the regex but is not a real web address.
 function getURL($siteName){
     
     
     
     //check if it contains http or https. add http:// if it doesnt contain
     
     if(!preg_match("~^(?:f|ht)tps?://~i",$siteName))
     {
         $siteName = "http://" . $siteName;
         
     }//from http://stackoverflow.com/questions/2762061/how-to-add-http-if-its-not-exists-in-the-url
     
     echo '<br> site name: ' . $siteName . "<br";
     
      //check if page actually exists
     $headers = get_headers($siteName); 
     
    print_r(get_headers($siteName));
     
     if(!strpos($headers[0],"200")){
         //if page does not exist or any problems return error
            return "sorry the web address you entered does not exist or is currently unavailable";
     }
     
     
    //get page soure code
        $pageLoaded = file_get_contents($siteName);
     
        
            //if exist return source code
            //nl2br ensures line breaks apppear
            //htmlspecialchars ensure html is not interpreted
        return nl2br(htmlspecialchars($pageLoaded)) ;
        
     
     
    }


















