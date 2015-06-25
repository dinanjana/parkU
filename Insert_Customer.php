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
    
    $V_License_No = mysqli_real_escape_string($con, $_POST['V_License_No']);
    $D_License_No = mysqli_real_escape_string($con, $_POST['D_License_No']);
    $V_Type = mysqli_real_escape_string($con, $_POST['vehicle_type']);
    $Curr_Time = date('H:i');
    $lot_no = 1001;
    
    if(!strcmp($V_Type, "four_wheel"))
    {
        $charge = 200;
        $V_Type = 4;
    }
    else
    {
        $charge = 100;
        $V_Type = 2;
    }
    
    $query_vehicle = "INSERT INTO VEHICLE (License_Plate_No, Type) VALUES ('$V_License_No', '$V_Type')";
    $query_customer = "INSERT INTO CUSTOMER_VEHICLE (V_License_No, D_License_No, Arrived_Time, Charge) VALUES ('$V_License_No', '$D_License_No', '$Curr_Time', '$charge')";
    $query_parking = "SELECT * FROM PARKING_LOT WHERE Is_Occupied = 0";
    
    $result1 = mysqli_query($con, $query_vehicle) or die("Error: ".mysqli_error($con));
    $result2 = mysqli_query($con, $query_customer) or die("Error: ".mysqli_error($con));
    $result3 = mysqli_query($con, $query_parking) or die("Error: ".mysqli_error($con));
    
    $row1 = mysqli_fetch_array($result3);
    $lot_no = $row1['Lot_no'];

    
    $query_parked1 = "INSERT INTO Parked_At  VALUES('$lot_no', '$V_License_No')";
    $query_parked2 = "UPDATE Parking_Lot SET Is_Occupied = 1 WHERE Lot_No = '$lot_no'";
    
    $result4 = mysqli_query($con, $query_parked1) or die("Error: ".mysqli_error($con));
    $result5 = mysqli_query($con, $query_parked2) or die("Error: ".mysqli_error($con));
    
    mysqli_close($con);
            
    echo "<p> OK. The Vehicle " .$V_License_No. " Of Driver " .$D_License_No. " Is Successfully added to The Database. </p>";
	echo "<p>Parking Lot Number = ". $lot_no ."</p>";

?>