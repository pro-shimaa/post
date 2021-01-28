<?php 

include("../../connections/post.php");

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($post,$_POST['search']);

    $query = "SELECT * FROM prof WHERE prof_name like'%".$search."%'";
    $result = mysqli_query($post,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['prof_id'],"label"=>$row['prof_name']);
    }

    echo json_encode($response);
}

exit;


