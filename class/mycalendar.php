<?php
class myCalendar {
	//determine class variables
	private $conn;
	private $defaultYear;
	private $defaultMonth;
	private $language;
	private $header;
	private $weedDays;
	private $html;
	private $timeOnRow = 2;

	public function __construct($year, $month, $language) {
		//myDatabase class
		require_once('mydatabase.php');
		$this->conn = new myDatabase();
		
		$this->defaultYear = $year;
		$this->defaultMonth = $month;
		$this->language = $language;
		
		// table headings
		switch($this->language) {
			case 0:
				$this->weedDays = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
				switch($this->defaultMonth) {
					case 1: $this->header = 'January '.$this->defaultYear;
						break;
					case 2: $this->header = 'Febrary '.$this->defaultYear;
						break;
					case 3: $this->header = 'March '.$this->defaultYear;
						break;
					case 4: $this->header = 'April '.$this->defaultYear;
						break;
					case 5: $this->header = 'May '.$this->defaultYear;
						break;
					case 6: $this->header = 'June '.$this->defaultYear;
						break;
					case 7: $this->header = 'July '.$this->defaultYear;
						break;
					case 8: $this->header = 'August '.$this->defaultYear;
						break;
					case 9: $this->header = 'September '.$this->defaultYear;
						break;
					case 10: $this->header = 'October '.$this->defaultYear;
						break;
					case 11: $this->header = 'November '.$this->defaultYear;
						break;
					case 12: $this->header = 'December '.$this->defaultYear;
						break;
				}
				break;
			case 1:
				$this->weedDays = array('日','一','二','三','四','五','六');
				switch($this->defaultMonth) {
					case 1: $this->header = $this->defaultYear.'年 一月';
						break;
					case 2: $this->header = $this->defaultYear.'年 二月';
						break;
					case 3: $this->header = $this->defaultYear.'年 三月';
						break;
					case 4: $this->header = $this->defaultYear.'年 四月';
						break;
					case 5: $this->header = $this->defaultYear.'年 五月';
						break;
					case 6: $this->header = $this->defaultYear.'年 六月';
						break;
					case 7: $this->header = $this->defaultYear.'年 七月';
						break;
					case 8: $this->header = $this->defaultYear.'年 八月';
						break;
					case 9: $this->header = $this->defaultYear.'年 九月';
						break;
					case 10: $this->header = $this->defaultYear.'年 十月';
						break;
					case 11: $this->header = $this->defaultYear.'年 十一月';
						break;
					case 12: $this->header = $this->defaultYear.'年 十二月';
						break;
				}
				break;
		}
	}
	
	private function requestPreviousMonth() {
		//if not January
		if($this->defaultMonth > 1) {
			$year = $this->defaultYear;
			$month = $this->defaultMonth-1;
		} else {
			$year = $this->defaultYear-1;
			$month = 12;
		}
		return "?year=$year&month=$month";
	}
	
	private function requestNextMonth() {
		//if not December
		if($this->defaultMonth < 12) {
			$year = $this->defaultYear;
			$month = $this->defaultMonth+1;
		} else {
			$year = $this->defaultYear+1;
			$month = 1;
		}
		return "?year=$year&month=$month";
	}
	
	public function draw() {
		// calendar header
		$this->html = '<table id="calendar">';
		$this->html.= '<tr class="calendar-head">';
		$this->html.= '<td id="calendar-prev"><a href="'.$this->requestPreviousMonth().'">Prev.</a></td>';
		$this->html.= '<td colspan="5" id="calendar-month">'.$this->header.'</td>';
		$this->html.= '<td id="calendar-next"><a href="'.$this->requestNextMonth().'">Next</a></td>';
		$this->html.= '</tr>';
		
		// names of week days
		$this->html.= '<tr class="calendar-head">';
		$this->html.= '<td class="calendar-day-head">';
		$this->html.= implode('</td><td class="calendar-day-head">', $this->weedDays);
		$this->html.= '</td>';
		$this->html.= '</tr>';
		
		// days and weeks vars now ...
		$running_day = date('w',mktime(0,0,0,$this->defaultMonth,1,$this->defaultYear));
		$days_in_month = date('t',mktime(0,0,0,$this->defaultMonth,1,$this->defaultYear));
		$days_in_this_week = 1;
		$day_counter = 0;
		
		// row for week one
		$this->html.= '<tr class="calendar-row">';
		
		// print "blank" days until the first of the current week
		for($x = 0; $x < $running_day; $x++) {
			$this->html.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		}
		
		// keep going with days....
		for($list_day = 1; $list_day <= $days_in_month; $list_day++) {
			$day = str_pad($list_day, 2, '0', STR_PAD_LEFT);

			//get time array from myDatabase
			$timeSlots = $this->conn->getTimeArray($this->defaultYear, $this->defaultMonth, $day);
			
			$this->html.= '<td class="calendar-day';
						
			//highlight today
			if($this->defaultYear == date("Y") && $this->defaultMonth == date("m") && $day == date("d")) {
				$this->html.= ' today';
			}
			
			$this->html.= '">';
			
			//add day number
			$this->html.= '<p class="day-number">';
			$this->html.= $list_day;			
			$this->html.= '</p>';
			
			//add time slots
			$this->html.= '<table class="schedule">';
			$this->html.= '<tr class="schedule-row">';
			
			//time slot number
			$i = 1;
			foreach ($timeSlots as $key => $value) {
				$time = substr($value, 0, 5);
				$this->html.= '<td class="time-slot">';
				$this->html.= '<a href="booking_form.php?test='.$key.'" class="time">';
				$this->html.= $time;
				$this->html.= '</a>';
				$this->html.= '</td>';
				if(!($i % $this->timeOnRow)) {
					$this->html.= '</tr><tr class="schedule-row">';
				}
				$i++;
			}
			while($i % $this->timeOnRow) {
				$this->html.= '<td>';
				$this->html.= '</td>';
				$i++;
			}
			$this->html.= '</tr>';			
			$this->html.= '</table>';

			//close td tag
			$this->html.= '</td>';
			
			if($running_day == 6) {
				$this->html.= '</tr>';
				if(($day_counter+1) != $days_in_month) {
					$this->html.= '<tr class="calendar-row">';
				}
				$running_day = -1;
				$days_in_this_week = 0;
			}
			$days_in_this_week++; $running_day++; $day_counter++;
		}
		
		// finish the rest of the days in the week
		if($days_in_this_week < 8) {
			for($x = 1; $x <= (8 - $days_in_this_week); $x++) {
				$this->html.= '<td class="calendar-day-np"> </td>';
			}
		}
		
		// final row
		$this->html.= '</tr>';
		
		// end the table
		$this->html.= '</table>';
		
		// all done, return result
		return $this->html;
	}
	public function show() {
		echo $this->html;
	}
}
?>
