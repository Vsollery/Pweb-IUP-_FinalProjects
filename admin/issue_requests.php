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
                        <!--/.sidebar-->
                    </div>
                    <div class="span9">
                        <center>
                        <a href="issue_requests.php" class="btn btn-info">Issue Requests</a>
                        <a href="renew_requests.php" class="btn btn-info">Renew Request</a>
                        <a href="return_requests.php" class="btn btn-info">Return Requests</a>
                        </center>
                        <h1><i>Issue Requests</i></h1>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Roll Number</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Availabilty</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select * from LMS.record,LMS.book where Date_of_Issue is NULL and record.BookId=book.BookId order by Time";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                            
                                
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php echo $avail ?></td>
                                      <td><center>
                                        <?php
                                        if($avail > 0)
                                        {echo "<a href=\"accept.php?id1=".$bookid."&id2=".$rollno."\" class=\"btn btn-success\">Accept</a>";}
                                         ?>
                                        <a href="reject.php?id1=<?php echo $bookid ?>&id2=<?php echo $rollno ?>" class="btn btn-danger">Reject</a>
                                    </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 Library Management System </b>All rights reserved.
            </div>
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