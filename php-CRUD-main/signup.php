<h1>sign up page</h1>  
<h1>Sign up to our company</h1>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require 'partials/_dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;

    if (($password == $cpassword) && $exists == false){
        $sql = "INSERT INTO `usersnp` (`username`, `password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result){
            print("user created");
        }
        else{
            print("error");
        }
    }
    else{
        print("there is some error in your code");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up page</title>
</head>
<body>
    <?php require 'partials/_nav.php' ?>
    <form action="/web-assignment/signup.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <small>Type the same password as above.</small>
      <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword">
    </div>
      <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</body>
</html>
