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
                                    <h4><i class="fa fa-user-plus fa-fw" style="padding-right: 30px"></i> ADD A NEW USER</h4>
                                </div>
                                <div class="col-xs-6" style="text-align:right;">
                                    <h5>(<span style="color:red;">*</span>) marked fields are mandatory</h5>
                                </div>
                            </div>
                            
                        </div>
                        <form method="post" action="">
                          
                            <?php 
                                if(isset($_POST['submit'])) {              
                                   
                                }                             
                            ?>
                            
                        <div class="panel-body">
                             <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="attUid">ATT UID<span style="color:red;">*</span></label>
                                      <input type="text"required class="form-control" name="attUID">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="firstName">First Name<span style="color:red;">*</span></label>
                                        <input type="text"required class="form-control" name="firstName">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="lastName">Last Name<span style="color:red;">*</span></label>
                                        <input type="text"required class="form-control" name="lastName">
                                    </div>
                               
                                    <div class="form-group col-md-9">
                                        <label for="email">Email</label>
                                        <input type="email"required class="form-control" name="email">
                                    </div>
                               
                                    <div class="form-group col-md-3">
                                        <label for="email">Mgr. ATT UID</label>
                                        <input type="text"required class="form-control" name="mgrUID">
                                    </div>
                                   
                                    <div class="form-group col-md-12">
                                        <label for="requestlink">Request Link<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="reqLink">
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
    </body>
</html>
