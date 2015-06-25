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
<img src="Images/title.jpg" width="1344" height="100" alt="Title" />

<?php
    $con = mysqli_connect("localhost", "root", "11111", "CAR_PARKING_SYSTEM");
    
    $F_Name = mysqli_real_escape_string($con, $_POST['F_Name']);
    $L_Name = mysqli_real_escape_string($con, $_POST['L_Name']);
    $NIC_No = mysqli_real_escape_string($con, $_POST['NIC_No']);
    $Address1 = mysqli_real_escape_string($con, $_POST['Address1']);
    $Address2 = mysqli_real_escape_string($con, $_POST['Address2']);
    $Address3 = mysqli_real_escape_string($con, $_POST['Address3']);
    $Shift = mysqli_real_escape_string($con, $_POST['Shift']);
    $E_Type = mysqli_real_escape_string($con, $_POST['E_Type']);
    
    if (strcmp($E_Type, "Internal") && strcmp($E_Type, "External"))
    {
        header('location: http://localhost/Project/Enter_Employee.html');
        
    }
    elseif (!strcmp($E_Type, "External"))
    {
        $query1 = "insert into employee (NIC_No, F_Name, L_Name, Address1, Address2, Address3, Working_Shift)
                values('$NIC_No', '$F_Name', '$L_Name', '$Address1', '$Address2', '$Address3', '$Shift')";
                
        $result1 = mysqli_query($con, $query1) or die("Error: ".mysqli_error($con));
        
        header('location: http://localhost/Project/Insert_External_Employee.php');
    }
    else
    {
        $query1 = "insert into employee (NIC_No, F_Name, L_Name, Address1, Address2, Address3, Working_Shift)
                values('$NIC_No', '$F_Name', '$L_Name', '$Address1', '$Address2', '$Address3', '$Shift')";
                
        $result1 = mysqli_query($con, $query1);
        
        header('location: http://localhost/Project/Insert_Internal_Employee.php');
    }
?>