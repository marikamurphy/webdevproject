<!DOCTYPE html>

	<html>
	<head>
			<title>Summer Camp Registration</title>
			<link rel="stylesheet" type="text/css" href="soccer_format.css?v=1" />
			
		</head>
		<script type = "text/javascript" >
		history.pushState(null, null, 'soccer_register.php');
		window.addEventListener('popstate', function(event) {
			history.pushState(null, null, 'soccer_register.php');
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



//updating the number of kids in each group
function updateNumKidsInEachGroup(){
include 'soccer_settings.php';
$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}	

	$sql7="SELECT * FROM groups";
	$resultI=mysqli_query($con,$sql7);
	
	while($rowx = mysqli_fetch_array($resultI))
	{
		$minAge=$rowx['minAge'];
		$maxAge=$rowx['maxAge'];
		
		$sql9="UPDATE groups SET numKids = (SELECT COUNT(age) AS numKids1 FROM kids WHERE (age>='"   . $minAge ."' )AND " . "(age<='"  . $maxAge  .  "') )";
		if (!mysqli_query($con,$sql9))
		{
		echo "error updating the numKids in groups. </br>";
										
		}
	}
	
	
	mysqli_close($con);

}
function checkAge($age,$ageRange){
include 'soccer_settings.php';
$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}	

	$sql7="SELECT * FROM groups";
	$resultI=mysqli_query($con,$sql7);
	$x=1;
	$rangeRTemp="";
	$rangeLTemp="";
	
	
	while($rowx = mysqli_fetch_array($resultI))
	{
		$minAge=$rowx['minAge'];
		$maxAge=$rowx['maxAge'];
		
		
		if ($age>=$minAge && $age<=$maxAge)
		{
			$rangeRTemp="R".$x;
			$rangeLTemp="L".$x;
			
			
										
		}
		$x=$x+1;
	}
	//echo $rangeRTemp."   ". $rangeLTemp; 
	if ($ageRange==$rangeRTemp || $ageRange==$rangeLTemp)
	{
		return true;
	}
	else
	{
		return false;
	}
	
	
	mysqli_close($con);

}
function echoAgeRange($ageRange)
{
include 'soccer_settings.php';
$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}	
		$sql11="SELECT * FROM groups";
				$resultI=mysqli_query($con,$sql11);
				$x=1;
				$rangeRTemp="";
				$rangeLTemp="";
	
	
				while($rowx = mysqli_fetch_array($resultI))
				{
					$rangeRTemp="R".$x;
					$rangeLTemp="L".$x;
					//echo $rangeRTemp. " ".$rangeLTemp;
					if(($ageRange== $rangeRTemp || $ageRange== $rangeLTemp ))
					{
						echo "Group Name: ".$rowx['groupName']."</br>";
						echo "Ages: ".$rowx['ageRange']."</br>";
						
					}
					
					$x=$x+1;
				}
				mysqli_close($con);
}


?>


	<?php
			
			include 'soccer_settings.php';
	?>	
	<body>
			<p id= 'title'>Soccer Summer Camp Registration </p>
		
			<?php 
			//$id=0;
			$name="";
			$age=0;
			$parentName="";
			$phone="";
			$address="";
			$emailAddress="";
			$username="";
			$password="";
			$passwordCheck="";
			$canResubmit=true;
			$goBackToLogin=false;
			$ageRange="";
		
			
			
			$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			// if from R1 R2 R3 ect.
			if(isset($_POST['R1']))
			{
				$register1= true;
				$ageRange="R1";
			}
			else
			{
			$register1= false;
			}
			if(isset($_POST['R2']))
			{$register2= true;
			$ageRange="R2";
			}
			else
			{
			$register2= false;
			}
			if(isset($_POST['R3']))
			{
			$register3= true;
			$ageRange="R3";
			}
			else
			{
			$register3= false;
			}
			if(isset($_POST['R4']))
			{
			$register3= true;
			$ageRange="R4";
			}
			else
			{
			$register4= false;
			}
			//initial submission***************	
			if(isset($_POST['fromSelf']) || $register1== true || $register2== true || $register3== true || $register4== true)
			{
				$goBackToLogin=false;
				
				
							
				foreach($_POST as $key => $value)
				{
					
					
					
						if($key== "passwordCheck")
						{
							$passwordCheck=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "name")
						{	$name=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "age")
						{	$age=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "parentName")
						{	$parentName=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "phone")
						{	$phone=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "address")
						{	$address=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "emailAddress")
						{	$emailAddress=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key== "username")
						{	$username=$value;
							//echo "<br> $key : $value <br>";
						}
						//username
						else if($key== "password")
						{	$password=$value;
							//echo "<br> $key : $value <br>";
						}
						else if($key=="groupName")
						{
								$ageRange=$value;
								//echo $ageRange." HIIIII";
						}
						
						
						
						
						
						//echo "<br> $sql <br>";
						
					
				}
				echoAgeRange($ageRange);
				//Required Fields are Username, password and...?
				if ($username=="" || $password=="" || $name=="" || $parentName=="" || $age==0 )// check if age is in age range
				{
					
					echo "Please enter a name, an age, a Parent Name, a username and a password. These are required fields.". "</br> </br>";
				}
				else
				{
					//check age
					//echo $age.$ageRange."</br>";
					if(checkAge($age,$ageRange)== true)
					{	
						//echo "age is within the age range</br>";
					}
					else
					{	echo "age is not within the age range </br> ";
						echo "please login to the correct age range, do not reregister </br>";
					}
					
					//IS THE USERNAME UNIQUE
					$sql1= "SELECT * FROM kids  WHERE  (username='"   . $username."') ";
					$result=mysqli_query($con,$sql1);
					$rowx = mysqli_fetch_array($result);
					//$usernameTemp=rowx['username'];
					
					if($rowx==null)
					{
						//echo "Your username is unique";
						
						if($passwordCheck==$password)
						{
							$sql="INSERT INTO kids (name, age, parentName, phone, address, emailAddress, username, password) " . 
											"VALUES (" .
											"'" . $name    . "', " .
											"'" . $age     . "', " .
											"'" . $parentName   . "', " .
											"'" . $phone     . "', " .
											"'" . $address . "', " .
											"'" . $emailAddress . "', " .
											"'" . $username . "', " .
											"'" . $password .
											"') ";
											
						
							if (!mysqli_query($con,$sql))
									{
										echo "error saving your info."."</br>";
										$canResubmit=true;
									}
							else
									{
										echo "Your Information was saved"."</br>";
										echo "Your username is ". $username." you can no longer change this." ."</br></br>" ;
										$canResubmit=false;
														
									
										//increment groups table
										updateNumKidsInEachGroup();
									
									}
							
							
						
						}
						else
						{
							//echo "error saving your info". "</br>";
							echo "Your password does not match. Please retype and resubmit" ."</br></br>";
							$canResubmit=true;
							
						}
					}
					else
					{
						echo "Please choose another username. '" . $username. "' is already taken."."</br>";
						echo "</br> If you would like to update your information, please return to the homepage and login." ."</br></br>"; 
						
					}
				}
				
				
				
			}
			//login*****************	
			if(isset($_POST['fromLogin'])) 
			{
			$usernameTemp="";
			$passwordTemp="";
			//$ageRange="";
			//echo "In Login </br>";
			
			
				$canResubmit= false;
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
							else if($key=="groupName")
							{
							 $ageRange = $value;
							 //echo $ageRange;
							}
				}
				$sql7="SELECT * FROM groups";
				$resultI=mysqli_query($con,$sql7);
				$x=1;
	
	
				echoAgeRange($ageRange);
				
				$sql1= "SELECT * FROM kids  WHERE  (username='"   . $usernameTemp ."' )AND " .
								"(password='"  . $passwordTemp  .  "') ";
				$result=mysqli_query($con,$sql1);
				$row3 = mysqli_fetch_array($result);
				//echo $result."</br>";
				
				
				
				$goBackToLogin=false;
					
					if($row3==null)
					{
								
								
								
								$goBackToLogin = true;
								
								echo "<br>";
								echo "<form action = 'soccer_login.php' method = 'POST'>";
								echo "<input type = 'submit' value = 'Back to Login'>";			
								echo "<input type='hidden' name='error'  value='error'>";
								echo "</form>";
								echo "</br>"." Your username and password are incorrect "."</br>"; 
								
					}
					else
					{	
						$name = $row3['name'];
						$age = $row3['age'];
						$parentName = $row3['parentName'];
						$phone = $row3['phone'];
						$address = $row3['address'];
						$emailAddress = $row3['emailAddress'];
						$username = $row3['username'];
						$password = $row3['password'];
						$passwordCheck=$row3['password'];
					}
					
				
				
			
			
			}
			
			//resubmit*******************
			if(isset($_POST['reSubmit']))
			{
				$canResubmit=false;
				$goBackToLogin=false;
				//echo "entered resubmission </br>";
				
				foreach($_POST as $key => $value)
				{
						
						
						
							if($key== "passwordCheck")
							{
								$passwordCheck=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "name")
							{	$name=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "age")
							{	$age=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "parentName")
							{	$parentName=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "phone")
							{	$phone=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "address")
							{	$address=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "emailAddress")
							{	$emailAddress=$value;
								//echo "<br> $key : $value <br>";
							}
							//username
							else if($key== "username")
							{	$username=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "password")
							{	$password=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key== "passwordCheck")
							{	$passwordCheck=$value;
								//echo "<br> $key : $value <br>";
							}
							else if($key=="groupName")
							{
									$ageRange=$value;
									//echo $ageRange;
							}
							
				}
				//update sql statement where
				echoAgeRange($ageRange);
					if($passwordCheck==$password)// check if age is in age range
					{
						if(checkAge($age,$ageRange)== true)
					{	
					//echo "age is within the age range</br>";
					}
					else
					{	echo "age is not within the age range</br>";}
					
						$sql2="UPDATE kids SET " .
								"name='"  . $name  . "', " .
								"age='"  . $age  . "', " .
								"parentName='"  . $parentName  . "', " .
								"phone='"  . $phone  . "', " .
								"address='"  . $address  . "', " .
								"emailAddress='"  . $emailAddress  . "', " .
								"password='"  . $password  . "'  " .
								
								
								
								
								" WHERE  (username='"   . $username . "')";
					
						if (!mysqli_query($con,$sql2))
						{
							echo "error saving your info";
							
						}
						else
						{
							echo "Your Information was saved";
							
							//increment groups table
							updateNumKidsInEachGroup();							
						}
					}
					else
					{
						//echo "error saving your info". "</br>";
						echo "Your password does not match. Please retype and resubmit";
					
					
					}
				
			}			
				
				
			
				
			
			



				
			//table
			$tempReportString = "<table border='1'> ";
			echo $tempReportString;
			//form to enter contest scores?	
			//
			//individual scores for advanced
			if($goBackToLogin==false)
			{
				echo "<form action='soccer_register.php' method='post'>";
				
				
					
					
					
					
					
					
					
					//name
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Name"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='name' value='$name'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//age
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Age"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='age' value='$age'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//Parent Name
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Parent Name"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='parentName' value='$parentName'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//phone
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Phone Number"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='phone' value='$phone'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//address
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Address"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='address' value='$address'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//email
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Email Address"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='emailAddress' value='$emailAddress'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//username
					if($canResubmit==true){
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Username"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='username' value='$username'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					}
					else
					{
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Username: $username"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='hidden' name='username' value='$username'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					}
					//password
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Password"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='password' value='$password'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					//password again
					$tempReportString =  "<tr>";
					echo $tempReportString;
					$tempReportString = "<td>&nbsp;&nbsp;&nbsp;&nbsp;". "Retype Password"."&nbsp;&nbsp;&nbsp;&nbsp;</td>". "<td>". " <input type='text' name='passwordCheck' value='$passwordCheck'>". "</td>";
					echo $tempReportString;
					$tempReportString =   "</tr>";
					echo $tempReportString;
					
					
					
					
					
					
					
					
					
					
				//end table
				$tempReportString= "</table>";
				echo $tempReportString;



				//submit button
				
				if($canResubmit==false)
				{
					echo "<br><input type='submit' value='submit/update' id='submitButton'>";
					echo "<br><input type='hidden' name='reSubmit'  value='reSubmit'>";
					echo "<br><input type='hidden' name='groupName'  value='$ageRange'>";
				}
				
				else{
					echo "<br><input type='submit' value='submit' id='submitButton'>";
					echo "<input type='hidden' name='fromSelf' value=''>";
					echo "<br><input type='hidden' name='groupName'  value='$ageRange'>";
				}
				
				
				echo "</form>";	
			}
			mysqli_close($con);
			
				echo "<br>";
				echo "<br>";
				echo "<form action = 'soccer_homepage.php' method = 'POST'>";
				echo "<input type = 'submit' value = 'Back to Homepage'>";			
				echo "<input type='hidden' name='calledFromOutside'  value='calledFromOutside'>";
				echo "</form>";

				
			?>
	</body>
	</html>