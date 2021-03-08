<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php'; ?>


<?php 

    if (!isset($_GET['sliderid'])  || $_GET['sliderid'] == NULL) {
        header("location:postlist.php");
    } else {
        $postid = $_GET['sliderid'];
    }


 ?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Slider</h2>

 <?php

           if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<script>window.location = 'sliderlist.php';</script>";
            }

?>


                <div class="block"> 

     <?php 

        $query    = "SELECT * FROM tbl_slider WHERE id='$postid' ORDER BY id DESC";
        $getpost = $db->select($query);
        while ($postresult = $getpost->fetch_assoc()) {
          

     ?>



                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title"  placeholder="Enter Post Title..." class="medium" value="<?php echo $postresult['title']; ?>" />
                            </td>
                        </tr>
                     
                        
                        <tr>
                            <td>
                                <label>Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image']; ?>" height="100px" width="250px"></br>
                                
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>

                <?php } ?>

                </div>
            </div>
        

    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

<?php include "inc/footer.php"; ?>