<?php
	function getTime($sunDate) {        
        return date('H:i',$sunDate);
    }
    
    function calcTimeJulianCent($jd) {
        return ($jd - 2451545.0)/36525.0;
    }
    
    function calcJDFromJulianCent($t)  {
        return  $t * 36525.0 + 2451545.0;
    }
    
    function isLeapYear($yr) {
        return (($yr % 4 == 0 && $yr % 100 != 0) || $yr % 400 == 0);
    }
    
    function radToDeg($angleRad) {
        return (180.0 * $angleRad / pi());
    }
    
    function degToRad($angleDeg) {
        return (pi() * $angleDeg / 180.0);
    }
    
    function calcGeomMeanAnomalySun($t) {
        return 357.52911 + $t * (35999.05029 - 0.0001537 * $t); // in degrees
    }
    
    function calcEccentricityEarthOrbit($t) {
        return 0.016708634 - $t * (0.000042037 + 0.0000001267 * $t); // unitless
    }
    
    function calcGeomMeanLongSun($t) {
        $L0 = 280.46646 + $t * (36000.76983 + $t*(0.0003032));
        while($L0 > 360.0)
        {
            $L0 -= 360.0;
        }
        while($L0 < 0.0)
        {
            $L0 += 360.0;
        }
        return $L0;        // in degrees
    }
    
    function calcSunEqOfCenter($t) {
        $m = calcGeomMeanAnomalySun($t);
        $mrad = degToRad($m);
        $sinm = sin($mrad);
        $sin2m = sin($mrad+$mrad);
        $sin3m = sin($mrad+$mrad+$mrad);
        $C = $sinm * (1.914602 - $t * (0.004817 + 0.000014 * $t)) + $sin2m * (0.019993 - 0.000101 * $t) + $sin3m * 0.000289;
        return $C;        // in degrees
    }
    
    function calcSunTrueLong($t) {
        $l0 = calcGeomMeanLongSun($t);
        $c = calcSunEqOfCenter($t);
        $O = $l0 + $c;
        return $O;        // in degrees
    }
    
    function calcSunTrueAnomaly($t){
        $m = calcGeomMeanAnomalySun($t);
        $c = calcSunEqOfCenter($t);
        $v = $m + $c;
        return $v;        // in degrees
    }
    
    function calcSunRadVector($t) {
        $v = calcSunTrueAnomaly($t);
        $e = calcEccentricityEarthOrbit($t);
        $R = (1.000001018 * (1 - $e * $e)) / (1 + $e * cos(degToRad($v)));
        return $R;        // in AUs
    }
    
    function calcSunApparentLong($t) {
        $o = calcSunTrueLong($t);
        $omega = 125.04 - 1934.136 * $t;
        $lambda = $o - 0.00569 - 0.00478 * sin(degToRad($omega));
        return $lambda;        // in degrees
    }
    
    function calcMeanObliquityOfEcliptic($t) {
        $seconds = 21.448 - $t*(46.8150 + $t*(0.00059 - $t*(0.001813)));
        $e0 = 23.0 + (26.0 + ($seconds/60.0))/60.0;
        return $e0;        // in degrees
    }
    
    function calcObliquityCorrection($t) {
        $e0 = calcMeanObliquityOfEcliptic($t);
        $omega = 125.04 - 1934.136 * $t;
        $e = $e0 + 0.00256 * cos(degToRad($omega));
        return $e;        // in degrees
    }
    
    function calcSunRtAscension($t) {
        $e = calcObliquityCorrection($t);
        $lambda = calcSunApparentLong($t);
        $tananum = (cos(degToRad($e)) * sin(degToRad($lambda)));
        $tanadenom = (cos(degToRad($lambda)));
        $alpha = radToDeg(atan2($tananum, $tanadenom));
        return $alpha;        // in degrees
    }
    
    function calcSunDeclination($t) {
        $e = calcObliquityCorrection($t);
        $lambda = calcSunApparentLong($t);
        $sint = sin(degToRad($e)) * sin(degToRad($lambda));
        $theta = radToDeg(asin($sint));
        return $theta;        // in degrees
    }
    
    function calcEquationOfTime($t) {
        $epsilon = calcObliquityCorrection($t);
        $l0 = calcGeomMeanLongSun($t);
        $e = calcEccentricityEarthOrbit($t);
        $m = calcGeomMeanAnomalySun($t);
    
        $y = tan(degToRad($epsilon)/2.0);
        $y *= $y;
    
        $sin2l0 = sin(2.0 * degToRad($l0));
        $sinm   = sin(degToRad($m));
        $cos2l0 = cos(2.0 * degToRad($l0));
        $sin4l0 = sin(4.0 * degToRad($l0));
        $sin2m  = sin(2.0 * degToRad($m));
    
        $Etime = $y * $sin2l0 - 2.0 * $e * $sinm + 4.0 * $e * $y * $sinm * $cos2l0 - 0.5 * $y * $y * $sin4l0 - 1.25 * $e * $e * $sin2m;
        return radToDeg($Etime)*4.0;    // in minutes of time
    }
    
    function calcHourAngleSunrise($h, $lat, $solarDec) {
        $latRad = degToRad($lat);
        $sdRad  = degToRad($solarDec);
        //print('h: '.$h.' solarDec: '.$solarDec.' sdRad: '.$sdRad."\n");

        $HAarg = (cos(degToRad($h))/(cos($latRad)*cos($sdRad))-tan($latRad) * tan($sdRad));

        $HA = acos($HAarg);

        return $HA;        // in radians (for sunset, use -HA)
    }


    function calcSunriseSetUTC($rise, $angle, $JD, $latitude, $longitude) {
        $t = calcTimeJulianCent($JD);
        $eqTime = calcEquationOfTime($t);
        $solarDec = calcSunDeclination($t);
        $hourAngle = calcHourAngleSunrise($angle, $latitude, $solarDec);
        /*
        +0 - 6  Civil Twilight
        +6 - 12 Nautical Twilight
        +12 - 18 Astronomical Twilight
        +18 Night
        */
        //$Civil = calcHourAngleSunrise(96.833, $latitude, $solarDec);
        //$Nautical = calcHourAngleSunrise(102.833, $latitude, $solarDec);
        //$Astronomical = calcHourAngleSunrise(108.833, $latitude, $solarDec);


        //alert("HA = " + radToDeg(hourAngle));
        if (!$rise) {
            $hourAngle = -$hourAngle;
            //$Civil = -$Civil;
            //$Nautical = -$Nautical;
            //$Astronomical = -$Astronomical;
        }


        $delta = $longitude + radToDeg($hourAngle);
        $time = (720 - (4.0 * $delta) - $eqTime);    // in minutes

        //$delta = $longitude + radToDeg($Civil);
        //$times[] = (720 - (4.0 * $delta) - $eqTime);    // in minutes
//
        //$delta = $longitude + radToDeg($Nautical);
        //$times[] = (720 - (4.0 * $delta) - $eqTime);    // in minutes
//
        //$delta = $longitude + radToDeg($Astronomical);
        //$times[] = (720 - (4.0 * $delta) - $eqTime);    // in minutes

        return $time;
    }
    
    function timeString($minutes, $flag)
        // timeString returns a zero-padded string (HH:MM:SS) given time in minutes
        // flag=2 for HH:MM, 3 for HH:MM:SS
    {
        $output = "";
        if ($minutes > 1440) {
        	$minutes = $minutes - 1440;
        	$output = "+1 day ";
        }
        $floatHour = $minutes / 60.0;
        $hour = floor($floatHour);
        $floatMinute = 60.0 * ($floatHour - floor($floatHour));
        $minute = floor($floatMinute);
        $floatSec = 60.0 * ($floatMinute - floor($floatMinute));
        $second = floor($floatSec + 0.5);
        if ($second > 59) {
            $second = 0;
            $minute += 1;
        }
        if (($flag == 2) && ($second >= 30)) {
            $minute+=1;
        }
        if ($minute > 59) {
            $minute = 0;
            $hour += 1;
        }
        $output = $output . str_pad($hour,2,"0",STR_PAD_LEFT) . ":" . str_pad($minute,2,"0",STR_PAD_LEFT);
        if ($flag > 2) {$output = $output . ":" . str_pad($second,2,"0",STR_PAD_LEFT);}
        
        return $output;
    }
    
    function calcSunriseSet($rise, $angle, $JD, $latitude, $longitude, $timezone, $dst) {
        // rise = 1 for sunrise, 0 for sunset
        $timeUTC = calcSunriseSetUTC($rise, $angle, $JD, $latitude, $longitude);
        $newTimeUTC = calcSunriseSetUTC($rise, $angle,  $JD + $timeUTC[0]/1440.0, $latitude, $longitude);
        
        $timeLocal = $newTimeUTC + ($timezone * 60.0);
        $timeLocal += (($dst) ? 60.0 : 0.0);
        $timeLocal = (timeString($timeLocal,2));

        return $timeLocal;
    }
    
    
    function getTimeLocal($date) {
        $hour = date('H',$date);
        $minute = date('i',$date);
        $second = date('s',$date);
        $mins = ((float)($hour) * 60.0) + (float)($minute) + (float)($second)/60.0;
        return $mins;
    }
    
    function getJD($date) {
        $year = date('Y',$date);
        $month = date('m',$date);
        $day = date('d',$date);

        if ($month <= 2) {
            $year -= 1;
            $month += 12;
        }
        $A = floor($year/100);
        $B = 2 - $A + floor($A/4);
        $JD = floor(365.25*($year + 4716)) + floor(30.6001*($month+1)) + $day + $B - 1524.5;
        return $JD;
    }
    
    function calculate($todayDate) {
        $jday = getJD($todayDate);
        $tl = getTimeLocal($todayDate);
        $tz = 0.0;
        $dst = false;
        $total = $jday + $tl/1440.0 - (float)($tz)/24.0;
        $T = calcTimeJulianCent($total);
        $lat = 64.128288;
        $lng = -21.827774;
        //calcAzEl(1, T, tl, lat, lng, tz)
        //calcSolNoon(jday, lng, tz, dst)
        $angles = array(90.833,96,102,108);
        $events = array();
        $this_date = date('Y-m-d',$todayDate);

        foreach($angles as $a){
            //print($tl."\n");
            $time = calcSunriseSet(true, $a, $jday, $lat, $lng, $tz, $dst);
            if ($time != 'NAN:NAN'){
                $events['+'.$a] = $this_date.'T'.$time;
            }
            $time = calcSunriseSet(false, $a, $jday, $lat, $lng, $tz, $dst);
            if ($time != 'NAN:NAN'){
                if (substr($time,0,1) == '+'){
                    $events['-'.$a]  = date('Y-m-d',$todayDate+(60*60*24)).'T'.substr($time,7);
                } else {
                    $events['-'.$a]  = $this_date.'T'.$time;                
                }
            }
            //alert("JD " + jday + "  " + rise + "  " + set + "  ")

        }
        
        return $events;
    }

    //$date = strtotime('2019-06-01');
    //calculate($date);
?>