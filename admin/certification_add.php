<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_POST['name'])) {
  if ($_POST['name'] and $_POST['date']) {
    $query = 'INSERT INTO certification (
        name,
        url,
        date
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['name']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['url']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['date']) . '"
      )';
    mysqli_query($connect, $query);
    set_message('Certificate has been added');
  }
  header('Location: certification.php');
  die();
}
include('includes/header.php');
?>
<h2>Add Certificate</h2>
<form method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  <br>
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  <br>
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  <input type="submit" value="Add Certification">
</form>
<p><a href="certification.php"><i class="fas fa-arrow-circle-left"></i>Retrun to a Certification List</a></p>
<?php
include('includes/footer.php');
?>