<!DOCTYPE html>
<html lang="en">

    <head>        
        <?php include "../includes/admin_header.php";?>        
    </head>
    
    <body>
        
        <!--	Include the Navigation   -->
        <?php include "../includes/admin_navigation.php";?>
        
        <div id="wrapper">
            
            <!--     Include the Side-Nav Panel      -->
            <?php include "../includes/admin_sidenav.php"?>
            
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4><i class="fa fa-edit fa-fw" style="padding-right: 30px"></i> EDIT TOOL</h4>
                                </div>
                                <div class="col-xs-6" style="text-align:right;">
                                    <h5>(<span style="color:red;">*</span>) marked fields are mandatory</h5>
                                </div>
                            </div>
                            
                        </div>
                        <form method="post" action="">
                            <?php 
                                if(isset($_GET['edit'])){
                                        
                                        $tool_id = $_GET['edit'];
                                        $query = "SELECT * FROM tools WHERE tool_id = {$tool_id}";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_assoc($result);
                                    
                                        $tool_name = $row['tool_name'];
                                        $tool_link = $row['tool_link'];
                                        $service = $row['service'];
                                        $role = $row['associated_to'];
                                        $description = $row['description'];
                                        $request_link = $row['request_link'];
                                        $help_link = $row['help_link'];
                                }
                            ?>                         
                            
                        <div class="panel-body">
                             <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="toolName">Tool Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="toolName" value="<?php echo $tool_name; ?>">
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="toolLink">Tool Link<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="toolLink" value="<?php echo $tool_link; ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="toolDescription">Description</label>
                                        <textarea class="form-control" name="toolDescArea" rows="2"><?php echo $description; ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="role">Associated to<span style="color:red;">*</span></label><br>
                                        <?php 
                                            $query_string = "SELECT * FROM roles";
                                            $result = mysqli_query($conn, $query_string);

                                            while( $row = mysqli_fetch_assoc($result)){
                                                $role = $row['role'];
                                                echo "<label class='checkbox-inline'><input type='checkbox' name='role_list[]' value='{$role}'>{$role}</label>";
                                            }                                        
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="service">Service(s)<span style="color:red;">*</span></label><br>
                                        <?php 
                                            $query_string = "SELECT * FROM services";
                                            $result = mysqli_query($conn, $query_string);

                                            while( $row = mysqli_fetch_assoc($result)){
                                                $service = $row['service'];
                                                echo "<label class='checkbox-inline'><input type='checkbox' name='service_list[]' value='{$service}'>{$service}</label>";
                                            }                                        
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="requestlink">Request Link<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="reqLink" value="<?php echo $request_link; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="helplink">Helplink</label>
                                        <input type="text" class="form-control" name="helpLink" value="<?php echo $help_link; ?>">
                                    </div>    
                                    
                                    <div class="form-group col-md-6">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <input type="text" class="form-control">
                                    </div>
                                 
                                </div>
                        
                        </div>
                        <div class="panel-footer" style="text-align: right;">
                            <button type="button" class="btn btn-danger" onclick="location.href='../pages/manage_tools.php';">Cancel</button>
                            <button type="submit" class="btn btn-success" name="submit">Update</button>
                        
                        </div>
                            <?php 
                                if(isset($_POST['submit'])) { 
                                    
                                    $role_list = $service_list = $query_string ="";
                                    if(!empty($_POST['role_list'])) {
                                        $role_list = implode(', ', $_POST['role_list']);
                                        
                                    }

                                    if(!empty($_POST['service_list'])) {
                                        $service_list = implode(', ', $_POST['service_list']);
                                    }
                                    date_default_timezone_set("Asia/Kolkata");
                                    $tool_name = $_POST['toolName'];
                                    $tool_link = $_POST['toolLink'];
                                    $description = $_POST['toolDescArea'];
                                    $request_link = $_POST['reqLink'];
                                    $help_link = $_POST['helpLink']; 
                                    $timestamp = date("Y-m-d H:i:s", time());
                                    if(empty($tool_name))  {                                        
                                        echo "<script>alert('Uh-oh! you missed Tool Name.')</script>";
                                    } else {
                                        if(empty($tool_link)) {
                                            echo "<script>alert('Uh-oh! you missed Tool Link.')</script>";
                                        } else {
                                            if(empty($role_list)) {
                                                echo "<script>alert('Uh-oh! you forgot to select Role.')</script>";
                                            } else {
                                                if(empty($service_list)){
                                                    echo "<script>alert('Uh-oh! you forgot to select Service.')</script>";
                                                } else {
                                                    
                                                    // form the query string
                                                    $query_string = "UPDATE tools SET tool_name = '{$tool_name}', tool_link = '{$tool_link}', associated_to = '{$role_list}', service = '{$service_list}', description = '{$description}', request_link = '{$request_link}', timestamp = '{$timestamp}', last_modifier = '{$full_name}' WHERE tool_id = {$tool_id}";
                                                }
                                                
                                            }
                                        }                                         
                                    }
                                    
                                    if(!empty($query_string)){
                                        //execute the query
                                        if(mysqli_query($conn, $query_string)) { 
                                            header("Location: manage_tools.php");
                                        } else {
                                            $err = "Error: ".mysqli_error($conn)."";                                            
                                            echo '<script>alert("'.$err.'");</script>';
                                        }
                                    }
                                }                             
                            ?>
                        </form>
                    </div>
                </div>            
            </div>
        </div>     

        <?php include "../includes/admin_footer.php";?>
    </body>
</html>