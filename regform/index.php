<?php 
session_start();
include("database.php");

if (isset($_POST['signup'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL statemensts must be preceded with ""
    $export = "INSERT INTO users(user_name, user_email, user_pas) 
               VALUES('$username', '$email', '$password')";
    
    // Write a query to check if user exists
    $check = "SELECT * FROM users WHERE user_name = '$username'";
    $check2 = mysqli_query($connection, $check);

    if(mysqli_num_rows($check2) > 0){
        // avoid existing user from registering again
        $_SESSION['error'] = "User Already Exists, Please login to your account";
        // header("Location: index.php");
        
       
       
    }else{
        // if user does not exist, create an account
    $action = mysqli_query($connection, $export);
        if($action){
            echo "<script>alert('You are successfully registered')</script>";
        }
    }
}// close signup process
?>
<html>
    <title>Authentication Form</title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
    <h4>
        <?php 
        if(isset($_SESSION['error'])){
            echo $_SESSION['error']; 
            unset($_SESSION['error']);
        }
        // echo $_SESSION['error'];
         ?></h4>
        <div class="container" id="container">
       
            <div class="form-container sign-up-container">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h1>Create Account</h1>
                   <p style="font-weight: bold">Fill the form below</p>
                    <input type="text" name="name"  placeholder="Name" />
                    <input type="email"  name="email" placeholder="Email" />
                    <input type="password" name="password"  placeholder="Password" />
                    <p></p>
                    <button type="submit" name="signup">Sign up</button>
                </form>
            </div>

            <div class="form-container sign-in-container">
                <form action="index.php" method="POST">
                   
                    <h1>Sign in</h1>
                    
                    <p style="font-weight: bold">Provide your details</p>
                    <input type="email"  name="login_email" placeholder="Email" />
                    <input type="password" name="login_password" placeholder="Password" />
                    <p></p>
                    <button type="submit" name="signin">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back</h1>
                        <p>To keep connected with us please login with your details</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello Friend</h1>
                        <p>Enter your personal details and start your journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>

            </div>
        </div>
        <script src="app.js"></script>
    </body>
</html>

<?php 
if(isset($_POST['signin'])){
    $mail = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Check if User Exists
    $exist = "SELECT * FROM users WHERE user_email = '$mail' AND user_pas = '$password'";
    $checkExist = mysqli_query($connection, $exist); 
    if(mysqli_num_rows($checkExist) > 0 ){
        $_SESSION['success'] = "Welcome Back";
        $_SESSION['user'] = $mail;
        header("Location: profile.php");
        
    } else{
        echo "<br> Your Account is not found. <a href='index.php'>Go back</a>";
    }

}
?>