
<?php
//require_once './Model.php';
//$obj = new Model();
$position = $_POST['position'];
//echo '<PRE>';
//print_r($position);
//die();
$con = mysqli_connect('localhost', 'root', '', 'registration');
$i=1;
foreach($position as $k =>$v){
    
    $sql = "Update `tbl_registration` SET `position_id`='".$i."' WHERE `id`='".$v."';";
    mysqli_query($con, $sql);
    $i++;
}