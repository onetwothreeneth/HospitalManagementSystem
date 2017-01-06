<?php 
    require_once 'bones/a_assets.php';
    require_once 'bones/a_header.php'; 
    if(!empty($_GET['patient_id'])){} else { echo '<script>document.location.href = "index.php?1"</script>'; } 
?>
<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-8">    
                    <div class="col-md-12"> 
                        <button data-toggle="modal" data-target="#newtransaction" style="float:right; margin-bottom:1%;" class="btn btn-success">New Transaction</button>
                    </div>
                    <?php 
                        $patient_id = $_GET['patient_id'];
                        $transactions = fetch("$s transactions where status='1' and patient_id='$patient_id' $o transaction_id $ds");
                        $counts = counts("$s transactions where status='1' and patient_id='$patient_id' $o transaction_id $ds");
                        $counts2 = counts("$s patients where status='1' and patient_id='$patient_id'");
                        if($counts2<='0'){ 
                            echo "<script>document.location.href = 'index.php?1';</script>";
                        }
                        if($counts<='0'){
                            echo "<center><h3>No Transactions Yet !</h3></center>";
                        } else { 
                            foreach ($transactions as $t){                  
                              echo "<div class='col-md-4'>
                                        <div class='tile-box tile-box-alt mrg20B bg-green'>
                                            <div class='tile-header'>
                                                $t->date
                                            </div>
                                            <div class='tile-content-wrapper'>
                                                <i class='glyph-icon icon-bookmark'></i>
                                                <div class='tile-content'>
                                                    <span>P</span>
                                                    $t->total
                                                </div> 
                                            </div>
                                            <a href='transaction_details.php?1&transaction_id=$t->transaction_id' class='tile-footer tooltip-button' data-placement='bottom' title='Click to view details'>
                                                View details
                                                <i class='glyph-icon icon-arrow-right'></i>
                                            </a>
                                        </div>
                                    </div>";    
                            }
                        }
                    ?>  
                </div>
                <div class="col-md-4"> 
                    <div class="panel-layout">
                        <div class="panel-box"> 
                            <div class="panel-content image-box"> 
                                <div class="image-content font-white"> 
                                    <div class="meta-box meta-box-bottom">
                                        <img src="img/<?php echo get("img","$s patients where patient_id='".$_GET['patient_id']."'"); ?>" width="200px" height="200px" alt="" class="meta-image img-bordered img-circle">
                                        <h3 class="meta-heading"><?php echo get("name","$s patients where patient_id='".$_GET['patient_id']."'"); ?></h3>
                                        <h4 class="meta-subheading"><?php echo get("phone","$s patients where patient_id='".$_GET['patient_id']."'"); ?></h4>
                                    </div> 
                                </div>
                                <img src="assets/assets/image-resources/blurred-bg/blurred-bg-13.jpg" alt=""> 
                            </div>
                            <div class="panel-content pad15A bg-white radius-bottom-all-4" style="text-align:left !important;">  
                                <div class="mrg15T mrg15B"></div> 
                                <p><b>Birthday : </b><?php echo get("birthday","$s patients where patient_id='".$_GET['patient_id']."'"); ?></p>
                                <p><b>Gender : </b><?php echo get("gender","$s patients where patient_id='".$_GET['patient_id']."'"); ?></p>
                                <p><b>Address : </b><?php echo get("address","$s patients where patient_id='".$_GET['patient_id']."'"); ?></p>
                                <p><b>Phone : </b><?php echo get("phone","$s patients where patient_id='".$_GET['patient_id']."'"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>   
<?php require_once "bones/a_footer.php"; ?>

<div class="modal fade in" id="newtransaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-right: 17px; margin-top:0%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">New Transaction</h4>
            </div>
            <div class="modal-body">
                <p> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Physician</label>
                        <div class="col-sm-9">
                            <form method="post" action="patient_info.php?1&patient_id=<?php echo $_GET['patient_id']; ?>">
                                <input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id']; ?>">
                                <select class="form-control" name="physician_id" required>
                                    <?php 
                                        $physician = fetch("$s physician where status='1'");
                                        foreach ($physician as $p){
                                            echo "<option value='$p->physician_id'>$p->name</option> ";
                                        }
                                    ?> 
                                </select>
                        </div>
                    </div> 
                    <br>
                </p>
            </div>
            <div class="modal-footer"> 
                <button class="btn btn-primary" name="newtransaction">Next</button></form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 