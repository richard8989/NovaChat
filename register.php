<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

$name=strtolower(htmlentities($_POST['name']));
$email=htmlentities($_POST['email']);
$password=htmlentities($_POST['password']);

//select a profile picture according to user's gender
if($_REQUEST['gender'] == 'Female'){
  $rand = rand(1,4);
}else if($_REQUEST['gender'] == 'Male'){
  $rand = rand(5,6);
}else{
  $rand = rand(1,6);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script type='text/javascript'>alert('You entered an invalid email! Please try again.');</script>";
echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
exit();
}

if (strlen($password) < 8){
    echo "<script type='text/javascript'>alert('Password must be minimum 8 characters!');</script>";
    echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
exit();
}


$password=md5($password);

try
{
$sthandler = $dbh->prepare("SELECT name FROM users WHERE name = :name");
$sthandler->bindParam(':name', $name);
$sthandler->execute();

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

if($sthandler->rowCount() > 0){
   echo "<script type='text/javascript'>alert('Username already exists! Please try again.');</script>";
echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
}
else{


try
{
$sthandler = $dbh->prepare("SELECT email FROM users WHERE email = :email");
$sthandler->bindParam(':email', $email);
$sthandler->execute();
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


if($sthandler->rowCount() > 0){
echo "<script type='text/javascript'>alert('The email you entered is alreday registered for a diferent account! Please try again.');</script>";
echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
}
else{    

switch ($rand) {
    case 1:
        $profile_pic = "user1.jpg";
        break;
    case 2:
        $profile_pic = "user2.jpg";
        break;
    case 3:
        $profile_pic = "user3.jpg";
        break;
    case 4:
        $profile_pic = "user4.jpg";
        break; 
    case 5:
        $profile_pic = "user5.jpg";
        break;
    case 6:
        $profile_pic = "user6.jpg";
        break;
}


try
{
$sql ="INSERT INTO users(name, email, password, profile) VALUES(:name, :email, :password, :profile)";
$query = $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':profile', $profile_pic, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}
}
}
}

$dbh = null;
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">

 
</script>
</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Register</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								
                <style>
                  select:invalid { color: gray; }
                </style>
                <form method="post">
                  <label class="col-sm-1 control-label">Username<span style="color:red">*</span></label>
                  <input type="text" name="name" class="form-control" required>
                  <br></br>
                  <label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
                  <input type="text" name="email" class="form-control" required>                       <br></br>
                  <label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
                  <input type="password" name="password" class="form-control" id="password" required >
									<br></br>
                 <label>Gender<span style="color:red">* </span>
             
                 <select name="gender" required><option value="" disabled selected hidden>Please Choose...</option><option>Female</option><option>Male</option><option>other</option></select></label>
      
                   <br><br>                                  
                                                                              
									<button class="btn btn-primary btn-block" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<p>Already Have Account? <a href="index.php" >Signin</a></p>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>
</html>