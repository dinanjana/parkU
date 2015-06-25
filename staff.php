<html>
	<body>
		<?php
			$name = $_POST['name'];
			$cname  = $_POST['cname'];
			
			$con=mysqli_connect("example.com","peter","abc123","my_db");
			// Check connection
			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if(isset($name) && isset($cname))
			{
			$result = mysqli_query($con,"SELECT * FROM "); // Enter table name

			echo "<table border='1'>
			<tr>
			<th>Firstname</th>
			<th>Companyname</th>
			</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['CompanyName'] . "</td>";
				echo "</tr>";
				}

			echo "</table>";
			}
			else if(isset($name) && !isset($cname))
			{
				$result = mysqli_query($con,"SELECT name FROM "); // Enter table name

			echo "<table border='1'>
			<tr>
			<th>Firstname</th>
			<th>Companyname</th>
			</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['CompanyName'] . "</td>";
				echo "</tr>";
				}

			echo "</table>";
			}
			else if(!isset($name) && isset($cname))
			{
				$result = mysqli_query($con,"SELECT cname FROM "); // Enter table name

			echo "<table border='1'>
			<tr>
			<th>Firstname</th>
			<th>Companyname</th>
			</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['CompanyName'] . "</td>";
				echo "</tr>";
				}

			echo "</table>";
			}	

			mysqli_close($con);
		?>

	</body>
</html>