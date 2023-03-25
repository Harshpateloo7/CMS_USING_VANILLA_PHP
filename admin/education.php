<?php
// Include required files
require_once 'includes/database.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
// Secure the page
secure();
// Delete education record if requested
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $query = "DELETE FROM education WHERE id = $id LIMIT 1";
  mysqli_query($connect, $query);
  set_message('Education has been deleted');
  header('Location: education.php');
  exit;
}
// Fetch education records
$query = 'SELECT * FROM education ORDER BY startDate DESC';
$result = mysqli_query($connect, $query);
// Render the page
include 'includes/header.php';
?>
<h2> Manage Education</h2>
<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">College Name</th>
    <th align="center">Course Name</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
    <th align="center">Location</th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td align="center">
        <?= $record['id'] ?>
      </td>
      <td align="center">
        <?= $record['collegeName'] ?>
      </td>
      <td align="center">
        <?= $record['courseName'] ?>
      </td>
      <td align="center" style="white-space: nowrap;">
        <?= htmlentities($record['startDate']) ?>
      </td>
      <td align="center" style="white-space: nowrap;">
        <?= htmlentities($record['endDate']) ?>
      </td>
      <td align="center" style="white-space: nowrap;">
        <?= $record['location'] ?>
      </td>
      <td align="center"><a href="education_edit.php?id=<?= $record['id'] ?>">Edit</a></td>
      <td align="center">
        <a href="education.php?delete=<?= $record['id'] ?>"
          onclick="return confirm('Are you sure you want to delete this education?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
<p><a href="education_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>
<?php include 'includes/footer.php' ?>