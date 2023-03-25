<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_POST['name'])) {
  if ($_POST['name'] and $_POST['title']) {
    $query = 'INSERT INTO aboutme (
        name,
        title,
        description
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['name']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['description']) . '"
      )';
    mysqli_query($connect, $query);
    set_message('About me has been added');
  }
  header('Location: aboutme.php');
  die();
}
include('includes/header.php');
?>
<h2>Add About Me </h2>
<form method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  <br>
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
  <br>
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
  <input type="submit" value="Add About Me">
</form>
<p><a href="aboutme.php"><i class="fas fa-arrow-circle-left"></i> Return to About Me</a></p>
<?php
include('includes/footer.php');
?>