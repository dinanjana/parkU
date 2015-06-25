<style type="text/css">
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 16px;
	color: #666;
	font-weight: bold;
}
body {
	background-image: url(Images/background.jpg);
}
</style>
<img src="Images/title.jpg" width="1344" height="100" alt="Title" />
<?php
    $con = mysqli_connect("localhost", "root", "11111", "CAR_PARKING_SYSTEM");
    
    $V_License_No = mysqli_real_escape_string($con, $_POST['lic_no']);
    $staff_id = mysqli_real_escape_string($con, $_POST['staff_id']);
    $Curr_Time = date('H:i');
	$P_Lot_No = "2001";
    
    
    $query_vehicle = "INSERT INTO VEHICLE (License_Plate_No) VALUES ('$V_License_No')";
    $query_staff = "INSERT INTO STAFF_VEHICLE (V_License_No,S_ID) VALUES ('$V_License_No', '$staff_id')";
            
    $result1 = mysqli_query($con, $query_vehicle);
    $result2 = mysqli_query($con, $query_staff);
    mysqli_close($con);
            
    echo "<p> OK. The Vehicle " .$V_License_No. " Of Driver " .$staff_id. " Is Successfully added to The Database. </p>";
	echo "<p>Parking Lot Number = ". $P_Lot_No ."</p>";

?>