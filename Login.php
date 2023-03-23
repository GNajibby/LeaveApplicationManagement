<html>

<head>
  <link rel="stylesheet" href="Login.css">
  <script src="js/Login.js"></script>

  <?php

        session_start();

        if(isset($_SESSION["login_Staff"])){
          header("Location: StaffMenu.html");
        }
        if(isset($_SESSION["login_Manager"])){
            header("Location: ManagerMenu.html");
        }
        if(isset($_SESSION["login_Admin"])){
            header("Location: AdminMenu.html");
        }

        $connect=mysqli_connect("localhost","root","","leavemanagement") or die("Connection Failed");
        if(!empty($_POST['save']))
        {
            $username = $_POST['UName'];
            $password1 = $_POST['Pass'];
            $test = false;

            $query="select * from user where username='$username'and password1='$password1'";
            $result=mysqli_query($connect,$query);
            $count=mysqli_num_rows($result);
            if($count==0)
            {
              $test = true;
            }
            else
            {
                
              header("Location: StaffMenu.html");
              $_SESSION["Login_Staff"] = true;
			  $_SESSION["username"] = $username;
              exit();
            }

            $query="select * from manager where username='$username'and password='$password1'";
            $result=mysqli_query($connect,$query);
            $count=mysqli_num_rows($result);
            if($count==0)
            {
              $test = true;
            }
            else
            {
                
              header("Location: ManagerMenu.html");
              $_SESSION["Login_Manager"] = true;
              exit();
            }

            $query="select * from admin where username='$username'and password='$password1'";
            $result=mysqli_query($connect,$query);
            $count=mysqli_num_rows($result);
            if($count==0)
            {
              $test = true;
            }
            else
            {
                
              header("Location: AdminMenu.html");
              $_SESSION["Login_Admin"] = true;
              exit();
            }
        }

        if($test){
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Login Failed')
          </script>");
      }
    ?>

    
</head>

<body>


  <div class="topnav">
    <a class="active" href="Login.php">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Log In</button>
      <div class="dropdown-content">
        <a href="Login.php">Staff</a>
        <a href="Login.php">Manager</a>
        <a href="Login.php">Admin</a>
      </div>

    </div>
  </div>
  <br>
  <h1>Welcome to Leave Application Management System</h1>
  <div class="animation"></div>
  <table style="width:100%">
    <tr>
      <td style="width:70%">
        <img src="work.jpg" width="100%">
      </td>
      <td style="width:28%">
        <div id="box">
          <table class="tbl" align="center">
            <div class="imgcontainer">
              <img src="man.png" alt="Avatar" class="Avatar">
            </div>
            <form name="login" method="post" align="center">

              <tr>
                <td><input type="text" name="UName" size="" placeholder="Enter Username or ID"></td>
              </tr>
              <tr>
                <td><input type="password" name="Pass" size="" placeholder="Enter Password"></td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" checked="checked" name="remmber">remember me
                </td>
              </tr>

              <td align="left" colspan="2"><INPUT class="sbtn" type="submit" name="save" value="login">
                <INPUT NAME="Reset" TYPE="Reset" VALUE="Reset">
              </td>

            </form>
          </table>

        </div>
      </td>
    </tr>

  </table>



</body>

</html>