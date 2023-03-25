<!DOCTYPE html>
<html lang=en>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <title>Harshadkumar Patel Portfolio</title>
  <link href="styles.css" type="text/css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
</head>
<?php
include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');
?>
<body>
  <!-- navigation -->
  <header>
    <div class="containerNav">
      <nav>
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#aboutme">About</a></li>
          <li><a href="#education">Education</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#project">Project</a></li>
          <li><a href="#certification">Certification</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- hero section -->
  <section id="home">
    <div class="container-hero">
      <h1>Hello! I'm Harshadkumar Patel <br> Full Stack Web Developer</h1>
    </div>
  </section>
  <!-- About me section  -->
  <section id="aboutme">
    <div class="container bg-color">
      <?php
      $query = 'SELECT * FROM aboutme ORDER BY id ';
      $result = mysqli_query($connect, $query);
      ?>
      <div>
        <h2>About Me</h2>
        <?php
        while ($record = mysqli_fetch_assoc($result)): ?>
          <div class="about-flex">
            <div>
              <?php if ($record['photo']): ?>
                <img src="<?php echo $record['photo']; ?>">
              <?php else: ?>
                <p>This record does not have an image!</p>
              <?php endif; ?>
            </div>
            <div>
              <h3>
                <?php echo $record['name']; ?>
              </h3>
              <h4>
                <?php echo $record['title']; ?>
              </h4>
              <p>
                <?php echo $record['description']; ?>
              </p>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <!-- education section -->
  <section id="education">
    <div class="container">
      <?php
      $query = 'SELECT * FROM education ORDER BY startDate DESC';
      $result = mysqli_query($connect, $query);
      ?>
      <div>
        <h2>Education History</h2>
        <table id="tableDesign">
          <thead>
            <tr>
              <th>College</th>
              <th>Course</th>
              <th>Duration</th>
              <th>Country</th>
            </tr>
          </thead>
          <?php
          while ($record = mysqli_fetch_assoc($result)): ?>
          <tbody>
              <tr>
                <td>
                  <?php echo $record['collegeName']; ?>
                </td>
                <td>
                  <?php echo $record['courseName']; ?>
                </td>
                <td>
                  <?php echo $record['startDate']; ?> to
                  <?php echo $record['endDate']; ?>
                </td>
                <td>
                  <?php echo $record['location']; ?>
                </td>
              </tr>
          </tbody>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
  </section>
  <!-- Experience section -->
  <section id="experience">
    <div class="container bg-color">
      <?php
      $query = 'SELECT * FROM experience ORDER BY start_date DESC';
      $result = mysqli_query($connect, $query);
      ?>
      <div>
        <h2>Experience</h2>
        <table id="tableDesign">
          <tbody>
            <?php while ($record = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td>
                  <?php echo $record['job_title']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $record['company_name']; ?>
                  <?php echo $record['location']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $record['start_date']; ?> to
                  <?php echo $record['end_date'] ?>
                </td>
              </tr>
              <tr>
                <td>
                  <p>
                    <?php echo $record['description']; ?>
                  </p>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- Skill section -->
  <section id="skills">
    <div class="container">
      <?php
      $query = 'SELECT * FROM `skills` ORDER BY `percent` DESC';
      $result = mysqli_query($connect, $query);
      ?>
      <div>
        <h2>Skills</h2>
        <table id="tableDesign">
          <thead>
            <tr>
              <th>Name</th>
              <th>Percent</th>
              <th>Photo</th>
            </tr>
          </thead>
          <?php while ($record = mysqli_fetch_assoc($result)): ?>
            <tbody>
              <tr>
                <td style="width:20px">
                  <?php echo $record['name']; ?>
                </td>
                <td>
                  <div class="skillIndicator">
                    <div class="skillColor" style="width:<?php echo $record['percent']; ?>%;">
                      <?php echo $record['percent']; ?>%
                    </div>
                </td>
                <td style="width:25px">
                  <?php if ($record['photo']): ?>
                    <img src="<?php echo $record['photo']; ?>" width="50px" height="50px" alt="image for skill ">
                  <?php else: ?>
                    <p>This record does not have an image!</p>
                  <?php endif; ?>
                </td>
              </tr>
            </tbody>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
  </section>
  <!-- Project list section -->
  <section id="project">
    <div class="container bg-color align-center">
      <?php
      $query = 'SELECT * FROM projects ORDER BY date DESC';
      $result = mysqli_query($connect, $query);
      ?>
      <h2>Recent Projects</h2>
      <table id="tableDesign">
      <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Photo</th>
          </tr>
        </thead>
        <?php while ($record = mysqli_fetch_assoc($result)): ?>
        <tbody>
            <tr>
              <td>
                <?php echo $record['title']; ?>
              </td>
              <td>
                <p>
                  <?php echo $record['content']; ?>
              </td>
              <td>
                <?php if ($record['photo']): ?>
                  <img src="<?php echo $record['photo']; ?>" width="450px" height="auto">
                <?php else: ?>
                  <p>This record does not have an image!</p>
                <?php endif; ?>
              </td>
            </tr>
        </tbody>
        <?php endwhile; ?>
      </table>
    </div>
  </section>
  <!-- certificate section -->
  <section id="certification">
    <div class="container">
      <?php
      $query = 'SELECT * FROM `certification` ORDER BY `certification`.`name` ASC';
      $result = mysqli_query($connect, $query); 
      ?>
      <h2>certification</h2>
      <table id="tableDesign">
        <thead>
          <tr>
            <th>Name</th>
            <th>URL</th>
            <th>Date</th>
          </tr>
        </thead>
        <?php while( $record = mysqli_fetch_assoc($result)):?>
        <tbody>
          <tr>
            <td><?php echo $record['name'];?></td>
            <td><a target="_blank"href="<?php echo $record['url'];?>">Click Me</a></td>
            <td><?php echo $record['date'];?></td>
          </tr>
        </tbody>
        <?php endwhile;?>
      </table>
    </div>
  </section>
  <!-- Contact infomation section -->
  <section id="contact">
    <h2>Contact</h2>
    <div class="container  bg-color align-center">
      <p>Hello! I am interested in a Web Development project! Please reach out to me though one of the social media
        links. Thank you for your time!</p>
      <div class="socialList">
        <a target="_blank" href="https://www.instagram.com/harshpateloo7/"><img src="image/instagram.png"
            alt="instagtam icon"></a>
        <a target="_blank" href="https://www.linkedin.com/in/harshpateloo7/"><img src="image/linkedin.png"
            alt="linkedin icon"></a>
        <a target="_blank" href="https://twitter.com/Harshpateloo7/"><img src="image/twitter.png"
            alt="twitter icon"></a>
        <a target="_blank" href="https://github.com/Harshpateloo7/"><img src="image/github.png" alt="github icon"></a>
      </div>
      <p> &copy; Copyright Harshadkumar, 2023.</p>
    </div>
  </section>
</body>

</html>