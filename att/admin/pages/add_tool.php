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
                                    <h4><i class="fa fa-cogs fa-fw" style="padding-right: 30px"></i> ADD A NEW TOOL</h4>
                                </div>
                                <div class="col-xs-6" style="text-align:right;">
                                    <h5>(<span style="color:red;">*</span>) marked fields are mandatory</h5>
                                </div>
                            </div>
                            
                        </div>
                        <form method="post" action="">
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
                                    
                                    if(empty($role_list)) {
                                        echo "<script>alert('Uh-oh! you forgot to select Role.')</script>";
                                    } else {
                                      
                                        if(empty($service_list)){
                                            echo "<script>alert('Uh-oh! you forgot to select Service.')</script>";
                                        } else {
                                            // form the query string
                                            $query_string = "INSERT INTO tools(tool_name, tool_link, associated_to, service, description, request_link, help_link, timestamp, last_modifier) VALUES('{$tool_name}', '{$tool_link}', '{$role_list}', '{$service_list}', '{$description}', '{$request_link}', '{$help_link}', '{$timestamp}', '{$full_name}')";
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
                            
                        <div class="panel-body">
                             <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="toolName">Tool Name<span style="color:red;">*</span></label>
                                        <input type="text"required class="form-control" name="toolName">
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="toolLink">Tool Link<span style="color:red;">*</span></label>
                                        <input type="text"required class="form-control" name="toolLink">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="toolDescription">Description</label>
                                        <textarea class="form-control" name="toolDescArea" rows="2"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="role">Associated to<span style="color:red;">*</span></label><br>
                                        <?php 
                                            $query_string = "SELECT * FROM roles";
                                            $result = mysqli_query($conn, $query_string);

                                      
                                            while( $row = mysqli_fetch_assoc($result)){
                                                $role = $row['role'];
                                                echo "<label class='checkbox-inline'><input type='checkbox' name='role_list[]' required value='{$role}'>{$role}</label>";
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
                                                echo "<label class='checkbox-inline'><input type='checkbox' name='service_list[]' required value='{$service}'>{$service}</label>";
                                            }                                        
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="requestlink">Request Link<span style="color:red;">*</span></label>
                                        <input type="text"required class="form-control" name="reqLink">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="helplink">Helplink</label>
                                        <input type="text" class="form-control" name="helpLink">
                                    </div>    
                                    
                                    <div class="form-group col-md-6">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <input type="text" class="form-control">
                                    </div>
                                 
                                </div>
                        
                        </div>
                        <div class="panel-footer" style="text-align: right;">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-success" name="submit">Add Tool</button>
                        
                        </div>
                        </form>
                    </div>
                </div>            
            </div>
        </div>     

        <?php include "../includes/admin_footer.php";?>
      <script>
        
        
        $(function(){

            var requiredCheckboxes = $(':checkbox[required]');

            requiredCheckboxes.change(function(){

                if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                }

                else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });

        });
      
      </script>
        
    </body>
</html>
