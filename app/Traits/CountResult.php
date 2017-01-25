<?php
namespace App\Traits;
trait CountResult
{
	protected $parsents = ['', 5, 5, 5, 15, 15, 20, 25, 10];

	protected $avrage = null;
	protected $subjectPoint = null;
	protected $subjectCredit = null;
	protected $subjectGPXC;

	protected function countingResult($data)
	{
		foreach($data as $result){

			$this->subjectPoint = $result->subject_point + $this->subjectPoint;
			$this->subjectCredit = $result->subject->subject_credit + $this->subjectCredit;
			$this->subjectGPXC = ($result->subject_point * $result->subject->subject_credit) + $this->subjectGPXC;
		}
		if ($data->count()) {
			return $this->countingGrade();
		}
	}

	public function countingGrade()
	{
		return round(($this->subjectGPXC / $this->subjectCredit), 2);
	}

	public function processAverage($gpa, $semester)
	{
		$this->avrage = $this->avrage + (($value * $this->parsents[$semester]) / 100);
	}


}