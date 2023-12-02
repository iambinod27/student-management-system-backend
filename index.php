<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: pages/login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Management System | Dashboard</title>

  <!-- Global CSS -->
  <link rel="stylesheet" href="./assets/css/global.css" />
  <link rel="stylesheet" href="./assets/css/components/nav.css">
  <link rel="stylesheet" href="./assets/css/pages/index.css" />
  <link rel="stylesheet" href="./assets/css/components/modal.css">
  <link rel="stylesheet" href="./assets/css/components/dropmodal.css">
  <link rel="stylesheet" href="./assets/css/components/teachersmodal.css">
  <link rel="stylesheet" href="./assets/css/components/teacherdropmodal.css">

  <script src="./assets/js/hamburger.js" defer></script>
  <script src="./assets/js/sideBar.js" defer></script>
  <script src="./assets/js/modal.js" defer></script>
  <script src="./assets/js/dropModal.js" defer></script>
  <script src="./assets/js/teachersModal.js" defer></script>
  <script src="./assets/js/teacherDropModal.js" defer></script>

</head>

<body>
  <main>
    <div class="tab" id="mySidenav">
      <div class="logo-section">
        <h2 class="logo">LOGO</h2>
        <div class="hamburger">
          <button class="mySidenavToggler">
            <!-- Burger icon -->
            <?php require('assets/svg/burger.svg') ?>
            <!-- End of Burger icon -->

            <!-- Close icon -->
            <!-- <?php require('assets/svg/close.svg') ?> -->
            <!-- End of Close icon -->
          </button>
        </div>
      </div>
      <button class="tablinks active">
        <?php require('assets/svg/dashboard.svg') ?>
        <span class="tablinks-name">
          Dashboard
        </span>
      </button>
      <button class="tablinks">
        <?php require('assets/svg/student.svg') ?>

        <span class="tablinks-name">
          Students
        </span>
      </button>
      <button class="tablinks">
        <?php require("assets/svg/class.svg") ?>
        <span class="tablinks-name">
          Classes
        </span>
      </button>
      <button class="tablinks">
        <?php require("assets/svg/book.svg") ?>
        <span class="tablinks-name">
          Teachers
        </span>
      </button>
      <button class="tablinks">
        <?php require("assets/svg/attendance.svg") ?>
        <span class="tablinks-name">
          Attendance
        </span>
      </button>
    </div>

    <!-- dashboard -->
    <?php require_once("pages/dashboard.php") ?>
    <!-- end of dashboard -->

    <!-- student start -->

    <?php require_once("pages/student.php") ?>
    <!-- student end -->






    <div class="student">
      <div class="headAdd">
        <h2>All students</h2>
        <button class="add-button" id="openModalBtn">Add +</button>
      </div>

      <div class="form-control">
        <input type="text" class="form-d-input" placeholder="Search" />
      </div>



      <!-- table -->
      <?php
      require "./database.php";
      $query = 'SELECT students.id, students.middle_name, students.last_name, students.gender, students.phone, students.first_name, classes.grade_name, sections.section_name FROM
            students
            JOIN
                classstudents ON students.id = classstudents.student_id
            JOIN
                classes ON classstudents.class_id = classes.id
            JOIN
                sections ON students.section_id = sections.id; ';

      $result = mysqli_query($conn, $query);

      ?>

      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">S.ID</div>
          <div class="col col-2">Full Name</div>
          <div class="col col-3">Gender</div>
          <div class="col col-4">Grade</div>
          <div class="col col-5">Section</div>
          <div class="col col-6">Phone No.</div>
          <div class="col col-7">Action</div>
        </li>
        <!-- table-list -->
        <?php
        while ($row = mysqli_fetch_assoc($result)) {


          echo '<li class="table-row">
          <div class="col col-1">' . $row['id'] . '</div>
          <div class="col col-2">' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '</div>
                        <div class="col col-3">' . $row['gender'] . '</div>
                        <div class="col col-4">' . $row['grade_name'] . '</div>
                        <div class="col col-5">' . $row['section_name'] . '</div>
                        <div class="col col-6">' . $row['phone'] . '</div>
                        <div class="col col-7">
                            <div class="action-icon">
                                <div class="drop-modal" id="dropModal-' . $row['id'] . '">
                                  <div class="drop-modal-content">
                                      <div class="drop">
                                          <span class="dropclose" onclick="closeDropModal(' . $row['id'] . ')">&times;</span>
                                          <form action="index.php?studentDelId=' . $row['id'] . '" method="POST" class="drop-content">
                                              Are you sure? You want to delete
                                              <button name="deleteStudent" class="drop-btn">
                                                  Confirm Delete
                                              </button>
                                          </form>
                                      </div>
                                  </div>
                                </div>
                                <div>
                                <button class="editModalBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    </button>
                                </div>
                                <button id="dropModelBtn" onclick="openDropModal(' . $row['id'] . ')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>';
        }


        ?>

      </ul>
      <!-- end of table -->
      <!-- end of table -->

      <div class="pagination-container">
        <div class="pagination">
          <a href="#">Previous</a>
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">Next</a>
        </div>
      </div>
    </div>
    </div>
    </div>

    <!-- class start  -->
    <?php require_once("pages/class.php") ?>
    <!-- class end -->

    <!-- teacher start -->
    <?php require_once("pages/teacher.php") ?>
    <!-- teacher end  -->

    <!-- attendance start -->
    <?php require_once("pages/attendance.php") ?>
    <!-- attendance end -->


</body>

</html>