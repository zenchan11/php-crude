<h1>login page</h1>
<?php require 'partials/_nav.php' ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require 'partials/_dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

        $sql = "select * from usersnp where username = '$username' AND password= '$password'";
        $result = mysqli_query($conn, $sql);

        // if ($result === false) {
        //     echo "Query error: " . mysqli_error($conn);
        //     exit(); // Terminate script execution
        // }

        $num = mysqli_num_rows($result);

        if ($num == 1){
            echo '<form action="dashboard.php" method="get">
                  <button type="submit" class="btn btn-primary">Go to Company records</button>
              </form>';
        echo '<form action="board.php" method="get">
                  <button type="submit" class="btn btn-secondary">Go to Employee Records</button>
              </form>';
        }
        else{
            echo "user cant log in";
        }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script>
        function validateLoginForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var warningDiv1 = document.getElementById("warning1");
            var warningDiv2 = document.getElementById("warning2");
            
            if (username === "" || password === ""){
                warningDiv1.innerHTML = "Username cannot be empty"; 
                warningDiv2.innerHTML = "Password cannot be empty"; 
                return false;
            }

            if (username === "") {
                // alert("All fields are required.");
                warningDiv1.innerHTML = "Username cannot be empty"; 
                return false;
            }
            
            if (password === "") {
                warningDiv2.innerHTML = "Password cannot be empty"; 
                return false;
            }
            return true;
}
    </script>


</head>
<body>
    <form action="/web-assignment/login.php" method="post" onsubmit="return validateLoginForm()">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        <div class="warning1" id="warning1"></div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <div class="warning2" id="warning2"></div>
      </div>
      <button type="submit" class="btn btn-primary" >Log in</button>
    </form>
</body>
</html>
