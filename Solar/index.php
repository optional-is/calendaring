<?php
	include('../solar.php');

	function map_colors($type){
		switch($type){
			case 'sunrise': return '#cccccc'; break;
			case 'sunset': return 'white'; break;
			case 'civil dawn':  return '#999999'; break;
			case 'civil dusk': return '#cccccc'; break;
			case 'nautical dawn':  return '#333333'; break;
			case 'nautical dusk': return '#999999'; break;
			case 'astronomical dawn':  return 'black'; break;
			case 'astronomical dusk': return '#333333'; break;
			case 'night': return 'black'; break;
		}
	}
	$year = date('Y');
	$days = 365;
	if (isLeapYear($year)){
		$days = 366;
	}
	//$days = 30;

	$events = array();
	$start_date = strtotime($year.'-01-01');

	for($i=0;$i<$days;$i++){
	    $date = $start_date;
	    $date += 60*60*24*$i;
	    $solar = calculate($date);

	    //print(date('Y-m-d',$date)."\n");
	    //print_r($solar);
	    foreach($solar as $k=>$e){
	    	switch($k){
	    		case '+90.833':
	    		$events[$e] = 'sunrise';
	    		break;
	    		case '-90.833':
	    		$events[$e] = 'sunset';
	    		break;
	    		case '+96':
	    		$events[$e] = 'civil dawn';
	    		break;
	    		case '-96':
	    		$events[$e] = 'civil dusk';
	    		break;
	    		case '+102':
	    		$events[$e] = 'nautical dawn';
	    		break;
	    		case '-102':
	    		$events[$e] = 'nautical dusk';
	    		break;
	    		case '+108':
	    		$events[$e] = 'astronomical dawn';
	    		break;
	    		case '-108':
	    		$events[$e] = 'astronomical dusk';
	    		break;
	    	}
	    }
	}
	ksort($events);

	echo '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';

	echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="841mm" height="1189mm">';

// Print out the A0 sheet
	echo '<rect x="0" y="0" width="841mm" height="1189mm" style="fill:rgb(255,255,255);stroke-width:.5;stroke:rgb(0,0,0)"/>'."\n";

	$squish = 0.82;
	$prev_day = 0;
	$thickness = 1;
	$prev_row = 0;
	$prev_col = 0;

	$keys = array_keys($events);
	//print_r($events);

	for($i=0;$i<count($keys);$i++){
		$k = $keys[$i];
		$v = $events[$keys[$i]];
		$parts = explode('T',$k);
		$doy = date('z',strtotime($parts[0]));
		if ($prev_col != $doy){
			$height = (23*60+59) - $prev_row;
			echo '<!-- night -->'."\n";
			echo '<rect x="'.$prev_col.'mm" y="'.($prev_row*$squish).'mm" width="1mm" height="'.($height*$squish).'mm" style="fill:'.map_colors('night').';"/>'."\n";

			$prev_col = $doy;
			$prev_row = 0;
		}



		$hm = explode(':',$parts[1]);
		$vertical = ($hm[0]*60)+$hm[1];
		$height = $vertical - $prev_row;

		/*
		if ($i != (count($keys)-1)){
			$kk = $keys[$i+1];
			$vv = $events[$keys[$i+1]];
			$parts = explode('T',$kk);
			$doydoy = date('z',strtotime($parts[0]));
			$hmhm = explode(':',$parts[1]);
			$to_vertical = ($hmhm[0]*60)+$hmhm[1];

			$height = $to_vertical - $vertical;
		}
		*/
		echo '<!-- '.$v.' -->'."\n";
		echo '<rect x="'.$doy.'mm" y="'.($prev_row*$squish).'mm" width="1mm" height="'.($height*$squish).'mm" style="fill:'.map_colors($v).';"/>'."\n";
		$prev_row = $vertical;
	}
	/*
	exit();
	for($i=0;$i<$days;$i++){		
	    $date = strtotime($year.'-01-01');
	    $date += 60*60*24*$i;
	    $solar = calculate($date);
	    //print_r($solar);
	    $rise = $solar[0][0];
	    $parts = explode(':',$rise);
	    $rise_sec = ($parts[0]*60)+$parts[1];

	    $rise_astro = $solar[0][3];
	    $parts = explode(':',$rise_astro);
	    $rise_astro_sec = ($parts[0]*60)+$parts[1];

	    $rise_naut = $solar[0][2];
	    $parts = explode(':',$rise_naut);
	    $rise_naut_sec = ($parts[0]*60)+$parts[1];

	    $rise_civil = $solar[0][1];
	    $parts = explode(':',$rise_civil);
	    $rise_civil_sec = ($parts[0]*60)+$parts[1];

	    $set = $solar[1][0];
	    $parts = explode(':',$set);
	    if (substr($parts[0],0,1) == '+'){
		    $set_sec = (23*60)+59;
	    } else {
		    $set_sec = ($parts[0]*60)+$parts[1];	
	    }

	    echo '<rect x="'.$i.'mm" y="'.($prev_day*$squish).'mm" width="1mm" height="'.($rise_sec*$squish).'mm" style="fill:rgb(210,210,210);"/>'."\n";
	    echo '<rect x="'.$i.'mm" y="'.($prev_day*$squish).'mm" width="1mm" height="'.($rise_civil_sec*$squish).'mm" style="fill:rgb(60,60,60);"/>'."\n";
	    echo '<rect x="'.$i.'mm" y="'.($prev_day*$squish).'mm" width="1mm" height="'.($rise_naut_sec*$squish).'mm" style="fill:rgb(30,30,30);"/>'."\n";
	   	echo '<rect x="'.$i.'mm" y="'.($prev_day*$squish).'mm" width="1mm" height="'.($rise_astro_sec*$squish).'mm" style="fill:rgb(0,0,0);"/>'."\n";


	    echo '<rect x="'.$i.'mm" y="'.($set_sec*$squish).'mm" width="1mm" height="'.((1439-$set_sec)*$squish).'mm" style="fill:rgb(210,210,210);"/>'."\n";

	    // so we account for setting the day after
	    if (substr($parts[0],0,1) == '+'){
	    	$prev_day = $parts[1];
	    } else {
	    	$prev_day = 0;
	    }

	}
	*/
	// hour lines
	for($i=0;$i<25;$i++){
		// Horizontal line
		$hour = $squish * ($i*60);
		echo '<line x1="0mm" y1="'.$hour.'mm" x2="370mm" y2="'.$hour.'mm" style="stroke:rgb(0,0,0);stroke-width:'.$thickness.'"/>'."\n";

	}

	echo '</svg>';
?>