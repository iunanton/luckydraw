<?php
class myCalendar {
	private $language;
	private $year;
	private $month;
	private $day;
	private $serviceDays;
	private $calendarMonth;
	private $headings;
	private $calendar;
	public function __construct($year, $month, $day, $language) {
		$this->year = $year;
		$this->month = $month;
		$this->day = $day;
		$this->language = $language;
	}
	public function update($serviceDays) {
		$this->serviceDays = $serviceDays;
	}
	public function localization() {
		// table headings
		switch($this->language) {
			case 0:
				$this->headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
				switch($this->month) {
					case 1: $this->calendarMonth = 'January '.$this->year;
						break;
					case 2: $this->calendarMonth = 'Febrary '.$this->year;
						break;
					case 3: $this->calendarMonth = 'March '.$this->year;
						break;
					case 4: $this->calendarMonth = 'April '.$this->year;
						break;
					case 5: $this->calendarMonth = 'May '.$this->year;
						break;
					case 6: $this->calendarMonth = 'June '.$this->year;
						break;
					case 7: $this->calendarMonth = 'July '.$this->year;
						break;
					case 8: $this->calendarMonth = 'August '.$this->year;
						break;
					case 9: $this->calendarMonth = 'September '.$this->year;
						break;
					case 10: $this->calendarMonth = 'October '.$this->year;
						break;
					case 11: $this->calendarMonth = 'November '.$this->year;
						break;
					case 12: $this->calendarMonth = 'December '.$this->year;
						break;
				}
				break;
			case 1:
				$this->headings = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
				switch($this->month) {
					case 1: $this->calendarMonth = $this->year.'年 一月';
						break;
					case 2: $this->calendarMonth = $this->year.'年 二月';
						break;
					case 3: $this->calendarMonth = $this->year.'年 三月';
						break;
					case 4: $this->calendarMonth = $this->year.'年 四月';
						break;
					case 5: $this->calendarMonth = $this->year.'年 五月';
						break;
					case 6: $this->calendarMonth = $this->year.'年 六月';
						break;
					case 7: $this->calendarMonth = $this->year.'年 七月';
						break;
					case 8: $this->calendarMonth = $this->year.'年 八月';
						break;
					case 9: $this->calendarMonth = $this->year.'年 九月';
						break;
					case 10: $this->calendarMonth = $this->year.'年 十月';
						break;
					case 11: $this->calendarMonth = $this->year.'年 十一月';
						break;
					case 12: $this->calendarMonth = $this->year.'年 十二月';
						break;
				}
				break;
		}
	}
	private function previousMonth() {
		if($this->month > 1) {
			$newYear = $this->year;
			$newMonth = $this->month-1;
			$newDay = $this->day;
		} else {
			$newYear = $this->year-1;
			$newMonth = 12;
			$newDay = $this->day;
		}
		return "year=$newYear&month=$newMonth&day=$newDay";
	}
	private function nextMonth() {
		if($this->month < 12) {
			$newYear = $this->year;
			$newMonth = $this->month+1;
			$newDay = $this->day;
		} else {
			$newYear = $this->year+1;
			$newMonth = 1;
			$newDay = $this->day;
		}
		return "year=$newYear&month=$newMonth&day=$newDay";
	}
	public function draw() {
		// calendar header
		$this->calendar = '<div class="calendar-head">';
		$this->calendar.= '<a href="?';
		$this->calendar.= $this->previousMonth();
		$this->calendar.= '"><img src="left_arrow.png" alt="previous" width=25px></a>';
		$this->calendar.= '<div>';
		$this->calendar.= $this->calendarMonth;
		$this->calendar.= '</div>';
		$this->calendar.= '<a href="?';
		$this->calendar.= $this->nextMonth();
		$this->calendar.= '"><img src="right_arrow.png" alt="next" width=25px></a>';
		$this->calendar.= '</div>';
		
		// draw table 
		$this->calendar.= '<table class="calendar">';
		$this->calendar.= '<tr class="calendar-row">';
		$this->calendar.= '<td class="calendar-day-head">';
		$this->calendar.= '<div class="day-head">';
		$this->calendar.= implode('</div></td><td class="calendar-day-head"><div class="day-head">',$this->headings);
		$this->calendar.= '</div>';
		$this->calendar.= '</td>';
		$this->calendar.= '</tr>';
		
		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$this->month,1,$this->year));
		$days_in_month = date('t',mktime(0,0,0,$this->month,1,$this->year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();
		
		/* row for week one */
		$this->calendar.= '<tr class="calendar-row">';
		
		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$this->calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$this->calendar.= '<td class="calendar-day';
			$day = str_pad($list_day, 2, '0', STR_PAD_LEFT);
			$string = $this->year.'-'.$this->month.'-'.$day;

			/* add in the day number */
			if(in_array($string, $this->serviceDays)) {
				$this->calendar.= ' active';
			}
			if($day == $this->day) {
				$this->calendar.= ' selected';
			}
			$this->calendar.= '">';
			$this->calendar.= '<div class="day-number" onclick="location.href=\'';
			$this->calendar.= "?year=$this->year&month=$this->month&day=$day";
			$this->calendar.= '\'">'.$day.'</div>';
			$this->calendar.= '</td>';
			if($running_day == 6):
				$this->calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;
		
		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$this->calendar.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;
		
		/* final row */
		$this->calendar.= '</tr>';
		
		/* end the table */
		$this->calendar.= '</table>';
		
		/* all done, return result */
		return $this->calendar;
	}
	public function show() {
		echo $this->calendar;
	}
}
?>