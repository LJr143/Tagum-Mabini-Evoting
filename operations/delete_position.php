<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    require_once '../config/db_config.php';

    $statusMsg = '';
    $success = '';
    $position = $_POST['position'];
    $id = $_POST['id'];

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    //logs
    $tempCampus = $_SESSION['username'];
    $dt = date('Y-m-d G:i:s');
    $action = "Removed local council position "."\"".$position."\"";

    $query2 = "INSERT INTO tblogs(name,action,timestamp) VALUES('$tempCampus', '$action','$dt')";

    $query = "DELETE from tbposition where code = '$id'";

    if(mysqli_query($conn,$query) == TRUE){
        $success = 'true';
        mysqli_query($conn,$query2);
    }else{
        $statusMsg = "Unable to delete position";
    }

?>  