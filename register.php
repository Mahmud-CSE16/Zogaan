<?php 
  $error="";
  $name=$username=$email=$password="";
  $connection= mysqli_connect("localhost","root","","zogaan");

	if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
  	if(isset($_POST['register'])){

  	$name = $_POST['name'];
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
    if(!empty($name)&&!empty($username)&&!empty($email)&&!empty($password)){
	    $query = "INSERT INTO Service_Provider SET
	        ID='',
	        Name='$name',
	        UserName='$username',
	        Email='$email',
	        Password='$password'";
	    $error="";
	    if($check=mysqli_query($connection, "SELECT * FROM service_provider where Email='$email'")){
	    	if(mysqli_num_rows($check)>=1){
	    		$error.='*Already have your.';
	    	}
	    }if($check=mysqli_query($connection, "SELECT * FROM service_provider where UserName='$username'")){
	    	if(mysqli_num_rows($check)>=1){
	    		$error.='*please enter another username';
	    	}
	    }if($error==""){
	    	if(mysqli_query($connection, $query)){

		    	echo "<script type='text/javascript'>";
			    echo "alert('Successfully Registered');";
				echo "</script>";
				header("Location: index.php");
		    	$name=$username=$email=$password="";

		    }else{
		    	echo "<script type='text/javascript'>";
			    echo "alert('Not Registered, there have some problem');";
				echo "</script>";

				$name=$username=$email=$password="";
		    }
	    }
	}

  }
  }
 
 ?>


<!DOCTYPE html>
<html>
	<head>
		<?php include "includes/header.php"; ?>
		<title>Register Page</title>
		<link rel="stylesheet" type="text/css" href="register.css">
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
					    	<h2>Register Here</h2>
					    	<span class="error ml-4"><small><?php echo $error ?>
					    	<div class="register-form pl-4">
					    		<form action="register.php" method="POST">
						    		<div class="form-group">
						    			<input type="text" class="form-control d-inline" name="name" placeholder="Enter your name" required>
						    			<span class="error">*</span>
						    		</div>
						    		<div class="form-group">
						    			<input type="text" class="form-control d-inline" name="username" placeholder="Enter your username" required>
						    			<span class="error">*</span>
						    		</div>
						    		<div class="form-group">
						    			<input type="email" class="form-control d-inline" name="email" placeholder="Enter your email" required>
						    			<span class="error">*</span>
						    		</div>
						    		<div class="form-group">
						    			<input type="password" class="form-control d-inline" name="password" placeholder="Enter your password"required>
						    			<span class="error">*</span>
						    		</div>
						    		<button type="submit" class="btn btn-primary" name="register">Register</button>
						    		<button class="btn btn-primary w-50 abc"><a href="login.php">Already have an Account</a></button>
					    	   </form>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		</div>

		<?php include "includes/footer.php"; ?>
	</body>
</html>