<?php

session_start();

if (isset($_SESSION['id'])){
    header("Location:profile.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <title>PHP Login Module</title>
</head>
<body>
<br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-login" role="tab"
                   aria-controls="pills-home" aria-selected="true">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-signup" role="tab"
                   aria-controls="pills-profile" aria-selected="false">Sign Up</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

<!--            login tab-->
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card border border-dark">
                    <div class="card-header bg-dark text-white">
                        <h5 class="text-center">Login Here</h5>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Username:</span>
                                </div>
                                <input type="text" name="uname" class="form-control" required>
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Password:</span>
                                </div>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <input type="submit" name="login" value="login"
                                   class="btn btn-primary w-25">
                        </form>
                    </div>
                </div>
            </div>

<!--            signup tab-->
            <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card border border-dark">
                    <div class="card-header bg-dark text-white">
                        <h5 class="text-center">SignUp Here</h5>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post" id="myform">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">First Name:</span>
                                </div>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Last Name:</span>
                                </div>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email:</span>
                                </div>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Birth Date:</span>
                                </div>
                                <input type="date" name="bdate" class="form-control" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Username:</span>
                                </div>
                                <input type="text" name="uname" class="form-control" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Password:</span>
                                </div>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <input type="submit" name="signup" value="Sign Up" class="btn btn-success w-25">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="Script/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="Script/popper.min.js"></script>
<script type="text/javascript" src="Script/bootstrap.min.js"></script>
</body>
</html>