<?php
	/**
	 * calendar class
	 * it use css class to operate with monthly or weekly rendering
	 */
	class calendar {
		private $handler;
		private $current_day; // this points to month should be shown and highlights day
		private $today;
		private $last_week;
		private $next_week;
		private $start_day;
		private $end_day;
		private $week_nav;
		private $interval;
		private $daterange;
		
		private $html; // HTML code of calendar to render it
		
		public function __construct($current_day) {
			require_once("timeslotshandler.class.php");
			$this->handler = new timeSlotsHandler();
			$this->current_day = new DateTime($current_day);
			$this->today = new DateTime("today");
			$this->last_week = new DateTime($current_day);
			$this->last_week->modify("-7 days");
			$this->next_week = new DateTime($current_day);
			$this->next_week->modify("+7 days");
			$this->start_day = new DateTime($current_day);
			$this->start_day->modify("last sunday");
			$this->end_day = new DateTime($current_day);
			$this->end_day->modify("this saturday");
			$this->weekNav();		
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
				$this->html .= '<div class="calendar-day-header'. ($date == $this->today ? ' today' : '').'">';
				$this->html .= '<div class="calendar-day-number">';
				$this->html .= $date->format("j");
				$this->html .= '</div>';
				$this->html .= '<div class="calendar-day-description">';
				$this->html .= $date->format("D");
				$this->html .= '</div>';
				$this->html .= '</div>';
				$this->html .= '<div class="calendar-day-content">';
				$timeSlots = $this->handler->get($date->format("Y-m-d"));
				if(empty($timeSlots)) {
					$this->html .= '<div class="calendar-day-not-available">No Available Time Slots</div>';
				} else {
					foreach ($timeSlots as $timeSlot) {
						$this->html .= '<div class="calendar-time-slot">'.$timeSlot.'</div>';
					}
				}
				$this->html .= '</div>';
			}
			$this->html .= $this->week_nav;
			$this->html .= '</div>';
		}
		
		private function weekNav() {
			$this->week_nav .= '<div class="week-nav">';
			$this->week_nav .= '<a href="?day=';
			$this->week_nav .= $this->last_week->format("Y-m-d"); 
			$this->week_nav .=  '">&#9664</a> ';
			$this->week_nav .= 'Week ';
			$this->week_nav .= $this->current_day->format("W");
			$this->week_nav .= ', ';
			$this->week_nav .= $this->start_day->format("F j");
			$this->week_nav .= ' - ';
			$this->week_nav .= $this->end_day->format("F j");
			$this->week_nav .= ' <a href="?day=';
			$this->week_nav .= $this->next_week->format("Y-m-d"); 			
			$this->week_nav .= '">&#9654</a>';
			$this->week_nav .= '</div>';
		}
		
		public function render() {
			echo $this->html;
		}
		
	}
?>