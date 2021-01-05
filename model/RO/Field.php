<?php

/* Generated from GenMyModel */

class Field {
	private $id;
	private $title;
	private $add_date;

	function __construct(int $id,String $title){
		$this->id=$id;
		$this->title=$title;
		$this->add_date=date("d-m-y");

	}
	public function id(){
		return $this->id;
	}
	public function title(){
		return $this->title;
	}
	public function add_date(){
		return $this->add_date;
	}
}
