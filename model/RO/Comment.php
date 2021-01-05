<?php

class Comment{
	private $id;
	private $content;
	private $customer_id;
	private $course_id;
	//Nombre de commentaire dans la BD
	private static $nbrComments=1;
	function __construct(String $content1,String $customer,int $course) {
		$this->id=self::$nbrComments;
		self::$nbrComments++;
		$this->content=$content1;
		$this->customer_id=$customer;
		$this->course_id=$course;
    }
	public function id(){
		return $this->id;
	}
	public function content(){
		return $this->content;
	}
	public function customerId(){
		return $this->customer_id;
	}
	public function courseId(){
		return $this->course_id;
	}
}
