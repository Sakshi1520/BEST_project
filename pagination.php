<?php

include('connect.php');
$record_per_page = 4;
$page = '';
$output = '';
if(isset($_POST["page"])){
    $page = $_POST["page"];
}
else{
    $page = 1;
}

$start = ($page - 1)*$record_per_page;

$query = "SELECT * FROM `staff_details` ORDER BY `sr_no` DESC LIMIT $start, $record_per_page" ;
// echo $query;        
$result = mysqli_query($conn, $query);

$output .= "
    <table class = 'table table-bordered'>
    <tr>
        <th width = '30%'>Reg. no.</th>
        <th width = '30%'>Name</th>
        <th width = '30%'>Password</th>
    </tr>
";


while($row = mysqli_fetch_array($result))
{
    $output .='
    <tr>
        <td>'.$row["regis_no"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["cheque_no"].'</td>
    </tr>
';
}
$output .= '<table><br><div align="center">';
$page_query = "SELECT * FROM `staff_details` ORDER BY `sr_no` DESC";
$page_result = mysqli_query($conn,$page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
for($i=1; $i<=$total_pages; $i++)
{
    $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:2px' id='".$i."'>".$i."</span>";
}
echo $output;
?>