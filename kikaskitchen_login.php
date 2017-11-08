<!DOCTYPE html>

<html>
	
		<head>
			<title> Soccer Summer Camp</title>
			<link rel="stylesheet" type="text/css" href="soccer_format.css?v=1" />
		</head>

	<script type = "text/javascript" >
		history.pushState(null, null, 'pagelogin');
		window.addEventListener('popstate', function(event) {
			history.pushState(null, null, 'pagelogin');
			});
	
    </script>

	<?php

function cleanData($data) {
  $data = trim($data);
  $data = stripslashes($data);
  // $data = htmlspecialchars($data);
  $data = htmlentities($data, ENT_QUOTES);

  return $data;
}

?>
		
		
		
		<body>
		
			<?php
			
				include 'soccer_settings.php';
				
				$username = "";
				$password = "";
				
			?>

			<div style="text-align:center">
			
			
			<?php	/*		
			$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
						if (mysqli_connect_errno())
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}	
			if(isset($_POST['fromLogin']))
			{
				$usernameTemp="";
				$passwordTemp="";
				
					
					foreach($_POST as $key => $value)
					{
								if($key == "username")
								{	$usernameTemp=$value;
									//echo "<br> $key : $value <br>";
								}
								else if($key== "password")
								{	$passwordTemp=$value;
									//echo "<br> $key : $value <br>";
								}
					}
					
					$sql1= "SELECT * FROM kids  WHERE  (username='"   . $usernameTemp ."' )AND " .
									"(password='"  . $passwordTemp  .  "') ";
					$result=mysqli_query($con,$sql1);
					$rowy = mysqli_fetch_array($result);
					//echo $result."</br>";
					
					if($rowy==null)
					{
						echo "</br>"." Your username and password are incorrect "."</br>";
					}
			}
			mysqli_close($con);
			*/?>
			
			
			
			
			<h4> Please login to update your information. </h3>
			<h4>  </h3>
			
			<h4>Please do NOT use the browser back or forward button at any time. </h3>
			</br>
			
			<form name='fromLogin' method="post" action="soccer_register.php"> 
			
				<p> Username: <input type= "text" name = 'username' id = 'username' value ='<?php echo $username;?>'> </p>
				<br><br>
				<p> Password: <input type = 'password' name = 'password' id = 'password' value = '<?php echo $password;?>'> </p>
				<br><br>
				
				<input type='hidden' name='fromLogin'  value='fromLogin'>
				
				<input type='hidden' name='groupName'  value='groupName'>

				<?php
					
					//$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
			
					//if(mysqli_connect_errno())
					//{
					//	echo "Failed to connect to MySQL: " . mysqli_connect_error();
					//}
					if(isset($_POST['L1'])){
					
					echo "<input type='hidden' name='groupName'  value='L1'>";//pass name of button to register
					
					}
					else if(isset($_POST['L2'])){
					
					echo "<input type='hidden' name='groupName'  value='L2'>";
					}
					else if(isset($_POST['L3'])){
					
					echo "<input type='hidden' name='groupName'  value='L3'>";
					
					}
					else if(isset($_POST['L4'])){
					
					echo "<input type='hidden' name='groupName'  value='L4'>";
					
					}
					else if(isset($_POST['L5'])){
					
					echo "<input type='hidden' name='groupName'  value='L5'>";
					
					}
								
				?>
					
					
				</br></br></br>
				
				<input type="submit" name="Login" value="Log In"'>
				
				</br></br></br>

				
				

				
				
			

			</br></br>
			<?php
			/*			
				echo "<table border='0' style='margin: 0 auto;'>";
					echo "<tr>";
						echo "<td><img src='parking.png' alt='Smiley face' height='325' width='625'></td>";
					echo "</tr>";
				echo "</table>"; */
			?>
			
				

				
				
				</br>
				</br>
				<textarea rows = '2' cols = '48' readonly>Software written by Westlake High School.</textarea>
				</br>
				</br>
				
			</form>
			<br>
				<br>
				<form action = "soccer_homepage.php" method = 'POST'>
				<input type = 'submit' value = 'Back to Homepage'>			
				<input type='hidden' name='calledFromOutside'  value='calledFromOutside'>
				</form>	
			
			</div>
			
			
		</body>
		
	</html>