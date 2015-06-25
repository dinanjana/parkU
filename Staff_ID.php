<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 16px;
	color: #666;
}
body {
	background-image: url(Images/background.jpg);
}
</style>
</head>

<body>
<img src="Images/title.jpg" width="1340" height="100" alt="Title" />
</body>
<?php
    $con = mysqli_connect("localhost", "root", "11111", "CAR_PARKING_SYSTEM");
    
    $Staff_ID = mysqli_real_escape_string($con, $_POST['Staff_ID']);
    
    $query1 = "select * from employee where Staff_id = '$Staff_ID'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
    
    $F_Name = $row1['F_Name'];
    $L_Name = $row1['L_Name'];
    $NIC_No = $row1['NIC_No'];
    $Address1 = $row1['Address1'];
    $Address2 = $row1['Address2'];
    $Address3 = $row1['Address3'];
    $Shift = $row1['Working_Shift'];
    
    echo "<table> <tr> <td>First Name: </td> <td> ". $F_Name . "</td></tr>
	<tr><td>Last Name:</td><td> " .$L_Name ."</td></tr>
	<tr><td>National ID No:</td><td> " .$NIC_No ."</td></tr>
	<tr><td>Address:</td><td> " .$Address1 . " " . $Address2 . " " . $Address3 . "</td></tr>
	<tr><td>Working Shift:</td><td> " .$Shift ."</td></tr></table>";

?>
</html>