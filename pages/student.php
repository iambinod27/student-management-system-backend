<div id="student" class="tabcontent">
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
        <?php require('assets/svg/close.svg') ?>
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
    <p class="breadcrumb">Home > Students</p>
    <!-- end of breadcrumb -->

    <?php
    require_once "./database.php";
    if (isset($_POST['submit'])) {
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $gname = $_POST['gname'];
      $number = $_POST['number'];
      $address = $_POST['address'];
      $class = $_POST['class'];
      $section = $_POST['section'];
      $roll_no = $_POST['rollno'];
      $years = $_POST['years'];
      $errors = array();



      $sql = "INSERT INTO students (first_name ,middle_name, last_name, gender, address, dob, guardian_name, phone, section_id, roll_no) VALUES ('$fname', '$mname', '$lname',  '$gender', '$address', '$dob', '$gname', $number, $section, $roll_no)";

      if (mysqli_query($conn, $sql)) {
        $student = mysqli_insert_id($conn);
        $classSql = "INSERT INTO classstudents (class_id, student_id, years) VALUES ('$class', '$student', $years)";
        if (mysqli_query($conn, $classSql)) {
          echo "<div class='success-info info'>Student Added succesfully</div>";
        } else {
          echo "<div class='error-info info'>ERROR: Hush! Sorry $classSql.</div>" . mysqli_error($conn);
        }
      }
      // Close connection
      mysqli_close($conn);
    }
    // Delete Student
    if (isset($_POST['deleteStudent'])) {

      if (isset($_GET['studentDelId'])) {
        $studentDelId = $_GET['studentDelId'];
        $deleteStudentSQL = "DELETE FROM students WHERE id = $studentDelId";
        if (mysqli_query($conn, $deleteStudentSQL)) {
          echo "<div class='success-info info'>Student with id {$_GET['studentDelId']}  deleted succesfully</div>";
        } else {
          echo "<div class='error-info info'>ERROR: Hush! Sorry $classSql.</div>" . mysqli_error($conn);
        }
      }
      mysqli_close($conn);
    }
    // End of Delete Student
    ?>
    <div id="myModal" class="modal">
      <div class="modal-content" id="modal-content">
        <form class="form-dashboard" method="post" action="index.php">
          <span class="close">&times;</span>
          <h2>Student Information</h2>

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
              <label>Guardian Name</label>
              <input type="text" name="gname" class="form-d-input" />
            </div>
            <div class="form-d-group">
              <label>Phone Number</label>
              <input type="number" name="number" class="form-d-input" />
            </div>
          </div>
          <div class="form-control">
            <div class="form-d-group">
              <label>Address</label>
              <input type="text" name="address" class="form-d-input" />
            </div>
          </div>
          <div class="form-control">
            <div class="form-select form-d-group">
              <label for="class">Class</label>

              <select name="class" id="One">
                <?php
                require "./database.php";

                $classQuery = 'SELECT id, grade_name FROM classes';
                $classResult = mysqli_query($conn, $classQuery);

                while ($row = mysqli_fetch_assoc($classResult)) {
                  echo ("<option value={$row['id']}> {$row['grade_name']} </option>");
                }

                ?>
              </select>

            </div>
            <div class="form-select form-d-group">
              <label for="section">Section</label>

              <select name="section" id="One">
                <?php
                require "./database.php";

                $sectionQuery = 'SELECT id, section_name FROM sections';
                $sectionResult = mysqli_query($conn, $sectionQuery);

                while ($row = mysqli_fetch_assoc($sectionResult)) {
                  echo ("<option value={$row['id']}> {$row['section_name']} </option>");
                }

                ?>
              </select>

            </div>
          </div>
          <div class="form-control">
            <div class="form-d-group">
              <label>Roll No</label>
              <input type="number" name="rollno" class="form-d-input" />
            </div>
            <div class="form-d-group">
              <label>Years</label>
              <input type="date" name="years" class="form-d-input" data-date-format="YYYY-MM-DD" />
            </div>
          </div>

          <div class="form-control">
            <input type="submit" name="submit" value="Save Changes" class="form-d-button" />
          </div>
        </form>
      </div>
    </div>