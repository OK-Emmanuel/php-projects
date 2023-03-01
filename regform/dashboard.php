<?php 
include("database.php");

if(isset($_POST['signin'])){
    $mail = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Check if User Exists
    $exist = "SELECT * FROM users WHERE user_email = '$mail' AND user_pas = '$password'";
    $checkExist = mysqli_query($connection, $exist); 
    if(mysqli_num_rows($checkExist) > 0 ){
        $_SESSION['user'] = "$mail";
        echo "<h1> Welcome back " . $_SESSION['user'] . " </h1>";
    ?>
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
</head>
  <body>
  
    
<div class="text-white bg-primary mb-3 py-5 text-center">
       <h1> Welcome</h1>
</div>    
    <div class="container">
       <div class="row">
        <div class="col-lg-6">
            <div class="card">
            <img src="profile.png" alt="">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow
            ">
                <div class="card-header bg-primary text-white text-center fw-bold text-uppercase">About Us</div>
            <div class="card-body"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis, dicta commodi. Dignissimos culpa et ullam quia cum? Odio illo nihil fugiat impedit, voluptatem hic doloribus, ipsam corrupti, voluptatum officia officiis ex voluptate sequi unde earum. Debitis illo perferendis similique itaque in, enim adipisci accusantium, doloribus nisi exercitationem sapiente maxime odit possimus nemo, fuga eum asperiores est tenetur iusto. Hic, officiis.</p>
            </div
        div>
    </div>
       </div> 
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
  
    <?php
    } else{
        echo "Your Account is not found. <a href='index.php'>Go back</a>";
    }

}





?>
