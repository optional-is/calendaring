<?php
date_default_timezone_set('Atlantic/Reykjavik');

$year = 2019;
$quarter = 4;

echo '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'."\n";

echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="297mm" height="210mm" >'."\n";

// Print out the A4 sheet

// Our 8 pages
// Front Page
$r = 1.37;
$offset_x = 7;
$offset_y = 7;
for ($i=0;$i<23;$i++){
	for ($j=0;$j<34;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x).'mm" cy="'.(($j*($r*2))+$offset_y).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}
for ($i=0;$i<22;$i++){
	for ($j=0;$j<33;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x+$r).'mm" cy="'.(($j*($r*2))+$offset_y+$r).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}

echo '<rect x="17.96mm" y="59.06mm" fill="#FFFFFF" stroke="#000000" stroke-width="0.5" width="38.36mm" height="27.4mm"/>'."\n";
echo '<text x="-53.5mm" y="-75mm" fill="#FFFFFF" stroke="#000000" stroke-width="0.5" transform="rotate(180 0,0)" font-family="\'Futura-Medium\'" font-size="25">'.$year.'Q'.$quarter.'</text>'."\n";


// Back Page
$r = 1.37;
$offset_x = 81.25;
$offset_y = 7;
for ($i=0;$i<23;$i++){
	for ($j=0;$j<34;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x).'mm" cy="'.(($j*($r*2))+$offset_y).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}
for ($i=0;$i<22;$i++){
	for ($j=0;$j<33;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x+$r).'mm" cy="'.(($j*($r*2))+$offset_y+$r).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";
	}
}

// Logo in box
echo '<rect x="94.95mm" y="13.85mm" fill="#FFFFFF" stroke="#000000" stroke-width="0.5" stroke-miterlimit="10" width="32.952mm" height="10.96mm"/>
<g>
	<path fill="#000000" d="M351.238,55.183c0,1.231-0.441,2.281-1.324,3.146c-0.881,0.865-1.957,1.298-3.225,1.298
		c-1.271,0-2.354-0.437-3.242-1.307c-0.877-0.87-1.314-1.939-1.314-3.207c0-1.279,0.441-2.352,1.322-3.216
		c0.889-0.859,1.979-1.288,3.27-1.288c1.277,0,2.352,0.438,3.217,1.314C350.804,52.788,351.238,53.874,351.238,55.183z
		 M349.22,55.148c0-0.854-0.227-1.528-0.682-2.025c-0.469-0.503-1.084-0.753-1.85-0.753c-0.771,0-1.387,0.248-1.85,0.745
		c-0.461,0.495-0.693,1.159-0.693,1.989c0,0.828,0.232,1.491,0.693,1.987c0.469,0.503,1.084,0.755,1.85,0.755
		c0.754,0,1.365-0.252,1.83-0.755C348.988,56.591,349.22,55.942,349.22,55.148z"/>
	<path fill="#000000" d="M339.197,46.209h1.973v13.18h-1.973v-0.93c-0.777,0.778-1.658,1.167-2.646,1.167
		c-1.174,0-2.141-0.433-2.9-1.298c-0.771-0.858-1.156-1.942-1.156-3.251c0-1.278,0.381-2.345,1.148-3.198
		c0.758-0.848,1.717-1.271,2.873-1.271c0.998,0,1.893,0.4,2.682,1.201V46.209z M334.507,55.068c0,0.818,0.225,1.483,0.666,1.998
		c0.451,0.521,1.018,0.78,1.701,0.78c0.725,0,1.312-0.252,1.762-0.755c0.449-0.501,0.674-1.161,0.674-1.979
		c0-0.8-0.225-1.461-0.674-1.981c-0.443-0.507-1.027-0.761-1.754-0.761c-0.684,0-1.246,0.256-1.691,0.771
		C334.736,53.654,334.507,54.298,334.507,55.068z"/>
	<path fill="#000000" d="M329.115,57.55v-6.695h1.971v6.695h0.842v1.839h-0.842v3.128h-1.971v-3.128h-0.861V57.55H329.115z"/>
	<path fill="#000000" d="M327.435,62.489c0,0.345-0.125,0.643-0.377,0.894c-0.252,0.25-0.553,0.377-0.902,0.377
		c-0.357,0-0.66-0.127-0.912-0.377c-0.252-0.245-0.377-0.547-0.377-0.902c0-0.357,0.125-0.66,0.377-0.912
		c0.246-0.25,0.547-0.377,0.904-0.377c0.355,0,0.658,0.127,0.91,0.377C327.31,61.82,327.435,62.127,327.435,62.489z M325.166,59.389
		v-8.534h1.973v8.534H325.166z"/>
	<path fill="#000000" d="M324.193,55.183c0,1.231-0.441,2.281-1.322,3.146c-0.883,0.865-1.957,1.298-3.227,1.298
		c-1.273,0-2.354-0.437-3.24-1.307c-0.879-0.87-1.316-1.939-1.316-3.207c0-1.279,0.441-2.352,1.324-3.216
		c0.887-0.859,1.977-1.288,3.27-1.288c1.277,0,2.352,0.438,3.215,1.314C323.761,52.788,324.193,53.874,324.193,55.183z
		 M322.177,55.148c0-0.854-0.229-1.528-0.684-2.025c-0.467-0.503-1.084-0.753-1.85-0.753c-0.77,0-1.387,0.248-1.848,0.745
		c-0.463,0.495-0.691,1.159-0.691,1.989c0,0.828,0.229,1.491,0.691,1.987c0.467,0.503,1.084,0.755,1.848,0.755
		c0.756,0,1.365-0.252,1.832-0.755C321.943,56.591,322.177,55.942,322.177,55.148z"/>
	<path fill="#000000" d="M314.125,59.389h-1.98V58.6c-0.689,0.684-1.467,1.026-2.332,1.026c-0.992,0-1.766-0.313-2.32-0.938
		c-0.48-0.533-0.721-1.4-0.721-2.604v-5.23h1.982v4.761c0,0.84,0.117,1.42,0.35,1.74c0.229,0.327,0.643,0.491,1.244,0.491
		c0.654,0,1.119-0.216,1.395-0.647c0.268-0.426,0.402-1.17,0.402-2.232v-4.112h1.98V59.389z"/>
	<path fill="#000000" d="M299.115,59.389h-1.98v-8.534h1.98v0.894c0.812-0.761,1.684-1.14,2.619-1.14c1.18,0,2.154,0.427,2.926,1.28
		c0.768,0.869,1.148,1.956,1.148,3.26c0,1.278-0.381,2.344-1.148,3.197c-0.764,0.853-1.723,1.28-2.873,1.28
		c-0.994,0-1.885-0.41-2.672-1.227V59.389z M303.794,55.148c0-0.819-0.221-1.484-0.658-1.999c-0.449-0.52-1.018-0.779-1.699-0.779
		c-0.732,0-1.322,0.25-1.771,0.753c-0.449,0.52-0.674,1.181-0.674,1.981c0,0.8,0.225,1.46,0.674,1.979
		c0.449,0.509,1.033,0.763,1.754,0.763c0.678,0,1.242-0.257,1.699-0.771C303.568,56.555,303.794,55.913,303.794,55.148z"/>
	<path fill="#000000" d="M293.794,62.515v-11.66h1.971v11.66H293.794z"/>
	<path fill="#000000" d="M292.785,52.06c0,0.326-0.119,0.609-0.357,0.85c-0.24,0.239-0.527,0.36-0.861,0.36
		c-0.332,0-0.617-0.121-0.857-0.36c-0.24-0.24-0.359-0.525-0.359-0.858c0-0.339,0.119-0.628,0.359-0.867
		c0.234-0.234,0.521-0.352,0.857-0.352c0.346,0,0.635,0.117,0.869,0.352C292.667,51.417,292.785,51.708,292.785,52.06z"/>
	<path fill="#000000" d="M289.646,62.489c0,0.345-0.125,0.643-0.377,0.894c-0.25,0.25-0.551,0.377-0.902,0.377
		c-0.355,0-0.66-0.127-0.91-0.377c-0.252-0.245-0.377-0.547-0.377-0.902c0-0.357,0.125-0.66,0.377-0.912
		c0.244-0.25,0.545-0.377,0.9-0.377c0.357,0,0.662,0.127,0.912,0.377C289.521,61.82,289.646,62.127,289.646,62.489z M287.376,59.389
		v-8.534h1.973v8.534H287.376z"/>
	<path fill="#000000" d="M280.818,57.934l1.629-0.867c0.256,0.521,0.576,0.78,0.955,0.78c0.182,0,0.336-0.061,0.465-0.18
		c0.129-0.12,0.191-0.273,0.191-0.46c0-0.326-0.379-0.649-1.137-0.972c-1.047-0.447-1.752-0.863-2.113-1.242
		c-0.361-0.38-0.543-0.89-0.543-1.531c0-0.823,0.305-1.511,0.91-2.065c0.59-0.525,1.303-0.788,2.139-0.788
		c1.432,0,2.445,0.698,3.041,2.095l-1.684,0.779c-0.232-0.409-0.41-0.668-0.533-0.779c-0.24-0.223-0.525-0.333-0.859-0.333
		c-0.666,0-0.998,0.304-0.998,0.912c0,0.349,0.256,0.675,0.771,0.98c0.197,0.099,0.396,0.195,0.594,0.289
		c0.201,0.093,0.402,0.189,0.605,0.289c0.574,0.28,0.977,0.562,1.209,0.841c0.299,0.356,0.447,0.815,0.447,1.376
		c0,0.742-0.254,1.355-0.762,1.841c-0.521,0.483-1.15,0.728-1.895,0.728C282.162,59.626,281.349,59.062,280.818,57.934z"/>
	<path fill="#000000" d="M353.701,62.367l-1.369-0.525c0.479-1.145,0.812-2.201,1.006-3.168c0.096-0.49,0.17-1.007,0.217-1.548
		c0.049-0.542,0.074-1.132,0.074-1.771c0-0.644-0.025-1.237-0.074-1.777c-0.047-0.542-0.121-1.058-0.217-1.549
		c-0.188-0.964-0.521-2.017-1.006-3.161l1.369-0.525c0.959,2.003,1.438,4.34,1.438,7.013
		C355.138,58.026,354.66,60.364,353.701,62.367z"/>
	<path fill="#000000" d="M278,48.293l1.367,0.526c-0.482,1.143-0.816,2.197-1.006,3.162c-0.197,0.963-0.295,2.071-0.295,3.323
		c0,1.245,0.098,2.352,0.295,3.319c0.193,0.97,0.529,2.024,1.006,3.169L278,62.318c-0.956-2.002-1.432-4.341-1.432-7.014
		C276.567,52.633,277.044,50.296,278,48.293z"/>
</g>';


// Page 7
$offset_x = 155.5;
$offset_y = 7;
$offset   = 8.3;
for($i=0;$i<10;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(($i*$offset)+$offset_y).'mm" x2="'.($offset_x+60.25).'mm" y2="'.(($i*$offset)+$offset_y).'mm"/>'."\n";
}


// Page 6
$offset_x = (222.75);
$offset_y = 31.6;
$offset   = 8.6071428571;

echo '<text x="-290mm" y="-90mm" transform="rotate(180 0,0)" font-family="\'Futura-Medium\'" font-size="18">'.getMonthName(($quarter*3)).'</text>';
echo '<g transform="rotate(180 0,0)" >
	<text x="'.(-297+11.3035714286).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.(-297+19.9107142857).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.(-297+28.5178571429).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.(-297+37.125).'mm"         y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.(-297+45.7321428571).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.(-297+54.33928571435).'mm" y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.(-297+62.9464285714).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';



echo makeMonth($year,($quarter*3));




// Page 2
echo '<text x="7mm" y="120mm" font-family="\'Futura-Medium\'" font-size="18">'.getMonthName(($quarter*3-2)).'</text>';
echo '<g>
	<text x="11.3035714286mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="19.9107142857mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="28.5178571429mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="37.125mm"         y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="45.7321428571mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="54.33928571435mm" y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="62.9464285714mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';


echo makeMonth($year,($quarter*3-2));
/*
$offset_x = 7;
$offset_y = 134.1;
$offset   = 8.6071428571;
for($i=0;$i<6;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.((($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.((($i*$offset)+$offset_y)).'mm"/>'."\n";
}
for($i=0;$i<8;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.(($i*$offset)+$offset_x).'mm" y1="'.(($offset_y)).'mm" x2="'.(($i*$offset)+$offset_x).'mm" y2="'.(($offset_y+43)).'mm"/>'."\n";
}
*/

// Page 3
$offset_x = 81.25;
$offset_y = 7;
$offset   = 8.6071428571;
for($i=0;$i<10;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(210-(($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.(210-(($i*$offset)+$offset_y)).'mm"/>';
}
// Page 4
$offset_x = (148.5);
$offset_y = 134.1;
$offset   = 8.6071428571;

echo '<text x="'.($offset_x+7).'mm" y="120mm" font-family="\'Futura-Medium\'" font-size="18">'.getMonthName(($quarter*3-1)).'</text>';
echo '<g>
	<text x="'.($offset_x+11.3035714286).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.($offset_x+19.9107142857).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+28.5178571429).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.($offset_x+37.125).'mm"         y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+45.7321428571).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.($offset_x+54.33928571435).'mm" y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.($offset_x+62.9464285714).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';

echo makeMonth($year,($quarter*3-1));


// Page 5
$offset_x = 229.75;
$offset_y = 7;
$offset   = 8.6071428571;
for($i=0;$i<10;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(210-(($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.(210-(($i*$offset)+$offset_y)).'mm"/>'."\n";
}


echo '</svg>';

function makeMonth($year,$month_number){
	$svg = '';
	$current_month = strtotime($year.'-'.$month_number.'-01');
	$first_day = date('w',$current_month)-1;
	$days_in_month = date('t',$current_month);
	
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
	
	if ($month_number == 1 || $month_number == 4 || $month_number == 7 || $month_number == 10){
		$offset_x = 7;
		$offset_y = 134.1;
		$offset_dot = 2;
	} elseif ($month_number == 2 || $month_number == 5 || $month_number == 8 || $month_number == 11){
		$offset_x = 155.5;
		$offset_y = 134.1;
	} else {
		$offset_x = 7;
		$offset_y = 134.1;
		$offset_dot = 2;
		/*
		$offset_x = (222.75+7);
		$offset_y = 31.6;
		$offset_dot = ($box_size-$offset_dot);
		*/
		$inverted = true;
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
	if ($month_number != date('n',$date_time)){  $line_color = '#939598'; }

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

function getMonthName($month_number){
	switch($month_number){
		case 1:  return 'January'; break;
		case 2:  return 'February'; break;
		case 3:  return 'March'; break;
		case 4:  return 'April'; break;
		case 5:  return 'May'; break;
		case 6:  return 'June'; break;
		case 7:  return 'July'; break;
		case 8:  return 'August'; break;
		case 9:  return 'September'; break;
		case 10: return 'October'; break;
		case 11: return 'November'; break;
		case 12: return 'December'; break;
		default: return '???'; break;
	}
}

?>
