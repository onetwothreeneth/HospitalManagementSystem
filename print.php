<?php 
    require_once 'bones/a_assets.php'; 
?>
<div id="page-content-wrappers" style="width:100% !important; float:left !important;">
    <div id="page-contents">
        <div class="container"> 
            <div class="row">
                <div class="col-md-12">  

                    <script>function printInvoice(){ window.print(); }</script>
                    <div class="content-box pad25A">
                        <div class="row">
                            <?php 
                                $transaction_id = $_GET['transaction_id']; 
                                $patient_id = get("patient_id","$s transactions where transaction_id='$transaction_id'"); 
                                $status = get("status","$s transactions where transaction_id='$transaction_id'"); 
                                $transaction_date = get("date","$s transactions where transaction_id='$transaction_id'"); 
                                $totals = get("total","$s transactions where transaction_id='$transaction_id'"); 
                                $patient_name = get("name","$s patients where patient_id='$patient_id'"); 
                                $patient_address = get("address","$s patients where patient_id='$patient_id'"); 
                                $physician_id = get("physician_id","$s transactions where transaction_id='$transaction_id'"); 
                                $physician_name = get("name","$s physician where physician_id='$physician_id'"); 
                                if($status<='0'){
                                    echo "<script>document.location.href = 'error.php';</script>";
                                } 
                            ?>
                            <div class="col-sm-3">
                                <div class="dummy-logo">
                                    Hospital Logo Here
                                </div>
                                <address class="invoice-address">
                                    Marcelo Medical Center
                                    <br />
                                    2160 South 1st Avenue
                                    <br />
                                    Baliwuag Bulacan
                                 </address>
                             </div>
                             <div class="col-sm-6 float-right text-right">
                                <h4 class="invoice-title">Receipt</h4>
                                No. <b>#<?php echo '00000'.$transaction_id; ?></b>
                                    <div class="divider"></div>   
                                    <script type="text/javascript">
                                    $(document).ready(function(){
                                        window.print();
                                    });
                                    </script>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="invoice-client mrg10T">Client information:</h2>
                                <h5><?php echo $patient_name; ?></h5>
                                <address class="invoice-address">
                                    <?php echo $patient_address; ?>
                                </address>
                            </div>
                            <div class="col-md-4">
                                <h2 class="invoice-client mrg10T">Order Info:</h2>
                                <ul class="reset-ul">
                                    <li><b>Date:</b> <?php echo $transaction_date; ?></li> 
                                    <li><b>Id:</b> #<?php echo '00000'.$transaction_id; ?></li>
                                    <li><b>Physician:</b> <?php echo $physician_name; ?></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h2 class="invoice-client mrg10T">Remarks:</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                <br />
                                <p>Honoring this receipt means you agreed on our terms and condition.</p>
                            </div>
                        </div>
                        <table class="table mrg20T table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Service/Transaction</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th> 
                                </tr>
                            </thead>
                            <tbody> 
                                <?php 
                                    $orders = fetch("$s orders $j services on orders.services_id=services.services_id and transaction_id='$transaction_id'");
                                    $orders_c = counts("$s orders $j services on orders.services_id=services.services_id and transaction_id='$transaction_id'");
                                    if($orders_c>='1'){ 
                                       foreach ($orders as $o){  
                                              $total = $o->qty * $o->price;
                                              echo "<tr>
                                                        <td>$o->orders_id</td>
                                                        <td>$o->name</td>
                                                        <td>$o->category</td> 
                                                        <td>$o->description</td>
                                                        <td>P $o->price</td>
                                                        <td>$o->qty</td>
                                                        <td>P $total</td> 
                                                    </tr> ";
                                        }
                                    }  else {
                                        echo "<td colspan='7'><center>No Transactions/Results yet !</td>";
                                    }
                                ?>
                                <tr <?php if($orders_c<='0'){ echo 'style="display:none;"'; }?>>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td class="text-right"><b><h4>TOTAL :</h4></b></td>
                                    <td style="color:red;">
                                        <h5>P 
                                            <?php  
                                                $total = get("total","SELECT sum(orders.qty*services.price) as total FROM orders INNER JOIN services on orders.services_id=services.services_id and transaction_id='$transaction_id'");
                                                udi("$u transactions set total='$total' where transaction_id='$transaction_id'");
                                                echo $total;
                                            ?>
                                        </h5>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>  
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