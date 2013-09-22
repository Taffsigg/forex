<?php 
if($Seconds<10)
echo "0".$Seconds."</span> " ;
else 
echo $Seconds."</span>" ; 
$time_out=10; 
if($Minutes<$time_out){ 
    //$_SESSION['time_start']=$end; 
}else{ 
    header("Location: endContest.php"); 
} 
?>
