<?php
	define("END_OF_BOOKING_HOUR", 14, false);
	define("END_OF_BOOKING_MIN", 30, false);
	/**
	 * calendar class
	 * it use css class to operate with monthly or weekly rendering
	 */
	class weekScheduler {
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
		private $lang;
		
		private $week_nav;
		private $month_label;
		private $day_header;
		private $please_call;
		private $not_available;
		private $html; // HTML code of calendar to render it
		
		public function __construct($current_day, $lang) {
			require_once("timeslotshandler.class.php");
			$this->handler = new timeSlotsHandler();

			$this->current_day = new DateTime($current_day);
			$this->lang = $lang;			
			
			$this->getWeekParameters();
			
			$this->week_end->modify("+1 day");
			$this->interval = new DateInterval('P1D');
			$this->daterange = new DatePeriod($this->week_start, $this->interval ,$this->week_end);
			$this->week_end->modify("-1 day");
			
			$this->create();
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
		
		private function create() {
			$this->html = '<div class="week-scheduler">';
			$this->weekNav();
			$this->html .= $this->week_nav;
			
			$this->makeNotices();
			
			foreach($this->daterange as $date) {
				if($date->format("j") == "1") {
					$this->monthLabel($date);
					$this->html .= $this->month_label;
				}
				$this->html .= '<div class="week-day'. ($this->isToday($date) ? ' today' : '').'">';
				$this->dayHeader($date);
				$this->html .= $this->day_header;
				$this->html .= '<div class="day-content">';
				if ($this->validDate($date)) {
					$timeSlots = $this->handler->get($date->format("Y-m-d"));
				}
				if(isset($timeSlots) && !empty($timeSlots)) {
					if(!$this->isToday($date) || $this->allowTodayBooking()) {
						foreach ($timeSlots as $key => $timeSlot) {
							$this->html .= '<div class="time-slot">';
							$this->html .= '<a href="booking_form.php?test='.$key.'" class="time">';
							$this->html .= $timeSlot;
							$this->html .= '</a>';
							$this->html .= '</div>';
						}
					} else {
						$this->html .= $this->please_call;
					}
				} else {
					$this->html .= $this->not_available;
				}
				$this->html .= '</div>';
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
			switch($this->lang) {
				case 'en':
					$this->week_nav .= 'Week ';
					$this->week_nav .= $this->week_number;
					$this->week_nav .= ', ';
					$this->week_nav .= $this->week_start->format("F j");
					$this->week_nav .= ' - ';
					$this->week_nav .= $this->week_end->format("F j");
					break;
				case 'zh':
					$this->week_nav .= $this->week_number;
					$this->week_nav .= $this->week_start->format("周、m月d日");
					$this->week_nav .= $this->week_end->format(" - m月d日");
					break;
			}
			$this->week_nav .= ' <a href="?day=';
			$this->week_nav .= $this->next_week->format("Y-m-d"); 			
			$this->week_nav .= '">&#9654</a>';
			$this->week_nav .= '</div>';
		}
		
		private function makeNotices() {
			switch($this->lang) {
				case 'en': $this->please_call .= '<div class="notice">Please call 5405 6631 for today\'s booking</div>';
					break;
				case 'zh': $this->please_call .= '<div class="notice">請電話 5405 6631 預約</div>';
					break;
			}
			switch($this->lang) {
				case 'en': $this->not_available .= '<div class="notice">Not Available</div>';
					break;
				case 'zh': $this->not_available .= '<div class="notice">没有預約</div>';
					break;
			}
		}
		
		private function monthLabel($date) {
			$this->month_label = '<div class="month-label">';
			switch($this->lang) {
				case 'en':
					$this->month_label .= $date->format("F Y");
					break;
				case 'zh':
					$this->month_label .= $date->format("Y年m月");
					break;
			}
			$this->month_label .= '</div>';
		}
		
		private function dayHeader($date) {
				$this->day_header = '<div class="day-header">';
				$this->day_header .= '<div class="day-number">';
				$this->day_header .= $date->format("j");
				$this->day_header .= '</div>';
				$this->day_header .= '<div class="day-description">';
				switch($this->lang) {
					case 'en':
						$this->day_header .= $date->format("D");
						break;
					case 'zh':
						switch($date->format("N")) {
							case 1: $this->day_header .= '一';
								break;
							case 2: $this->day_header .= '二';
								break;
							case 3: $this->day_header .= '三';
								break;
							case 4: $this->day_header .= '四';
								break;
							case 5: $this->day_header .= '五';
								break;
							case 6: $this->day_header .= '六';
								break;
							case 7: $this->day_header .= '日';
								break;
						}
						break;
				}
				$this->day_header .= '</div>';
				$this->day_header .= '</div>';
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