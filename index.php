

<?php 
    session_start();
    if(!isset($_SESSION['user'])){
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
    <link rel="stylesheet" href="./assets/css/pages/index.css" />
    <link rel="stylesheet" href="./assets/css/components/modal.css">
  </head>
  <body>
    <main>
      <div class="tab" id="mySidenav">
        <div class="logo">
          <h2>LOGO</h2>
          <div onclick="onClose()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              viewBox="0 0 16 16"
            >
              <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"
              />
            </svg>
          </div>
        </div>
        <button class="tablinks" onclick="openCity(event, 'dashboard')">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"
            />
            <path
              d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"
            />
          </svg>
          Dashboard
        </button>
        <button
          class="tablinks"
          onclick="openCity(event, 'student')"
          id="defaultOpen"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"
            />
          </svg>
          Students
        </button>
        <button class="tablinks" onclick="openCity(event, 'classes')">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
            />
            <path
              d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"
            />
          </svg>
          Classes
        </button>
        <button class="tablinks" onclick="openCity(event, 'teachers')">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
            />
          </svg>
          Teachers
        </button>
        <button class="tablinks" onclick="openCity(event, 'attendance')">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"
            />
            <path
              d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"
            />
            <path
              d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"
            />
          </svg>
          Attendance
        </button>
      </div>

      <!-- dashboard -->
      <div id="dashboard" class="tabcontent">
        <nav class="nav">
          <div class="hamburger" onclick="onOpen()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-list"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
              />
            </svg>
          </div>
          <p>Welcome to Student Management System</p>
          <div class="nav-admin">
            <a href="./pages/logout.php">
              <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
logout            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
            </svg>
            </a>
          </div>
        </nav>

        <div class="container">
          <p class="breadcrumb">Home > Dashboard</p>
          <div class="dash-box">
            <div class="dash-item">
              <div>
                <h5>Students</h5>
                <h1>169</h1>
              </div>
            </div>
            <div class="dash-item">
              <div>
                <h5>Teacher & staff</h5>
                <h1>5</h1>
              </div>
            </div>
            <div class="dash-item">
              <div>
                <h5>Classes</h5>
                <h1>8</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end of dashboard -->

      <div id="student" class="tabcontent">
        <!-- Navbar -->
        <nav class="nav">
          <div class="hamburger" onclick="onOpen()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-list"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
              />
            </svg>
          </div>
          <p>Welcome to Student Management System</p>
          <div class="nav-admin">
            <a href="./pages/logout.php">
              <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
logout            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
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
            if(isset($_POST['submit'])) {
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

               if(mysqli_query($conn, $sql)){
                $student = mysqli_insert_id($conn);
                $classSql = "INSERT INTO classstudents (class_id, student_id, years) VALUES ('$class', '$student', $years)";
                if(mysqli_query($conn, $classSql))
                {
                  echo "<div class='success-info info'>Class Student Records Added succesfully</div>"; 
                } else{
                    echo "<div class='error-info info'>ERROR: Hush! Sorry $classSql.</div>".mysqli_error($conn);
                }
              
                  echo "<div class='success-info info'>Student Added succesfully</div>"; 
                } else{
                    echo "<div class='error-info info'>ERROR: Hush! Sorry $sql.</div>".mysqli_error($conn);
                }
                
         

              // Close connection
              mysqli_close($conn);
            } 
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
                      <input type="date" name="dob" class="form-d-input" data-date-format="YYYY-MM-DD"/>
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
                          $classResult = mysqli_query($conn , $classQuery);

                          while($row = mysqli_fetch_assoc($classResult)){
                          echo("<option value={$row['id']}> {$row['grade_name']} </option>");
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
                            $sectionResult = mysqli_query($conn , $sectionQuery);

                            while($row = mysqli_fetch_assoc($sectionResult)){
                            echo("<option value={$row['id']}> {$row['section_name']} </option>");
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
                      <input type="date" name="years" class="form-d-input" data-date-format="YYYY-MM-DD"/>
                    </div>
                  </div>
      
                  <div class="form-control">
                    <input type="submit" name="submit" value="Save Changes" class="form-d-button" />
                  </div>
                </form>
              </div>
            </div>

          <div class="student">
            <div class="headAdd">
              <h2>All students</h2>
              <button class="add-button" id="openModalBtn">Add+</button>
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
            $result = mysqli_query($conn , $query);
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
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
              <li class="table-row">
                  <div class="col col-1"><?php echo $row['id'] ?></div>
                  <div class="col col-2"><?php echo $row['first_name'] , " " , $row['middle_name'] , " " ,$row['last_name']; ?></div>
                  <div class="col col-3"><?php echo $row['gender']?></div>
                  <div class="col col-4"><?php echo $row['grade_name']?></div>
                  <div class="col col-5"><?php echo $row['section_name']?></div>
                  <div class="col col-6"><?php echo $row['phone']?></div>
                  <div class="col col-7">
                     <!-- Modal -->
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
                                <input type="date" name="dob" class="form-d-input" data-date-format="YYYY-MM-DD"/>
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
                                    $classResult = mysqli_query($conn , $classQuery);

                                    while($row = mysqli_fetch_assoc($classResult)){
                                    echo("<option value={$row['id']}> {$row['grade_name']} </option>");
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
                                      $sectionResult = mysqli_query($conn , $sectionQuery);

                                      while($row = mysqli_fetch_assoc($sectionResult)){
                                      echo("<option value={$row['id']}> {$row['section_name']} </option>");
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
                                <input type="date" name="years" class="form-d-input" data-date-format="YYYY-MM-DD"/>
                              </div>
                            </div>
                
                            <div class="form-control">
                              <input type="submit" name="submit" value="Save Changes" class="form-d-button" />
                            </div>
                          </form>
                        </div>
                      </div> 

                     <!-- End of Modal -->

                    <div class="action-icon">
                      <div id="openModalBtn2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
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
                      <div>
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
                    <?php
                   
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

      <div id="classes" class="tabcontent">
        <!-- Navbar -->
        <nav class="nav">
          <div class="hamburger" onclick="onOpen()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-list"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
              />
            </svg>
          </div>
          <p>Welcome to Student Management System</p>
          <div class="nav-admin">
            <a href="./pages/logout.php">
              <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
logout            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
            </svg>
            </a>
          </div>
        </nav>

        <!-- Navbar -->

        <div class="container">
          <!-- breadcrumb -->
          <p class="breadcrumb">Home > Classes</p>
          <!-- end of breadcrumb -->

          <div class="classes">
            <h2>All Classes</h2>
            <div class="form-select">
              <label for="class">Select Class :</label>

              <select name="class" id="One">
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
                <option value="Five">Five</option>
              </select>
            </div>

            <h4>Class : Nine</h4>
            <p>Teacher : Pannalal BK</p>
            <p>Total : 36</p>

            <!-- table -->
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
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">Male</div>
                <div class="col col-4">Nine</div>
                <div class="col col-5">A</div>
                <div class="col col-6">9803945810</div>
                <div class="col col-7">
                  <div class="action-icon">
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
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
                    <div>
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
              <!-- end of table-list -->
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">03</div>
                <div class="col col-2">Binod Waiba Tamang</div>
                <div class="col col-3">Male</div>
                <div class="col col-4">Nine</div>
                <div class="col col-5">A</div>
                <div class="col col-6">9813025069</div>
                <div class="col col-7">
                  <div class="action-icon">
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
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
                    <div>
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
              <!-- end of table-list -->
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">01</div>
                <div class="col col-2">Dipen Shrestha</div>
                <div class="col col-3">Male</div>
                <div class="col col-4">Nine</div>
                <div class="col col-5">A</div>
                <div class="col col-6">9849160601</div>
                <div class="col col-7">
                  <div class="action-icon">
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
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
                    <div>
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

      <div id="teachers" class="tabcontent">
        <!-- Navbar -->
        <nav class="nav">
          <div class="hamburger" onclick="onOpen()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-list"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
              />
            </svg>
          </div>
          <p>Welcome to Student Management System</p>
          <div class="nav-admin">
            <a href="./pages/logout.php">
              <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
logout            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
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
            <div class="headAdd">
              <h2>Teacher & Staffs</h2>
              <button class="add-button">Add+</button>
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
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">Male</div>
                <div class="col col-5">Kapan</div>
                <div class="col col-6">9803945810</div>
                <div class="col col-7">
                  <div class="action-icon">
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
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
                    <div>
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
              <!-- end of table-list -->
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">Male</div>
                <div class="col col-5">Kapan</div>
                <div class="col col-6">9803945810</div>
                <div class="col col-7">
                  <div class="action-icon">
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
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
                    <div>
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
              <!-- end of table-list -->
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">Male</div>
                <div class="col col-5">Kapan</div>
                <div class="col col-6">9803945810</div>
                <div class="col col-7">
                  <div class="action-icon">
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
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
                    <div>
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

      <div id="attendance" class="tabcontent">
        <!-- Navbar -->
        <nav class="nav">
          <div class="hamburger" onclick="onOpen()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-list"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
              />
            </svg>
          </div>
          <p>Welcome to Student Management System</p>
          <div class="nav-admin">
            <a href="./pages/logout.php">
              <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
logout            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
            </svg>
            </a>
          </div>
        </nav>

        <!-- Navbar -->

        <div class="container">
          <!-- breadcrumb -->
          <p class="breadcrumb">Home > Attendance</p>
          <!-- end of breadcrumb -->

          <form class="classes">
            <h2>All Classes</h2>
            <div class="form-select">
              <label for="class">Select Class :</label>

              <select name="class" id="One">
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
                <option value="Five">Five</option>
              </select>
            </div>

            <div class="attendance-head">
              <div>
                <h4>Class : Nine</h4>
                <p>Teacher : Pannalal BK</p>
                <p>Total Student : 36</p>
              </div>
              <div class="attendance-date">
                <label>Date: </label>
                <input type="date" name="aDate" class="form-d-input" />
              </div>
            </div>

            <!-- table -->
            <ul class="responsive-table">
              <li class="table-header">
                <div class="col col-1">S.ID</div>
                <div class="col col-2">Full Name</div>
                <div class="col col-3">ROll no</div>
                <div class="col col-4 activity-col">Activity</div>
              </li>
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">09</div>
                <div class="col col-4 activity-col">
                  <div class="activity-control">
                    <div>
                      <input
                        type="radio"
                        id="activity"
                        name="fav_language"
                        value="Present"
                        checked
                      />
                      <label for="Present">Present</label>
                    </div>
                    <div>
                      <input
                        type="radio"
                        id="activity"
                        name="fav_language"
                        value="Absent"
                      />
                      <label for="Absent">Absent</label>
                    </div>
                  </div>
                </div>
              </li>
              <!-- end of table-list -->
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">09</div>
                <div class="col col-4 activity-col">
                  <div class="activity-control">
                    <div>
                      <input
                        type="radio"
                        id="activity"
                        name="fav_language"
                        value="Present"
                        checked
                      />
                      <label for="Present">Present</label>
                    </div>
                    <div>
                      <input
                        type="radio"
                        id="activity"
                        name="fav_language"
                        value="Absent"
                      />
                      <label for="Absent">Absent</label>
                    </div>
                  </div>
                </div>
              </li>
              <!-- end of table-list -->
              <!-- table-list -->
              <li class="table-row">
                <div class="col col-1">02</div>
                <div class="col col-2">Panna Lal</div>
                <div class="col col-3">09</div>
                <div class="col col-4 activity-col">
                  <div class="activity-control">
                    <div>
                      <input
                        type="radio"
                        id="activity"
                        name="fav_language"
                        value="Present"
                        checked
                      />
                      <label for="Present">Present</label>
                    </div>
                    <div>
                      <input
                        type="radio"
                        id="activity"
                        name="fav_language"
                        value="Absent"
                      />
                      <label for="Absent">Absent</label>
                    </div>
                  </div>
                </div>
              </li>
              <!-- end of table-list -->
            </ul>
            <!-- end of table -->

            <input
              name="submit"
              type="submit"
              value="Submit"
              class="attendance-button"
            />
          </form>
        </div>
      </div>
    </main>

    <script src="./assets/js/navAndTabs.js"></script>
    <script src="./assets/js/hamburger.js"></script>
    <script src="./assets/js/modal.js"></script>
  </body>
</html>
