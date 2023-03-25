<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
if (isset($_GET['delete'])) {
  $query = 'DELETE FROM aboutme
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);
  set_message('About me has been deleted');
  header('Location: aboutme.php');
  die();
}
include('includes/header.php');
$query = 'SELECT * FROM aboutme ORDER BY name DESC';
$result = mysqli_query($connect, $query);
?>
<h2>About Me </h2>
<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Title</th>
    <th align="center">Description</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=aboutme&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center">
        <?php echo $record['id']; ?>
      </td>
      <td align="left">
        <?php echo htmlentities($record['name']); ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['title']); ?>
      </td>
      <td align="center">
        <?php echo htmlentities($record['description']); ?>
      </td>
      <td align="center"><a href="aboutme_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="aboutme_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="aboutme.php?delete=<?php echo $record['id']; ?>"
          onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
<p><a href="aboutme_add.php"><i class="fas fa-plus-square"></i> Add About me</a></p>
<?php
include('includes/footer.php');
?>