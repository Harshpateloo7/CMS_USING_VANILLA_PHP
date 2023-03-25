<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (!isset($_GET['id'])) {
  header('Location: aboutme.php');
  die();
}
if (isset($_POST['name'])) {
  if ($_POST['name'] and $_POST['title']) {
    $query = 'UPDATE aboutme SET
      name = "' . mysqli_real_escape_string($connect, $_POST['name']) . '",
      title = "' . mysqli_real_escape_string($connect, $_POST['title']) . '",
      description = "' . mysqli_real_escape_string($connect, $_POST['description']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);
    set_message('About Me has been updated');
  }
  header('Location: aboutme.php');
  die();
}
if (isset($_GET['id'])) {
  $query = 'SELECT *
    FROM aboutme
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);
  if (!mysqli_num_rows($result)) {
    header('Location: aboutme.php');
    die();
  }
  $record = mysqli_fetch_assoc($result);
}
include('includes/header.php');
?>
<h2>Edit About Me</h2>
<form method="post">
  <label for="name">Name:</lable>
    <input type="text" name="name" id="name" value="<?php echo htmlentities($record['name']); ?>">
    <br>
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo htmlentities($record['title']); ?>">
    <br>
    <label for="description">Description:</label>
    <textarea type="text" name="description" id="description"
      rows="5"><?php echo htmlentities($record['description']); ?></textarea>
    <input type="submit" value="Edit AboutMe">
</form>
<p><a href="aboutme.php"><i class="fas fa-arrow-circle-left"></i> Return to About Me</a></p>
<?php
include('includes/footer.php');
?>