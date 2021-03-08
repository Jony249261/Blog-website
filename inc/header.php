

<?php
	include "config/config.php";
	include "lib/Database.php";
	include "helpers/Format.php";

 ?>

 <?php
	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>

	<?php 

		if (isset($_GET['pageid'])) {
			$pagetitle = $_GET['pageid'];

			$sql ="SELECT * FROM tbl_page WHERE id = '$pagetitle'";
            $page = $db->select($sql);
            if ($page) {
                while ($result = $page->fetch_assoc()) { ?>

					<title><?php echo $result['name']; ?>--<?php echo TITLE; ?></title>


			<?php } } } elseif (isset($_GET['id'])) {
			$posttitle = $_GET['id'];

			$sql ="SELECT * FROM tbl_post WHERE id = '$posttitle'";
            $post = $db->select($sql);
            if ($post) {
                while ($presult = $post->fetch_assoc()) { ?>

					<title><?php echo $presult['title']; ?>--<?php echo TITLE; ?></title>

			<?php } } } else { ?>

			 <title><?php echo $fm->title(); ?>--<?php echo TITLE; ?></title>

		<?php
		}
	 ?>

	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">

	<?php 

		if (isset($_GET['id'])) {
			$keywordid = $_GET['id'];
			$query = "SELECT * FROM tbl_post WHERE id = '$keywordid'";
			$keywords = $db->select($query);
			if ($keywords) {
				while ($result = $keywords->fetch_assoc()) { ?>
					<meta name="keywords" content="<?php echo $result['tags']; ?>">
					
			<?php } } } else { ?>

				
				<meta name="keywords" content="<?php echo KEYWORDS; ?>">
		
		<?php } ?>




	
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/nivo-slider1.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style1.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">

			<?php 

			$query ="SELECT * FROM title_slogan Where id='1'";
			$update_logo = $db->select($query);
			if ($update_logo) {
				while ($result = $update_logo->fetch_assoc()) {
					

			 ?>



			<div class="logo">
				<img src="admin/<?php echo $result['logo']; ?>" alt="Logo"/>
				<h2><?php echo $result['title']; ?></h2>
				<p><?php echo $result['slogan']; ?></p>
			</div>
		<?php } } ?>

		</a>

		<?php 

			$sql ="SELECT * FROM tbl_social Where id='1'";
			$update_social = $db->select($sql);
			if ($update_social) {
				while ($sresult = $update_social->fetch_assoc()) {
					

			 ?>



		<div class="social clear">
			<div class="icon clear">
				<a href="<?php echo $sresult['fb']; ?>"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $sresult['tw']; ?>"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $sresult['ln']; ?>"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $sresult['gg']; ?>"><i class="fa fa-google-plus"></i></a>
			</div>

		<?php } } ?>

			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">

	<?php 

		$path = $_SERVER['SCRIPT_FILENAME'];
		$currentpage = basename($path, '.php');

	 ?>


	<ul>
		<li><a

			<?php if($currentpage == 'index'){echo 'id="active"';}?>

		 href="index.php">Home</a></li>

		 <?php 

			$sql ="SELECT * FROM tbl_page";
			$page = $db->select($sql);
			if ($page) {
				while ($result = $page->fetch_assoc()) {
					

			 ?>

			  <li><a

			  	<?php if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']){
			  		echo 'id = "active"';
			  	} ?>

			   href="page.php?pageid=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a> </li>

			<?php } } ?>

		<li><a 

			<?php if($currentpage == 'contact'){echo 'id="active"';}?>

		 href="contact.php">Contact</a></li>
	</ul>
</div>
