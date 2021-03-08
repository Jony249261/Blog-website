<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php'; ?>


<?php

           if($_SERVER['REQUEST_METHOD'] == 'POST'){  

                

                $name    = $fm->validation($_POST['name']);


                

                if ($name == "") {
                    echo "<span class='error'>Field must not be empty ! !</span>";

                }  else{

                    $query ="UPDATE tbl_footer
                                    SET
                                    
                                    name   = '$name'
                                    WHERE id= '1'"; 
                            $updated_row = $db->update($query);
                            if ($updated_row) {

                             echo "<span class='success'>Post Updated Successfully.
                             </span>";

                        } else {

                         echo "<span class='error'>Post Not Updated !</span>";
                        }
            }

}


?>



        <div class="grid_10">
		

             <?php 

                    $query = "SELECT * FROM tbl_footer WHERE id = '1'";
                    $social = $db->select($query);
                    if ($social) {
                        while ($result = $social->fetch_assoc()) {
                           

                     ?>


            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['name']; ?>" placeholder="Enter Copyright Text..." name="name" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>

        <?php } } ?>

<?php include "inc/footer.php"; ?>