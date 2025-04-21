<?php
$ics = 'BEGIN:VCALENDAR'."\n";
$ics .= 'PRODID:-//(optional.is)//Misseristal//IS'."\n";
$ics .= 'VERSION:2.0'."\n";
$ics .= 'CALSCALE:GREGORIAN'."\n";
$ics .= 'X-APPLE-CALENDAR-COLOR:#1BADF8'."\n";
$ics .= 'X-APPLE-LANGUAGE:is'."\n";
$ics .= 'X-APPLE-REGION:IS'."\n";
$ics .= 'X-WR-CALNAME:Misseristal'."\n";



$oi_months = array();
include('../old_icelandic_calendar.php');


$year = '2025';
$years_into_future = 10;
for($y=0;$y<$years_into_future;$y++){
	$firstDay = strtotime(($year+$y).'-01-01');
	$oi_date = $firstDay;


	for($i=0;$i<365;$i++){
		//echo $i;
		$OIDate = new OldIcelandicDate(date('Y',$oi_date),date('n',$oi_date),date('j',$oi_date));
		// If this is the first of a new month, save it.
		if ((int)($OIDate->day) == 1){
			$oi_months[$oi_date] = $OIDate->month_name;
		}
		$oi_date = strtotime('+1 day',$oi_date);
	}

}

$last_modified_ymd = date("Ymd");
$last_modified_his = date("His");
foreach($oi_months as $oim_date=>$name){
	$uid  = md5($name.$oim_date);
	$ics .= 'BEGIN:VEVENT'."\n";
	$ics .= 'CATEGORIES:Holidays'."\n";
	$ics .= 'CLASS:PUBLIC'."\n";
	$ics .= 'SEQUENCE:0'."\n";
	$ics .= 'DTSTART;VALUE=DATE:'.date("Ymd", $oim_date)."\n";
	$ics .= 'DTEND;VALUE=DATE:'.date("Ymd", strtotime('+1 day',$oim_date))."\n";
	$ics .= 'LAST-MODIFIED:'.$last_modified_ymd.'T'.$last_modified_ymd.'Z'."\n";
	$ics .= 'DTSTAMP:20000101T000000Z'."\n";
	$ics .= 'CREATED:20000101T000000Z'."\n";
	$ics .= 'SUMMARY:'.$name."\n";
	$ics .= 'UID:'.$uid."\n";
	$ics .= 'END:VEVENT'."\n";
}


$ics .= 'END:VCALENDAR'."\n";
echo $ics;
?>