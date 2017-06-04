<?php
	define("END_OF_BOOKING_HOUR", 14, false);
	define("END_OF_BOOKING_MIN", 30, false);
	/**
	 * calendar class
	 * it use css class to operate with monthly or weekly rendering
	 */
	class calendar {
		private $handler;
		private $current_day; // this points to month should be shown and highlights day
		private $week_number;
		private $week_start;
		private $week_end;
		private $last_week;
		private $next_week;
		private $today;
		private $now;
		private $endOfTodaysBooking;
		private $interval;
		private $daterange;
		
		private $week_nav;		
		private $html; // HTML code of calendar to render it
		
		public function __construct($current_day) {
			require_once("timeslotshandler.class.php");
			$this->handler = new timeSlotsHandler();
			
			$this->current_day = new DateTime($current_day);
			$this->getWeekParameters();
			$this->weekNav();
			
			$this->week_end->modify("+1 day");
			$this->interval = new DateInterval('P1D');
			$this->daterange = new DatePeriod($this->week_start, $this->interval ,$this->week_end);
			
			$this->html = '<div class="calendar">';
			$this->html .= $this->week_nav;
			foreach($this->daterange as $date) {
				if($date->format("j") == "1") {
					$this->html .= '<div class="calendar-month-header">';
					$this->html .= $date->format("F");
					$this->html .= '</div>';
				}
				$this->html .= '<div class="calendar-day-header'. ($this->isToday($date) ? ' today' : '').'">';
				$this->html .= '<div class="calendar-day-number">';
				$this->html .= $date->format("j");
				$this->html .= '</div>';
				$this->html .= '<div class="calendar-day-description">';
				$this->html .= $date->format("D");
				$this->html .= '</div>';
				$this->html .= '</div>';
				$this->html .= '<div class="calendar-day-content">';

				if ($this->validDate($date)) {
					$timeSlots = $this->handler->get($date->format("Y-m-d"));
				}
				if(isset($timeSlots) && !empty($timeSlots)) {
					if(!$this->isToday($date) || $this->allowTodayBooking()) {
						foreach ($timeSlots as $timeSlot) {
							$this->html .= '<div class="calendar-time-slot">'.$timeSlot.'</div>';
						}
					} else {
						$this->html .= '<div class="calendar-notice">Please call 5405 6631 for today\'s booking</div>';
					}
				} else {
					$this->html .= '<div class="calendar-day-not-available">No Available</div>';
				}
				$this->html .= '</div>';
			}
			$this->html .= $this->week_nav;
			$this->html .= '</div>';
		}
		
		private function getWeekParameters() {
			$this->week_start = clone $this->current_day;
			$this->week_start->modify("+1 day");
			$this->week_end = clone $this->week_start;
			$this->last_week = clone $this->week_start;
			$this->next_week = clone $this->week_start;
			$this->week_start->modify("monday this week");
			$this->week_start->modify("-1 day");
			$this->week_end->modify("sunday this week");
			$this->week_end->modify("-1 day");
			$this->week_number = $this->week_end->format("W"); 
			$this->last_week->modify("-8 days");
			$this->next_week->modify("+6 days");
			$this->today = new DateTime("today");
			$this->endOfTodaysBooking = clone $this->today;
			$this->endOfTodaysBooking->setTime(END_OF_BOOKING_HOUR, END_OF_BOOKING_MIN);
			$this->now = new DateTime("now");
		}
		
		private function weekNav() {
			$this->week_nav .= '<div class="week-nav">';
			$this->week_nav .= '<a href="?day=';
			$this->week_nav .= $this->last_week->format("Y-m-d"); 
			$this->week_nav .=  '">&#9664</a> ';
			$this->week_nav .= 'Week ';
			$this->week_nav .= $this->week_number;
			$this->week_nav .= ', ';
			$this->week_nav .= $this->week_start->format("F j");
			$this->week_nav .= ' - ';
			$this->week_nav .= $this->week_end->format("F j");
			$this->week_nav .= ' <a href="?day=';
			$this->week_nav .= $this->next_week->format("Y-m-d"); 			
			$this->week_nav .= '">&#9654</a>';
			$this->week_nav .= '</div>';
		}
				
		private function isToday(DateTime $date) {
			return $date == $this->today;
		}
				
		private function validDate(DateTime $date) {
			return $date >= $this->today;
		}
			
		private function allowTodayBooking() {
			return $this->now < $this->endOfTodaysBooking;
		}
		
		public function render() {
			echo $this->html;
		}
		
	}
?>