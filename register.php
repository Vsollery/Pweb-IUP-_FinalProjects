<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <div class="my-4">
                        <h1>Sign Up</h1>
                    </div>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="Name" type="text" class="form-control" id="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="Email" type="text" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input name="Password" type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="phoneNumber">Phone Number</label>
                            <input name="PhoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="rollNumber">Roll number</label>
                            <input name="RollNo" type="text" class="form-control" id="rollNumber" placeholder="Roll Number" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="Category"> Category </label>
                            <select class="form-control" name="Category" id="Category">
                                <option value="GEN">General</option>
                                <option value="OBC">OBC</option>
                                <option value="SC">SC</option>
                                <option value="ST">ST</option>
                            </select>
                             <small>Already have an account? <a href="login.php">login</a></small>
                        </div>
                        
                        <button type="submit" class="btn btn-dark">Register</button>
                        
                        
                    </form>
                </div>

            </div>       
    </div>

    <!-- SCRIPT  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>