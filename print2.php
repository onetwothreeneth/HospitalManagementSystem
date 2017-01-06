<?php 
    require_once 'bones/a_assets.php'; 
?>
<div id="page-content-wrappers" style="width:100% !important; float:left !important;">
    <div id="page-contents">
        <div class="container"> 
            <div class="row">
                <div class="col-md-12">  
                            <div class="panel-body">
                                <h1 class="title-hero"> 
                                    <div class="col-sm-12">
                                        <h2><b><center>Marcelo Hospital</center></b></h2><br>
                                        <small><center>Transaction History</center></small><br><br>
                                    </div><br><br><br>  
                                    <div class="col-sm-7"></div>  
                                </h1>
                                <div class="example-box-wrapper"> 
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Transaction #</th> 
                                                <th style="text-align:center;">Date</th>  
                                                <th style="text-align:center;">Patient</th> 
                                                <th style="text-align:center;">Physician</th>  
                                                <th style="text-align:center;">Total</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $transactions = fetch("$s transactions $w status='1'");
                                                if($transactions<=0){
                                                    echo "<tr><td colspan='6' style='text-align:center; width:100%;'>No Services yet !</td></tr>";
                                                } else { 
                                                    foreach ($transactions as $t) {
                                                        $patient_id = $t->patient_id;
                                                        $physician_id = $t->physician_id;
                                                        $patient = get("name","$s patients $w patient_id='$patient_id'");
                                                        $physician = get("name","$s physician $w physician_id='$physician_id'");
                                                            echo "<tr>  
                                                                    <td style='text-align:center;'>00000$t->transaction_id</td>  
                                                                    <td style='text-align:center;'>$t->date</td>  
                                                                    <td style='text-align:center;'>$patient</td>  
                                                                    <td style='text-align:center;'>$physician</td>  
                                                                    <td style='text-align:center;'>$t->total</td>  
                                                                  </tr> ";
                                                    } 
                                                } 
                                             
                                            ?> 
                                        </tbody>
                                    </table>
                                    <div class="col-md-12"> 
                                           <button onclick="window.print()" class="print btn btn-alt btn-hover btn-info float-right">
                                            <span>Print</span>
                                            <i class="glyph-icon icon-print"></i>
                                            </button> 
                                    </div> 
                                </div> 
                        </div>
                    </div>
                </div> 
    </div>
</div>   
<?php require_once "bones/a_footer.php"; ?>
<style type="text/css">
@media print {
    .print{
        display: none !important; 
     }  
</style>