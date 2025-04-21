<?php
$ics = 'BEGIN:VCALENDAR'."\n";
$ics .= 'PRODID:-//(optional.is)//Red Days//IS'."\n";
$ics .= 'VERSION:2.0'."\n";
$ics .= 'CALSCALE:GREGORIAN'."\n";
$ics .= 'X-APPLE-CALENDAR-COLOR:#931919'."\n";
$ics .= 'X-APPLE-LANGUAGE:is'."\n";
$ics .= 'X-APPLE-REGION:IS'."\n";
$ics .= 'X-WR-CALNAME:Red Days'."\n";



$holidays = array();
include('../old_icelandic_calendar.php');


$year = '2025';
$years_into_future = 10;
for($y=0;$y<$years_into_future;$y++){
	$firstDay = strtotime(($year+$y).'-01-01');
	$oi_date = $firstDay;


	$easter = easter_date($year+$y);

	// Holiday list (Add movable holidays)
	// Translate and add as needed

    $holidays[strtotime(($year+$y).'-05-01')]='Verkalýðsdagurinn';//'May Day'
    $holidays[strtotime(($year+$y).'-01-01')]='Nýársdagur';//'New Year\'s Day'
    //$holidays[strtotime(($year+$y).'-01-06')]='Þrettándinn'; // Twelfth nigh
    $holidays[strtotime(($year+$y).'-06-17')]='Þjóðhátíðardagurinn';//'National $holiday;[Day'
    //$holidays[strtotime(($year+$y).'-06-19')]='Kvenréttindadagurinn';
    //$holidays[strtotime(($year+$y).'-06-24')]='Jónsmessa';
    //$holidays[strtotime(($year+$y).'-10-24')]='Kvennafrídagurinn';//'Women\'s Day;$holidays[Off'
    //$holidays[strtotime(($year+$y).'-11-16')]='Dagur Íslenskrar Tungu'; //Day of $holiday;[the Icelandic strtotime(languag;
    //$holidays[strtotime(($year+$y).'-12-01')]='Fullveldisdagurinn';
    $holidays[strtotime(($year+$y).'-12-24')]='Aðfangadagur'; //'Christmas Eve';
    $holidays[strtotime(($year+$y).'-12-25')]='Jóladagur'; //'Christmas Day';
    $holidays[strtotime(($year+$y).'-12-26')]='Annar í jólum'; //'Day After $holidays;Christmas';
    $holidays[strtotime(($year+$y).'-12-31')]='Gamlársdagur'; // 'New Year\'s Eve';
    $holidays[$easter] = 'Páskadagur'; //'Easter';
    $holidays[strtotime('+1 days',$easter)] ='Annar í páskum';//'Easter Monday';
    $holidays[strtotime('-2 days',$easter)] ='Föstudagurinn langi';//'Good Friday';
    //$holidays[strtotime('-48 days',$easter)] ='Bolludagur';// Bun Da;
    //$holidays[strtotime('-47 days',$easter)] ='Sprengidagur';// Pancake Tuesda;
    //$holidays[strtotime('-46 days',$easter)] ='Öskudagur';// Ash Wednesda;
    $holidays[strtotime('-7 days',$easter)]='Pálmasunnudagur';//'Holy Thursday';
    $holidays[strtotime('-3 days',$easter)]='Skírdagur';//'Holy Thursday';
    $holidays[strtotime('+39 days',$easter)]='Uppstigningardagur';//'Ascension';
    $holidays[strtotime('+49 days',$easter)]='Hvítasunnudagur';//'Whit Sunday';
    $holidays[strtotime('+50 days',$easter)]='Annar í hvítasunnu';//'Whit Monday';
    //$holidays[strtotime('first sunday of '.($year+$y).'-06-01')]='Sjómannadagurinn';
    $holidays[strtotime('first monday of '.($year+$y).'-08-01')]='Verslunamanna';
    //$holidays[strtotime('second sunday of '.($year+$y).'-05-01')]='Mæðradagurinn';


	for($i=0;$i<365;$i++){
		//echo $i;
		$OIDate = new OldIcelandicDate(date('Y',$oi_date),date('n',$oi_date),date('j',$oi_date));
		// If this is the first of a new month, save it.
		if ((int)($OIDate->day) == 1){
			if ($OIDate->month == 6){
				$holidays[$oi_date] = "Sumardagurinn fyrsti";
			}
			if ($OIDate->month == 0){
				$holidays[$oi_date] = "Kjötsúpudagurinn";
			}
			if ($OIDate->month == 3){
				$holidays[$oi_date] = "Bóndadagur";
			}
			if ($OIDate->month == 4){
				$holidays[$oi_date] = "Konudagur";
			}
		}
		$oi_date = strtotime('+1 day',$oi_date);
	}

}


$last_modified_ymd = date("Ymd");
$last_modified_his = date("His");
foreach($holidays as $oim_date=>$name){
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