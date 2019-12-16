<?php
date_default_timezone_set('Atlantic/Reykjavik');

/*
USAGE:
$IODate = new OldIcelandicDate();
print $IODate->month_name.': '.$IODate->month.' ('.$IODate->is_summer.')';
print "\n";
*/

class OldIcelandicDate {	
	private $vikudagar = array("Sunnudagur", 
						"Mánadagur", 
						"Týrsdagur", 
						"Öðinsdagur", 
						"Þórsdagur", 
						"Frjádagur", 
						"Laugardagur");
	
	private $manudhr = array(
					"Gormánuður", 
					 "Ýlir", 
					 "Mörsugur", 
					 "Þorri", 
					 "Góa", 
					 "Einmánuður", 
					 "Harpa", 
					 "Skerpla", 
					 "Sólmánuður", 
					 "Heyannir", 
					 "Tvímánuður", 
					 "Haustmánuður", 
					 "Sumarauki"
					 );

	public $day_name   = NULL;
	public $month_name = NULL;
	public $month  = NULL;
	public $day    = NULL;
	public $is_summer = false;
	public $ordinal = 'th';

	private function JulianDate($day, 
						$month, 
						$year
						) {
		if ($month < 3) { $year--; $month += 12; }
	
		return floor($year * 365) + floor($year / 4) + floor(($month * 	153 + 3) / 5) + $day + 1721012;
	
	}
	
	private function sumarauki($year){
		$j=0;
		$diff=0;
		$j = $this->JulianDate(18, 7, $year);
		$diff = 2 - ($j % 7);
		if ($diff < 0) $diff += 7;
		$j += $diff;
		return $j;
	}

	public function __construct($year=NULL, $month=NULL, $day=NULL) {

		if ($day == NULL) { $day = date('j'); }

		if ($month == NULL) { $month = date('n'); }

		if ($year == NULL ) { $year = date('Y'); }

		$jd = $this->JulianDate($day, $month, $year);
		$sa = $this->sumarauki($year);
	
		if ($jd < $sa) {
			$n = $jd - $sa + 270;
			$id = ($n % 30) + 1;
			$im = floor($n / 30);
		 } else {
			$heyannir = $this->sumarauki($year + 1) - 360;
			if ($jd < $heyannir) {
				$id = $jd - $sa + 1;
				$im = 12;
			} else {
				$n = $jd - $heyannir;
				$id = ($n % 30) + 1;
				$im = floor(($n / 30)) + 9;
				if ($im >= 12) {
					$im -= 12;
			 	}
			}
		 }
		
		$this->month = $im;
		$this->month_name = $this->manudhr[$im];
		$this->day = $id;
		switch((int)$id){
			case 1: $this->ordinal = 'st'; break;
			case 2: $this->ordinal = 'nd'; break;
			case 3: $this->ordinal = 'rd'; break;
			default: $this->ordinal = 'th'; break;
		}
		$this->day_name = $this->vikudagar[(($jd+1)%7)];
		if (($im > 5) && ($im < 12) || ($im == 12)) {
			$this->is_summer = true;
		} else {
			$this->is_summer = false;
		}
		return;
	}
}
?>