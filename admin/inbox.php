<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php'; ?>


<?php 

    if (isset($_GET['seenid'])) {
        $seenid = $_GET['seenid'];
    



    $query ="UPDATE tbl_contact
                                    SET
                                    
                                    status   = '1'
                                    WHERE id= '$seenid'"; 
                            $updated_row = $db->update($query);
                            if ($updated_row) {

                             echo "<span class='success' style='margin-bottom:2px;'>Message Move to Seen Box Successfully.
                             </span>";
                             echo "<script>window.location ='inbox.php'</script>";

                        } else {

                         echo "<span class='error'>Something Went Wrong!!</span>";
                        }
}

 ?>
 <?php 

    if (isset($_GET['unseenid'])) {
        $unseenid = $_GET['unseenid'];
    



    $query ="UPDATE tbl_contact
                                    SET
                                    
                                    status   = '0'
                                    WHERE id= '$unseenid'"; 
                            $updated_row = $db->update($query);
                            if ($updated_row) {

                             echo "<span class='success' style='margin-bottom:2px;'>Message Move to Unseen Box Successfully.
                             </span>";
                             echo "<script>window.location ='inbox.php'</script>";

                        } else {

                         echo "<span class='error'>Something Went Wrong!!</span>";
                        }
}

 ?>


 <?php 

						    if (isset($_GET['delid'])) {
						    
						        $delid = $_GET['delid'];
						        $query = "DELETE FROM `tbl_contact` WHERE id='$delid'";
                    $delete_msg = $db->delete($query);
                    if ($delete_msg) {
                        echo "<span class='success'>Message Deleted Successfully !</span>";
                        echo "<script>window.location = 'inbox.php';</script>";
                        
                    } else{
                        echo "<span class='error'>Message Not Deleted !</span>";
                    }
						    }


				?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$query ="SELECT * FROM 	tbl_contact where status='0' order by id desc";
						$message = $db->select($query);
						if ($message) {
							$i=0;
							while ($result = $message->fetch_assoc()) {
								$i++;

						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || <a href="replymsg.php?msgid=<?php echo $result['id']; ?>">Reply</a>|| <a href="?seenid=<?php echo $result['id']; ?>">Seen</a></td>
						</tr>

						<?php } } ?>
						
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen Message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$query ="SELECT * FROM 	tbl_contact where status='1' order by id desc";
						$message = $db->select($query);
						if ($message) {
							$i=0;
							while ($result = $message->fetch_assoc()) {
								$i++;

						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><a href="?delid=<?php echo $result['id']; ?>">Delete</a> || <a href="?unseenid=<?php echo $result['id']; ?>">Unseen</a></td>
						</tr>

						<?php } } ?>
						
					</tbody>
				</table>
               </div>
            </div>


        </div>




    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php include "inc/footer.php"; ?>