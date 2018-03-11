<!DOCTYPE html>
<html lang="en">
 
    <head>
        <?php include "../includes/header.php"; ?> 
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales', 'Expenses', 'Profit'],
              ['2014', 1000, 400, 200],
              ['2015', 1170, 460, 250],
              ['2016', 660, 1120, 300],
              ['2017', 1030, 540, 350]
            ]);

            var options = {
              chart: {
                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
              },
              bars: 'vertical',
              vAxis: {format: 'decimal'},
              height: 400,
              colors: ['#1b9e77', '#d95f02', '#7570b3']
            };

            var chart = new google.charts.Bar(document.getElementById('chart_space'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
      </script>
    </head>
    
    <body>
        
        <!-- Navigation Panel -->
        <?php include "../includes/navbar.php"; ?> 
        
      <!-- Add to Favorites Modal -->
      <div class="modal fade" id="favToolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <form method="post" action="">
            <?php 

              if(isset($_POST['saveFav'])) { 
                // Delete existing content
                $query = "DELETE FROM favourites WHERE att_uid = '{$_SESSION['att_uid']}'";
                mysqli_query($conn, $query);
                  
                  
                if(!empty($_POST['fav_list'])){
                  // Loop to store and display values of individual checked checkbox.
                  foreach($_POST['fav_list'] as $selected){
                    //insert this tool_id to the favorites table
                    $ins_fav_query = "INSERT INTO favourites (att_uid, tool_id)
                                      SELECT '{$_SESSION['att_uid']}', {$selected}
                                      FROM tools
                                      WHERE EXISTS (
                                              SELECT tool_id
                                              FROM tools
                                              WHERE tool_id = {$selected})
                                          AND NOT EXISTS (
                                              SELECT tool_id
                                              FROM favourites
                                              WHERE att_uid = '{$_SESSION['att_uid']}'
                                              AND tool_id = {$selected})
                                      LIMIT 1";

                    if (!mysqli_query($conn, $ins_fav_query)) {
                        echo "Error: " . $ins_fav_query . "<br>" . mysqli_error($conn);
                    }
                  }
                }
              } 

            ?>
              <div class="modal-content">
                  <div class="modal-header">
                    <h3><span style="color: red; font-size: 30px"><i class="fa fa-heart"></i></span> Add Tools to Quick Access List</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                
                  <div class="modal-body">
                    
                          <div class="row" style="padding: 0px 20px 0px 20px">
                            <div class="col-md-8 form-inline">
                                 <label>Filter By:</label>
                                  <select class="form-control" id="filterByService">
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
                              
                            </div>
                            <div class="col-md-4">
                              <input class="form-control" type="text" id="cc" placeholder="Search...">
                            </div>         
                          </div>
                    
                    <table width="100%" class="table table-hover table-condensed" id="selectFavTable" style="margin-top: 15px">
                      <tbody>
                      <?php 
                        
                          $query_string = "SELECT * FROM tools";
                          $result = mysqli_query($conn, $query_string);

                          while( $row = mysqli_fetch_assoc($result)){
                              $tool_id = $row['tool_id'];
                              $tool_name = $row['tool_name'];
                              $service = $row['service'];
                              $description = $row['description'];
                              $checked = "";
                            
                              // Let's check whether the tool is added to the user favorites already
                              $test_query = "SELECT * FROM favourites 
                                            WHERE att_uid = '{$_SESSION['att_uid']}'
                                            AND tool_id = {$tool_id}";
                              $new_res = mysqli_query($conn, $test_query);
                              $isFavorite = mysqli_num_rows($new_res);
                              if($isFavorite) {
                                $checked = 'checked="checked"';
                              }

                      ?>
                        <tr>
                          <td><b><?php echo $tool_name; ?></b></td>
                          <td style="font-size: 12px;"><em><?php echo $service; ?></em></td>
                          <td style="font-size: 12px;"><?php echo $description; ?></td>
                          <td style='text-align: center;'>
                            <input type='checkbox' name='fav_list[]' value='<?php echo $tool_id; ?>' <?php echo $checked; ?> />
                          </td>
                        </tr>
                        
                        
                       <?php } ?> 
                      </tbody>
                    </table>
                    
                    
                     
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="saveFav" class="btn btn-primary">Save changes</button>
                  </div>
                
              </div>
                </form>
          </div>
      </div>
	 
        
        <div id="wrapper">
            
            <!-- Side navigation -->
            <div class="sidenav">
                <div class="user-block">
                    <!-- Profile picture -->
                  <img src="../dist/img/nobody.jpg" class="user">
                    <!-- Name -->
                    <h3><?php echo $first_name." ".$last_name; ?></h3>
                    <!-- Designation -->
                    <h5>Technical Intern</h5>
                    <!-- Status Message -->
                    <h6>This is a status message!</h6>
                    <hr>
                </div>

<!--
                <form class="search-form" action="#" style="margin:auto;padding: 8px;max-width:100%">
                    <input type="text" placeholder="Search..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>                     
-->

                <div >
                    <a href="../pages/home.php"><i class="fa fa-home fa-fw" style="font-size: 24px"></i> HOME</a><hr>
                    <a href="#"><i class="fa fa-tachometer fa-fw" style="font-size: 24px"></i> DASHBOARD</a><hr>
                    <a href="../pages/tools.php"><i class="fa fa-cogs fa-fw" style="font-size: 24px"></i> TOOLS</a><hr>
                    <a href="#"><i class="fa fa-graduation-cap fa-fw" style="font-size: 24px"></i> TRAININGS</a><hr>
                </div>
              
                <div class="sidenav-color-block">
                    <div style='margin-bottom: 120px; text-align: center' id='btnHolder'>
                        <button type='button' class='btn-switch' onclick="location.href='../admin/pages/dashboard.php';">ADMIN</button>
                    </div>
                  
                    <div style="margin-bottom: 80px; text-align: center">
                        <button type="button" class="btn-custom-left"><i class="fa fa-cog fa-fw"></i> SETTING</button>
                        <button type="button" class="btn-custom-right" onclick="location.href='../logout.php';"><i class="fa fa-sign-out fa-fw"></i> SIGNOUT</button>
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

            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-md-9">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h5><i class="fa fa-bar-chart"></i> Company Performance</h5>                            
                            </div>
                            <div class="panel-body" id="chart_space"></div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <!-- Notification Div, Visible only to Admins -->
                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h5><i class="fa fa-bell"></i> Notifications</h5>
                                </div>
                                <div class="panel-body" id="notificationPanel">
                                    <?php
                                      
                                      $query = "SELECT * FROM users WHERE active_status = 0";
                                      
                                      $fav_result = mysqli_query($conn, $query);
                                      $num_rows = mysqli_num_rows($fav_result);
                                      if(!$num_rows){ ?>
                                        
                                          <div id="no_notification" style='text-align: center'>
                                          <h3>No new Notifications!</h3>
                                          <h6>When a new <em>Message</em> or <em>Approval Request</em> posted, It appears here.</h6> 
                                          </div>
                                        
                                    <?php  } else { ?>
                                              
                                        <div class="row border-between">
                                          <div class="col-sm-6">
                                            <a href="../admin/pages/manage_users.php">Approvals</a>
                                            <h5><span style='color: coral; font-size:30px'><?php echo $num_rows; ?></span> pending</h5>
                                          </div>
                                          <div class="col-sm-6">
                                            <a href="#">Messages</a>
                                            <h5><span style='color: coral; font-size:30px'>0</span> unread</h5>
                                          </div>
                                        </div>

                                     <?php } ?>
                                                                   
                                </div>
                            </div>
                            <!-- Quick access Panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h5><i class="fa fa-heart"></i> Quick Access List</h5>
                                  <a href="#" data-toggle="modal" data-target="#favToolModal" class="pull-right"><i class="fa fa-edit fa-fw"></i>Edit</a>
                                </div>
                                <div class="panel-body" id="favPanel">
                                    <?php
                                      
                                      $query = "SELECT tools.tool_name, tools.tool_link, tools.service FROM favourites INNER JOIN tools ON favourites.tool_id=tools.tool_id WHERE favourites.att_uid='{$att_uid}'";
                                      
                                      $fav_result = mysqli_query($conn, $query);
                                      $num_rows = mysqli_num_rows($fav_result);
                                      if(!$num_rows){
                                        echo "<div style='text-align: center'>";
                                        echo "<h3>No tool is marked as Favourite!</h3>
                                        <h6>To make a tool appear here, please click on the <u>edit</u> button.</h6>";                                         
                                        echo "</div>";
                                      } else {
                                          while( $row = mysqli_fetch_assoc($fav_result)){
                                            $tool_name = $row['tool_name'];
                                            $tool_link = $row['tool_link'];
                                            $tool_service = $row['service'];

                                            echo "<div>";
                                            echo "<a href='{$tool_link}' target='_blank'>{$tool_name}</a>";
                                            echo "<h4>{$tool_service}</h4>";
                                            echo "</div>";
                                            echo "<hr>";

                                          }
                                      }
                                    ?>                               
                                </div>
                                <div class="panel-footer">
                                  <a class="btn btn-info" style="width: 100%" href="tools.php" title='View all Tools'>View All Tools</a>
                                </div>
                            </div>
                        </div> 
                    </div>            
                </div>
            </div>
            
        </div>
      
      
      <?php include "../includes/footer.php"; ?>
      
    </body>
</html>