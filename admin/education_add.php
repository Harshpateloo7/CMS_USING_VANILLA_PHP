<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_POST['collegeName'])) {
  if ($_POST['collegeName'] and $_POST['courseName']) {

    $query = 'INSERT INTO education (
        collegeName,
        courseName,
        startDate,
        endDate,
        location
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['collegeName']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['courseName']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['startDate']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['endDate']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['location']) . '"
      )';
    mysqli_query($connect, $query);
    set_message('Education has been added');
  }
  header('Location: education.php');
  die();
}
include('includes/header.php');
?>
<h2>Add Education</h2>
<form method="post">
  <label for="collegeName">College Name:</label>
  <input type="text" name="collegeName" id="collegeName">
  <br>
  <label for="courseName">Course Name:</label>
  <input type="text" name="courseName" id="courseName">
  <br>
  <label for="startDate">Start Date:</label>
  <input type="date" name="startDate" id="startDate">
  <br>
  <label for="endDate">End Date:</label>
  <input type="date" name="endDate" id="endDate">
  <br>
  <label for="location">Location</label>
  <input type="text" name="location" id="location">
  <br>
  <input type="submit" value="Add Education">
</form>
<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>

<?php
include('includes/footer.php');
?>