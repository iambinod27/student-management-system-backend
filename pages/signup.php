<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp | Student Management System</title>

    <!-- Global CSS -->
    <link rel="stylesheet" href="../assets/css/global.css" />
    <link rel="stylesheet" href="../assets/css/pages/login.css" />
  </head>
  <body>
    <main>
      <div class="container">
        <p>Student management System</p>
        <h1>Help Student Reach their potential.</h1>
    <?php 
      if(isset($_POST["submit"])) {
        $firstname =  $_POST['firstname'];
        $lastname =  $_POST['lastname'];
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $repeatPassword =  $_POST['confirmPassword'];
        
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if(empty($firstname) OR empty($lastname) OR empty($email) OR empty($password) OR empty($repeatPassword)) {
            array_push($errors, "All fields are required"); 
        }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }

                if( strlen($password) < 8) {
                    array_push($errors, "Password must be at 8 characters long");
                }

                if($password != $repeatPassword) {
                    array_push($errors, "Password do not match");
                }
                
                require_once "../database.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if($rowCount > 0) {
                    array_push($errors, "Email already Exists!!");
                }


                if(count($errors)>0){
                    foreach($errors as $error) {
                        echo "<div class='error-info info'>$error</div>";
                    }
                } else {                   
                    // INSERT DATA IN DATABASE
                    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ? , ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if($prepareStmt) {
                        mysqli_stmt_bind_param($stmt,"ssss", $firstname, $lastname, $email, $passwordHashed);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='success-info info'>Register Successfully,<a href='./login.php' class='form-link'>Login</a></div>";
                    } else {
                        die("Something went wrong");
                    }
                }
            }
        ?>

        <form action="signup.php" method="post">
          <div class="form-group">
            <input type="text" class="form-input" placeholder="First Name" name="firstname" />
          </div>
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Last Name" name="lastname" />
          </div>
          <div class="form-group">
            <input type="email" class="form-input" placeholder="Email" name="email" />
          </div>
          <div class="form-group">
            <input type="password" class="form-input" placeholder="Password" name="password"/>
          </div>
           <div class="form-group">
            <input type="password" class="form-input" placeholder="Confirm Password" name="confirmPassword" />
          </div>
            <div class="form-group">
            <a href="./login.php" class="form-link">Already has account ?</a>
            </div>
          <input type="submit" class="form-button" name="submit" value="Sign Up"></input>
        </form>
      </div>
    </main>
  </body>
</html>
