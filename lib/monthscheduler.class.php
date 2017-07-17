<?php
	define("END_OF_BOOKING_HOUR", 14, false);
	define("END_OF_BOOKING_MIN", 30, false);
	/**
	 * calendar class
	 * it use css class to operate with monthly or weekly rendering
	 */
	class monthScheduler {
		private $handler;
		private $current_day; // this points to month should be shown and highlights day
		
		private $month_start;
		private $month_end;
		private $last_month;
		private $next_month;

		private $today;
		private $now;
		private $endOfTodaysBooking;
		private $interval;
		private $daterange;
		private $lang;
		
		private $month_nav;
		private $weekday_header;
		
		private $day_header;

		private $please_call;
		private $not_available;
		private $html; // HTML code of calendar to render it
		
		public function __construct($current_day, $lang) {
			require_once("timeslotshandler.class.php");
			$this->handler = new timeSlotsHandler();

			$this->current_day = new DateTime($current_day);
			$this->lang = $lang;			
			
			$this->getMonthParameters();
			
			$this->month_end->modify("+1 day");
			$this->interval = new DateInterval('P1D');
			$this->daterange = new DatePeriod($this->month_start, $this->interval ,$this->month_end);
			$this->month_end->modify("-1 day");
			
			$this->create();
		}

		private function getMonthParameters() {
			$this->month_start = clone $this->current_day;
			$this->month_start->modify("first day of this month");
			$this->month_end = clone $this->current_day;
			$this->month_end->modify("last day of this month");
			$this->last_month = clone $this->current_day;
			$this->last_month->modify("-1 month");
			$this->next_month = clone $this->current_day;
			$this->next_month->modify("+1 month");
			$this->today = new DateTime("today");
			$this->endOfTodaysBooking = clone $this->today;
			$this->endOfTodaysBooking->setTime(END_OF_BOOKING_HOUR, END_OF_BOOKING_MIN);
			$this->now = new DateTime("now");
		}
		
		private function create() {
			$this->html = '<div class="month-scheduler">';
			$this->monthNav();
			$this->html .= $this->month_nav;
			$this->makeNotices();
			$this->weekdayHeader();
			$this->html .= $this->weekday_header;
			$this->html .= '<div class="month-week">';
			$month_day = 0;
			for( ; $month_day < ($this->month_start->format("N") % 7); $month_day++) {
				$this->html .= '<div class="week-day"></div>';
			}
			foreach($this->daterange as $date) {
				if($month_day % 7 == 0) {
					$this->html .= '</div>';
					$this->html .= '<div class="month-week">';				
				}
				
				$this->html .= '<div class="week-day'. ($this->isToday($date) ? ' today' : '').'">';
				$this->html .= '<div class="day-number">'.$date->format("j").'</div>';
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
				$month_day++;
			}
			for( $month_day=$this->month_end->format("N"); $month_day < 7; $month_day++) {
				$this->html .= '<div class="week-day"></div>';
			}
			$this->html .= '</div>';
			$this->html .= '</div>';
		}
		
		private function monthNav() {
			$this->month_nav .= '<div class="month-nav">';
			$this->month_nav .= '<a href="?day=';
			$this->month_nav .= $this->last_month->format("Y-m-d"); 
			$this->month_nav .=  '">&#9664</a> ';
			switch($this->lang) {
				case 'en':
					$this->month_nav .= $this->current_day->format("F Y");
					break;
				case 'zh':
					$this->month_nav .= $this->current_day->format("Y年m月");
					break;
			}
			$this->month_nav .= ' <a href="?day=';
			$this->month_nav .= $this->next_month->format("Y-m-d"); 			
			$this->month_nav .= '">&#9654</a>';
			$this->month_nav .= '</div>';
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
		
		private function weekdayHeader() {			
			$this->weekday_header = '<div class="weekday-header">';
			switch($this->lang) {
				case 'en':
					$this->weekday_header .= '<div class="week-day">Sun</div>';
					$this->weekday_header .= '<div class="week-day">Mon</div>';
					$this->weekday_header .= '<div class="week-day">Tue</div>';
					$this->weekday_header .= '<div class="week-day">Wed</div>';
					$this->weekday_header .= '<div class="week-day">Thu</div>';
					$this->weekday_header .= '<div class="week-day">Fri</div>';
					$this->weekday_header .= '<div class="week-day">Sat</div>';
					break;
				case 'zh':
					$this->weekday_header .= '<div class="week-day">日</div>';
					$this->weekday_header .= '<div class="week-day">一</div>';
					$this->weekday_header .= '<div class="week-day">二</div>';
					$this->weekday_header .= '<div class="week-day">三</div>';
					$this->weekday_header .= '<div class="week-day">四</div>';
					$this->weekday_header .= '<div class="week-day">五</div>';
					$this->weekday_header .= '<div class="week-day">六</div>';
					break;
			}
			$this->weekday_header .= '</div>';
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