<?php
class Product{
	private $Id;
	private $Name;
	private $Description;
	private $Price;

	public function getId(){
		return $this->Id;
	}
	public function getName(){
		return $this->Name;
	}
	public function getDescription(){
		return $this->Description;
	}
	public function getPrice(){
		return $this->Price;
	}
	public function setPrice($Price){
		$this->Price=$Price;
	}
	public function setName($Name){
		$this->Name=$Name;
	}
	public function setId($Id){
		$this->Id=$Id;
	}
	public function setDescription($Description){
		$this->Description=$Description;
	}
}