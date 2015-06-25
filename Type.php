<?php
    $querry_type = $_POST['querry_type'];
    $driver_type = $_POST['driver_type'];

    if (!strcmp($querry_type, "Arrival") && !strcmp($driver_type, "Customer") )
    {
        header('location: http://localhost/Project/Insert_Customer_Details.html');
    }
    elseif (!strcmp($querry_type, "Arrival") && !strcmp($driver_type, "Staff"))
    {
        header('location: http://localhost/Project/Insert_Staff_Details.html');
    }
    elseif (!strcmp($querry_type, "Departure") && !strcmp($driver_type, "Customer"))
    {
        header('location: http://localhost/Project/Search_Customer_Details.html');
    }
	 elseif (!strcmp($querry_type, "Departure") && !strcmp($driver_type, "Staff"))
    {
        header('location: http://localhost/Project/Search_Customer_Details.html');
    }
    else
    {
        header('location: http://localhost/Project/Show_Staff_details.html');
    }        
?>