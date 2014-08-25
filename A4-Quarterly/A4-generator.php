<?php
date_default_timezone_set('Atlantic/Reykjavik');

$year = 2015;

echo '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';

echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1">';

// Print out the A4 sheet
echo '<rect x="0" y="0" width="297mm" height="210mm" style="fill:rgb(255,255,255);stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";

// Horrizontal Lines
for($i=1;$i<14;$i++){
	if ($i==1){
		$thickness = 2;
	} else {
		$thickness = .5;		
	}
	echo '<line x1="0" y1="'.($i*15).'mm" x2="297mm" y2="'.($i*15).'mm" style="stroke:rgb(0,0,0);stroke-width:'.$thickness.'"/>'."\n";
}

// days of week at the top
for($i=0;$i<4;$i++){
	echo '<text text-anchor="middle" y="8mm" x="'.(($i*74.25)+(3*10.6)+5.3).'mm" font-family="\'Futura-Medium\'" font-size="24">0'.$year.'Q'.($i+1).'</text>';
	echo '
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(0*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">m</text>
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(1*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">t</text>
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(2*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">w</text>
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(3*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">t</text>
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(4*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">f</text>
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(5*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">s</text>
	<text text-anchor="middle" y="14mm" x="'.(($i*74.25)+(6*10.6)+5.3).'mm" font-family="\'HelveticaNeue\'" font-size="9">s</text>
	';
}

// Vertical Lines
for($i=1;$i<28;$i++){
	if ($i==7 || $i==14 || $i==21){
		$thickness = 1;
		$height = 0;
	} else {
		$thickness = .5;		
		$height = 15;
	}
	
	echo '<line y1="'.$height.'mm" x1="'.($i*10.6).'mm" y2="210mm" x2="'.($i*10.6).'mm" style="stroke:rgb(0,0,0);stroke-width:'.$thickness.'"/>'."\n";
}

// Start adding days
$firstDay = strtotime($year.'-01-01');
$dayOfWeek = date('w',$firstDay);
$offset = 0;
// Week 1
if ($dayOfWeek == 1 || $dayOfWeek == 2 || $dayOfWeek == 3 || $dayOfWeek == 4){
	$offset = ($dayOfWeek-1);
  $firstDay = strtotime('- '.($dayOfWeek).' days',$firstDay);
} else {
	// Week 52/53
	$offset = (8-$dayOfWeek);
}
$counter = $offset;

for($quarter=0;$quarter<4;$quarter++){
	for($week=0;$week<13;$week++){
		for($day=0;$day<7;$day++){
			$dispDate = date('d',strtotime('+ '.$counter.' days',$firstDay));
			echo '<text text-anchor="start" y="'.(18+($week*15)).'mm" x="'.(($quarter*74.25)+($day*10.6)+2).'mm" font-family="\'HelveticaNeue\'" font-size="9">'.$dispDate.'</text>'."\n";
			
			if ($dispDate <= 7 && $dispDate <= date('N',strtotime('+ '.$counter.' days',$firstDay))){
				echo '<line y1="'.(($week*15)+15).'mm" x1="'.(($quarter*74.25)+(($day)*10.6)).'mm" y2="'.(($week*15)+15).'mm" x2="'.(($quarter*74.25)+(($day+1)*10.6)).'mm" style="stroke:rgb(0,0,0);stroke-width:2"/>'."\n";
			}

			
			if ($dispDate <= 7 && $dispDate >= date('N',strtotime('+ '.$counter.' days',$firstDay))){
				echo '<line y1="'.(($week*15)+15).'mm" x1="'.(($quarter*74.25)+(($day)*10.6)).'mm" y2="'.(($week*15)+15).'mm" x2="'.(($quarter*74.25)+(($day+1)*10.6)).'mm" style="stroke:rgb(0,0,0);stroke-width:2"/>'."\n";
			}
			

			$counter++;
			if ((int)$dispDate > date('d',strtotime('+ '.$counter.' days',$firstDay))){
				echo '<line y1="'.(($week*15)+15).'mm" x1="'.(($quarter*74.25)+(($day+1)*10.6)).'mm" y2="'.(($week*15)+30).'mm" x2="'.(($quarter*74.25)+(($day+1)*10.6)).'mm" style="stroke:rgb(0,0,0);stroke-width:2"/>'."\n";
			}

			
			
		}
	}
}


echo '</svg>';

?>
