<?php

	// $_POST["email"];
	
	//defineerime muutujad
	$email_error = "";
	$password_error = "";
	$create_emailerror = "";
	$create_passworderror = "";
	$repassworderror = "";
	$create_passwordAerror = "";
	$create_usererror = "";
	
	//kontrollin kas keegi vajutas nuppu
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(isset($_POST["Login"])){
		
			//kas e-post on tühi
			if(empty($_POST["email"])){
				//jah oli tühi
				$email_error = "E-mail is required";
			}
			//kas password on tühi
			if(empty($_POST["password"])){
				//jah oli tühi
				$password_error = "Password is required";
			}
		}
		elseif(isset($_POST["Create"])){
			//kas create email on tühi
			if(empty($_POST["Cemail"])){
				//jah oli tühi
				$create_emailerror = "E-mail is required";
			}	
			if(empty($_POST["Cusername"])){
				//username väli on tühi
				$create_usererror = "Username is required";
			}	
			//kas create password on tühi
			if(empty($_POST["Cpassword"])){
				//jah oli tühi
				$create_passworderror = "Password is required";
			}	
			else{
				//kontrollib et parool oleks rohkem kui 8 sümbolit
				if(strlen($_POST["Cpassword"]) < 8 ){
				$create_passworderror = "Must be longer than 8 symbols";
				}
				if($_POST["Cpassword"] !== $_POST["repassword"]){
					//kui parool ei võrdu kordusparooliga lükkab errori ette
					$create_passwordAerror = "Your password does not match the password entered above";
				}
			}
		}
	}
?>

<?php
$page_title = "Login";
$file_name = "login.php";
?>	

<?php require_once("../header.php");?>


	<h3>Mõtlesin siis teha lehe kuhu inimesed saavad teha postitusi erinevate teemade alla ja teised saavad siis kommenteerida, põhimõtteliselt väga lihtsustatud reddit</h3>
	<h2>Login</h2>
	<p>* required field.</p>
	<form action="login.php" method="post">
	<input name="email" type="email" placeholder="E-mail"> * <?php echo $email_error?><br><br>
	<input name="password" type="password" placeholder="password"> * <?php echo $password_error?><br><br>
	<input name="Login" type="submit" value="Login"> <br><br>
	</form>

	<h2>Create user</h2>
	<p>* required field.</p>
	<form action="login.php" method="post">
	<input name="Cusername" type="text" placeholder="Username"> * <?php echo $create_usererror?><br><br>
	<input name="Cemail" type="email" placeholder="E-mail"> * <?php echo $create_emailerror?><br><br>
	<input name="Cpassword" type="password" placeholder="password"> * <?php echo $create_passworderror?><br><br>
	<input name="repassword" type="password" placeholder="password again"> * <?php echo $create_passwordAerror?><br><br>
	<input name="Create" type="submit" value="Create"><br><br>
	</form>
	
<?php require_once("../footer.php");?>