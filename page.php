<?php 
	include 'inc/header.php';
?>

<?php 

    if (!isset($_GET['pageid'])  || $_GET['pageid'] == NULL) {
        header("location:404.php");
    } else {
        $id = $_GET['pageid'];
    }


 ?>



<?php 

            $sql ="SELECT * FROM tbl_page WHERE id = '$id'";
            $page = $db->select($sql);
            if ($page) {
                while ($result = $page->fetch_assoc()) {
                    

             ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			

				<h2><?php echo $result['name']; ?></h2>

				<?php echo $result['body']; ?>

			

	</div>

		</div>
	<?php } } else { header("location:404.php");} ?>

<?php 
	include 'inc/sidebar.php';
	include "inc/footer.php";
?>