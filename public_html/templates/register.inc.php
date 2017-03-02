<?php

 $action= isset($_GET['id']) ? "./?page=register.update" : "./?page=register.store";
 $title= isset($_GET['id']) ? " Edit your details" : " Register";
 $value= isset($_GET['id']) ? " UPDATE" : " REGISTER";

?>

  <form class="register_group" action=<?= $action; ?> method="post">  
    <input type="hidden" name="id" value="<?php echo $_SESSION ['user_id']; ?>">
    <div class="small_container">  
      <div class="gap row">
        <h2><?= $title; ?></h2>
        <p class="gap">Please note - only your Username will be publicly visible</p>
        <table class="gap">
          <tbody>
            <tr class="register_row_one">
              <td class="left_side">
                <?php $first_name = isset ($_POST['first_name']) ? $_POST['first_name'] : $user->first_name; ?><input class="register_field" type="text" value="<?=$first_name ?>" name="first_name" placeholder="First Name:"><p class="error_field"><?= isset($this->data['first_name']) ? $this->data['first_name'] : '' ?></p>
              </td><!--
              --><td class="right_side">
                <?php $last_name = isset ($_POST['last_name']) ? $_POST['last_name'] : $user->last_name; ?><input class="register_field" type="text" value="<?=$last_name ?>" name="last_name" placeholder="Last Name:"><p class="error_field"><?= isset($this->data['last_name']) ? $this->data['last_name'] : '' ?></p>
              </td>
            </tr><!--
            --><tr class="register_row_two">
              <td class="left_side">
                <?php $email = isset ($_POST['email']) ? $_POST['email'] : $user->email; ?><input class="register_field" type="email" value="<?=$email ?>" name="email" id="email" placeholder="Email:"><p class="error_field"><?= isset($this->data['email']) ? $this->data['email'] : '' ?></p>
              </td><!--
              --><td class="right_side"><?php $username = isset ($_POST['username']) ? $_POST['username'] : $user->username; ?><input class="register_field" type="username" value="<?=$username ?>" name="username" placeholder="Username:"><p class="error_field"><?= isset($this->data['username']) ? $this->data['username'] : '' ?></p>
              </td>
            </tr><!--
            --><tr class="register_row_three">
              <td class="left_side"><input class="register_field" type="password" name="password" id="password" placeholder="Password:"><p class="error_field"><?= isset($this->data['password']) ? $this->data['password'] : '' ?></p>
              </td><!--
              --><td class="right_side"><input class="register_field" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password:">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>  
    <div class="small_container">  
      <div class="row">
        <div class="register_button_group gap">
          <div class="register_button">
            <input type="submit" name="register" value=<?= $value; ?>>
          </div>
        </div>
      </div>
    </div>
  </form>    