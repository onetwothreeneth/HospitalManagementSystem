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
                            <form action="new_discount.php?13" method="post" class="form-horizontal" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Discount Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Discount Name" required>
                                    </div> 
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Percentage</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="discount" placeholder="Percent" required>
                                    </div> 
                                    <label class="col-sm-1 control-label" style="text-align:left;">%</label> 
                                </div>    
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="add_discounts">
                                        <span>Save</span>
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

