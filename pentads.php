<?php
date_default_timezone_set('Atlantic/Reykjavik');

/*
USAGE:
$pentad = new Pentads(2019);
$pentad->setDate();

print "\n";
*/

class Pentads {	
	private $jjd;
	private $day;
	private $month;
	private $year;
	private $pentad = array();

	private $season;
	private $solar_term;
	private $microseason;

	function trunc($n) {
        return $n > 0 ? floor($n) : ceil($n);
    }

    function JJDATEJ() {
        $Z1 = $this->jjd + .5;
        $Z = trunc(Z1);
        $A = $Z;
        $B = $A + 1524;
        $C = trunc(($B - 122.1) / 365.25);
        $D = trunc(365.25 * $C);
        $E = trunc(($B - $D) / 30.6001);
        $this->year = trunc($B - $D - trunc(30.6001 * $E));
        $E < 13.5 ? $this->month = trunc($E - 1) : $this->month = trunc($E - 13);
        $this->month >= 3 ? $this->day = trunc($C - 4716) : $this->day = trunc($C - 4715);
    }
    function JJDATE() {
        $Z1 = $this->jjd + .5;
        $Z = $this->trunc($Z1);
        if ($Z < 2299161){ 
        	$A = $Z; 
        } else { 
        	$ALPHA = $this->trunc(($Z - 1867216.25) / 36524.25); 
            $A = $Z + 1 + $ALPHA - $this->trunc($ALPHA / 4);
        }
        $B = $A + 1524;
        $C = $this->trunc(($B - 122.1) / 365.25);
        $D = $this->trunc(365.25 * $C);
        $E = $this->trunc(($B - $D) / 30.6001);
        $this->year = $this->trunc($B - $D - $this->trunc(30.6001 * $E));
        $E < 13.5 ? $this->month = $this->trunc($E - 1) : $this->month  = $this->trunc($E - 13);

        $this->day = $this->trunc($C - 4716);
        //if ($this->month  >= 3){        	
        //	$this->day = $this->trunc($C - 4716);
        //} else {
        //	$this->day = $this->trunc($C - 4715);
        //}
    }

	function season_offset($n) {
        $FDJ = $this->jjd + .5 - floor($this->jjd + .5);
        $HH = floor(24 * $FDJ);
        $FDJ -= $HH / 24;
        $MM = floor(1440 * $FDJ);
        $p_time = mktime($HH, $MM, 0, $this->month, $this->year, $this->day);
        $this->pentad[$n] = $p_time;
    }

    function seasons($year,$count) {
    	$CODE1 = $year;
    	$nline = 1;
    	$k = $year - 2000 - 1;

        for ($n = 0; $n < ($count*2); $n++) {
            $nn = $n % $count;
            $dk = $k + (1/$count) * $n;
            $T = .21451814 + .99997862442 * $dk + .00642125 * sin(1.580244 + .0001621008 * $dk) + .0031065 * sin(4.143931 + 6.2829005032 * $dk) + .00190024 * sin(5.604775 + 6.2829478479 * $dk) + .00178801 * sin(3.987335 + 6.2828291282 * $dk) + 4981e-8 * sin(1.507976 + 6.283109952 * $dk) + 6264e-8 * sin(5.723365 + 6.283062603 * $dk) + 6262e-8 * sin(5.702396 + 6.2827383999 * $dk) + 3833e-8 * sin(7.166906 + 6.2827857489 * $dk) + 3616e-8 * sin(5.58175 + 6.2829912245 * $dk) + 3597e-8 * sin(5.591081 + 6.2826670315 * $dk) + 3744e-8 * sin(4.3918 + 12.5657883 * $dk) + 1827e-8 * sin(8.3129 + 12.56582984 * $dk) + 3482e-8 * sin(8.1219 + 12.56572963 * $dk) - 1327e-8 * sin(-2.1076 + .33756278 * $dk) - 557e-8 * sin(5.549 + 5.753262 * $dk) + 537e-8 * sin(1.255 + .003393 * $dk) + 486e-8 * sin(19.268 + 77.7121103 * $dk) - 426e-8 * sin(7.675 + 7.8602511 * $dk) - 385e-8 * sin(2.911 + 5412e-7 * $dk) - 372e-8 * sin(2.266 + 3.9301258 * $dk) - 21e-7 * sin(4.785 + 11.5065238 * $dk) + 19e-7 * sin(6.158 + 1.5774 * $dk) + 204e-8 * sin(.582 + .5296557 * $dk) - 157e-8 * sin(1.782 + 5.8848012 * $dk) + 137e-8 * sin(-4.265 + .3980615 * $dk) - 124e-8 * sin(3.871 + 5.2236573 * $dk) + 119e-8 * sin(2.145 + 5.5075293 * $dk) + 144e-8 * sin(.476 + .0261074 * $dk) + 3.8e-7 * sin(6.45 + 18.848689 * $dk) + 7.8e-7 * sin(2.8 + .775638 * $dk) - 5.1e-7 * sin(3.67 + 11.790375 * $dk) + 4.5e-7 * sin(-5.79 + .796122 * $dk) + 2.4e-7 * sin(5.61 + .213214 * $dk) + 4.3e-7 * sin(7.39 + 10.976868 * $dk) - 3.8e-7 * sin(3.1 + 5.486739 * $dk) - 3.3e-7 * sin(.64 + 2.544339 * $dk) + 3.3e-7 * sin(-4.78 + 5.573024 * $dk) - 3.2e-7 * sin(5.33 + 6.069644 * $dk) - 2.1e-7 * sin(2.65 + .020781 * $dk) - 2.1e-7 * sin(5.61 + 2.9424 * $dk) + 1.9e-7 * sin(-.93 + 799e-6 * $dk) - 1.6e-7 * sin(3.22 + 4.694014 * $dk) + 1.6e-7 * sin(-3.59 + .006829 * $dk) - 1.6e-7 * sin(1.96 + 2.146279 * $dk) - 1.6e-7 * sin(5.92 + 15.720504 * $dk) + 115e-8 * sin(23.671 + 83.9950108 * $dk) + 115e-8 * sin(17.845 + 71.4292098 * $dk);
            $JJD = 2451545 + 365.25 * $T;
            $D = $CODE1 / 100;
            $TETUJ = (32.23 * ($D - 18.3) * ($D - 18.3) - 15) / 86400;
            $JJD -= $TETUJ;
            $JJD += .0003472222;
            $this->jjd = $JJD;
            if ($JJD < 2299160.5) {
            	$this->JJDATEJ();
            } else { 
            	$this->JJDATE();
            }
            if ($CODE1 == $this->day) {
	            $this->season_offset($nn);
            }
        }

    }

	public function __construct($year=NULL, $month=NULL, $day=NULL) {
		$this->seasons($year, 72);
        $p_time = mktime(0, 0, 0, $month, $day, $year);
        $p_time_max = mktime(23, 59, 59, $month, $day, $year);
        $this->microseason = -1;
        $is_set = false;
        //for($i=0; $i<count($this->pentad);$i++){
        //	print($i."\n");
        //	print(date('Y-m-d',$this->pentad[$i])."\n");
		//}        
        for($i=0; $i<count($this->pentad);$i++){
        	//print($i."\n");
        	//print($this->pentad[$i].' ?= '.$p_time_max."\n");
        	//print(date('Y-m-d',$this->pentad[$i])."\n");
        	//print($is_set."\n");
        	if ($this->pentad[$i] <= $p_time_max && $i < 57){
        		//print($i."\n");
        		//print(date('Y-m-d',$this->pentad[$i])."\n");
        		$this->season = (int)($i*5);
        		$this->solar_term = (int)(($i*5)/15);
        		$this->microseason = $i;
        		$is_set = true;
				//break;        			
        	}
        	if (($this->pentad[$i] <= $p_time_max || $this->pentad[($i+1)] >= $p_time_max) && $i == 56){
        		//print($i."\n");
        		//print(date('Y-m-d',$this->pentad[$i])."\n");
        		$this->season = (int)($i*5);
        		$this->solar_term = (int)(($i*5)/15);
        		$this->microseason = $i;
        		$is_set = true;
				//break;        			
        	}
           	if ($this->pentad[$i] <= $p_time_max && $i >= 57 && !$is_set) {
        		//print($i."\n");
        		//print($this->pentad[$i].' <= '.$p_time."\n");
        		//print(date('Y-m-d',$this->pentad[$i])."\n");
        		$this->season = (int)((($i)*5));
        		$this->solar_term = (int)((($i)*5)/15);
        		$this->microseason = ($i);      			
        	}
        	/*
        	print($this->season);
        	*/
        }
	}	

	public function get_season(){
		print('Angle: '.($this->season)."\n");
		$season_name = 'Spring';
		if ($this->season >=45 && $this->season < 135){
			$season_name = 'Summer';
		}
		if ($this->season >=135 && $this->season < 225){
			$season_name = 'Autumn';
		}
		if ($this->season >=225 && $this->season < 315){
			$season_name = 'Winter';
		}

		return $season_name;
	}

	public function get_solar_term(){
		$solar_name = '';
		//print('Solar Term: '.$this->solar_term."\n");
		switch($this->solar_term){
			case 0:  $solar_name = 'Spring Center'; break;
			case 1:  $solar_name = 'Clear and Bright'; break;
			case 2:  $solar_name = 'Wheat Rain'; break;
			case 3:  $solar_name = 'Summer Begins'; break;
			case 4:  $solar_name = 'Creatures Plenish'; break;
			case 5:  $solar_name = 'Seeding Millet'; break;
			case 6:  $solar_name = 'Summer Maximum'; break;
			case 7:  $solar_name = 'A bit Sweltering'; break;
			case 8:  $solar_name = 'Most Sweltering'; break;
			case 9:  $solar_name = 'Autumn Begins'; break;
			case 10: $solar_name = 'Heat Withdraws'; break;
			case 11: $solar_name = 'Dews'; break;
			case 12: $solar_name = 'Autumn Center'; break;
			case 13: $solar_name = 'Cold Dews'; break;
			case 14: $solar_name = 'Frost'; break;
			case 15: $solar_name = 'Winter Begins'; break;
			case 16: $solar_name = 'Snows a bit'; break;
			case 17: $solar_name = 'Snows a lot'; break;
			case 18: $solar_name = 'Winter Maximum'; break;
			case 19: $solar_name = 'A bit Frigid'; break;
			case 20: $solar_name = 'Most Frigid'; break;
			case 21: $solar_name = 'Spring Begins'; break;
			case 22: $solar_name = 'More Rain Than Snow'; break;
			case 23: $solar_name = 'Hibernating Insects Awaken'; break;
		}
		return $solar_name;
	}

	public function get_microseason(){
		$pentad_name = '';
		//print($this->microseason."\n");
		switch($this->microseason){
			case 0:  $pentad_name = 'The Sparrow Builds Her Nest'; break;
			case 1:  $pentad_name = 'The First Cherry Blossoms'; break;
			case 2:  $pentad_name = 'Thunder Raises Its Voice'; break;
			case 3:  $pentad_name = 'The Swallows Arrive'; break;
			case 4:  $pentad_name = 'Geese Fly North'; break;
			case 5:  $pentad_name = 'The First Rainbow Appears'; break;
			case 6:  $pentad_name = 'The First Reeds Grow'; break;
			case 7:  $pentad_name = 'The Frost Stops The Rice Grows'; break;
			case 8:  $pentad_name = 'The Tree Peony Flowers'; break;

			case 9:  $pentad_name = 'The First Frogs Call'; break;
			case 10: $pentad_name = 'The Earth Worms Rise'; break;
			case 11: $pentad_name = 'Bamboo Shoots Appear'; break;
			case 12: $pentad_name = 'The Silk Worm Awakes and Eats the Mulberry'; break;
			case 13: $pentad_name = 'The Safflower Blossoms'; break;
			case 14: $pentad_name = 'The Time for Wheat'; break;
			case 15: $pentad_name = 'The Praying Mantis Hatches'; break;
			case 16: $pentad_name = 'Fireflies Rise from the Rotten Grass'; break;
			case 17: $pentad_name = 'The Plums Turn Yellow'; break;
			case 18: $pentad_name = 'The Common Self-Heal Dries'; break;
			case 19: $pentad_name = 'The Iris Flowers'; break;
			case 20: $pentad_name = 'The Crow-dipper Sprouts'; break;
			case 21: $pentad_name = 'Hot Winds Blow'; break;
			case 22: $pentad_name = 'The First Lotus Blooms'; break;
			case 23: $pentad_name = 'The Young Hawk Learns to Fly'; break;
			case 24: $pentad_name = 'The First Paulownia Fruit Ripen'; break;
			case 25: $pentad_name = 'Damp Earth Humid Heat'; break;
			case 26: $pentad_name = 'Heavy Rain Showers'; break;

			case 27: $pentad_name = 'A Cool Wind Blows'; break;
			case 28: $pentad_name = 'The Evening Cicada Sings'; break;
			case 29: $pentad_name = 'Thick Fog Blankets the Sky'; break;
			case 30: $pentad_name = 'The Cotton Lint Opens'; break;
			case 31: $pentad_name = 'Earth and Sky Begin to Cool'; break;
			case 32: $pentad_name = 'The Rice Ripens'; break;
			case 33: $pentad_name = 'White Dew on the Grass'; break;
			case 34: $pentad_name = 'The Wagtail Calls'; break;
			case 35: $pentad_name = 'The Swallows Leave'; break;
			case 36: $pentad_name = 'Thunder Lowers its Voice'; break;
			case 37: $pentad_name = 'Hibernating Creatures Close their Doors'; break;
			case 38: $pentad_name = 'The Paddy Water is First Drained'; break;
			case 39: $pentad_name = 'The Geese Arrive'; break;
			case 40: $pentad_name = 'The Chrysanthemum Flowers'; break;
			case 41: $pentad_name = 'The Grasshopper Sings'; break;
			case 42: $pentad_name = 'The First Frost Falls'; break;
			case 43: $pentad_name = 'Light Rain Showers'; break;
			case 44: $pentad_name = 'The Maple and the Ivy Turn Yellow'; break;

			case 45: $pentad_name = 'The First Camellia Blossoms'; break;
			case 46: $pentad_name = 'The Earth First Freezes'; break;
			case 47: $pentad_name = 'The Daffodil Flowers'; break;
			case 48: $pentad_name = 'The Rainbow Hides Unseen'; break;
			case 49: $pentad_name = 'The North Wind Brushes the Leaves'; break;
			case 50: $pentad_name = 'The Tachibana First Turns Yellow'; break;
			case 51: $pentad_name = 'The Sky Is Cold, Winter Comes'; break;
			case 52: $pentad_name = 'The Bear Retreats to its Den'; break;
			case 53: $pentad_name = 'The Salmon Gather to Spawn'; break;
			case 54: $pentad_name = 'The Common Self-Heal Sprouts'; break;
			case 55: $pentad_name = 'The Elk Sheds its Horns'; break;
			case 56: $pentad_name = 'Beneath the Snow the Wheat Sprouts'; break;
			case 57: $pentad_name = 'The Water Dropwort Flourishes'; break;
			case 58: $pentad_name = 'The Springwater Holds Warmth'; break;
			case 59: $pentad_name = 'The Pheasant First Calls'; break;
			case 60: $pentad_name = 'The Giant Butterbur Flowers'; break;
			case 61: $pentad_name = 'The Mountain Stream Freezes Over'; break;
			case 62: $pentad_name = 'The Chicken Lays Her First Eggs'; break;

			case 63: $pentad_name = 'Spring Winds Thaw the Ice'; break;
			case 64: $pentad_name = 'The Nightingale Sings'; break;
			case 65: $pentad_name = 'Fish Rise from the Ice'; break;
			case 66: $pentad_name = 'The Earth Becomes Damp'; break;
			case 67: $pentad_name = 'Haze First Covers the Sky'; break;
			case 68: $pentad_name = 'Plants Show Their First Buds'; break;
			case 69: $pentad_name = 'Hibernating Creatures Open their Doors'; 
			case 70: $pentad_name = 'The First Peach Blossoms'; break;
			case 71: $pentad_name = 'Caterpillars become butterflies'; break;
		}
		return $pentad_name;
	}
}
//for($i=1;$i<13;$i++){
//	for($j=1;$j<29;$j++){
//		$pentad = new Pentads(2019,$i,$j);
//		print("2019-".$i.'-'.$j."\n");
//		print($pentad->get_season()."\n");
//		print($pentad->get_solar_term()."\n");
//		print($pentad->get_microseason()."\n");
//	}
//}
$pentad = new Pentads(2019,5,6);
print($pentad->get_season()."\n");
print($pentad->get_solar_term()."\n");
print($pentad->get_microseason()."\n");

?>