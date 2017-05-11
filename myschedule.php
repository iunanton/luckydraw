<?php
class mySchedule {
	private $timeSlot;
	private $form;
	public function __construct($timeSlot) {
		$this->timeSlot = $timeSlot;
	}

	public function draw() {
		// draw
		foreach ($this->serviceTimes as $time) {
			$this->form .= "<a href='?time=$time'>$time</a>";
			$this->form .= "<a href='?time=$time'>$time</a>";
		}
		/* all done, return result */
		return $this->schedule;
	}
	public function show() {
		echo $this->schedule;
	}
}
?>