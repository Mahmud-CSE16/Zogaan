<?php
if(isset($_COOKIE['cookie_name']))
{
	header('Location: index.php');
}else{
  $error="";
  $name=$username=$email=$password="";
  $connection= mysqli_connect("localhost","root","","zogaan");
  session_start();
  
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
  	if(isset($_POST['login'])){
  	$email = $_POST['email'];
  	$password = $_POST['password'];
    if(!empty($email)&&!empty($password)){
        if(!empty($_POST["remember"])){
	            setcookie('cookie_name','$email', time() + (86400 * 30)); // 86400 = 1 day
	        }else{
	        	echo "cookie not set";
	        }
	    $query = "SELECT * FROM service_provider where Email='$email' and Password='$password'";

	    if($check=mysqli_query($connection, $query)){

	    	if(mysqli_num_rows($check)>=1){

	    		$entity = mysqli_fetch_array($check);
	    		$_SESSION['user_email']=$entity['Email'];
	    		$_SESSION['user_id']=$entity['ID'];
	    		$_SESSION['user_name']=$entity['Name'];
	    		$_SESSION['user_username']=$entity['UserName'];
	    		header("Location: index.php");

	    	}else{
	    		$error.= '*please enter your correct email/password.';
	    	}

	    }else{
	    	echo "<script type='text/javascript'>";
		    echo "alert('Not Loged In, there have some problem');";
			echo "</script>";

			$name=$username=$email=$password="";
	    }
	  }
    }
  }
  
 ?>



<!DOCTYPE html>
<html>
	<head>
		<?php include "includes/header.php"; ?>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 m-auto">
					<div class="row">
						<div class="col-sm-5 register-left">
							<div class="down"><i class="fas fa-caret-down"></i></div>
						    <h3>Join Us</h3>
						    <p>Make you daily life much easier.</p>
						    <button type="button" class="btn btn-primary">About Us</button>
					    </div>
					    <div class="col-sm-7 register-right">
					    	<h2>LogIn Here</h2>
					    	<span class="error ml-4"><small><?php echo $error ?></small></span>
					    	<div class="register-form pl-4">
					    		<form action="" method="POST">
						    		<div class="form-group">
						    			<input type="email" class="form-control d-inline" name="email" placeholder="Enter your email" required>
						    			<span class="error">*</span>
						    		</div>
						    		<div class="form-group">
						    			<input type="password" class="form-control d-inline" name="password" placeholder="Enter your password"required>
						    			<span class="error">*</span>
						    		</div>
						    		<div>
						    			<input type="checkbox" class="d-inline" style="width: 20px" name="remember" checked>Remember Me
						    		</div>
						    		<button type="submit" class="btn btn-primary" name="login">Log In</button>
						    		<button class="btn btn-primary w-50"><a href="register.php">Create New Account</a></button>
					    	   </form>
					    	</div>		
					    </div>
					</div>
				</div>
			</div>
		</div>
        
        <?php include "includes/header.php"; ?>
	</body>
</html>

<?php } ?>