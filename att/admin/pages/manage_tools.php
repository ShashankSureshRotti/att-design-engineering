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
          
          <!-- Modal -->
<div id="deleteToolModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Tool</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the Tool?</p>
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
                                    <h4><i class="fa fa-cogs fa-fw" style="padding-right: 30px"></i> MANAGE TOOLS</h4>
                                </div>
                                <div class="col-xs-4">
                            
                                    <!--  Add New Tool button -->
                                  <a type="button" class="pull-right" id="addNewBtn" href="add_tool.php" title="Add a new Tool"><i class="fa fa-plus-circle"></i> Add Tool</a>
                            
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-4">
                              <form class="form-inline">
                                 <label>Filter By:</label>
                                  <select class="form-control" id="serviceSelect">
                                    <option value="">Select Service</option>
                                    <?php
                                        $service_query = "SELECT * FROM services";
                                        $service_result = mysqli_query($conn, $service_query);
                                        while( $row = mysqli_fetch_assoc($service_result)){
                                            $current_service = $row['service'];
                                            echo "<option value='{$current_service}'>{$current_service}</option>";            
                                        }                        
                                     ?>
                                  </select>    
                                  <select class="form-control" id="roleSelect">
                                    <option value="">Select Role</option>
                                    <?php
                                        $role_query = "SELECT * FROM roles";
                                        $role_result = mysqli_query($conn, $role_query);
                                        while( $row = mysqli_fetch_assoc($role_result)){
                                            $current_role = $row['role'];
                                            echo "<option value='{$current_role}'>{$current_role}</option>";            
                                        }                        
                                     ?>
                                  </select>  
                              </form>
                              
                            </div>
                            <div class="col-md-8">
                              <form class="form-inline pull-right">
                              <input class="form-control" type="text" id="searchTool" placeholder="Search...">
                              </form>          
                            </div>         
                            </div>
                            <hr>
                            
                                <table id="manageToolsTable" class="table table-striped table-hover" cellspacing="0" width="100%">    
                                    <thead>
                                        <tr>
                                            <th>Tool</th>
                                            <th>Service</th>
                                            <th>Role</th>
                                            <th>Last Modified</th>
                                            <th>Last Modifier</th>
                                            <th style='text-align: center;'>Actions</th>
                                        </tr>
                                    </thead>                                 
                                    
                                    <tbody>
                                        
                                        <?php 
                                            $query_string = "SELECT * FROM tools";
                                            $result = mysqli_query($conn, $query_string);

                                            while( $row = mysqli_fetch_assoc($result)){
                                                $tool_id = $row['tool_id'];
                                                $tool_name = $row['tool_name'];
                                                $tool_link = $row['tool_link'];
                                                $service = $row['service'];
                                                $role = $row['associated_to'];
                                                $description = $row['description'];
                                                $request_link = $row['request_link'];
                                                $timestamp = $row['timestamp'];
                                                $modifier = $row['last_modifier'];
                                                
                                                echo "<tr>";
                                                    echo "<td><a href='{$tool_link}' target='_blank'><b>{$tool_name}<b></a></td>";
                                                    echo "<td>{$service}</td>";
                                                    echo "<td>{$role}</td>";
                                                    echo "<td>{$timestamp}</td>";
                                                    echo "<td>{$modifier}</td>";
                                                    echo "<td style='text-align: center;'>
                                                    <a href='view_tool.php?view={$tool_id}' title='View'><img src='../dist/img/view.svg' style='width: 24px'></a> 
                                                    <a href='edit_tool.php?edit={$tool_id}' title='Edit'><img src='../dist/img/edit.svg' style='width: 24px'></a> 
                                                    <a rel='{$tool_id}' href='javascriipt:void()' class='delete_tool_link' title='Delete'><img src='../dist/img/no.svg' style='width: 24px'></a></td>";
                                                echo "</tr>";

                                            }                                     
                                        ?>
                                        
                                    </tbody>
                                </table>
                                <?php 
                                
                                    if(isset($_GET['delete'])){
                                        
                                        $tool_id = $_GET['delete'];
                                        $query = "DELETE FROM tools WHERE tool_id = {$tool_id}";
                                        
                                        if(mysqli_query($conn, $query)){
                                            header("Location: manage_tools.php");
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
            
            $(".delete_tool_link").on('click', function(){
              var id = $(this).attr("rel");
              var delete_url = "manage_tools.php?delete=" + id +"";
              
              $(".modal_delete_link").attr("href", delete_url);
              $("#deleteToolModal").modal('show');
              
            });
             
            
          }); 
        </script>
      
    </body>
</html>