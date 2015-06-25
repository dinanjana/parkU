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
    
    $Lot_No = mysqli_real_escape_string($con, $_POST['license_plate_no']);
    $query_where = "SELECT Lot_No FROM parked_at WHERE L_Plate_No = '$Lot_No'";
    
            
    $result1 = mysqli_query($con, $query_where);
    mysqli_close($con);
    echo "<p> OK. The Vehicle " .$Lot_No." is parked at ".$result1.". </p>";

?>