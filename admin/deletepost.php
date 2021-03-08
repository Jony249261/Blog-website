<?php 
    include "../lib/Session.php";
    Session::checkSession();
?>


<?php
    include "../config/config.php";
    include "../lib/Database.php";
    include "../helpers/Format.php";

 ?>

 <?php
    $db = new Database();
?>


<?php 

    if (!isset($_GET['delpostid'])  || $_GET['delpostid'] == NULL) {
        header("location:postlist.php");
    } else {
        $postid = $_GET['delpostid'];

        $query = "SELECT * FROM tbl_post WHERE id='$postid'";
        $getdata = $db->select($query);
        if ($getdata) {
        	while ($delimg = $getdata->fetch_assoc()) {
        		$dellink = $delimg['image'];
        		unlink($dellink);

        	}
        }

        $delquery = "DELETE FROM tbl_post WHERE id = '$postid'";
        $delData = $db->delete($delquery);

        if ($delData) {
        	echo "<script>alert('Data Deleted Successfully!');</script>";
        	echo "<script>window.location = 'postlist.php';</script>";
        } else {
        	echo "<script>alert('Data Not Deleted !');</script>";
        	echo "<script>window.location = 'postlist.php';</script>";
        }

    }


 ?>