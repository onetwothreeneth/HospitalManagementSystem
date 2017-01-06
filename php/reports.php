<?php header("Access-Control-Allow-Origin: *");
include 'database.php';
$sql = "SELECT * FROM transactions $w status='1'"; 
$result = $conn->query($sql); 
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"x":"'  . $rs["date"] . '",';  
    $outp .= '"y":"'. $rs["total"]     . '"}'; 
}
echo $outp ='['.$outp.']';
