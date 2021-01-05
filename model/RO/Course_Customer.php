<?php


class Course_Customer {
	private $id;
	private $duration;
	private $customer_id;
	private $course_id;
	function __construct(int $id1,String $duration,String $customer,int $course) {
		$this->id=$id1;
		$this->duration=$duration;
		$this->customer_id=$customer;
		$this->course_id=$course;
    }
	public function id(){
		return $this->id;
	}
	public function duration(){
		return $this->duration;
	}
	public function customerId(){
		return $this->customer_id;
	}
	public function courseId(){
		return $this->course_id;
	}
	
}
