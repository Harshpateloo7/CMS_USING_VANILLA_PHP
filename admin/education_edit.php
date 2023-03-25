<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (!isset($_GET['id'])) {
  header('Location: education.php');
  die();
}
if (isset($_POST['collegeName'])) {
  if ($_POST['collegeName'] and $_POST['courseName']) {

    $query = 'UPDATE education SET
      collegeName = "' . mysqli_real_escape_string($connect, $_POST['collegeName']) . '",
      courseName = "' . mysqli_real_escape_string($connect, $_POST['courseName']) . '",
      startDate = "' . mysqli_real_escape_string($connect, $_POST['startDate']) . '",
      endDate = "' . mysqli_real_escape_string($connect, $_POST['endDate']) . '",
      location = "' . mysqli_real_escape_string($connect, $_POST['location']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);
    set_message('Education has been updated');
  }
  header('Location: education.php');
}
if (isset($_GET['id'])) {
  $query = 'SELECT * FROM education WHERE id = ' . $_GET['id'] . ' LIMIT 1';
  $result = mysqli_query($connect, $query);
  if (!mysqli_num_rows($result)) {
    header('Location: education.php');
    die();
  }
  $record = mysqli_fetch_assoc($result);
}
include('includes/header.php');
?>
<h2>Edit Education</h2>
<form method="post">
  <label for="collegeName">College Name:</label>
  <input type="text" name="collegeName" id="collegeName" value="<?php echo htmlentities($record['collegeName']); ?>">
  <br>
  <label for="courseName">Course Name:</label>
  <input type="text" name="courseName" id="courseName" value="<?php echo htmlentities($record['courseName']); ?>">
  <br>
  <label for="startDate">Start Date:</label>
  <input type="date" name="startDate" id="startDate" value="<?php echo htmlentities($record['startDate']); ?>">
  <br>
  <label for="endDate">End Date:</label>
  <input type="date" name="endDate" id="endDate" value="<?php echo htmlentities($record['endDate']); ?>">
  <br>
  <label for="location">Location:</label>
  <input type="text" name="location" id="location" value="<?php echo htmlentities($record['location']); ?>">
  <input type="submit" value="Edit Education">
</form>
<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i>Return to Education List</a></p>
<?php
include('includes/footer.php');
?>