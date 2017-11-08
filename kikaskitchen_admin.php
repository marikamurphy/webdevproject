<!DOCTYPE html>

	<html>

		<head> 
			<title> Soccer Admin </title> 
			<link rel="stylesheet" type="text/css" href="soccer_format.css?v=1" />
		</head>

	 <script type = "text/javascript" > 
	 //uncomment once done debugging
		history.pushState(null, null, 'soccer_admin.php');
		window.addEventListener('popstate', function(event) {
			history.pushState(null, null, 'soccer_admin.php');
			
			});
	
    </script>
		
<style>
th.width {
    width:20%;
}

</style>
		

<SCRIPT LANGUAGE="javascript">







</SCRIPT>


<?php

function cleanData($data) {
  $data = trim($data);
  $data = stripslashes($data);
  // $data = htmlspecialchars($data);
  $data = htmlentities($data, ENT_QUOTES);

  return $data;
}

?>

			
			<?php
			//include 'colorVars.php';
			include 'soccer_settings.php';	
		


?>
<?php
			class Group
			{
				public function __construct($groupName, $ageRange, $numKids, $minAge, $maxAge, $position)
					{ 
						$this->groupName=$groupName;
						$this->ageRange=$ageRange;
						$this->numKids=$numKids;
						$this->minAge=$minAge;
						$this->maxAge=$maxAge;
						$this->position=$position;
						
						
					}
					
					public function setGroupName($groupName)
					{
						$this->groupName=$groupName;
					}
					public function setAgeRange($ageRange)
					{
						$this->ageRange=$ageRange;
					}
					public function setNumKids($numKids)
					{
						$this->numKids=$numKids;
					}
					public function setMinAge($minAge)
					{
						$this->minAge=$minAge;
					}
					public function setMaxAge($maxAge)
					{
						$this->maxAge=$maxAge;
					}
					public function setPosition($position)
					{
						$this->position=$position;
					}
					
					
					public function getGroupName()
					{
						return $this->groupName;
					}
					public function getAgeRange()
					{
						return $this->ageRange;
					}
					public function getNumKids()
					{
						return $this->numKids;
					}
					public function getMinAge()
					{
						return $this->minAge;
					}
					public function getMaxAge()
					{
						return $this->maxAge;
					}
					public function getPosition()
					{
						return $this->position;
					}
					
					
			
			}
			 class Kid //extends Group//??????
			{
			
				
				public function __construct($name, $age, $parentName, $phone, $address, $emailAddress, $username, $password, $position)
				{ 
					$this->name=$name;
					$this->age=$age;
					$this->parentName=$parentName;
					$this->phone=$phone;
					$this->address=$address;
					$this->emailAddress=$emailAddress;
					$this->username=$username;
					$this->password=$password;
					
					
				}
				//set
				public function setName($name)
				{
					$this->name=$name;
				}
				public function setAge($age)
				{
					$this->age=$age;
				}
				public function setParentName($parentName)
				{
					$this->parentName=$parentName;
				}
				public function setPhone($phone)
				{
					$this->phone=$phone;
				}
				public function setAddress($address)
				{
					$this->address=$address;
				}
				public function setEmailAddress($emailAddress)
				{
					$this->emailAddress=$emailAddress;
				}
				public function setUsername($username)
				{
					$this->name=$name;
				}
				public function setPassword($password)
				{
					$this->password=$password;
				}
				public function setPosition($position)
				{
					$this->position=$position;
				}
				//get
				public function getName()
				{
					return $this->name;
				}
				public function getAge()
				{
					return $this->age;
				}
				public function getParentName()
				{
					return $this->parentName;
				}
				public function getPhone()
				{
					return $this->phone;
				}
				public function getAddress()
				{
					return $this->address;
				}
				public function getEmailAddress()
				{
					return $this->emailAddress;
				}
				public function getUsername()
				{
					return $this->name;
				}
				public function getPassword()
				{
					return $this->password;
				}
				public function getPosition()
				{
					return $this->position;
				}
				
			}
?>
<?php
//login*****************	
				$delimiter = "\t";
				$reportHTML = "<!DOCTYPE html> <html> <head> <title>Display Team Information</title> </head> <body>";
				$reportxls = "";
			if(isset($_POST['fromLogin'])) 
			{
			$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);
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
							
				}
				
					$groups["0"]=null;
					$kids["0"]=null;
					
				
				
				$goBackToLogin=true;
					
					if($usernameTemp==$adminUsername && $passwordTemp==$adminPassword)
					
						{	
					$sql7="SELECT * FROM groups";
					$resultI=mysqli_query($con,$sql7);
					$x=1;
					while($row2=mysqli_fetch_array($resultI))
					{
						$groupName = $row2['groupName'];
						
						$ageRange   = $row2['ageRange'];
						
						$numKids = $row2['numKids'];
						$minAge = $row2['minAge'];
						$maxAge = $row2['maxAge'];
						
						
						
							
						
						
						$xx=$x."";
						$groups[$xx] = new Group($groupName, $ageRange, $numKids, $minAge, $maxAge, $x);
						
						$x++;
					}
	
				
				
				$i=1;
				$sql1= "SELECT * FROM kids   ";
				$result=mysqli_query($con,$sql1);
				//$row3 = mysqli_fetch_array($result);
				//echo $result."</br>";
						$goBackToLogin=false;
					while($row3 = mysqli_fetch_array($result))
					{
							// echo "<br> inside of first time loop for team members <br>";
						// $username   we already have this from the login
						$name = $row3['name'];
						
						$age   = $row3['age'];
						
						$parentName = $row3['parentName'];
						$phone = $row3['phone'];
						$address = $row3['address'];
						$emailAddress = $row3['emailAddress'];
						$username = $row3['username'];
						$password = $row3['password'];
						
						
							
						
						
						$ii=$i."";
						$kids[$ii] = new Kid($name, $age, $parentName, $phone, $address, $emailAddress, $username, $password, $i);
						$i++;
						//changed teamnumber into position with 3 digits					
					
					}
					$tempReportString = "<table border='1'>   
					<tr>
					<th>&nbsp; Group Name &nbsp;</th>
					<th>&nbsp; Age Range &nbsp;</th>
					<th>&nbsp; Kids &nbsp;</th>
					<th>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</th>
					
					</tr>";
					echo $tempReportString;
					$reportHTML .= $tempReportString;
					
					for($a=1; $a<count($groups); $a++)
					{
					echo "<tr>";
					$reportHTML .="<tr>";
					$aa=$a."";
					//echo $groups[$aa]->getMinAge();
						$minAge = $groups[$aa]->getMinAge();
						
						$maxAge = $groups[$aa]->getMaxAge();
						$tempReportString = "
						 <td> ". $groups[$aa]->getGroupName()."</td>
						<td> ". $groups[$aa]->getAgeRange()."</td> </tr>
					<tr><td> </td> <td> </td> <th> Name </th> <th> Parent Name </th> </tr>";
					echo $tempReportString;
					$reportHTML .= $tempReportString;
						for($b=1; $b<count($kids); $b++)
						{
						$bb=$b."";
							$age=$kids[$bb]->getAge();
						
							if($age>=$minAge && $age<=$maxAge)
							{
								$tempReportString = "<tr><td> </td><td> </td><td>".$kids[$bb]->getName() . "</td> <td> " . $kids[$bb]->getParentName() . " " .  "</td></tr>";
								echo $tempReportString;
								$reportHTML .= $tempReportString;
							}
						
						}
						
					
					}
					
					//end table
					$tempReportString= "</table>";
					echo $tempReportString;
					$reportHTML .= $tempReportString;
					mysqli_close($con);
					
					//back to homepage
					//
					//
					echo "<br>";
					echo "<br>";
					echo "<form action = 'soccer_homepage.php' method = 'POST'>";
					echo "<input type = 'submit' value = 'Back to Homepage'>";			
					echo "<input type='hidden' name='calledFromOutside'  value='calledFromOutside'>";
					echo "</form>";
					
					//this allows refreshing btw
					//
					//
					echo "</br> </br>";
					echo "<form name='fromLogin' method='POST' action='soccer_admin.php'>";
					echo "<input type = 'submit' value = 'refresh'>";
					echo "<input type='hidden' name='fromLogin'  value='fromLogin'>";
					echo "<input type='hidden' name='username' id='username' value='$usernameTemp'>";
					echo "<input type='hidden' name='password' id='password'  value='$passwordTemp'>";
					echo "</form>";
					
					}
					else
					{
								
								
								
								$goBackToLogin = true;
								
								echo "<br>";
								echo "<form action = 'soccer_homepage.php' method = 'POST'>";
								echo "<input type = 'submit' value = 'Back to Login'>";			
								echo "<input type='hidden' name='error'  value='error'>";
								echo "</form>";
								echo "</br>"." Your username and password are incorrect "."</br>"; 
								
					}
				
				
			
			
			}
			?>
			<?php 
					
			$theFilenamehtml = $username . 'DisplayTeamInfo.html';
			
			
			echo "</br>";
			echo "<a href='$theFilenamehtml' download>Download Team Report as HTML file</a>";
			echo "</br>";
			echo "</br>";
			
			?>
			<?php 
		
			// ********************
			// write the html file
			// ********************

			$reportHTML .= "</body> </html>";
			
			$theFileNamehtml = $username . 'DisplayTeamInfo.html';
			
			if (file_exists($theFileNamehtml))
			{
				unlink($theFileNamehtml);
			}
			
			$fileHandle = fopen($theFileNamehtml, 'w') OR die ("Can't open file\n"); 
			
			
			$result = fwrite ($fileHandle, $reportHTML); 
			
			
			fclose ($fileHandle); 		


			
			
		?>	
</html>