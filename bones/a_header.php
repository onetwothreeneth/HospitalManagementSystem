<body class="fixed-sidebar fixed-header"> 
    <div id="loading">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div id="page-wrapper">
        <div id="page-header" class="bg-gradient-6 font-inverse print">
    <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        <a href="/" class="logo-content-small"></a>
    </div>
    <div id="header-logo" class="logo-bg "> 
        <br><h4>Hospital Management System</h4>
    </div>
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown"> 
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img"> 
                            <img src="img/<?php echo get("img","$s users $w user_id='".$_SESSION['id']."'"); ?>" alt="">
                        </div>
                        <div class="user-info">
                            <span><br>
                                <?php echo get("name","$s users $w user_id='".$_SESSION['id']."'"); ?>
                                <i>
                                    <?php 
                                        if($_SESSION['role'] != '1'){
                                            echo "Staff";
                                        } else {
                                            echo "Admin";
                                        }
                                    ?>
                                </i>
                            </span> 
                        </div>
                    </div> 
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="php/test.php" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->
 

</div>
        <div id="page-sidebar" class="bg-gradient-6 font-inverse">
    <div class="scroll-sidebar" style="overflow-y:scroll;"> 
        <ul id="sidebar-menu" class="print">
            <li class="header"><span>Patients</span></li>
            <li class="<?php if(isset($_GET['1'])){ echo 'active'; } ?>">
                <a href="index.php?1" title="Admin Dashboard">
                    <i class="glyph-icon icon-child"></i>
                    <span>All Patients</span>
                </a>
            </li> 
            <li class="<?php if(isset($_GET['2'])){ echo 'active'; } ?>">
                <a href="new_patient.php?2"title="Admin Dashboard">
                    <i class="glyph-icon icon-location-arrow"></i>
                    <span>Add new Patient</span>
                </a>
            </li>  
            <li class="header"><span>Physicians</span></li>
            <li class="<?php if(isset($_GET['3'])){ echo 'active'; } ?>">
                <a href="physicians.php?3" title="Admin Dashboard">
                    <i class="glyph-icon icon-male"></i> 
                    <span>All Physicians</span>
                </a>
            </li> 
            <li class="<?php if(isset($_GET['4'])){ echo 'active'; } ?>">
                <a href="new_physician.php?4" title="Admin Dashboard">
                    <i class="glyph-icon icon-location-arrow"></i>
                    <span>Add new Physician</span>
                </a>
            </li>  
            <li class="header"><span>Services</span></li>
            <li class="<?php if(isset($_GET['5'])){ echo 'active'; } ?>">
                <a href="services.php?5" title="Admin Dashboard">
                    <i class="glyph-icon icon-star"></i>
                    <span>All Services</span>
                </a>
            </li>  
            <li class="<?php if(isset($_GET['6'])){ echo 'active'; } ?>">
                <a href="new_services.php?6" title="Admin Dashboard">
                    <i class="glyph-icon icon-location-arrow"></i>
                    <span>Add new Services</span>
                </a>
            </li>  
            <li class="header"><span>Discounts</span></li>
            <li class="<?php if(isset($_GET['12'])){ echo 'active'; } ?>">
                <a href="discount.php?12" title="Admin Dashboard">
                    <i class="glyph-icon icon-star"></i>
                    <span>All discounts</span>
                </a>
            </li>  
            <li class="<?php if(isset($_GET['13'])){ echo 'active'; } ?>">
                <a href="new_discount.php?13" title="Admin Dashboard">
                    <i class="glyph-icon icon-location-arrow"></i>
                    <span>Add new discount</span>
                </a>
            </li>  
            <li class="header"><span>Reports</span></li>
            <li class="<?php if(isset($_GET['7'])){ echo 'active'; } ?>">
                <a href="sales_report.php?7" title="Admin Dashboard">
                    <i class="glyph-icon icon-line-chart"></i>
                    <span>Sales Report</span>
                </a>
            </li> 
            <li class="<?php if(isset($_GET['8'])){ echo 'active'; } ?>">
                <a href="transaction_history.php?8" title="Admin Dashboard">
                    <i class="glyph-icon icon-bar-chart"></i>
                    <span>Transaction history</span>
                </a>
            </li> 
            <li class="header"><span>Account Settings</span></li>
            <li class="<?php if(isset($_GET['11'])){ echo 'active'; } ?>" style="display:<?php if($_SESSION['role'] != '1'){ echo 'none'; } ?>">
                <a href="accounts.php?11" title="Admin Dashboard">
                    <i class="glyph-icon icon-users"></i>
                    <span>Accounts</span>
                </a>
            </li> 
            <li class="<?php if(isset($_GET['10'])){ echo 'active'; } ?>" style="display:<?php if($_SESSION['role'] != '1'){ echo 'none'; } ?>">
                <a href="new_account.php?10" title="Admin Dashboard">
                    <i class="glyph-icon icon-plus"></i>
                    <span>Add new account</span>
                </a>
            </li> 
            <li class="<?php if(isset($_GET['9'])){ echo 'active'; } ?>">
                <a href="account_settings.php?9" title="Admin Dashboard">
                    <i class="glyph-icon icon-cog"></i>
                    <span>Account settings</span>
                </a>
            </li> 
        </ul><!-- #sidebar-menu --> 
    </div>
</div>
<?php   
    require_once 'php/controller.php'; 
    require_once 'php/models.php'; 
?>