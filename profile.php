<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['id'])) {
    header("Location:index.php");
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
    <title>User Profile</title>
</head>
<body>
<header class="rounded bg-dark p-3 text-warning m-3">
    <h2>User Profile</h2>
</header>

<!--getting profile image-->

<?php
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM `users` WHERE id='$uid'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            if ($row['profile_status'] == 0) {
                $img = "default_user.jpg";
            } else {
                $img = 'profile' . $uid . '.jpg';
            }
        }
    }
}
?>

<!--displaying profile image-->


<div class="col m-3">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?php echo 'Uploads/' . $img; ?>" class="img-fluid rounded">
                    <h5><?php echo $fname.' '.$lname; ?></h5>
                </div>
            </div>
            <br>

<!--            Upload Or Change Profile Image-->

            <div class="row">
                <form method="post" action="uploadfile.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><b>Upload Profile Image</b></label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <input type="submit" name="uploadfile" value="Upload" class="btn btn-primary">
                </form>
            </div>
        </div>

<!--        Logout -->

        <div class="col-md-1 offset-md-6">
            <form action="logout.php" method="post">
                <div class="form-group">
                    <input type="submit" name="logout" value="logout" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>
