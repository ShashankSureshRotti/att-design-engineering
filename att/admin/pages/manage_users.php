<!DOCTYPE html>
<html lang="en">

    <head>
      <?php include "../includes/admin_header.php";?>
    </head>
    
    <body>
        
	    <!-- Navigation Panel -->
        <?php include "../includes/admin_navigation.php";?>
        <!-- End of Nav-Panel -->
        
        <div id="wrapper">
            
            <!-- Side navigation -->
            <div class="sidenav">
                <div class="user-block">
                    <!-- Profile picture -->
                    <img src="../dist/img/nobody.jpg" class="user">
                    <!-- Name -->
                    <h3><?php echo $first_name." ".$last_name; ?></h3>
                    <!-- Designation -->
                    <h5>Administrator</h5>
                    <!-- Status Message -->
                    <h6>I can modify anything!</h6>
                    <hr>
                </div>
                 

                <div style="padding-top: 20px;">
                    <a href="../pages/dashboard.php"><i class="fa fa-tachometer fa-fw" style="font-size: 20px"></i> DASHBOARD</a>
                    <a href="../pages/manage_users.php" id="active-menu"><i class="fa fa-users fa-fw" style="font-size: 20px"></i> MANAGE USERS</a>
                    <a href="../pages/manage_tools.php"><i class="fa fa-cogs fa-fw" style="font-size: 20px"></i> MANAGE TOOLS</a>
                </div>

                <div class="sidenav-color-block">
                    <div style="margin-bottom: 120px; text-align: center" id="btnHolder">
                        <button type="button" class="btn-switch" onclick="location.href='../../pages/home.php';">HOME</button>
                    </div>
                   
                    <div style="margin-bottom: 80px; text-align: center">
                        <button type="button" class="btn-custom-left"><i class="fa fa-cog fa-fw"></i> SETTING</button>
                        <button type="button" class="btn-custom-right" onclick="location.href='../../logout.php';"><i class="fa fa-sign-out fa-fw"></i> SIGNOUT</button>
                    </div>
                    <img src="../dist/img/AT&T_logo_white.svg" style="height: 24px">             


                    <div style="text-align: center;">
                        <a href="#">TERMS</a><h5>|</h5>
                        <a href="#">PRIVACY</a><h5>|</h5>
                        <a href="#">HELP</a><h5>|</h5>
                        <a href="#">ABOUT</a>
                    </div>
                </div>

            </div>

            <!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the user?</p>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-danger modal_delete_link">Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
            
          
          
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                                           
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h4><i class="fa fa-users fa-fw" style="padding-right: 30px"></i> MANAGE USERS</h4>
                                </div>
                                <div class="col-xs-4">
                                  
                            
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-4">
                              <form class="form-inline">
                                 <label>Filter By:</label>
                                  <select class="form-control" id="accessSelect">
                                    <option value="">Access Type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Regular">Regular</option>      
                                  </select>    
                                  <select class="form-control" id="statusSelect">
                                    <option value="">Active Status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Pending">Pending</option>
                                  </select>  
                              </form>
                              
                            </div>
                            <div class="col-md-8">
                              <form class="form-inline pull-right">
                              <input class="form-control" type="text" id="searchUser" placeholder="Search...">
                              </form>          
                            </div>         
                            </div>
                            <hr>
                            <table id="manageUsersTable" class="table table-striped table-hover" cellspacing="0" width="100%">    
                                <thead>
                                    <tr>
                                        <th>ATT UID</th>
                                        <th>Full Name</th>
                                        <th style='text-align: center;'>Role</th>
                                        <th style='text-align: center;'>Approval Status</th>
                                        <th style='text-align: center;'>Approved By</th>
                                        <th style='text-align: center;'>Approved On</th>
                                        <th style='text-align: center;'>Access Type</th>
                                        <th style='text-align: center;'>Actions</th>
                                    </tr>
                                </thead>                                 

                                <tbody>

                                    <?php 
                                        $query_string = "SELECT * FROM users ORDER BY approved_on DESC";
                                        $result = mysqli_query($conn, $query_string);

                                        while( $row = mysqli_fetch_assoc($result)){
                                            $att_uid = $row['att_uid'];
                                            $first_name = $row['first_name'];
                                            $last_name = $row['last_name'];
                                            $role = $row['role'];
                                            $access_type = $row['access_type'];
                                            $active_status = $row['active_status'];
                                            $approved_by = $row['approved_by'];
                                            $approved_on = $row['approved_on'];

                                            //Full name
                                            $full_name = $first_name." ".$last_name;
                                            if($active_status) {
                                              $status = "Approved";
                                            } else {
                                              $status = "Pending";
                                            }


                                            echo "<tr>";
                                                echo "<td><a href='' target='_blank'><b>{$att_uid}<b></a></td>";
                                                echo "<td><b>{$full_name}<b></td>";
                                                echo "<td></td>";

                                                if($active_status){
                                                  echo "<td style='text-align: center;' class='text-success'>$status</td>";
                                                } else {
                                                  echo "<td style='text-align: center;' class='text-danger'>$status</td>";
                                                }                                                  
                                                echo "<td style='text-align: center;'>$approved_by</td>";
                                                echo "<td style='text-align: center;'>$approved_on</td>";
                                                echo "<td style='text-align: center;'>$access_type</td>";

                                                if(!$active_status){
                                                  echo "<td style='text-align: center;'><a href='manage_users.php?approve={$att_uid}' title='Approve'><img src='../dist/img/yes.svg' style='width: 24px'></a>
                                                    <a rel='{$att_uid}' href='javascript:void()' class='delete_link' title='Delete'><img src='../dist/img/no.svg' style='width: 24px'></a>
                                                  </td>";
                                                } else {
                                                  if($_SESSION['att_uid'] == $att_uid) {
                                                    echo "<td style='text-align: center;'><a href='manage_users.php?view={$att_uid}' title='View'><img src='../dist/img/view.svg' style='width: 24px'></a> 
                                                      <a href='manage_users.php?edit={$att_uid}' title='Edit'><img src='../dist/img/edit.svg' style='width: 24px'></a>              
                                                    </td>";

                                                  } else {
                                                    echo "<td style='text-align: center;'><a href='manage_users.php?view={$att_uid}' title='View'><img src='../dist/img/view.svg' style='width: 24px'></a> 
                                                      <a type='button' title='Edit' href='manage_users.php?edit={$att_uid}'><img src='../dist/img/edit.svg' style='width: 24px'></a> 
                                                      <a rel='{$att_uid}' href='javascript:void()' class='delete_link' title='Delete'><img src='../dist/img/no.svg' style='width: 24px'></a>               
                                                    </td>";
                                                }
                                              } 

                                            echo "</tr>";

                                        }                                     
                                    ?>

                                </tbody>
                            </table>
                            <?php

                                if(isset($_GET['approve'])){

                                    $att_uid = $_GET['approve'];
                                    date_default_timezone_set("Asia/Kolkata");
                                    $timestamp = date("Y-m-d H:i:s", time());
                                    $user_name = $_SESSION['first_name']." ".$_SESSION['last_name'];;

                                    $query = "UPDATE users SET active_status = 1, approved_by ='{$user_name}', approved_on = '{$timestamp}' WHERE att_uid = '{$att_uid}'";



                                    if(mysqli_query($conn, $query)){
                                        header("Location: manage_users.php");
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    } 
                                }

                                if(isset($_GET['delete'])){

                                    $att_uid = $_GET['delete'];
                                    $query = "DELETE FROM users WHERE att_uid = '{$att_uid}'";
                                  echo $query;

                                    if(mysqli_query($conn, $query)){
                                        header("Location: manage_users.php");
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    } 
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php include "../includes/admin_footer.php";?>
        <script>
          $(document).ready(function(){
            
            $(".delete_link").on('click', function(){
              var id = $(this).attr("rel");
              var delete_url = "manage_users.php?delete=" + id +"";
              
              $(".modal_delete_link").attr("href", delete_url);
              $("#deleteModal").modal('show');
              
            });
             
            
          }); 
        </script>
    </body>
</html>