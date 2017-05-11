<?php
class mySchedule {
	private $events;
	private $html;
	
	public function __construct($events) {
		$this->events = $events;
	}

	public function draw() {
		// draw
		$this->html = '<table id="schedule">';
		$this->html.= '<tr class="schedule-row">';
		$i = 1;
		foreach ($this->events as $key => $value) {
			$time = substr($value, 0, 5);
			$this->html.= '<td>';
			$this->html.= '<input type="radio" class="schedule-radio" id="radio'.$key.'" name="time" value="'.$key.'">';
			$this->html.= '<label for="radio'.$key.'" class="schedule-label">'.$time.'</label>';
			$this->html.= '</td>';
			if(!($i % 6)) {
				$this->html.= '</tr><tr class="schedule-row">';
			}
			$i++;
		}
		for(; $i % 6; $i++) {
			$this->html.= '<td>';
			$this->html.= '</td>';
		}
		$this->html.= '</tr>';
		$this->html.= '</table>';
		/* all done, return result */
		return $this->html;
	}

	public function show() {
		echo $this->html;
	}
}
?>