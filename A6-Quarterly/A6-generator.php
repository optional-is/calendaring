<?php
date_default_timezone_set('Atlantic/Reykjavik');

$year = 2016;

echo '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'."\n";

echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="420mm" height="297mm" >'."\n";

// Print out the A4 sheet

// Our 8 pages
// Front Page
$r = 1.37;
$offset_x = 7;
$offset_y = 7;
for ($i=0;$i<34;$i++){
	for ($j=0;$j<50;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x).'mm" cy="'.(($j*($r*2))+$offset_y).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}
for ($i=0;$i<33;$i++){
	for ($j=0;$j<49;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x+$r).'mm" cy="'.(($j*($r*2))+$offset_y+$r).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}

//echo '<rect x="17.96mm" y="59.06mm" fill="#FFFFFF" stroke="#000000" stroke-width="0.5" width="38.36mm" height="27.4mm"/>'."\n";
//echo '<text x="-53.5mm" y="-75mm" fill="#FFFFFF" stroke="#000000" stroke-width="0.5" transform="rotate(180 0,0)" font-family="\'Futura-Medium\'" font-size="25">'.$year.'</text>'."\n";


// Back Page
$r = 1.37;
$offset_x = 112;
$offset_y = 7;
for ($i=0;$i<34;$i++){
	for ($j=0;$j<50;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x).'mm" cy="'.(($j*($r*2))+$offset_y).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}
for ($i=0;$i<33;$i++){
	for ($j=0;$j<49;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x+$r).'mm" cy="'.(($j*($r*2))+$offset_y+$r).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}


// Page 7
$offset_x = 217;
$offset_y = 7;
$offset   = 8.3;
for($i=0;$i<17;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(($i*$offset)+$offset_y).'mm" x2="'.($offset_x+91).'mm" y2="'.(($i*$offset)+$offset_y).'mm"/>'."\n";
}

// Page 6
$offset_x = 322;
$offset_y = 7;
$offset   = 8.3;
for($i=0;$i<17;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(($i*$offset)+$offset_y).'mm" x2="'.($offset_x+91).'mm" y2="'.(($i*$offset)+$offset_y).'mm"/>'."\n";
}


$offset_x = 7;
// Page 2
echo '<text x="'.($offset_x+7).'mm" y="156.5mm" font-family="\'Futura-Medium\'" font-size="18">Q1</text>';
echo '<g>
	<text x="'.($offset_x+11.3035714286).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.($offset_x+19.9107142857).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+28.5178571429).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.($offset_x+37.125).'mm"         y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+45.7321428571).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.($offset_x+54.33928571435).'mm" y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.($offset_x+62.9464285714).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';


echo makeQuarter($year,1);

// Page 3
$offset_x = 112;
$offset_y = 297;
$offset   = 8.6071428571;

echo '<text x="'.($offset_x+7).'mm" y="156.5mm" font-family="\'Futura-Medium\'" font-size="18">Q2</text>';
echo '<g>
	<text x="'.($offset_x+11.3035714286).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.($offset_x+19.9107142857).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+28.5178571429).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.($offset_x+37.125).'mm"         y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+45.7321428571).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.($offset_x+54.33928571435).'mm" y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.($offset_x+62.9464285714).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';

echo makeQuarter($year,4);

// Page 4
$offset_x = 217;
$offset_y = 297;
$offset   = 8.6071428571;

echo '<text x="'.($offset_x+7).'mm" y="156.5mm" font-family="\'Futura-Medium\'" font-size="18">Q3</text>';
echo '<g>
	<text x="'.($offset_x+11.3035714286).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.($offset_x+19.9107142857).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+28.5178571429).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.($offset_x+37.125).'mm"         y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+45.7321428571).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.($offset_x+54.33928571435).'mm" y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.($offset_x+62.9464285714).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';

echo makeQuarter($year,7);


// Page 5
$offset_x = 322;
$offset_y = 297;
$offset   = 8.6071428571;

echo '<text x="'.($offset_x+7).'mm" y="156.5mm" font-family="\'Futura-Medium\'" font-size="18">Q4</text>';
echo '<g>
	<text x="'.($offset_x+11.3035714286).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.($offset_x+19.9107142857).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+28.5178571429).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.($offset_x+37.125).'mm"         y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+45.7321428571).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.($offset_x+54.33928571435).'mm" y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.($offset_x+62.9464285714).'mm"  y="163.5mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';

echo makeQuarter($year,10);

echo '</svg>';

function makeQuarter($year,$month_number){
	$svg = '';
	$current_month = strtotime($year.'-'.$month_number.'-01');
	$first_day = date('w',$current_month)-1;
	$days_in_month = date('t',$current_month);
	
	$current_month = strtotime($year.'-'.($month_number+1).'-01');
	$days_in_month += date('t',$current_month);
	$current_month = strtotime($year.'-'.($month_number+2).'-01');
	$days_in_month += date('t',$current_month);
	
	$current_month = strtotime($year.'-'.$month_number.'-01');
	
	$pad_days = 0 - $first_day;
	$total_days = abs($pad_days) + $days_in_month;
	$total_weeks = ceil($total_days/7);
	$max_days = $total_weeks*7;
	
	$start_week = strtotime('-'.$first_day.' days',$current_month);
	
	for($i=0;$i<$max_days;$i++){
		$svg .= makeBox($month_number,$i,$start_week);
		$start_week += 24*60*60;
	}
	
	
	return $svg;
}

function makeBox($month_number, $count, $date_time){
	$svg = '';
	$day_number   = date('j',$date_time);
	$box_size   = 8.6071428571;
	
	$counter_x = ($count%7);
	$counter_y = floor($count/7);
	
	$offset_dot = 2;
	$inverted = false;
	
	if ($month_number == 1 ){
		$offset_x = 16;
		$offset_y = 168;
		$offset_dot = 2;
	} elseif ($month_number == 4 ){
		$offset_x = 121;
		$offset_y = 168;
	} elseif ($month_number == 7 ){
		$offset_x = 226;
		$offset_y = 168;
	} else {
		$offset_x = 331;
		$offset_y = 168;
		$offset_dot = 2;

	}
	
	if ($inverted){
		$svg .= '<g transform="rotate(180 0,0) translate(-843mm,-589mm)">';
	} else {
		$svg .= '<g>';
	}
	$day_of_week = date('w',$date_time);
	$line_color = false;
	// Weekend Check
	if ($day_of_week == 0 || $day_of_week == 6){ $line_color = '#DCDDDE'; }
	// Other Month Check
	if (!in_array(date('n',$date_time),array($month_number,($month_number+1),($month_number+2)))){  $line_color = '#939598'; }

	// Lines and dot for weekends and other months
	if ($line_color != false){
		for($i=1;$i<8;$i++){
			$svg .= '<line x1="'.($offset_x+($counter_x*$box_size)+(($box_size/8)*$i)).'mm" y1="'.($offset_y+($counter_y*$box_size)).'mm" x2="'.($offset_x+($counter_x*$box_size)+$box_size).'mm" y2="'.($offset_y+($counter_y*$box_size)+$box_size-(($box_size/8)*$i)).'mm" stroke="'.$line_color.'" stroke-width="0.25" stroke-miterlimit="10"  />'."\n";
		}
		$svg .= '<line x1="'.($offset_x+($counter_x*$box_size)).'mm" y1="'.($offset_y+($counter_y*$box_size)).'mm" x2="'.($offset_x+($counter_x*$box_size)+$box_size).'mm" y2="'.($offset_y+($counter_y*$box_size)+$box_size).'mm" stroke="'.$line_color.'" stroke-width="0.25" stroke-miterlimit="10"  />'."\n";
		for($i=1;$i<8;$i++){
			$svg .= '<line x1="'.($offset_x+($counter_x*$box_size)).'mm" y1="'.($offset_y+($counter_y*$box_size)+(($box_size/8)*$i)).'mm" x2="'.($offset_x+($counter_x*$box_size)+$box_size-(($box_size/8)*$i)).'mm" y2="'.($offset_y+($counter_y*$box_size)+$box_size).'mm" stroke="'.$line_color.'" stroke-width="0.25" stroke-miterlimit="10"  />'."\n";
		}
		$svg .= '<circle cx="'.($offset_x+($counter_x*$box_size)+$offset_dot).'mm" cy="'.($offset_y+($counter_y*$box_size)+$offset_dot).'mm" r="1.442mm" fill="#FFFFFF" stroke="none" stroke-miterlimit="10" />'."\n";
	}
	
	// day number
	$x_text_offset = .6;
	if ($day_number < 10){ $x_text_offset = .3; }
	$svg .= '<text x="'.($offset_x+($counter_x*$box_size)+$offset_dot-($offset_dot*$x_text_offset)).'mm"  y="'.($offset_y+($counter_y*$box_size)+$offset_dot+($offset_dot*.4)).'mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="6">'.$day_number.'</text>'."\n";
	
	// Box to hide edges
	$svg .= '<rect x="'.($offset_x+($counter_x*$box_size)).'mm" y="'.($offset_y+($counter_y*$box_size)).'mm" fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" width="'.$box_size.'mm" height="'.$box_size.'mm"/>'."\n";
	
	$svg .= '</g>';
	
	return $svg;
}

?>
