<?php



class CourseClass {
	private $id;
	private $title;
	function __construct(int $id1,String $title1) {
		$this->id=$id1;
        $this->$title=$titre1;
    }
	public function id(){
		return $this->id;
	}
	public function title(){
		return $this->title;
	}
}
