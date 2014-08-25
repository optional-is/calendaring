<?php
date_default_timezone_set('Atlantic/Reykjavik');

$epoch = strtotime('2011-02-07');

for($i=170;$i<240;$i++){
	$dtstart = strtotime('+'.($i*7).' days',$epoch);
	echo $i.') #'.date("W",$dtstart).' '.date("D Y-m-d",$dtstart).' - '.date('D m-d',strtotime('+6 days',$dtstart));
	echo "\n";
}


?>