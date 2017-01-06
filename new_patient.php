<?php 
    require_once 'bones/a_assets.php';
    require_once 'bones/a_header.php';  
?>
    <div id="page-content-wrapper">
        <div id="page-content">
            <div class="container">  
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-box dashboard-box-chart bg-white content-box"> 
                            <br><img src="img/default.jpg"><br><br>
                            <form action="new_patient.php?2" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="img" placeholder="Patient Image" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Last name - First name - Middile initial" required>
                                    </div> 
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Birthday</label>
                                    <div class="col-sm-6">
                                        <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span>
                                            <input type="date" name="birthday" class="form-control" required>
                                        </div>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="gender" required>
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option> 
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-6">
                                        <textarea type="text" rows="5" class="form-control" name="address" placeholder="Home Address" required></textarea>                                            
                                    </div> 
                                </div>  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="phone" placeholder="Contact Number" required>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="add_patient">
                                        <span>Save Patient Info</span>
                                        <i class="glyph-icon icon-arrow-right"></i>
                                    </button>  
                                </div>  
                            </form>  
                        <div>
                    </div>
                </div>
            </div> 
        </div>
    </div>    
<?php require_once "bones/a_footer.php"; ?>
