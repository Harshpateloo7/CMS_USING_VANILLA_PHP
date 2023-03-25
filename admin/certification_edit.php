<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (!isset($_GET['id'])) {
  header('Location: certification.php');
  die();
}
if (isset($_POST['name'])) {
  if ($_POST['name'] and $_POST['date']) {
    $query = 'UPDATE certification SET
      name = "' . mysqli_real_escape_string($connect, $_POST['name']) . '",
      date = "' . mysqli_real_escape_string($connect, $_POST['date']) . '",
      url = "' . mysqli_real_escape_string($connect, $_POST['url']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);
    set_message('Certification has been updated');
  }
  header('Location: certification.php');
  die();
}
if (isset($_GET['id'])) {
  $query = 'SELECT *
    FROM certification
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);
  if (!mysqli_num_rows($result)) {
    header('Location: certification.php');
    die();
  }
  $record = mysqli_fetch_assoc($result);
}
include('includes/header.php');
?>
<h2>Edit Certification</h2>
<form method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities($record['name']); ?>">
  <br>
  <label for="url">URL:</label>
  <input type="text" name="url" id="url" value="<?php echo htmlentities($record['url']); ?>">
  <br>
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities($record['date']); ?>">
  <br>
  <input type="submit" value="Edit Project">
</form>
<p><a href="certification.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>
<?php
include('includes/footer.php');
?>