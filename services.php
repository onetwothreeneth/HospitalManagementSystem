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
                                    <form action="services.php?5" method="post">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="search" placeholder="Search" required>
                                        </div> 
                                        <div class="col-sm-1"> 
                                            <button name="search_services" class="btn btn-primary">Search</button>
                                        </div><br><br><br>
                                    </form> 
                                </h1>
                                <div class="example-box-wrapper"> 
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;"></th> 
                                                <th style="text-align:center;">Name</th>  
                                                <th style="text-align:center;">Category</th> 
                                                <th style="text-align:center;">Description</th> 
                                                <th style="text-align:center;">Price</th> 
                                                <th style="text-align:center;"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(isset($_POST['search_services'])){
                                                    $search = filters('search');
                                                    $services = fetch("$s services $w status='1' and 
                                                        name like '%$search%' or  
                                                        category like '%$search%' or 
                                                        description like '%$search%' or  
                                                        price like '%$search%'   
                                                    "); 
                                                    if($services<=0){
                                                        echo "<tr><td colspan='6' style='text-align:center; width:100%;'>No Results Found !</td></tr>";
                                                    } else { 
                                                        foreach ($services as $s) {
                                                            echo "<tr> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->services_id</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->name</td>  
                                                                    <td style='text-align:center; width:14.28%;'>$s->category</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->description</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->price</td> 
                                                                    <td style='text-align:center; width:14.28%;'> 
                                                                        <a href='edit_services.php?5&services_id=$s->services_id' class='btn btn-success'>Edit</a>
                                                                        <form action='services.php?5' method='post' style='display:inline;'>
                                                                            <input type='hidden' name='services_id' value='$s->services_id'>
                                                                            <button name='archive_services' class='btn btn-danger'>Trash</button>
                                                                        </form>
                                                                    </td> 
                                                                  </tr> ";
                                                        }
                                                    }
                                                } else { 
                                                    $services = fetch("$s services $w status='1'");
                                                    if($services<=0){
                                                        echo "<tr><td colspan='6' style='text-align:center; width:100%;'>No Services yet !</td></tr>";
                                                    } else { 
                                                        foreach ($services as $s) {
                                                            echo "<tr> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->services_id</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->name</td>  
                                                                    <td style='text-align:center; width:14.28%;'>$s->category</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->description</td> 
                                                                    <td style='text-align:center; width:14.28%;'>$s->price</td> 
                                                                    <td style='text-align:center; width:14.28%;'> 
                                                                        <a href='edit_services.php?5&services_id=$s->services_id' class='btn btn-success'>Edit</a>
                                                                        <form action='services.php?5' method='post' style='display:inline;'>
                                                                            <input type='hidden' name='services_id' value='$s->services_id'>
                                                                            <button name='archive_services' class='btn btn-danger'>Trash</button>
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
