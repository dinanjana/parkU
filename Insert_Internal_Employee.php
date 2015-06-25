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
<img src="Images/title.jpg" width="1366" height="100" />Employee Was Successfully Added.
<?php
    $con = mysqli_connect("localhost", "root", "11111", "CAR_PARKING_SYSTEM");
    $query1 = "select max(Staff_id) from employee" or die("Error");
    $result1 = mysqli_query($con, $query1);
    $row = mysqli_fetch_array($result1);
    echo "Staff ID = 7";
?>

</body>
</html>