<?php 
  require "../table.php";
  createDbQuery($user);
  createDbQuery($teacher);
  createDbQuery($subject);
  createDbQuery($class);
  createDbQuery($section);
  createDbQuery($student);
  createDbQuery($attendance);
  createDbQuery($classStudent);
  createDbQuery($teacherSubject);

?>

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
    <title>Login | Student Management System</title>

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
                $email = $_POST["email"];
                $password = $_POST["password"];

                $errors = array();

                include "../database.php";
                $sql = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                if($user) {
                    if( password_verify($password, $user["password"])){
                        session_start();
                        $_SESSION['user']= 'yes';
                        header("Location: ../index.php");
                        die();
                    } else {
                        echo "<div class='error-info info'>Email or password does not match.</div>";
                    }
                } else {
                    echo "<div class='error-info info'>Email does not exist</div>";
                }
            }
        
        ?>
        <form action="login.php" method="post">
          <div class="form-group">
            <input type="email" class="form-input" placeholder="Email" name="email"/>
          </div>
          <div class="form-group">
            <input type="password" class="form-input" placeholder="Password" name="password" />
          </div>
          <div class="form-group">
            <a href="./signup.php" class="form-link">Create an account ?</a>
            </div>
          <input type="submit" class="form-button" name="submit" value="Login"></input>
        </form>
      </div>
    </main>
  </body>
</html>