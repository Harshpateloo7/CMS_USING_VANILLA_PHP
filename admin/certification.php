<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_GET['delete'])) {
  $query = 'DELETE FROM certification
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);
  set_message('Certification has been deleted');
  header('Location: certification.php');
  die();
}
include('includes/header.php');
$query = 'SELECT * 
  FROM certification 
  ORDER BY date DESC';
$result = mysqli_query($connect, $query);
?>
<h2>Manage Certification</h2>
<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Name</th>
    <th align="center">URL</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td align="center">
        <?php echo $record['id']; ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['name']); ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['url']); ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['date']); ?>
      </td>
      <td align="center">
        <a href="certification_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a>
      </td>
      <td align="center">
        <a href="certification.php?delete=<?php echo $record['id']; ?>"
          onclick="javascript:confirm('Are you sure you want to delete this certificate?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
<p><a href="certification_add.php"><i class="fas fa-plus-square"></i>Add Certification</a></p>
<?php
include('includes/footer.php');
?>