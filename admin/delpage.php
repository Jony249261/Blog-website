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

    if (!isset($_GET['delpage'])  || $_GET['delpage'] == NULL) {
        header("location:index.php");
    } else {
        $postid = $_GET['delpage'];


        $delquery = "DELETE FROM tbl_page WHERE id = '$postid'";
        $delData = $db->delete($delquery);

        if ($delData) {
        	echo "<script>alert('Page Deleted Successfully!');</script>";
        	echo "<script>window.location = 'index.php';</script>";
        } else {
        	echo "<script>alert('Page Not Deleted !');</script>";
        	echo "<script>window.location = 'page.php';</script>";
        }

    }


 ?>