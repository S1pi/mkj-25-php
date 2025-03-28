<?php
require_once __DIR__ . "/inc/header.php";
// ini_set("display_errors", 0);
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'):

  if (!isset($_POST['color']) || !isset($_POST['size']) || !isset($_POST['style'])):
    die();
  endif;

  $color = $_POST["color"];

  $size = $_POST['size'];

  $style = $_POST['style'];


  $style_string = "color: $color;";

  $style_string .= "font-size: $size;";

  if (in_array("italic", $style)):
    $style_string .= "font-style: italic;";
  endif;
  if (in_array("bold", $style)):
    $style_string .= "font-weight: bold;";

  endif;

endif;

?>

<p style="<?php echo $style_string ?>">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet corporis
  nesciunt
  quia
  culpa nisi veniam, possimus laudantium eum. Quae ipsa vitae corporis fugit at sunt voluptas nihil eius repellat nisi.
</p>

<h1>Tehtävä 1</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3>Choose a color:</h3>
  <div>
    <label for="color-red">Red</label>
    <input type="radio" name="color" id="color-red" value="red" />

    <label for="color-green">Green</label>
    <input type="radio" name="color" id="color-green" value="green" />

    <label for="color-blue">Blue</label>
    <input type="radio" name="color" id="color-blue" value="blue" />

  </div>
  <br>
  <div>

    <label for="size">Choose a size:</label>
    <br>
    <select name="size[]" id="size" multiple>
      <option value="small">Small</option>
      <option value="medium">Medium</option>
      <option value="large">Large</option>
    </select>
  </div>
  <br>

  <div>
    <label for="Italic">Italic</label>
    <input type="checkbox" name="style[]" id="Italic" value="italic">

    <label for="Bold">Bold</label>
    <input type="checkbox" name="style[]" id="Bold" value="bold">
  </div>

  <br>
  <button type="submit">
    Submit
  </button>
</form>

<?php
require_once __DIR__ . "/inc/footer.php";