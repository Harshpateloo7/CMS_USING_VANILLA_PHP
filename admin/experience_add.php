<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_POST['job_title'])) {
  if ($_POST['job_title'] and $_POST['company_name']) {
    $query = 'INSERT INTO experience (
        job_title,
        company_name,
        location,
        start_date,
        end_date,
        description
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['job_title']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['company_name']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['location']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['start_date']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['end_date']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['description']) . '"
      )';
    mysqli_query($connect, $query);
    set_message('Experience has been added');
  }
  header('Location: experience.php');
  die();
}
include('includes/header.php');
?>
<h2>Add Experience</h2>
<form method="post">
  <label for="job_title">Job Title:</label>
  <input type="text" name="job_title" id="job_title">
  <br>
  <label for="company_name">Company Name:</label>
  <input type="text" name="company_name" id="company_name">
  <br>
  <label for="location">Location:</label>
  <input type="text" name="location" id="location">
  <br>
  <label for="start-date">Start Date:</label>
  <input type="date" name="start-date" id="start-date">
  <br>
  <label for="end-date">End Date:</label>
  <input type="date" name="end-date" id="end-date">
  <br>
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="3"></textarea>
  <script>
    ClassicEditor
      .create(document.querySelector('#description'))
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>
  <br>
  <input type="submit" value="Add Experience">
</form>
<p><a href="experience.php"><i class="fas fa-arrow-circle-left"></i> Return to Experience List</a></p>
<?php
include('includes/footer.php');
?>