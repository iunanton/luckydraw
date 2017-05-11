<?php
class myCalendar {
	//determine class variables
	private $defaultYear;
	private $defaultMonth;
	private $defaultDay;
	private $language;
	private $header;
	private $weedDays;
	private $events;
	private $table;

	//determine class constructor
	public function __construct($year, $month, $day, $language, $events) {
		$this->defaultYear = $year;
		$this->defaultMonth = $month;
		$this->defaultDay = $day;
		$this->language = $language;
		$this->events = $events;

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

	//create GET request of previous month
	private function requestPreviousMonth() {
		//if not January
		if($this->defaultMonth > 1) {
			$year = $this->defaultYear;
			$month = $this->defaultMonth-1;
			$day = $this->defaultDay;
		} else {
			$year = $this->defaultYear-1;
			$month = 12;
			$day = $this->defaultDay;
		}
		return "?year=$year&month=$month&day=$day";
	}

	//create GET request of next month
	private function requestNextMonth() {
		//if not December
		if($this->defaultMonth < 12) {
			$year = $this->defaultYear;
			$month = $this->defaultMonth+1;
			$day = $this->defaultDay;
		} else {
			$year = $this->defaultYear+1;
			$month = 1;
			$day = $this->defaultDay;
		}
		return "?year=$year&month=$month&day=$day";
	}

	public function draw() {
		// calendar header
		$this->table = '<table id="calendar">';
		$this->table.= '<tr class="calendar-head">';
		$this->table.= '<td id="calendar-prev"><a href="'.$this->requestPreviousMonth().'">Prev.</a></td>';
		$this->table.= '<td colspan="5" id="calendar-month">'.$this->header.'</td>';
		$this->table.= '<td id="calendar-next"><a href="'.$this->requestNextMonth().'">Next</a></td>';
		$this->table.= '</tr>';

		// names of week days
		$this->table.= '<tr class="calendar-head">';
		$this->table.= '<td class="calendar-day-head">';
		$this->table.= implode('</td><td class="calendar-day-head">', $this->weedDays);
		$this->table.= '</td>';
		$this->table.= '</tr>';
		
		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$this->defaultMonth,1,$this->defaultYear));
		$days_in_month = date('t',mktime(0,0,0,$this->defaultMonth,1,$this->defaultYear));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();
		
		/* row for week one */
		$this->table.= '<tr class="calendar-row">';
		
		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$this->calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$this->table.= '<td class="calendar-day';
			$day = str_pad($list_day, 2, '0', STR_PAD_LEFT);
			$string = $this->defaultYear.'-'.$this->defaultMonth.'-'.$day;

			/* add in the day number */
			if(in_array($string, $this->events)) {
				$this->calendar.= ' active';
			}
			if($day == $this->defaultDay) {
				$this->table.= ' selected';
			}
			$this->table.= '">';
			$this->table.= '<a href="';
			$this->table.= "?year=$this->defaultYear&month=$this->defaultMonth&day=$day";
			$this->table.= '" class="day-number">'.$day.'</a>';
			$this->table.= '</td>';
			if($running_day == 6):
				$this->table.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$this->table.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;
		
		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$this->table.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;
		
		/* final row */
		$this->table.= '</tr>';
		
		/* end the table */
		$this->table.= '</table>';
		
		/* all done, return result */
		return $this->table;
	}
	public function show() {
		echo $this->table;
	}
}
?>