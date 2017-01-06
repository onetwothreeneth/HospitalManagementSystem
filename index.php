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
                        <div class="panel">
                            <div class="panel-body">
                                <h1 class="title-hero"> 
                                    <div class="col-sm-12">
                                        <b>Patient Records</b>
                                    </div><br><br><br>  
                                    <div class="col-sm-7"></div> 
                                    <form action="index.php?1" method="post">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="search" placeholder="Search" required>
                                        </div> 
                                        <div class="col-sm-1"> 
                                            <button name="search_patient" class="btn btn-primary">Search</button>
                                        </div><br><br><br>
                                    </form> 
                                </h1>
                                <div class="example-box-wrapper"> 
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;"></th> 
                                                <th style="text-align:center;">Name</th> 
                                                <th style="text-align:center;">Birthday</th> 
                                                <th style="text-align:center;">Gender</th> 
                                                <th style="text-align:center;">Address</th> 
                                                <th style="text-align:center;">Phone</th> 
                                                <th style="text-align:center;"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(isset($_POST['search_patient'])){
                                                    $search = filters('search');
                                                    $patients = fetch("$s patients $w status='1' and 
                                                        name like '%$search%' or 
                                                        birthday like '%$search%' or 
                                                        gender like '%$search%' or 
                                                        address like '%$search%' or 
                                                        phone like '%$search%' or 
                                                        img like '%$search%' or 
                                                        patient_id like '%$search%'
                                                    ");
                                                    if($patients<=0){
                                                        echo "<tr><td colspan='6' style='text-align:center; width:100%;'>No Results Found !</td></tr>";
                                                    } else { 
                                                        foreach ($patients as $p) {
                                                            echo "<tr> 
                                                                    <td style='text-align:center; width:14.28%;'><img src='img/$p->img' style='width:70px;height:70px;'></td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->name</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->birthday</td> 
                                                                    <td style='text-align:center; width:5%;'>$p->gender</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->address</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->phone</td> 
                                                                    <td style='text-align:center; width:23.56%;'>
                                                                        <a href='patient_info.php?1&patient_id=$p->patient_id' class='btn btn-purple'>View</a>
                                                                        <a href='edit_patient.php?1&patient_id=$p->patient_id' class='btn btn-success'>Edit</a>
                                                                        <form action='index.php?1' method='post' style='display:inline !important;'>
                                                                            <input type='hidden' name='patient_id' value='$p->patient_id'>
                                                                            <button name='archive_patient' class='btn btn-danger'>Trash</button>
                                                                        </form>
                                                                    </td> 
                                                                  </tr> ";
                                                        }
                                                    }
                                                } else { 
                                                    $patients = fetch("$s patients $w status='1'"); 
                                                    if($patients<=0){
                                                        echo "<tr><td colspan='6' style='text-align:center; width:100%;'>No Records Yet !</td></tr>";
                                                    } else { 
                                                        foreach ($patients as $p) {
                                                            echo "<tr> 
                                                                    <td style='text-align:center; width:14.28%;'><img src='img/$p->img' style='width:70px;height:70px;'></td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->name</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->birthday</td> 
                                                                    <td style='text-align:center; width:5%;'>$p->gender</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->address</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$p->phone</td> 
                                                                    <td style='text-align:center; width:23.56%;'>
                                                                        <a href='patient_info.php?1&patient_id=$p->patient_id ' class='btn btn-purple'>View</a>
                                                                        <a href='edit_patient.php?1&patient_id=$p->patient_id' class='btn btn-success'>Edit</a>
                                                                        <form action='index.php?1' method='post' style='display:inline !important;'>
                                                                            <input type='hidden' name='patient_id' value='$p->patient_id'>
                                                                            <button name='archive_patient' class='btn btn-danger'>Trash</button>
                                                                        </form>
                                                                    </td> 
                                                                  </tr> ";
                                                        } 
                                                    }
                                                }
                                             
                                            ?> 
                                        </tbody>
                                    </table>
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
