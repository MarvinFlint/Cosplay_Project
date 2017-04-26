<!DOCYTPE HTML>
<html>
    <head>
        <title>Cosplay Beta</title>
        <link rel="stylesheet" href="../../css/styles.css"> 
        <link rel="stylesheet" href="../../css/cosplay.css">
        <meta charset="utf-8">
    </head>
    <body>
        <div id="background">
        </div>
        <div id = "main">
            <div id = "header">   
                <div id = "menu">
                    <a href="../../index.html">
                        <div class = "menupoint" id = "Home">
                            Home
                        </div>
                    </a>
                    <a href="../About.html">
                        <div class = "menupoint" id = "About">
                            About
                        </div>
                    </a>
                    <a href="#">
                        <div class = "menupoint" id = "cos">
                            Cosplays
                            <ul id = "cosplay_dd">                                
                                <a href = "../Cosplay_2013.php"><li class="listelement">2013</li></a>
                                <a href = "../Cosplay_2014.php"><li class="listelement">2014</li></a>
                                <a href = "../Cosplay_2015.php"><li class="listelement">2015</li></a>
                                <a href = "../Cosplay_2016.php"><li class="listelement">2016</li></a>
                            </ul>
                        </div>
                    </a>
                    <a href="../Shop.php">
                    <div class = "menupoint" id = "Shop">
                        Shop
                    </div>
                    </a>
                    <a href="../Contact.html">
                    <div class = "menupoint" id = "contact">
                        Contact
                        <ul id = "contact_dd">
                            <li class="listelement">Contact Caly</li>
                            <li class="listelement">Contact the team!</li>
                        </ul>
                    </div>
                    </a>
                </div>
                <div id = "header_image">
                    
                </div>                
            </div>
            <div id = "content">                
               <h1>Cosplay: Neko</h1>
                <?php
                    $folderpath = '../../media/Cosplaybilder/2014/Neko/';
                    $filecount = glob($folderpath."*.jpg");
                    $folder = opendir($folderpath);
                    if($filecount > 0){
                        
                        while(false !== ($file = readdir($folder))){
                            if(is_dir($file) == false){
                            $filepath = $folderpath.$file;
                ?>
                            <div class = "gallery_picture">                                
                                <img width = "15%" height = auto; style = "
                                                                           float: left;     
                                                                           margin-top: 5%;
                                                                           margin-left: 5%;
                                                                           margin-right: 5%;
                                                                           box-shadow: 0px 0px 40px lightblue;
                                                                           " 
                                     src = "<?php echo $filepath; ?>">
                            </div>
                            
                <?php
                            }
                        }
                    }
                    else{
                        echo "the folder is empty";
                    }                 
                closedir($folder);
                ?>
            </div>
            <div id = "footer">
                <a href = "https://de-de.facebook.com/CalistoCosplay/">
                    <img class = "sm_icon" id = "fb" src = "../../media/social_media_icons/facebook_icon.png">
                </a>
                <a href = "https://www.twitter.com/farbenfuchs/">
                    <img class = "sm_icon" id = "tw" src = "../../media/social_media_icons/twitter_icon.png">
                </a>
                <a href = "https://www.instagram.com/calisto.c/">
                    <img class = "sm_icon" id = "ig" src = "../../media/social_media_icons/instagram_icon.png">
                </a>
                <a href = "https://www.twitch.tv/farbenfuchs/">
                    <img class = "sm_icon" id = "twc" src = "../../media/social_media_icons/twitch_icon.png">
                </a>
            </div>
        </div>
    </body>    
</html>