<?php 
  $action = isset($_GET['id']) ? "index.php?page=login.try&id=".$_GET['id'] : "index.php?page=login.try" 
?>

<form class="register_group login_group" action="<?=$action;?>" method="post">  
  <div class="small_container">  
    <div class="gap row">
      <h2>Login</h2>
     
      <p class="gap">Don't have an account yet? <a href="./?page=register">Register here!</a></p>
      <input class="register_field login_field gap_right gap" type="email" name="email" id="email" placeholder="Email:"><!--
      --><input class="register_field login_field" type="password" name="password" id="password" placeholder="Password:">
        <?php if(isset($this->data['login-error'])): ?>
          <p class="error_field"><?= $this->data['login-error'] ?></p>
        <?php endif; ?>
      <p>Forgot your password? No worries, just <a href="./?page=register">Click Here!</a></p>
    </div>
  </div>  
  <div class="small_container">  
    <div class="row">

      <div class="login_button gap">
        <div class="register_button">
          <input type="submit" name="login" value="LOGIN">

        </div>
      </div>
    </div>
  </div>
</form>    