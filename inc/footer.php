	</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>


	  <?php 

			$query ="SELECT * FROM tbl_footer Where id='1'";
			$update_footer = $db->select($query);
			if ($update_footer) {
				while ($result = $update_footer->fetch_assoc()) {
					

			 ?>


	  <p>&copy; <?php echo $result['name']; ?> <?php echo date('Y'); ?></p>


	<?php } } ?>

	</div>

<?php 

			$sql ="SELECT * FROM tbl_social Where id='1'";
			$update_social = $db->select($sql);
			if ($update_social) {
				while ($sresult = $update_social->fetch_assoc()) {
					

			 ?>

	<div class="fixedicon clear">
		<a href="<?php echo $sresult['fb']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $sresult['tw']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $sresult['ln']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $sresult['gg']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<?php } } ?>

<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>
