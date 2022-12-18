<?php 
$connection = mysqli_connect("localhost","root","","proyecto") or die("Error " . mysqli_error($connection));
//Fetch productos data
$sql = "SELECT * FROM productos";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $titulo = $row['titulo'];
    $stock = $row['stock'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $titulo), array('v'=>(int)$stock)) );
}
$data = json_encode($array);
echo $data;

?>