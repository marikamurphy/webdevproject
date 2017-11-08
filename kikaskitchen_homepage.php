<!DOCTYPE html>
	<html>
		
		<head>
			<title>Page Title</title>
		
		
		
		  <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
		}
		</style>
		
		
		<link rel="stylesheet" type="text/css" href="kikaskitchen_homepage.css?v=1" />
		</head>
		
		
		<body>

		<h1 align='center' >Kika's Kitchen</h1>
		</br></br></br>
		
		<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="soccer.jpg" alt="soccer" width="92px" height="69">
      </div>

      <div class="item">
        <img src="soccer1.jpg" alt="soccer1" width="92px" height="50">
      </div>
    
      <div class="item">
        <img src="soccer2.jpg" alt="soccer2" width="75%" height="75%">
      </div>

      <div class="item">
        <img src="soccer4.jpg" alt="soccer3" width="92" height="69">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

		</br></br></br>
			
			<?php
			
				// closed connection ok
				
				
			//include 'colorVars.php';			
			include 'kikaskitchen_settings.php';

			//echo "$hostName, $dbUsername, $dbPassword, $dbName <br>";
			//echo "<br>$hostName  $dbUsername  $dbPassword  $dbName</br>";
			
			
			$con=mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName);

			if (mysqli_connect_errno())
			{
				die("oh my!");
				//echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			
			$sql = "SELECT * FROM recipes";
			$result = mysqli_query($con,$sql);
			
			if ($result == null)
			{
				echo "<br> result is null </br>";
			}
			

			{
				$num = mysqli_num_rows($result);
				//echo "<br> Number of Rows = $num </br>";
			}
			
			//need two forms one for register other for login
			echo "<table border='1' width = '500' align = 'center' >";
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				$recipeName = $row['recipeName'];
				echo "<td> &nbsp; $recipeName </td>";
				
				$ingredients = $row['ingredients'];
				echo "<td> &nbsp; Ages: $ingredients </td>";
				
				$instructions = $row['instructions'];
				echo "<td> &nbsp; Ages: $instructions </td>";
				
				$preTime = $row['preTime'];
				echo "<td> &nbsp; Ages: $preTime </td>";
				
				
			}
			
			mysqli_close($con);
			
			echo "</table>";
			
			echo "<table border='1' width = '500' align = 'center' >";
			$x = 1;
			while($row = mysqli_fetch_array($result))
			{
				
				echo "<form action = 'kikaskitchen_register.php' method = 'post'>";
				echo "<td align = 'center'> <input type = 'submit' name='R" . $x . "' value='Register' > </td>";
				echo "</form>";
				echo "<form action = 'kikaskitchen_login.php' method = 'post'>";
				echo "<td align = 'center'><input type = 'submit' name='L" . $x . "' value = 'Login' ></td>";
				echo "</form>";
				echo "</tr>";
				$x = $x+1;
				
			}
			
			mysqli_close($con);
			
			echo "</table>";
			
			
			
			?>
			<?php
			
				include 'kikaskitchen_settings.php';
				
				$username = "";
				$password = "";
				
			?>
			<div style="text-align:center">
			</br></br>
			</br></br>
			<br>
			<form name='fromLogin' method="post" action="kikaskitchen_admin.php"> 
			
				<p> Administrator Username: <input type= "text" name = 'username' id = 'username' value ='<?php echo $username;?>'> </p>
				<br>
				<p> Password: <input type = 'password' name = 'password' id = 'password' value = '<?php echo $password;?>'> </p>
				<br>
				
				<input type='hidden' name='fromLogin'  value='fromLogin'>
				
				<input type='hidden' name='admin'  value='admin'>

					
				</br>
				
				<input type="submit" name="Login" value="Log In"'>
				
				</br></br></br>

				
				

				
				
			

			</br></br>
			

				
				
				</br>
				</br>
				<textarea rows = '2' cols = '48' readonly>Software written by Westlake High School.</textarea>
				</div>
				</br>
				</br>
				
			</form>
		</body>
	</html>
			
			
