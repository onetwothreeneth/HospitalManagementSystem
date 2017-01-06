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
                            <form action="new_services.php?6" method="post" class="form-horizontal" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Service Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Service Name" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="price" placeholder="Service price per use/consume" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="category" required>
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
                                        <textarea type="text" rows="5" class="form-control" name="description" placeholder="Description" required></textarea>                                            
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="add_services">
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
