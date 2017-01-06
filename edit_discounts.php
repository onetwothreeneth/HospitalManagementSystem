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
                            <?php if(!empty($_GET['discounts_id'])){ } else { echo '<script>document.location.href = "services.php?5"</script>'; } ?>
                            <form action="edit_discounts.php?12&discounts_id=<?php echo $discounts_id = $_GET['discounts_id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Service Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Discount Name" value="<?php echo get("name","$s discounts $w discount_id='".$_GET['discounts_id']."'"); ?>" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id" value="<?php echo $discounts_id = $_GET['discounts_id']; ?>">
                                        <input type="number" class="form-control" name="discount" placeholder="discount percent" value="<?php echo get("discount","$s discounts $w discount_id='".$_GET['discounts_id']."'"); ?>"  required>
                                    </div> 
                                    <div class="col-sm-1" style="text-align:left;">
                                        %
                                    </div> 
                                </div>    
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="update_discount">
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
