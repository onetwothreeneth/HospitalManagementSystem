<?php 
    require_once 'bones/a_assets.php';
    require_once 'bones/a_header.php';  
?>
<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container"> 
            <div class="row">
                <div class="col-md-12"> 
                        <div class="panel">
                            <div class="panel-body">
                                <h1 class="title-hero"> 
                                    <div class="col-sm-12">
                                        <b><center>Transaction History</center></b>
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
                                        <a target='_blank' href="print2.php">
                                           <button class="print btn btn-alt btn-hover btn-info float-right">
                                            <span>Print</span>
                                            <i class="glyph-icon icon-print"></i>
                                            </button>
                                        </a> 
                                    </div> 
                                </div> 
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>  
<script type="text/javascript" src="assets/assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets/assets/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="assets/assets/widgets/datatable/datatable-tabletools.js"></script> 
<script type="text/javascript">

    /* Datatables basic */

    $(document).ready(function() {
        $('#datatable-example').dataTable();
    });

    /* Datatables hide columns */

    $(document).ready(function() {
        var table = $('#datatable-hide-columns').DataTable( {
            "scrollY": "300px",
            "paging": false
        } );

        $('#datatable-hide-columns_filter').hide();

        $('a.toggle-vis').on( 'click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column( $(this).attr('data-column') );

            // Toggle the visibility
            column.visible( ! column.visible() );
        } );
    } );

    /* Datatable row highlight */

    $(document).ready(function() {
        var table = $('#datatable-row-highlight').DataTable();

        $('#datatable-row-highlight tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('tr-selected');
        } );
    });



    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });

</script>
<?php require_once "bones/a_footer.php"; ?>
