<?php
require_once __DIR__ . "/inc/header.php";
// ini_set("display_errors", 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST'):

  // if (!isset($_POST['username']) || !isset($_POST['remember'])):
  //   die();
  // endif;

  $username = $_POST["username"];

  if (isset($_POST['remember'])):
    setcookie("username", $username, time() + 60 * 60 * 24 * 30);

  else:
    setcookie("username", "", time() - 3600);
  endif;
  header('location: ' . $_SERVER['PHP_SELF']);

endif;
?>

<h1>Tehtävä 2</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <?php
  $value = "";

  if (isset($_COOKIE['username'])):
    echo "<p>Welcome back, " . $_COOKIE['username'] . "!</p>";
    $value = $_COOKIE['username'];
  else:
    echo "<p>Welcome, guest!</p>";
    $value = "";
  endif;
  ?>

  <div>
    <label for="username">Give your username:</label>
    <br>
    <input type="text" name="username" id="username" placeholder="username here..." value="<?php echo $value ?>">
  </div>
  <br>
  <div>
    <!-- remember me -->
    <?php
    if (isset($_COOKIE["username"])):
      $checked = "checked";
    else:
      $checked = "";
    endif;

    ?>

    <label for="remember">Remember me</label>
    <input type="checkbox" name="remember" id="remember" checked="<?php $checked ?>">
  </div>

  <br>
  <button type="submit">
    Submit
  </button>
</form>

<?php

require_once __DIR__ . "/inc/footer.php";