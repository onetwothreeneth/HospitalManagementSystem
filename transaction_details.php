<?php 
    require_once 'bones/a_assets.php';
    require_once 'bones/a_header.php';  
?>
<div id="page-content-wrapper">
    <div id="page-content">
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
                                <a target='_blank' href="print.php?transaction_id=<?php echo $transaction_id; ?>">
                                   <button class="print btn btn-alt btn-hover btn-info">
                                    <span>Print</span>
                                    <i class="glyph-icon icon-print"></i>
                                    </button>
                                </a>  
                                <button class="print removes btn btn-alt btn-hover btn-danger">
                                    <span>Cancel</span>
                                    <i class="glyph-icon icon-trash"></i>
                                </button> 
                                <script type="text/javascript">
                                $('.removes').click(function(){
                                    if(window.confirm("Are you sure you want to remove this transaction?")){
                                        document.location.href = 'php/controller.php?transaction_idS=<?php echo $transaction_id; ?>';
                                    }
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php 
                                    $orders = fetch("$s orders $j services on orders.services_id=services.services_id and transaction_id='$transaction_id'");
                                    $orders_discount = fetch("$s orders_discount $j discounts on orders_discount.discount_id=discounts.discount_id and transaction_id='$transaction_id'");
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
                                                        <td>
                                                            <form method='post' action='transaction_details.php?1&transaction_id=$transaction_id'>
                                                              <input type='hidden' name='orders_id' value='$o->orders_id'> 
                                                              <button name='remove_servicetransaction' class='btn btn-danger'>Remove</button>
                                                            </form>
                                                        </td> 
                                                    </tr> ";
                                        }
                                    }  else {
                                        echo "<td colspan='7'><center>No Transactions/Results yet !</td>";
                                    }

                                   if($orders_discount<=0){}
                                    else {
                                          echo "<tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Discounts</td> 
                                                    <td></td>  
                                                    <td></td>  
                                                    <td></td>   
                                                </tr>";
                                            foreach ($orders_discount as $z) {
                                                echo "<tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td> 
                                                            <td class='text-right'>$z->name</td>  
                                                            <td>$z->discount%</td>  
                                                            <td>
                                                                <form method='post' action='transaction_details.php?1&transaction_id=$transaction_id'>
                                                                    <input type='hidden' name='orders_discount_id' value='$z->orders_discount_id'> 
                                                                    <button name='remove_orderdiscount' class='btn btn-danger'>Remove</button>
                                                                </form>
                                                            </td>  
                                                        </tr> ";
                                            }
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
                                                $discounted = get("less","SELECT sum(discounts.discount) as less from orders_discount $j discounts on orders_discount.discount_id=discounts.discount_id and transaction_id='$transaction_id'");
                                                $dis_a = $discounted/100;
                                                $dis_b = $dis_a * $total;
                                                $dis_c = $total - $dis_b;
                                                udi("$u transactions set total='$dis_c' where transaction_id='$transaction_id'"); 
                                                echo $dis_c;
                                            ?>
                                        </h5>
                                    </td>
                                    <td></td>  
                                </tr> 
                            </tbody>
                        </table>    
                             <div class="col-sm-6 float-right text-right"> 
                               <button data-toggle="modal" data-target="#newservices" class="print btn btn-alt btn-hover btn-success">
                                    <span>Add</span>
                                     <i class="glyph-icon icon-plus"></i>
                                </button>  
                                <button data-toggle="modal" data-target="#discount" class="print btn btn-alt btn-hover btn-warning">
                                    <span>Discount</span>
                                     <i class="glyph-icon icon-plus"></i>
                                </button>  
                            </div><br>
                    </div>  
                </div>
            </div> 
        </div>
    </div>
</div>   
<?php require_once "bones/a_footer.php"; ?>

<!-- SERVICES MODAL -->
<div class="modal fade in" id="newservices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-right: 17px; margin-top:0%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Transaction</h4>
            </div>
            <div class="modal-body">
                <p>  
                    <table class="table mrg20T table-hover">
                        <thead>
                            <tr> 
                                <th style='width:16.66%;'>Name</th>
                                <th style='width:16.66%;'>Category</th>
                                <th style='width:27%;'>Description</th>
                                <th style='width:16.66%;'>Price</th>
                                <th style='width:16.66%;'>Qty</th>
                                <th style='width:16.66%;'></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $services = fetch("$s services $w status='1'");
                                $d = fetch("$s discounts $w status='1'");
                                foreach ($services as $s){ 
                                    echo "<tr> 
                                            <td style='width:16.66%;'>$s->name</td>
                                            <td style='width:16.66%;'>$s->category</td>
                                            <td style='width:27%;'>$s->description</td>
                                            <td style='width:10%;'>P$s->price</td>
                                            <td style='width:26.66%;'> 
                                                <form method='post' action='transaction_details.php?1&transaction_id=$transaction_id'>
                                                    <input type='hidden' name='transaction_id' value='".$_GET['transaction_id']."'> 
                                                    <input type='hidden' name='services_id' value='$s->services_id'> 
                                                    <input type='number' name='qty' placeholder='Qty' class='form-control' required> 
                                            </td>
                                            <td style='width:16.66%;'> 
                                                    <button name='add_servicetransaction' class='btn btn-success'>Add</button>
                                                </form>
                                            </td>
                                          </tr>";
                                }
                            ?>   
                        </tbody>  
                    </table>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label">Physician</label>
                        <div class="col-sm-9">
                            <form method="post" action="transaction_details.php?1&transaction_id=<?php //echo $_GET['transaction_id']; ?>">
                                <input type="hidden" name="transaction_id" value="<?php //echo $_GET['transaction_id']; ?>">
                                <select class="form-control" name="physician_id" required>
                                    <?php 
                                        //$physician = fetch("$s physician where status='1'");
                                        //foreach ($physician as $p){ 
                                       //
                                    ?> 
                                </select>
                        </div>
                    </div> -->
                    <br>
                </p>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 

<!-- DISCOUNT MODAL --> 
<div class="modal fade in" id="discount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-right: 17px; margin-top:0%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Discounts</h4>
            </div>
            <div class="modal-body">
                <p>  
                    <table class="table mrg20T table-hover">
                        <thead>
                            <tr> 
                                <th style='width:16.66%;'></th>
                                <th style='width:16.66%;'>Name</th>
                                <th style='width:27%;'>Discount</th> 
                                <th style='width:16.66%;'></th>
                            </tr>
                            <?php  
                                foreach ($d as $d){ 
                                    echo "<tr> 
                                            <td style='width:25%;'>$d->discount_id</td>
                                            <td style='width:35%;'>$d->name</td>
                                            <td style='width:25%;'>$d->discount</td> 
                                            <td style='width:15%;'> 
                                                <form method='post' action='transaction_details.php?1&transaction_id=$transaction_id'>
                                                    <input type='hidden' name='transaction_id' value='".$_GET['transaction_id']."'> 
                                                    <input type='hidden' name='discount_id' value='$d->discount_id'>   
                                                    <button name='add_discount' class='btn btn-success'>Add</button>
                                                </form>
                                            </td>
                                          </tr>";
                                }
                            ?>   
                        </thead>
                        <tbody> 
                        </tbody>  
                    </table>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label">Physician</label>
                        <div class="col-sm-9">
                            <form method="post" action="transaction_details.php?1&transaction_id=<?php //echo $_GET['transaction_id']; ?>">
                                <input type="hidden" name="transaction_id" value="<?php //echo $_GET['transaction_id']; ?>">
                                <select class="form-control" name="physician_id" required>
                                    <?php 
                                        //$physician = fetch("$s physician where status='1'");
                                        //foreach ($physician as $p){ 
                                       //
                                    ?> 
                                </select>
                        </div>
                    </div> -->
                    <br>
                </p>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
<style type="text/css">
@media print {
    .print{
        display: none !important; 
     }  
</style>

