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
                            <br><br><br>
                            <?php if(!empty($_GET['services_id'])){ } else { echo '<script>document.location.href = "services.php?5"</script>'; } ?>
                            <form action="edit_services.php?5&services_id=<?php echo $services_id = $_GET['services_id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Service Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Service Name" value="<?php echo get("name","$s services $w services_id='".$_GET['services_id']."'"); ?>" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="price" placeholder="Service price per use/consume" value="<?php echo get("price","$s services $w services_id='".$_GET['services_id']."'"); ?>"  required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="category" required>
                                            <option value="<?php echo get("category","$s services $w services_id='".$_GET['services_id']."'"); ?>"><?php echo get("category","$s services $w services_id='".$_GET['services_id']."'"); ?></option>
                                            <option value="Services">Services</option> 
                                            <option value="Laboratory">Laboratory</option> 
                                            <option value="Pharmacy">Pharmacy</option> 
                                            <option value="Utilities">Utilities</option> 
                                            <option value="Doctors Fee">Doctors Fee</option> 
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="services_id" value="<?php echo get("services_id","$s services $w services_id='".$_GET['services_id']."'"); ?>">
                                        <textarea type="text" rows="5" class="form-control" name="description" placeholder="Description"  required><?php echo get("description","$s services $w services_id='".$_GET['services_id']."'"); ?></textarea>                                            
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="update_services">
                                        <span>Update</span>
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
