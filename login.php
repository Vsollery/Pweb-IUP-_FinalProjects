<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <div class="my-4">
                    <h1>Login</h1>
                </div>
                <form action="login.php" method="post">
                    <div class="form-group mb-4">
                        <label for="rollNumber">Roll Number</label>
                        <input name="RollNo"type="text" class="form-control" id="rollNumber" placeholder="Roll Number">
                        <small>Do not have an account yet? <a href="register.php">Register</a></small>
                    </div>
                    <div class="form-group mb-4">
                        <label for="Password">Password</label>
                        <input name="Password" type="password" class="form-control" id="Password" placeholder="Password">
                    </div>
                    <button type="submit" name="signin" value="Sign In" class="btn btn-dark">Login</button>
                </form>
            </div>
         </div>
    </div>

    <?php
        if(isset($_POST['signin']))
        {
            $u=$_POST['RollNo'];
            $p=$_POST['Password'];
         

            $sql="select * from PwebFP.user where RollNo='$u'";
        
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $x=$row['Password'];
            $y=$row['Type'];

            if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
            {
                echo "Login Successful";
                 $_SESSION['RollNo']=$u;
           
        
                if($y=='Admin')
                header('location:admin/index.php');
                else
                header('location:student/index.php');
                    
            }
            else 
            { 
            echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
            }
    }
    ?>




</body>
</html>