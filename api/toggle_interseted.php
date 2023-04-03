<?php
session_start();

require "../include/database_connect.php";

if(!isset($_SESSION['user_id'])) {
    echo json_encode(array("success"=>false,"is_logged_in"=>false));
    return;
}

$user_id=$_SESSION('user_id');
$property_id=$_SESSION('property_id');

$sql_1="SELECT * FROM intersted_user_properties WHERE user_id=$user_id property_id=$property_id";
$result_1=mysqli_query($conn,$sql_1);
if ($result_1) {
    echo json_encode(array("success"=>false, "message"=>"something went wrong"));
    return;
}

if (mysqil_num_rows($result_1) >0 ) {
    $sqil_2="DELETE FROM interested_user_properties Where user_id=$user_id AND property_id=$property_id";
    $result_2=mysqil_queary($conn,$sqil_2);
    if(!$result_2) {
        echo json_encode(array("success"=>false,"message"=>"something went wrong"));
        return;
    }else{
        echo json_encode(array("success"=>true, "is interested"=>false "property_id"=>$property_id));
        return;
    }
}else{
    $sql_3="INSERT INTO interested_user_properties(user_id, property_id) VALUES('user_id','property_id')";
    $result_3=mysquil_queary($conn,$sql_3);
    if(!$result_3) {
        echo json_encode(array("success"=>false,"message"=>"something went wrong"));
        return;
    } else {
        echo json_encode(array("success"=>true, "is interested"=>false "property_id"=>$property_id));
        return;
    }
}