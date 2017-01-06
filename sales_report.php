<?php 
    require_once 'bones/a_assets.php';
    require_once 'bones/a_header.php';  
?>
    <div id="page-content-wrapper">
        <div id="page-content">
            <div class="container">   

                            <div class="row">
                                <div class="col-md  ">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <h3 class="title-hero">
                                                Sales report
                                            </h3>
                                            <div class="col-md-3"></div>
                                            <div class="form-group"> 
                                                <form action="" method="post">
                                                <div class="col-sm-2">
                                                    <input type="date" class="form-control" name="from" placeholder="Starting date" required>
                                                </div> 
                                            </div> 
                                            <div class="form-group"> 
                                                <div class="col-sm-2">
                                                    <input type="date" class="form-control" name="to" placeholder="End date" required>
                                                </div> 
                                            </div> 
                                            <div class="form-group"> 
                                                <div class="col-sm-2">
                                                    <button class="btn btn-alt btn-hover btn-primary" name="search">
                                                        <span>View</span>
                                                        <i class="glyph-icon icon-eye"></i>
                                                    </button></form>  
                                                </div> 
                                            </div>   <br><br>
                                            <div class="example-box-wrapper">
                                                <div id="color-bar"></div>
                                            </div>
                                        <div class="col-md-12">
                                            <a target='_blank' href="print3.php">
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

<script type="text/javascript" src="assets/assets/js-core/raphael.js"></script> 
<script type="text/javascript" src="assets/assets/widgets/charts/morris/morris.js"></script>  
<?php  

if(isset($_POST['search'])){
    $from = filters("from");
    $to = filters("to"); 
    $sql = "SELECT * FROM transactions where date between '$from' and '$to' and status='1'";  
    $result = $conn->query($sql); 
    $outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"x":"'  . $rs["date"] . '",';  
        $outp .= '"y":"'. $rs["total"]     . '"}'; 
    }
    $outp ='['.$outp.']'; 
        echo "<script type='text/javascript'>
    $(function(){'use strict';Morris.Bar({element:'color-bar',
        data:$outp,xkey:'x',ykeys:['y'],labels:['Php'],barColors:function(a,b,c){if('bar'===c){var d=Math.ceil(255*a.y/this.ymax);return'rgb('+d+',155,22)'}return'#000'}})}),$(function(){'use strict';var a=[{period:'2012-10-01',licensed:3407,sorned:660},{period:'2012-09-30',licensed:3351,sorned:629},{period:'2012-09-29',licensed:3269,sorned:618},{period:'2012-09-20',licensed:3246,sorned:661},{period:'2012-09-19',licensed:3257,sorned:667},{period:'2012-09-18',licensed:3248,sorned:627},{period:'2012-09-17',licensed:3171,sorned:660},{period:'2012-09-16',licensed:3171,sorned:676},{period:'2012-09-15',licensed:3201,sorned:656},{period:'2012-09-10',licensed:3215,sorned:622}];Morris.Bar({element:'labels-bar',data:a,xkey:'period',ykeys:['licensed','sorned'],labels:['Licensed','SORN'],xLabelAngle:60})}),$(function(){'use strict';Morris.Bar({element:'stacked-bars',data:[{x:'2011 Q1',y:3,z:2,a:3},{x:'2011 Q2',y:2,z:null,a:1},{x:'2011 Q3',y:0,z:2,a:4},{x:'2011 Q4',y:2,z:4,a:3}],xkey:'x',ykeys:['y','z','a'],labels:['Y','Z','A'],stacked:!0})}),$(function(){'use strict';Morris.Donut({element:'donut',backgroundColor:'#fff',labelColor:'#ccc',colors:['#4fb2ff','#929292','#67C69D','#ff9393'],data:[{value:70,label:'foo',formatted:'at least 70%'},{value:15,label:'bar',formatted:'approx. 15%'},{value:10,label:'baz',formatted:'approx. 10%'},{value:5,label:'A really really long label',formatted:'at most 5%'}],formatter:function(a,b){return b.formatted}})}),$(function(){'use strict';for(var a=[],b=0;360>=b;b+=10)a.push({x:b,y:1.5+1.5*Math.sin(Math.PI*b/180).toFixed(4)});window.m=Morris.Line({element:'decimal-data',data:a,xkey:'x',ykeys:['y'],labels:['sin(x)'],parseTime:!1,hoverCallback:function(a,b,c){var d=b.data[a];return c.replace('sin(x)','1.5 + 1.5 sin('+d.x+')')},xLabelMargin:10,integerYLabels:!0})}),$(function(){'use strict';Morris.Area({element:'daytime-bars',data:[{x:'2013-03-30 22:00:00',y:3,z:3},{x:'2013-03-31 00:00:00',y:2,z:0},{x:'2013-03-31 02:00:00',y:0,z:2},{x:'2013-03-31 04:00:00',y:4,z:4}],xkey:'x',ykeys:['y','z'],labels:['Y','Z']})}),$(function(){var a=[{period:'2011 Q3',licensed:3407,sorned:660},{period:'2011 Q2',licensed:3351,sorned:629},{period:'2011 Q1',licensed:3269,sorned:618},{period:'2010 Q4',licensed:3246,sorned:661},{period:'2009 Q4',licensed:3171,sorned:676},{period:'2008 Q4',licensed:3155,sorned:681},{period:'2007 Q4',licensed:3226,sorned:620},{period:'2006 Q4',licensed:3245,sorned:null},{period:'2005 Q4',licensed:3289,sorned:null}];Morris.Line({element:'hero-graph',data:a,xkey:'period',ykeys:['licensed','sorned'],labels:['Licensed','Off the road']}),Morris.Donut({element:'hero-donut',data:[{label:'Jam',value:25},{label:'Frosted',value:40},{label:'Custard',value:25},{label:'Sugar',value:10}],formatter:function(a){return a+'%'}}),Morris.Area({element:'hero-area',data:[{period:'2010 Q1',iphone:2666,ipad:null,itouch:2647},{period:'2010 Q2',iphone:2778,ipad:2294,itouch:2441},{period:'2010 Q3',iphone:4912,ipad:1969,itouch:2501},{period:'2010 Q4',iphone:3767,ipad:3597,itouch:5689},{period:'2011 Q1',iphone:6810,ipad:1914,itouch:2293},{period:'2011 Q2',iphone:5670,ipad:4293,itouch:1881},{period:'2011 Q3',iphone:4820,ipad:3795,itouch:1588},{period:'2011 Q4',iphone:15073,ipad:5967,itouch:5175},{period:'2012 Q1',iphone:10687,ipad:4460,itouch:2028},{period:'2012 Q2',iphone:8432,ipad:5713,itouch:1791}],xkey:'period',ykeys:['iphone','ipad','itouch'],labels:['iPhone','iPad','iPod Touch'],pointSize:2,hideHover:'auto'}),Morris.Bar({element:'hero-bar',data:[{device:'iPhone',geekbench:136},{device:'iPhone 3G',geekbench:137},{device:'iPhone 3GS',geekbench:275},{device:'iPhone 4',geekbench:380},{device:'iPhone 4S',geekbench:655},{device:'iPhone 5',geekbench:1571}],xkey:'device',ykeys:['geekbench'],labels:['Geekbench'],barRatio:.4,xLabelAngle:35,hideHover:'auto'})});
    </script>";

} else {
    $sql = "SELECT * FROM transactions $w status='1'"; 
    $result = $conn->query($sql); 
    $outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"x":"'  . $rs["date"] . '",';  
        $outp .= '"y":"'. $rs["total"]     . '"}'; 
    }
    $outp ='['.$outp.']'; 
        echo "<script type='text/javascript'>
    $(function(){'use strict';Morris.Bar({element:'color-bar',
        data:$outp,xkey:'x',ykeys:['y'],labels:['Php'],barColors:function(a,b,c){if('bar'===c){var d=Math.ceil(255*a.y/this.ymax);return'rgb('+d+',155,22)'}return'#000'}})}),$(function(){'use strict';var a=[{period:'2012-10-01',licensed:3407,sorned:660},{period:'2012-09-30',licensed:3351,sorned:629},{period:'2012-09-29',licensed:3269,sorned:618},{period:'2012-09-20',licensed:3246,sorned:661},{period:'2012-09-19',licensed:3257,sorned:667},{period:'2012-09-18',licensed:3248,sorned:627},{period:'2012-09-17',licensed:3171,sorned:660},{period:'2012-09-16',licensed:3171,sorned:676},{period:'2012-09-15',licensed:3201,sorned:656},{period:'2012-09-10',licensed:3215,sorned:622}];Morris.Bar({element:'labels-bar',data:a,xkey:'period',ykeys:['licensed','sorned'],labels:['Licensed','SORN'],xLabelAngle:60})}),$(function(){'use strict';Morris.Bar({element:'stacked-bars',data:[{x:'2011 Q1',y:3,z:2,a:3},{x:'2011 Q2',y:2,z:null,a:1},{x:'2011 Q3',y:0,z:2,a:4},{x:'2011 Q4',y:2,z:4,a:3}],xkey:'x',ykeys:['y','z','a'],labels:['Y','Z','A'],stacked:!0})}),$(function(){'use strict';Morris.Donut({element:'donut',backgroundColor:'#fff',labelColor:'#ccc',colors:['#4fb2ff','#929292','#67C69D','#ff9393'],data:[{value:70,label:'foo',formatted:'at least 70%'},{value:15,label:'bar',formatted:'approx. 15%'},{value:10,label:'baz',formatted:'approx. 10%'},{value:5,label:'A really really long label',formatted:'at most 5%'}],formatter:function(a,b){return b.formatted}})}),$(function(){'use strict';for(var a=[],b=0;360>=b;b+=10)a.push({x:b,y:1.5+1.5*Math.sin(Math.PI*b/180).toFixed(4)});window.m=Morris.Line({element:'decimal-data',data:a,xkey:'x',ykeys:['y'],labels:['sin(x)'],parseTime:!1,hoverCallback:function(a,b,c){var d=b.data[a];return c.replace('sin(x)','1.5 + 1.5 sin('+d.x+')')},xLabelMargin:10,integerYLabels:!0})}),$(function(){'use strict';Morris.Area({element:'daytime-bars',data:[{x:'2013-03-30 22:00:00',y:3,z:3},{x:'2013-03-31 00:00:00',y:2,z:0},{x:'2013-03-31 02:00:00',y:0,z:2},{x:'2013-03-31 04:00:00',y:4,z:4}],xkey:'x',ykeys:['y','z'],labels:['Y','Z']})}),$(function(){var a=[{period:'2011 Q3',licensed:3407,sorned:660},{period:'2011 Q2',licensed:3351,sorned:629},{period:'2011 Q1',licensed:3269,sorned:618},{period:'2010 Q4',licensed:3246,sorned:661},{period:'2009 Q4',licensed:3171,sorned:676},{period:'2008 Q4',licensed:3155,sorned:681},{period:'2007 Q4',licensed:3226,sorned:620},{period:'2006 Q4',licensed:3245,sorned:null},{period:'2005 Q4',licensed:3289,sorned:null}];Morris.Line({element:'hero-graph',data:a,xkey:'period',ykeys:['licensed','sorned'],labels:['Licensed','Off the road']}),Morris.Donut({element:'hero-donut',data:[{label:'Jam',value:25},{label:'Frosted',value:40},{label:'Custard',value:25},{label:'Sugar',value:10}],formatter:function(a){return a+'%'}}),Morris.Area({element:'hero-area',data:[{period:'2010 Q1',iphone:2666,ipad:null,itouch:2647},{period:'2010 Q2',iphone:2778,ipad:2294,itouch:2441},{period:'2010 Q3',iphone:4912,ipad:1969,itouch:2501},{period:'2010 Q4',iphone:3767,ipad:3597,itouch:5689},{period:'2011 Q1',iphone:6810,ipad:1914,itouch:2293},{period:'2011 Q2',iphone:5670,ipad:4293,itouch:1881},{period:'2011 Q3',iphone:4820,ipad:3795,itouch:1588},{period:'2011 Q4',iphone:15073,ipad:5967,itouch:5175},{period:'2012 Q1',iphone:10687,ipad:4460,itouch:2028},{period:'2012 Q2',iphone:8432,ipad:5713,itouch:1791}],xkey:'period',ykeys:['iphone','ipad','itouch'],labels:['iPhone','iPad','iPod Touch'],pointSize:2,hideHover:'auto'}),Morris.Bar({element:'hero-bar',data:[{device:'iPhone',geekbench:136},{device:'iPhone 3G',geekbench:137},{device:'iPhone 3GS',geekbench:275},{device:'iPhone 4',geekbench:380},{device:'iPhone 4S',geekbench:655},{device:'iPhone 5',geekbench:1571}],xkey:'device',ykeys:['geekbench'],labels:['Geekbench'],barRatio:.4,xLabelAngle:35,hideHover:'auto'})});
    </script>";
}
    
?>

<?php require_once "bones/a_footer.php"; ?>