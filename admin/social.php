<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php'; ?>


<?php

           if($_SERVER['REQUEST_METHOD'] == 'POST'){  

                

                $fb    = $fm->validation($_POST['fb']);
                $tw   = $fm->validation($_POST['tw']);
                $ln    = $fm->validation($_POST['ln']);
                $gg    = $fm->validation($_POST['gg']);

                $fb    = mysqli_real_escape_string($db->link, $fb);
                $tw   = mysqli_real_escape_string($db->link, $tw);
                $ln    = mysqli_real_escape_string($db->link, $ln);
                $gg   = mysqli_real_escape_string($db->link, $gg);


                

                if ($fb == "" || $tw == "" || $ln == "" || $gg == "") {
                    echo "<span class='error'>Field must not be empty ! !</span>";

                }  else{

                    $query ="UPDATE tbl_social
                                    SET
                                    
                                    fb   = '$fb',
                                    tw    = '$tw',
                                    ln   = '$ln',
                                    gg    = '$gg'
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
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block"> 

                    <?php 

                    $query = "SELECT * FROM tbl_social WHERE id = '1'";
                    $social = $db->select($query);
                    if ($social) {
                        while ($result = $social->fetch_assoc()) {
                           

                     ?>



                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['fb'];?>" name="fb" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['tw'];?>" name="tw" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['ln'];?>" name="ln" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['gg'];?>" name="gg" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                <?php } } ?>

                </div>
            </div>
        </div>
       <?php include "inc/footer.php"; ?>