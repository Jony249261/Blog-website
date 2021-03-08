<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php'; ?>

 <?php 

                    if (Session::get('userRole') != '0') { 
                        echo "<script>window.location = 'index.php'</script>";
    }

?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
            <?php 

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $username = $fm->validation($_POST['username']);
                $password = $fm->validation($_POST['password']);
                $role     = $fm->validation($_POST['role']);
                $email     = $fm->validation($_POST['email']);


                $username = mysqli_real_escape_string($db->link, $username);
                $password = mysqli_real_escape_string($db->link, $password);
                $role = mysqli_real_escape_string($db->link, $role);
                $email = mysqli_real_escape_string($db->link, $email);

                if (empty($username) || empty($password) || empty($role) || empty($email)){
                    echo "<span class='error'>Field must not be empty !</span>";
                }else{
                    $mailquery = "SELECT * FROM tbl_user WHERE email='$email' limit 1";
                    $mailcheck = $db->select($mailquery);
                    if ($mailcheck != false) {
                        echo "<span class='error'>Email Already Exist!</span>";
                    } else{
                    $query = "INSERT INTO tbl_user(username, password, role,email) VALUES('$username', '$password','$role', '$email')";
                    $catinsert = $db->insert($query);
                    if ($catinsert) {
                        echo "<span class='success'>User Created Successfully !</span>";
                        
                    } else{
                        echo "<span class='error'>User Not Craated !</span>";
                    }
                }
                }
            }

            ?>


                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter User Password..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select User Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" name="email" placeholder="Enter Your Email..." class="medium" />
                            </td>
                        </tr>
						<tr>
                        <td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?> 