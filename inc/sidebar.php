		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
				<?php
				
				$query = "select * from tbl_category";
				$category = $db->select($query);

				if($category){
				while($result = $category->fetch_assoc()){

				 ?>

						<li><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
				<?php } } else { ?>
					<li>No Category Ceated</li>
				<?php } ?>
					</ul>
			</div>

			<div class="samesidebar clear">
				<h2>Latest articles</h2>

				<?php
					$query = "SELECT * from tbl_post ORDER BY id DESC limit 5";
					$post = $db->select($query);

				if($post){
				while($lresult = $post->fetch_assoc()){

				 ?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $lresult['id']; ?>"><?php echo $lresult['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $lresult['id']; ?>"><img src="admin/<?php echo $lresult['image']; ?>" alt="post image"/></a>
						<?php echo $fm->textShorten( $lresult['body'], 120); ?>
					</div>

					<?php } } else {header("location:404.php");} ?>

			</div>

		</div>