<?php

function grade_count($point){
	if ($point == 4.00) {
		return 'A+';
	}elseif ($point >= 3.75) {
		return 'A';
	}elseif ($point >= 3.50 ) {
		return 'A-';
	}elseif ($point >= 3.25) {
		return 'B+';
	}elseif ($point >= 3.00) {
		return 'B';
	}elseif ($point >= 2.75) {
		return 'B-';
	}elseif ($point >= 2.50) {
		return 'C+';
	}elseif ($point >= 2.25) {
		return 'C';
	}elseif ($point >= 2.00) {
		return 'B-';
	}else{
		return 'F';
	}
}