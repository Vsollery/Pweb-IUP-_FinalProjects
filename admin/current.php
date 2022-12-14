<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </head>
    <body>
         <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid">
        <a class="navbar-brand" href="#">
            <img src="images/LMS.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Library System
        </a>
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/user.png" width="30" height="30" class="nav-avatar" />
                        <b class="caret"></b>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a href="index.php">
                            <button class="dropdown-item" type="button">Your Profile</button>
                        </a>
                        <a href="logout.php">
                            <button class="dropdown-item" type="button">Logout</button>
                        </a>
                    </div>
                </div>
            </li>
        </ul>    
    </nav>

    <!-- side navbar -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 mt-5 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="message.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-chat-dots-fill"></i> <span class="ms-2 d-none d-sm-inline">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="student.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-person-workspace"></i> <span class="ms-1 d-none d-sm-inline">Manage Students</span></a>
                        </li>
                        <li>
                            <a href="book.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-book-half"></i> <span class="ms-1 d-none d-sm-inline">All Books</span></a>
                        </li>
                        <li>
                            <a href="addbook.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-bookshelf"></i> <span class="ms-1 d-none d-sm-inline">Add Books</span></a>
                        </li>
                        <li>
                            <a href="requests.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-archive-fill"></i> <span class="ms-1 d-none d-sm-inline">Issue/Return Requests </span> </a>
                        </li>
                        <li>
                            <a href="recommendations.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Book Recommendations </span> </a>
                        </li>
                        <li>
                            <a href="current.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"> Currently Issued Books </span> </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <button type="button" class="btn btn-danger mt-3" style="width: 150px;"> <a href="logout.php">Logout</a></button>
                            </a>
                        </li>
                    </ul>                   
                </div>
            </div>

                    
            <div class="col mt-5">
                <div class="container-fluid">
                    <h1 class="text-center mb-3">All Books</h1>
                    
                        <form action="current.php" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="Enter Roll No of Student/Book Name/Book Id." aria-label="Search"/>
                            <button type="submit" name="submit" class="btn btn-outline-dark rounded-0">Search</button>
                        </div>
                    </form>

                                   
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from pwebfp.record,pwebfp.book where (Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Title like '%$s%')";
                                        }
                                    else
                                        $sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from pwebfp.record,pwebfp.book where Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId";
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>

                                    <br>
                        <table class="table mt-5 table-bordered" id = "tables">
                                  <thead class="thead-dark" >
                                    <tr>
                                      <th>Roll No</th>  
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                      <th>Dues</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php

                            

                                        //$result=$conn->query($sql);
                                        while($row=$result->fetch_assoc())
                                        {
                                            $rollno=$row['RollNo'];
                                            $bookid=$row['BookId'];
                                            $name=$row['Title'];
                                            $issuedate=$row['Date_of_Issue'];
                                            $duedate=$row['Due_Date'];
                                            $dues=$row['x'];

                                        ?>

                                                <tr>
                                                <td><?php echo strtoupper($rollno) ?></td>
                                                <td><?php echo $bookid ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $issuedate ?></td>
                                                <td><?php echo $duedate ?></td>
                                                <td><?php if($dues > 0)
                                                            echo "<font color='red'>".$dues."</font>";
                                                            else
                                                            echo "<font color='green'>0</font>";
                                                        ?>
                                                </tr>
                                                <?php } ?>
                                             <?php } ?>

                               </tbody>
                                </table>

                    </div>
                    <!--/.span9-->
                    </div>
                </div>
            </div>
            <!--/.container-->
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>