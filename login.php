<?php require_once "php/controller.php"; ?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <style>
            /* Loading Spinner */
            .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
        </style>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>Hospital Management System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="shortcut icon" href="img/logo.png">
        <link rel="stylesheet" type="text/css" href="assets/assets-minified/admin-all-demo.css"> 
        <script type="text/javascript" src="assets/assets-minified/js-core.js"></script>   
        <script type="text/javascript">
            $(window).load(function(){
            setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
            }, 300);
            });
        </script> 
        <style type="text/css"> 
        html,body {
            height: 100%;
            background: #fff;
            overflow: hidden;
        } 
        </style> 
    </head>
<body>
<body>
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div> 
<script type="text/javascript" src="assets/assets/widgets/wow/wow.js"></script>
<script type="text/javascript"> 
    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>  
<img src="img/bg.jpg" class="login-img wow fadeIn" alt=""> 
<div class="center-vertical">
    <div class="center-content row"> 
        <div class="col-md-3 center-margin">

            <form method="post">
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-hospital-o"></i>
                        </span>
                        <span class="header-wrapper">
                            Hospital Management System
                            <small>Admin Login</small>
                        </span> 
                    </h3>
                    <div class="content-box-wrapper">
                        <center><span class="bs-label label-danger"><?php echo @has($error); ?></span></center>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="user" placeholder="Username">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                </span>
                            </div>
                        </div>  
                        <input type="submit" class="btn btn-success btn-block" name="login" value="Log in"> 
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>  
<script type="text/javascript" src="assets/assets/bootstrap/js/bootstrap.js"></script>  
</body>
</html>
