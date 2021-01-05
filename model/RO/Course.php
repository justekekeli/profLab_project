<?php


class Course {
	private $id;
	private $title;
	private $price;
	private $description;
	private $field_id;
	private $class_id;
	private $prof_id;

	function __construct(int $id1,String $title,String $description,int $price,int $field,int $classCourse,String $prof) {
		$this->id=$id1;
		$this->title=$title;
		$this->description=$description;
		$this->price=$price;
		$this->field_id=$field;
		$this->class_id=$classCourse;
		$this->prof_id=$prof;
    }
	public function id(){
		return $this->id;
	}
	public function title(){
		return $this->title;
	}
	public function description(){
		return $this->description;
	}
	public function price(){
		return $this->price;
	}
	public function field(){
		return $this->field_id;
	}
	public function class_id(){
		return $this->class_id;
	}
	public function prof(){
		return $this->prof_id;
	}
	
	
}
