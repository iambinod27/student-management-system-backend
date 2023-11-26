<div id="classes" class="tabcontent">
  <!-- Navbar -->
  <nav class="nav">
    <div class="hamburger">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
      </svg>
    </div>
    <p>Welcome to Student Management System</p>
    <div class="nav-admin">
      <a href="./pages/logout.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
        logout <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </a>
    </div>
  </nav>

  <!-- Navbar -->

  <!-- class start -->

  <div class="container">
    <!-- breadcrumb -->
    <p class="breadcrumb">Home > Classes</p>
    <!-- end of breadcrumb -->

    <div class="classes">
      <h2>All Classes</h2>
      <?php


      ?>


      <form class="form-select" method="post" action="index.php">
        <label for="class">Select Class :</label>

        <select name='selectClass'>
          <?php
          require "./database.php";

          $classQuery = 'SELECT id, grade_name FROM classes';
          $classResult = mysqli_query($conn, $classQuery);

          while ($row = mysqli_fetch_assoc($classResult)) {
            echo ("
                  <option value={$row['id']} > {$row['grade_name']} </option>
                  ");
          }
          ?>
        </select>
        <input type="submit" name="csubmit" value="Apply">
      </form>


      <h4>Class : Nine</h4>
      <p>Teacher : Pannalal BK</p>
      <p>Total : 36</p>

      <!-- table -->
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">S.ID</div>
          <div class="col col-2">Full Name</div>
          <div class="col col-3">Gender</div>
          <div class="col col-5">Section</div>
          <div class="col col-6">Phone No.</div>
        </li>
        <!-- table-list -->


        <?php

        if (isset($_POST['csubmit'])) {
          $Selectedclass = $_POST['selectClass'];

          require_once "./database.php";

          $classListingQuery =
            'SELECT
                 t.student_id, t.class_id, t.years, s.first_name, s.middle_name, s.last_name, s.gender, s.phone, st.section_name
                FROM
                 classstudents AS t
                JOIN
                  students AS s ON t.student_id = s.id
                JOIN
                  sections AS st ON s.section_id = st.id
                WHERE
                  t.class_id = ' .  $Selectedclass . ';
                ';

          $classResult = mysqli_query($conn, $classListingQuery);




          while ($classRow = mysqli_fetch_assoc($classResult)) {
            echo (
              '
                    <li class="table-row">
                      <div class="col col-1">' . $classRow['student_id'] . '</div>
                      <div class="col col-2">' . $classRow['first_name'] . ' ' . $classRow['middle_name'] . ' ' . $classRow['last_name'] . ' </div>
                      <div class="col col-3">' . $classRow['gender'] . '</div>
                      <div class="col col-5">' . $classRow['section_name'] . '</div>
                      <div class="col col-6">' . $classRow['phone'] . '</div>
                    </li>
                    <!-- end of table-list -->
                    '
            );
          }
        }
        ?>

      </ul>
      <!-- end of table -->

    </div>
  </div>
</div>