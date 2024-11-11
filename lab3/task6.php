<?php
$num =1;
$array = array('saif', 25, 'anis', 14.5, 'saif@gmail.com');
for ($i = 0; $i < count($array); $i++) 
{
    if ($array[$i] == 'saif') {
        echo "found " . $array[$i]. " and the index is ".$i;
        $num =1;
        break;
    }
    else{
        $num =0;
    }

}
if($num == 0) 
{
    echo "not found ";
}
?>
