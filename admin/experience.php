<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_GET['delete'])) {
  $query = 'DELETE FROM experience
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);
  set_message('Experience has been deleted');
  header('Location: experience.php');
  die();
}
include('includes/header.php');
$query = 'SELECT *
  FROM experience
  ORDER BY end_date DESC';
$result = mysqli_query($connect, $query);
?>
<h2>Manage Experiences</h2>
<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Job Title</th>
    <th align="center">Company Name</th>
    <th align="center">Location</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
    <th align="center">Description</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td align="center">
        <?php echo $record['id']; ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['job_title']); ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['company_name']); ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['location']); ?>
      </td>
      <td align="center" style="white-space: nowrap;">
        <?php echo htmlentities($record['start_date']); ?>
      </td>
      <td align="center" style="white-space: nowrap;">
        <?php echo htmlentities($record['end_date']); ?>
      </td>
      <td align="left">
        <?php echo $record['description']; ?>
      </td>
      <td align="center">
        <a href="experience_edit.php?id=<?php echo $record['id']; ?>">Edit</i>
        </a>
      </td>
      <td align="center">
        <a href="experience.php?delete=<?php echo $record['id']; ?>"
          onclick="javascript:confirm('Are you sure you want to delete this experience?');">Delete</i>
        </a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
<p><a href="experience_add.php"><i class="fas fa-plus-square"></i> Add Experience</a></p>
<?php
include('includes/footer.php');
?>