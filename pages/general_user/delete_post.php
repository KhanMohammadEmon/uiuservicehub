<?php 
include '../sqlCommands/connectDb.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];


$q = "DELETE FROM `posts` WHERE id= $id";
$result = mysqli_query($sql, $q);

$sql->close();
if ($result) {
    header("Location: my_post.php?remove_success=true");
} else {
    header("Location: my_post.php?remove_success=false");
}
exit()

?>