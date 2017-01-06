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
                            <br><img src="img/<?php echo get("img","$s users $w user_id='".$_SESSION['id']."'"); ?>" width="10%"><br><br>
                            <form action="account_settings.php?9" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="img" placeholder="User Image">
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" value="<?php echo get("name","$s users $w user_id='".$_SESSION['id']."'"); ?>" placeholder="Last name - First name - Middile initial" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="user" value="<?php echo get("user","$s users $w user_id='".$_SESSION['id']."'"); ?>" placeholder="Username" required>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="pass" value="<?php echo get("pass","$s users $w user_id='".$_SESSION['id']."'"); ?>" placeholder="Password" required>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="update_account">
                                        <span>Save account settings</span>
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
