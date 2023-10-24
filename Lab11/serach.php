<?php
	$mango = $_GET["mango"];
	$orange = $_GET["orange"];
    $banana = $_GET["banana"];
    $sum = ($mango*30) + ($orange*70) + ($banana*30);
	echo "<b>ยอดขาย</b>" . $sum . "<b>บาท</b>";
?>