<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php'; ?>


<?php 

    $userid = Session::get('userId');
    $userrole = Session::get('userRole');

?>
<?php 

    if (!isset($_GET['userid'])  || $_GET['userid'] == NULL) {
        header("location:userlist.php");
    } else {
        $id = $_GET['userid'];
    }


 ?>


 <?php

           if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<script>window.location = 'userlist.php';</script>";
            }

?>

        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>User Details</h2>



                <div class="block"> 

     <?php 

                        $query ="SELECT * FROM  tbl_user where id ='$id'";
                        $message = $db->select($query);
                        if ($message) {
                            while ($result = $message->fetch_assoc()) {

                         ?>


                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="name" class="medium" value="<?php echo $result['name']; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" readonly name="username" class="medium" value="<?php echo $result['username']; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly name="email" class="medium" value="<?php echo $result['email']; ?>" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" readonly name="details"><?php echo $result['details']; ?></textarea>
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

                <?php } } ?>

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