<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Current Bill</title>
<style type="text/css">
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 16px;
	color: #666;
}
body {
	background-image: url(Images/background.jpg);
}
#apDiv1 {
	position:absolute;
	width:47px;
	height:27px;
	z-index:1;
	left: 119px;
	top: 324px;
}
#apDiv2 {
	position:absolute;
	width:57px;
	height:28px;
	z-index:1;
	left: 25px;
	top: 324px;
}
</style>
</head>

<body>
<img src="Images/title.jpg" width="1341" height="100" alt="Title" />
<?php
        $con = mysqli_connect("localhost", "root", "11111", "CAR_PARKING_SYSTEM");

        $V_License_No = mysqli_real_escape_string($con, $_POST['L_Plate_No']);
        $Curr_Time = date('H:i');
        
        $query_insert_time = "UPDATE CUSTOMER_VEHICLE SET departed_time = '$Curr_Time' WHERE v_license_no = '$V_License_No'";
        $result1 = mysqli_query($con, $query_insert_time) or die("Error: ".mysqli_error($con));
 
        $query_arr_time = "select * from customer_vehicle where V_License_No = '$V_License_No'";
        $query_v_type = "select * from vehicle where license_plate_no = '$V_License_No'";
        
        $result2 = mysqli_query($con, $query_arr_time) or die("Error: ".mysqli_error($con));
        $result3 = mysqli_query($con, $query_v_type) or die("Error: ".mysqli_error($con));
        
        $row1 = mysqli_fetch_array($result2);
        $row2 = mysqli_fetch_array($result3);
        
        $arr_time = $row1['arrived_time'];
        $time_diff = round(abs($Curr_Time - $arr_time)) - 1;
        if ($row2['type'] == 4) {
            $charge = $time_diff * 50 + 200;
        }
        else {
            $charge = $time_diff * 30 + 100;
        }
        
        $query_add_charge = "UPDATE CUSTOMER_VEHICLE SET charge = '$charge' WHERE v_license_no = '$V_License_No'";
        $result4 = mysqli_query($con, $query_add_charge) or die("Error: ".mysqli_error($con));
        
        $result5 = mysqli_query($con, $query_arr_time);
        $row3 = mysqli_fetch_array($result5);
        
        $query_lot = "SELECT lot_no FROM PARKED_AT WHERE v_license_no = '$V_License_No'";
        $result6 = mysqli_query($con, $query_lot) or die("Error: ".mysqli_error($con));
        $row4 = mysqli_fetch_array($result6);
        
        $lot_no = $row4['lot_no'];
        
        echo "<table>
            <tr>
                <td>
                    Vehicle License Plate Number: 
                </td>
                <td>
                    " .$row3['v_license_no'] ."
                </td>
            </tr>
            <tr>
                <td>
                    Driver's License Number: 
                </td>
                <td>
                    " .$row3['d_license_no'] ."
                </td>
            </tr>
            <tr>
                <td>
                    Arrived Time: 
                </td>
                <td>
                    ". $row3['arrived_time'] ."
                </td>
            </tr>
            <tr>
                <td>
                    Current Time:
                </td>
                <td>
                    ". $row3['departed_time'] ."
                </td>
            </tr>
            <tr>
                <td>
                    Current Charge:
                </td>
                <td>
                    ". $row3['charge'] ."
                </td>
            </tr>
            <tr>
                <td>
                    Your vehicle is parked at lot number " . $lot_no .".
                </td>
            </tr>
        </table>";
        

        mysqli_close($con);
    ?>
<div id="apDiv2"><form name="form1" method="post" action="Search_Customer_Details.html">
  <input type="submit" name="Cancel" id="Cancel" value="Cancel"></form></div>

<div id="apDiv1">
<form name="form2" method="post" action="Customer_Departing.php">
    <input type="hidden" name="v_license_no" value="<?php echo $V_License_No;?>" />
    <input type="hidden" name="lot_no" value="<?php echo $lot_no;?>" />
  <input type="submit" name="button" id="button" value="Done">
</form></div><label></label>
</body>
</html>