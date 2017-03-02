<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent Rave <?php echo "|" . $title; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <script src="https://use.fontawesome.com/e549bece36.js"></script>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="small_banner">
      <div class="nav_background">
        <div class="container">
          <nav id="navbar_default_override" class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div id="nav_alignment">
                  <ul id="header_nav_id" class="nav navbar-nav">
                    <li><a href="./"<?php if($page === "home"):?> class="activepage" <?php endif;?>>HOME <span class="sr-only">(current)</span></a></li>
                    <li><a href=".\?page=about"<?php if($page === "about"):?> class="activepage" <?php endif;?>>ABOUT</a></li>

                    <?php if(isset($_SESSION['user_id'])): ?> 

                      <li><a href=".\?page=account"<?php if($page === "account"):?> class="activepage" <?php endif;?>>PROFILE</a></li>
                      <li><a href=".\?page=logout"<?php if($page === "logout"):?> class="activepage" <?php endif;?>>LOGOUT</a></li>

                    <?php else: ?>  

                      <li><a href=".\?page=register" <?php if($page === "register"):?> class="activepage" <?php endif;?>>REGISTER</a></li>  
                      <li><a href=".\?page=login" <?php if($page === "login"):?> class="activepage" <?php endif;?>>LOGIN</a></li>                 
                    
                    <?php endif; ?>  

                    <li class="write_review_button_group" <?php if($page === "review"):?> class="activepage" <?php endif;?>><a id="write_review_btn" class="orange_button" href=".\?page=review">WRITE A REVIEW</a></li>
                  </ul>
                </div>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>  
        <div class="container home_logo">
          <img src="./images/rent_rave_logo.png">
          <form method="get" action="./?page=search" class="search_group">
              <span class="search_field search_area">
                <span class="search_span">Search:</span>
                  <select name="search_category" class=" search_bar dropdown selectpicker search_area_div" id="dropdownMenu1" data-toggle="dropdown" title="Street, Suburb, City or Agency">
                    <option value="address_street_number">Street</option>
                    <option value="address_suburb">Suburb</option>
                    <option value="address_city">City</option>
                  </select>
              </span><!--
              --><span class="search_field search_bar search_name">
                <span>Name:</span>
                <input type="hidden" name="page" value="search">
                <input type="text" name="search_term" placeholder="">
              </span><!--
              --><div class="search_bar_gap orange_button">
                <button type="submit" class="search_button">Search</button>
              </div>
          </form>
        </div>
    </div>   
    <div class="container"> 
    
      <?php
        $this->content();
      ?>

            <hr>
    </div>      
    <footer class="text-center">
      <div class="container">
        <nav id="navbar_default_override" class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div id="nav_alignment">
                <ul id="footer_nav_id" class="nav navbar-nav">
                  <li><a href="./"<?php if($page === "home"):?> class="activepage" <?php endif;?>>HOME <span class="sr-only">(current)</span></a></li>
                  <li><a href=".\?page=about"<?php if($page === "about"):?> class="activepage" <?php endif;?>>ABOUT</a></li>

                  <?php if(isset($_SESSION['user_id'])): ?> 

                    <li><a href=".\?page=account"<?php if($page === "account"):?> class="activepage" <?php endif;?>>PROFILE</a></li>
                    <li><a href=".\?page=logout"<?php if($page === "logout"):?> class="activepage" <?php endif;?>>LOGOUT</a></li>

                  <?php else: ?>  

                    <li><a href=".\?page=register" <?php if($page === "register"):?> class="activepage" <?php endif;?>>REGISTER</a></li>  
                    <li><a href=".\?page=login" <?php if($page === "login"):?> class="activepage" <?php endif;?>>LOGIN</a></li>                 
                  
                  <?php endif; ?>  

                  <li class="write_review_button_group" <?php if($page === "review"):?> class="activepage" <?php endif;?>><a id="write_review_btn" class="orange_button" href=".\?page=review">WRITE A REVIEW</a></li>
                </ul>
              </div>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </div>
      <div>
        <p class="copyright">&copy; Copyright Rent Rave <?php echo date('Y');?></p>
      </div>  
    </footer>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--  Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
  </body>
</html>      