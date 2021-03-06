<?php
    session_start();

    if(isset($_GET['reset_session']))

?>
<!DOCYTPE HTML>
<html>
    <head>
        <title>Cosplay Beta</title>
        <link rel="stylesheet" href="../css/styles.css"> 
        <link rel="stylesheet" href="../css/shop.css">
        <meta charset="utf-8">
    </head>
    <body>        
        <div id="background">
        </div>
        <div id = "main">
            <div id = "header">   
                <div id = "menu">
                    <a href="../index.html">
                        <div class = "menupoint" id = "Home">
                            Home
                        </div>
                    </a>
                    <a href="a">
                        <div class = "menupoint" id = "About">
                            About
                        </div>
                    </a>
                    <a href="Cosplay.html">
                        <div class = "menupoint" id = "cos">
                            Cosplays
                            <ul id = "cosplay_dd">
                                <a href = "Cosplay_2013.php"><li class="listelement">2013</li></a>
                                <a href = "Cosplay_2014.php"><li class="listelement">2014</li></a>
                                <a href = "Cosplay_2015.php"><li class="listelement">2015</li></a>
                                <a href = "Cosplay_2016.php"><li class="listelement">2016</li></a>
                            </ul>
                        </div>
                    </a>
                    <a href="./Shop.php">
                    <div class = "menupoint" id = "Shop">
                        Shop
                        <ul id = "shop_dd">
                            <a href = "Shop.php"><li class="listelement">Prints</li></a>
                            <a href = "Shop_2.php"><li class="listelement">Stuff</li></a>
                        </ul>
                    </div>
                    </a>
                    <a href="Contact.html">
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
                <?php                       
                        require("shop_subsites/products_1.php");
                //Cart things

                        //Load Cart
        
                        if(!isset($_SESSION['shopping_cart'])){
                            $_SESSION['shopping_cart'] = array();
                        }
                        
                        //Add product to cart
                        if(isset($_POST['add_to_cart'])){
                            $product_id = $_POST['product_id'];
                            if(isset($_SESSION['shopping_cart'][$product_id])){
                                
                            }                           
                              
                            else{                                
                                $_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
                                $_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];
                            }
                        }

                        //Update cart
                        if(isset($_POST['update_cart'])){
                            $quantities = $_POST['quantity'];
                            
                            foreach($quantities as $id => $quantity){
                                $_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
                            }
                        }

                        //Empty Cart                        
                        if(isset($_GET['empty_cart'])){
                            $_SESSION['shopping_cart'] = array();
                        }                        
                        //View a product
                        if(isset($_GET['view_product'])){
                            
                            
                            $product_id = $_GET['view_product'];
                            
                            //View the actual product
                            echo "<div class = 'product_spec'>  
                                 <img class = 'product_pic_shop' src = '".$products[$product_id]['picture']."'>
                                 <span>".$products[$product_id]['name']."</span><br/>
                                 <span>".$products[$product_id]['price']."</span><br/>
                                 <span>".$products[$product_id]['category']."</span><br/>                                 
                                 <p>
                                    <form action='./shop.php' method='post'> 
                                    <select class = 'quantity_select' name = 'quantity'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                    </select>
                                    <input type = 'hidden' name = 'product_id' value = '$product_id' />
                                    <input type = 'submit' name = 'add_to_cart' id = 'addtocart' value = 'Add to cart' />
                                    </form>
                                 </p>
                                 </div>";                        
                        
                        }
                //Site display

                        //View Cart    
                        else if(isset($_GET['view_cart'])){
                            if(empty($_SESSION['shopping_cart'])){
                                echo "<p id = 'cart_empty_error'>Your cart is empty </p><br/>";
                                }
                            else{
                                
                                echo "<form action = './shop.php?view_cart=1' method = 'post'>";
                                
                                echo "<div class = 'cart'>";
                                foreach($_SESSION['shopping_cart'] as $id => $product){
                                    $product_id = $product['product_id'];
                                    
                                    echo "<div class = 'product_display'>
                                          <p id = 'product_display'>
                                          <input type = 'text' name = 'quantity[$product_id]' value ='" .$product['quantity'] . "' /> x " .$products[$product_id]['name']."</p><br/>
                                           </div>";
                                }
                                echo "<input class = 'action' id = 'action' type = 'submit' name = 'update_cart' value = 'Update' />";
                                echo "</form>";
                                echo "<p class = 'action'><a href = ' ./shop.php?empty_cart=1'>Empty cart</a></p>";
                                echo "<p class = 'action'><a href = './shop.php?checkout=1'>Checkout</a></p>";
                                echo "</div>";
                            }
                        }
                        
                        //Checkout
                        else if(isset($_GET['checkout'])){
                            
                            if(empty($_SESSION['shopping_cart'])){
                                echo "<p id = 'empty_message>Your cart is empty </p><br/>";
                                }
                            
                            else{                             
                                echo "<form action = './shop.php?checkout=1' method = 'post'>";     
                                
                                $total_sum = 0;
                                echo "<div class = 'cart'>";
                                foreach($_SESSION['shopping_cart'] as $id => $product){
                                    $product_id = $product['product_id'];
                                    
                                    $total_sum += $products[$product_id]['price'] * $product['quantity'];
                                    
                                    echo "<div class = 'product_display'>";
                                    echo "<p class = 'checkout_display'>";
                                    echo $product['quantity'] . " x " .$products[$product_id]['name']." &nbsp &nbsp Price per item: ".$products[$product_id]['price']."<br/>";
                                    echo "</p>";
                                    echo "</div>";                                    
                                    
                                    
                                }
                                echo "</div>";
                                echo "<p id = 'total'> Total price: ". $total_sum ."</p>";
                                echo "</form>";
                            }
                        }                        

                        //View all products
                        else{      
                            echo "<p class = 'viewcart'><a href = ' ./shop.php?view_cart=1'>View cart</a></p>";                            
                            echo "<p class = 'viewcart'><a href = ' ./shop.php?checkout=1'>Checkout</a></p>";                            
                            //Loop for product-display
                            foreach($products as $id => $products){                                
                                echo "<a href = './shop.php?view_product=$id'><div class = 'product_container'><br/><p>"
                                     .$products['name']."<br/>
                                     Price: ".$products['price']."€ <br/>
                                     Category: ".$products['category']."<br/>  
                                     </p>
                                     </a>
                                     </div>";
                            }
                        } 

                        
                    ?>
            </div>
            <div id = "footer">
                <a href = "https://de-de.facebook.com/CalistoCosplay/">
                    <img class = "sm_icon" id = "fb" src = "../media/social_media_icons/facebook_icon.png">
                </a>
                <a href = "https://www.twitter.com/farbenfuchs/">
                    <img class = "sm_icon" id = "tw" src = "../media/social_media_icons/twitter_icon.png">
                </a>
                <a href = "https://www.instagram.com/calisto.c/">
                    <img class = "sm_icon" id = "ig" src = "../media/social_media_icons/instagram_icon.png">
                </a>
                <a href = "https://www.twitch.tv/farbenfuchs/">
                    <img class = "sm_icon" id = "twc" src = "../media/social_media_icons/twitch_icon.png">
                </a>
            </div>
        </div>
    </body>    
</html>