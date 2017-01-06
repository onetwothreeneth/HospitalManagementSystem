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
                            <?php if(!empty($_GET['physician_id'])){ } else { echo '<script>document.location.href = "physicians.php?3"</script>'; } ?>
                            <br><img src="img/<?php echo get("img","$s physician $w physician_id='".$_GET['physician_id']."'"); ?>" width="100px"><br><br>
                            <form action="edit_physicians.php?3&physician_id=<?php echo $_GET['physician_id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="img" placeholder="Patient Image">
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" value="<?php echo get("name","$s physician $w physician_id='".$_GET['physician_id']."'"); ?>" placeholder="Last name - First name - Middile initial" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" value="<?php echo $_GET['physician_id']; ?>" name="physician_id">
                                        <input type="number" class="form-control" name="phone" value="<?php echo get("phone","$s physician $w physician_id='".$_GET['physician_id']."'"); ?>" placeholder="Contact Number" required>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="edit_physician">
                                        <span>Update Physician</span>
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
