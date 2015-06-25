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
<img src="Images/title.jpg" width="1345" height="100" alt="Title" />

<?php
    $con = mysqli_connect("localhost", "root", "11111", "CAR_PARKING_SYSTEM");
    $V_License_No = mysqli_real_escape_string($con, $_POST['v_license_no']);
    $Lot_No = mysqli_real_escape_string($con, $_POST['lot_no']);   
    
    $query1 = "UPDATE PARKING_LOT SET is_occupied = 0 where Lot_no = '$Lot_No'";
    $query2 = "DELETE FROM PARKED_AT WHERE v_license_no = '$V_License_No'";
    
    $result1 = mysqli_query($con, $query1) or die("Error: ".mysqli_error($con));
    $result2 = mysqli_query($con, $query2) or die("Error: ".mysqli_error($con));
	
	echo "Customer was successfully updated. Please get the charges.";
?>
