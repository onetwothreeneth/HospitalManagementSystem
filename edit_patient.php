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
                            <?php if(!empty($_GET['patient_id'])){ } else { echo '<script>document.location.href = "index.php?1"</script>'; } ?>
                            <br><img src="img/<?php echo get("img","$s patients $w patient_id='".$_GET['patient_id']."'"); ?>" width="100px"><br><br>
                            <form action="edit_patient.php?1&patient_id=<?php echo $_GET['patient_id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="img" placeholder="Patient Image">
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" value="<?php echo get("name","$s patients $w patient_id='".$_GET['patient_id']."'"); ?>" placeholder="Last name - First name - Middile initial" required>
                                    </div> 
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Birthday</label>
                                    <div class="col-sm-6">
                                        <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span>
                                            <input type="date" name="birthday" class="form-control" value="<?php echo get("birthday","$s patients $w patient_id='".$_GET['patient_id']."'"); ?>" required>
                                        </div>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="gender" required>
                                            <option value="<?php echo get("gender","$s patients $w patient_id='".$_GET['patient_id']."'"); ?>"><?php echo get("gender","$s patients $w patient_id='".$_GET['patient_id']."'"); ?></option>
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option> 
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-6">
                                        <textarea type="text" rows="5" class="form-control" name="address" placeholder="Home Address" required><?php echo get("address","$s patients $w patient_id='".$_GET['patient_id']."'"); ?></textarea>                                            
                                    </div> 
                                </div>  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" value="<?php echo $_GET['patient_id']; ?>" name="patient_id">
                                        <input type="number" class="form-control" name="phone" placeholder="Contact Number" value="<?php echo get("phone","$s patients $w patient_id='".$_GET['patient_id']."'"); ?>" required>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="edit_patient">
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
