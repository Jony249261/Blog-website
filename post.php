<?php 
	include 'inc/header.php';
?>
<?php
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		header("location:404.php");
	} else{
		$id = $_GET['id'];
	}
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

				<?php
					$query = "select * from tbl_post where id = $id";
					$post = $db->select($query);

				if($post){
				while($result = $post->fetch_assoc()){

				 ?>


				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <?php echo $result['author']; ?></h4>
				<img src="admin/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>

				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
				<?php
				$cat = $result['cat'];
				$queryrelated = "select * from tbl_post where cat='$cat' limit 6";
				$relatedpost = $db->select($queryrelated);

				if($relatedpost){
				while($rresult = $relatedpost->fetch_assoc()){

				 ?>
					<a href="post.php?id=<?php echo $rresult['id']; ?>"><img src="admin/<?php echo $rresult['image']; ?>" alt="post image"/></a>
				<?php }} else{
					echo " No elated Post";
				} ?>
				</div>
			<?php } } else {header("location:404.php");} ?>
	</div>

		</div>
<?php 
	include 'inc/sidebar.php';
	include "inc/footer.php";
?>