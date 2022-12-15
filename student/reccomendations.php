<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap CDN -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <title>Add Recomendations</title>
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
                                <a href="book.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-book-half"></i> <span class="ms-1 d-none d-sm-inline">All Books</span></a>
                            </li>
                            <li>
                                <a href="history.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-bookshelf"></i> <span class="ms-1 d-none d-sm-inline">Previously Borrowed Books</span></a>
                            </li>
                            <li>
                                <a href="reccomendations.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-archive-fill"></i> <span class="ms-1 d-none d-sm-inline">Recommend Books</span> </a>
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
                <!-- CONTENT -->
                <div class="col mt-5">
                    <div class="container-fluid">
                        <h1 class="text-center">Recommend Book</h1>
                    </div>
                    <div class="container bg-light p-5 mt-5">
                        <form action="reccomendations.php" method="post">
                            <div class="form-group">
                                <label for="InputBookTitle">Book Title</label>
                                <input type="text" name="title" class="form-control" id="InputBookTitle" placeholder="Enter Book Title" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Descriptions</label>
                                <input type="text" name="Description" class="form-control" id="Description" placeholder="Enter Description" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary center">Submit Recommendation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $Description = $_POST['Description'];
            $rollno = $_SESSION['RollNo'];

            $sql1 = "insert into pwebfp.recommendations (Book_Name,Description,RollNo) values ('$title','$Description','$rollno')";



            if ($conn->query($sql1) === TRUE) {


                echo "<script type='text/javascript'>alert('Success')</script>";
            } else { //echo $conn->error;
                echo "<script type='text/javascript'>alert('Error')</script>";
            }
        }
        ?>


    </body>

    </html>

<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>