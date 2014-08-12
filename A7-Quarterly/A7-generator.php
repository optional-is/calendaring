<?php
date_default_timezone_set('Atlantic/Reykjavik');

$year = 2015;
$quarter = 2;

echo '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';

echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="297mm" height="210mm" >';

// Print out the A4 sheet
echo '<rect x="0" y="0" width="297mm" height="210mm" style="fill:rgb(255,255,255);stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";

// Our 8 pages
// Front Page
$r = 1.37;
$offset_x = 7;
$offset_y = 7;
for ($i=0;$i<23;$i++){
	for ($j=0;$j<34;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x).'mm" cy="'.(($j*($r*2))+$offset_y).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>';
	}
}
for ($i=0;$i<22;$i++){
	for ($j=0;$j<33;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x+$r).'mm" cy="'.(($j*($r*2))+$offset_y+$r).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>';
	}
}

// Back Page
$r = 1.37;
$offset_x = 81.25;
$offset_y = 7;
for ($i=0;$i<23;$i++){
	for ($j=0;$j<34;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x).'mm" cy="'.(($j*($r*2))+$offset_y).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>';
	}
}
for ($i=0;$i<22;$i++){
	for ($j=0;$j<33;$j++){
		echo '<circle cx="'.(($i*($r*2))+$offset_x+$r).'mm" cy="'.(($j*($r*2))+$offset_y+$r).'mm" r="'.$r.'mm"  style="fill:none;stroke-width:.5;stroke:rgb(0,0,0)"/>';
	}
}

// Page 7
$offset_x = 155.5;
$offset_y = 7;
$offset   = 8.3;
for($i=0;$i<10;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(($i*$offset)+$offset_y).'mm" x2="'.($offset_x+60.25).'mm" y2="'.(($i*$offset)+$offset_y).'mm"/>';
}


// Page 6
$offset_x = (222.75);
$offset_y = 31.6;
$offset   = 8.6071428571;

echo '<text x="-290mm" y="-90mm" transform="rotate(180 0,0)" font-family="\'Futura-Medium\'" font-size="18">'.getMonthName(($quarter*3)).'</text>';
echo '<g transform="rotate(180 0,0)" >
	<text x="'.(-297+11.3035714286).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.(-297+19.9107142857).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.(-297+28.5178571429).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.(-297+37.125).'mm"         y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.(-297+45.7321428571).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.(-297+54.33928571435).'mm" y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.(-297+62.9464285714).'mm"  y="-80mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';
$offset_x = $offset_x+7;
for($i=0;$i<6;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(105-(($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.(105-(($i*$offset)+$offset_y)).'mm"/>';
}
for($i=0;$i<8;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.(($i*$offset)+$offset_x).'mm" y1="'.(105-($offset_y)).'mm" x2="'.(($i*$offset)+$offset_x).'mm" y2="'.(105-($offset_y+43)).'mm"/>';
}



// Page 2
echo '<text x="7mm" y="120mm" font-family="\'Futura-Medium\'" font-size="18">'.getMonthName(($quarter*3-2)).'</text>';
echo '<g>
	<text x="11.3035714286mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="19.9107142857mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="28.5178571429mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="37.125mm"         y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="45.7321428571mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="54.33928571435mm" y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="62.9464285714mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';
$offset_x = 7;
$offset_y = 134.1;
$offset   = 8.6071428571;
for($i=0;$i<6;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.((($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.((($i*$offset)+$offset_y)).'mm"/>';
}
for($i=0;$i<8;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.(($i*$offset)+$offset_x).'mm" y1="'.(($offset_y)).'mm" x2="'.(($i*$offset)+$offset_x).'mm" y2="'.(($offset_y+43)).'mm"/>';
}



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
	<text x="'.($offset_x+11.3035714286).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
	<text x="'.($offset_x+19.9107142857).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">m</text>
	<text x="'.($offset_x+28.5178571429).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+37.125).'mm"         y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">w</text>
	<text x="'.($offset_x+45.7321428571).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">t</text>
	<text x="'.($offset_x+54.33928571435).'mm" y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">f</text>
	<text x="'.($offset_x+62.9464285714).'mm"  y="130mm" fill="#939598" font-family="\'Futura-Medium\'" font-size="12">s</text>
</g>';
$offset_x = $offset_x+7;
for($i=0;$i<6;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.((($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.((($i*$offset)+$offset_y)).'mm"/>';
}
for($i=0;$i<8;$i++){
	echo '<line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="'.(($i*$offset)+$offset_x).'mm" y1="'.(($offset_y)).'mm" x2="'.(($i*$offset)+$offset_x).'mm" y2="'.(($offset_y+43)).'mm"/>';
}

// Page 5
$offset_x = 229.75;
$offset_y = 7;
$offset   = 8.3;
for($i=0;$i<10;$i++){
	echo '<line fill="none" stroke="#939598" stroke-width="0.25" stroke-miterlimit="10" x1="'.$offset_x.'mm" y1="'.(210-(($i*$offset)+$offset_y)).'mm" x2="'.($offset_x+60.25).'mm" y2="'.(210-(($i*$offset)+$offset_y)).'mm"/>';
}


echo '</svg>';

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