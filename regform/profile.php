<?php 
session_start();
include("database.php");

if(isset($_POST['submit'])){
  $name = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['mobile'];
  $address = $_POST['work-address'];
  $Cpassword = $_POST['current-password'];
  $newPassword = $_POST['new-password'];
  $location = $_POST['country'];
  $user = $_SESSION['user'];

  $export = "UPDATE users  SET
  user_name = '$name',
  user_email = '$email',
  phone_number = '$phone',
  user_address = '$address',
  user_location = '$location'
  WHERE user_email = '$user'
  "; 
  $export2 = mysqli_query($connection, $export);
  if($export2){
    $_SESSION['success'] = "Account Updated Successfully";
    header("Location: profile.php");
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">



  <title>Edit profile page - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container bootstrap snippets bootdeys">
    <div class="row ">
      <div class="col-xs-12 col-md-12">
        <form class="form-horizontal" method="POST" action="">
          <div class="panel panel-default">
            <div class="panel-body text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar"
                alt="User avatar">
                <h4><?php echo $_SESSION['success']; ?></h4>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">User info</h4>
            </div>
            <div class="panel-body">
            <?php 
              if (isset($_SESSION['user'])) {
                $selectUser = "SELECT * FROM users where user_email = '$_SESSION[user]'";
                $result = mysqli_query($connection, $selectUser);
                if(mysqli_num_rows($result) > 0){
                    while ($user = mysqli_fetch_assoc($result)) {
                        $name = $user['user_name'] ;
                        $email = $user['user_email'] ;
                        $pas = $user['user_pas'] ;

                    }
                }
               }
            
            ?>
              
            <!-- uSERNAME -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" name="username"  value="<?= $name; ?>" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                  <select name="country" class="form-control">
                    <option selected="">Select country</option>
                    <option>Belgium</option>
                    <option>Canada</option>
                    <option>Denmark</option>
                    <option>Estonia</option>
                    <option>France</option>
                  </select>
                </div>
              </div>

            </div> <!-- Panel Body Ends HEre-->
          </div>

          <!-- Another Panel Starts Here -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Contact info</h4>
            </div>
            <div class="panel-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Mobile number</label>
                <div class="col-sm-10">
                  <input type="tel" name="mobile" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail address</label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="<?= $email; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Work address</label>
                <div class="col-sm-10">
                  <textarea rows="3" name="work-address" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Security</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Current password</label>
                <div class="col-sm-10">
                  <input type="password" name="current-password" value="<?= $pas; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">New password</label>
                <div class="col-sm-10">
                  <input type="password" name="new-password" class="form-control">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <style type="text/css">
    body {
      margin-top: 20px;
      background: #f5f5f5;
    }

    /**
 * Panels
 */
    /*** General styles ***/
    .panel {
      box-shadow: none;
    }

    .panel-heading {
      border-bottom: 0;
    }

    .panel-title {
      font-size: 17px;
    }

    .panel-title>small {
      font-size: .75em;
      color: #999999;
    }

    .panel-body *:first-child {
      margin-top: 0;
    }

    .panel-footer {
      border-top: 0;
    }

    .panel-default>.panel-heading {
      color: #333333;
      background-color: transparent;
      border-color: rgba(0, 0, 0, 0.07);
    }

    form label {
      color: #999999;
      font-weight: 400;
    }

    .form-horizontal .form-group {
      margin-left: -15px;
      margin-right: -15px;
    }

    @media (min-width: 768px) {
      .form-horizontal .control-label {
        text-align: right;
        margin-bottom: 0;
        padding-top: 7px;
      }
    }

    .profile__contact-info-icon {
      float: left;
      font-size: 18px;
      color: #999999;
    }

    .profile__contact-info-body {
      overflow: hidden;
      padding-left: 20px;
      color: #999999;
    }

    .profile-avatar {
      width: 200px;
      position: relative;
      margin: 0px auto;
      margin-top: 196px;
      border: 4px solid #f3f3f3;
    }
  </style>
  <script type="text/javascript">

  </script>
</body>

</html>
