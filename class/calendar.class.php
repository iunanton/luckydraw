<?php
	/**
	 * calendar class
	 * it use css class to operate with monthly or weekly rendering
	 */
	class calendar {
		private $current_day; // this points to month should be shown and highlights day
		private $today;
		private $start_day;
		private $end_day;
		private $week_nav;
		private $interval;
		private $daterange;
		
		private $html; // HTML code of calendar to render it
		
		public function __construct($current_day) {
			$this->current_day = new DateTime($current_day);
			$this->today = new DateTime("today");
			$this->start_day = new DateTime($current_day);
			$this->start_day->modify("last sunday");
			$this->end_day = new DateTime($current_day);
			$this->end_day->modify("this saturday");
			$this->week_nav .= '<div class="week-nav">';
			$this->week_nav .= '&#8592 ';
			$this->week_nav .= 'Week ';
			$this->week_nav .= $this->current_day->format("W");
			$this->week_nav .= ', ';
			$this->week_nav .= $this->start_day->format("F j");
			$this->week_nav .= ' - ';
			$this->week_nav .= $this->end_day->format("F j");
			$this->week_nav .= ' &#9654';
			$this->week_nav .= '</div>';
			$this->end_day->modify("+1 day");
			$this->interval = new DateInterval('P1D');
			$this->daterange = new DatePeriod($this->start_day, $this->interval ,$this->end_day);
			$this->html = '<div class="calendar">';
			$this->html .= $this->week_nav;
			foreach($this->daterange as $date) {
				if($date->format("j") == "1") {
					$this->html .= '<div class="calendar-month-header">';
					$this->html .= $date->format("F");
					$this->html .= '</div>';
				}
				//$this->html .= '<div class="calendar-day">';
				$this->html .= '<div class="calendar-day-header'. ($date == $this->today ? ' today' : '').'">';
				$this->html .= '<div class="calendar-day-number">';
				$this->html .= $date->format("j");
				$this->html .= '</div>';
				$this->html .= '<div class="calendar-day-description">';
				$this->html .= $date->format("D");
				$this->html .= '</div>';
				$this->html .= '</div>';
				$this->html .= '<div class="calendar-day-content">';
				$this->html .= '<div class="calendar-time-slot">15:30</div>';
				$this->html .= '<div class="calendar-time-slot">16:00</div>';
				$this->html .= '<div class="calendar-time-slot">16:30</div>';
				$this->html .= '<div class="calendar-time-slot">17:00</div>';
				$this->html .= '<div class="calendar-time-slot">17:30</div>';
				$this->html .= '<div class="calendar-time-slot">18:00</div>';
				$this->html .= '<div class="calendar-time-slot">18:30</div>';
				$this->html .= '<div class="calendar-time-slot">19:00</div>';
				$this->html .= '<div class="calendar-time-slot">19:30</div>';
				$this->html .= '<div class="calendar-time-slot">20:00</div>';
				$this->html .= '<div class="calendar-time-slot">20:30</div>';
				$this->html .= '<div class="calendar-time-slot">21:00</div>';
				$this->html .= '<div class="calendar-time-slot">21:30</div>';
				//$this->html .= '</div>';
				$this->html .= '</div>';
			}
			$this->html .= $this->week_nav;
			$this->html .= '</div>';
		}
		
		public function render() {
			echo $this->html;
		}
		
	}
?>