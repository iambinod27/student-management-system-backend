<div id="teachers" class="tabcontent">
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

  <div class="container">
    <!-- breadcrumb -->
    <p class="breadcrumb">Home > Teachers</p>
    <!-- end of breadcrumb -->

    <div class="teachers">
      <div id="teachers-Modal" class="teachers-modal">
        <div class="teachers-modal-content" id="teachers-modal-content">
          <form class="form-dashboard" method="post" action="index.php">
            <button class="teachers-close">&times;</button>
            <h2>Teacher Information</h2>

            <div class="form-control">
              <div class="form-d-group">
                <label>First Name</label>
                <input type="text" name="fname" class="form-d-input" />
              </div>
              <div class="form-d-group">
                <label>Middle Name</label>
                <input type="text" name="mname" class="form-d-input" />
              </div>
              <div class="form-d-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-d-input" />
              </div>
            </div>
            <div class="form-control">
              <div class="form-d-group">
                <label>Gender</label>
                <select name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="others">others</option>
                </select>
              </div>
              <div class="form-d-group">
                <label>Date of Birth (A.D)</label>
                <input type="date" name="dob" class="form-d-input" data-date-format="YYYY-MM-DD" />
              </div>
            </div>
            <div class="form-control">

              <div class="form-d-group">
                <label>Phone Number</label>
                <input type="number" name="number" class="form-d-input" />
              </div>
            </div>
            <div class="form-control">
              <div class="form-d-group">
                <label>Email</label>
                <input type="email" name="email" class="form-d-input" />
              </div>
            </div>
            <div class="form-control">
              <div class="form-d-group">
                <label>Address</label>
                <input type="text" name="address" class="form-d-input" />
              </div>

            </div>
            <div class="form-control">
              <div class="form-d-group">
                <label>Subjects</label>
                <input type="text" name="subjects" class="form-d-input" />
              </div>
            </div>

            <div class="form-control">
              <input type="submit" name="teachersubmit" value="Save Changes" class="form-d-button" />
            </div>
          </form>
        </div>
      </div>

      <!-- teacher end -->
      <?php
      require_once "./database.php";
      if (isset($_POST['teachersubmit'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $errors = array();



        $usersql = "INSERT INTO users(first_name ,middle_name, last_name, gender, address, dob, phone, email, password) VALUES ('$fname', '$mname', '$lname',  '$gender', '$address', '$dob',  $number, '$email', '$dob')";

        if (mysqli_query($conn, $usersql)) {
          $user_id = mysqli_insert_id($conn);
          $teacherSql = "INSERT INTO teachers (user_id) VALUES ($user_id)";
          if (mysqli_query($conn, $teacherSql)) {
            echo "<div class='success-info info'>Teachers Records Added succesfully</div>";
          } else {
            echo "<div class='error-info info'>ERROR: Hush! Sorry $teachersql.</div>" . mysqli_error($conn);
          }
        }
      }


      ?>

      <div class="headAdd">

        <h2>Teacher & Staffs</h2>
        <button class="add-button" id="openTeachersModal">Add+</button>
      </div>

      <div class="form-control">
        <input type="text" class="form-d-input" placeholder="Search" />
      </div>
      <!-- table -->
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">S.ID</div>
          <div class="col col-2">Full Name</div>
          <div class="col col-3">Gender</div>
          <div class="col col-4">Address</div>
          <div class="col col-6">Phone No.</div>
          <div class="col col-7">Action</div>
        </li>
        <?php

        $teacherSql = "SELECT t.id, u.first_name, u.middle_name, u.last_name, u.gender, u.address, u.phone FROM teachers as t JOIN
              users as u ON t.user_id = u.id;";
        $teacherresult = mysqli_query($conn, $teacherSql);


        if (isset($_POST['deleteTeacher'])) {
          if (isset($_POST['teacherDelId'])) {
            // Establish a database connection ($conn) here

            $teacherDelId = $_GET['teacherDelId'];

            $deleteTeacherSQL = "DELETE FROM teachers WHERE id = $teacherDelId";
            $deleteTeacherResult = mysqli_query($conn, $deleteTeacherSQL);

            echo 'delete Successfully';
          } else {
            echo 'Missing teacherDelId parameter.';
          }
        }

        while ($row = mysqli_fetch_assoc($teacherresult)) {
          echo '<li class="table-row">
              <div class="col col-1">' . $row['id'] . '</div>
              <div class="col col-2">' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '</div>
              <div class="col col-3">' . $row['gender'] . '</div>
              <div class="col col-4">' . $row['address'] . '</div>
              <div class="col col-6">' . $row['phone'] . '</div>
              <div class="col col-7">
              <div class="action-icon">
                  <div class="teacher-drop-modal" id="teacherdropModal-' . $row['id'] . '">
                    <div class="teacher-drop-modal-content">
                      <div class="teacher-drop ">
                        <span class="teacherdropclose" onclick="closeTeacherDropModal(' . $row['id'] . ')">&times;</span>
                      <form method="POST" class="teacher-drop-content" action="index.php?teacherDelId=' . $row['id'] . '">
                         Are you sure? You want to delete
                          <button class="teacher-drop-btn" name="deleteTeacher" type="submit" >
                           Confirm Delete
                          </button>
                     </form>
                    </div>
                   </div>
                  </div>

              <div>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"z`
                  fill="currentColor"
                  class="bi bi-pencil-square"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                  />
                </svg>
              </div>
              <div onclick="openTeacherDropModal(' . $row['id'] . ')" >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-trash-fill"
                  viewBox="0 0 16 16"

                >
                  <path
                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                  />
                </svg>
              </div>
            </div>
               </div>
              </li>
              ';
        }
        ?>
        <!-- table-list -->

        <!-- end of table-list -->
        <!-- table-list -->
        <!-- end of table-list -->
      </ul>
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