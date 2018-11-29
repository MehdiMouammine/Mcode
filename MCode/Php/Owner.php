<?php
class Owner implements JsonSerializable{
	private $Name;
	private $Birth;
	private $From;
	private $Description;
	private $Adresse;
	private $Email;
	private $Phone;
	private $Skills=array();
	private $Languages=array();
	private $Educations=array();

	public function jsonSerialize(){
      	return ['Name' => $this->Name,'Birth' => $this->Birth,'From' => $this->From,'Adresse' => $this->Adresse,'Email' => $this->Email,'Phone' => $this->Phone,'Description' => $this->Description,'Skills' => $this->Skills,'Languages' => $this->Languages,'Educations' => $this->Educations];
    }

    public function getName(){
		return $this->Name;
	}
	public function getBirth(){
		return $this->Birth;
	}
	public function getFrom(){
		return $this->From;
	}
	public function getDescription(){
		return $this->Description;
	}
	public function getAdresse(){
		return $this->Adresse;
	}
	public function getEmail(){
		return $this->Email;
	}
	public function getPhone(){
		return $this->Phone;
	}
	public function getSkills(){
		return $this->Skills;
	}
	public function getLanguages(){
		return $this->Languages;
	}
	public function getEducations(){
		return $this->Educations;
	}

	public function setName($Name){
		$this->Name=$Name;
	}
	public function setBirth($Birth){
		$this->Birth=$Birth;
	}
	public function setFrom($From){
		$this->From=$From;
	}
	public function setEmail($Email){
		$this->Email=$Email;
	}
	public function setPhone($Phone){
		$this->Phone=$Phone;
	}
	public function setAdresse($Adresse){
		$this->Adresse=$Adresse;
	}
	public function setDescription($Description){
		$this->Description=$Description;
	}
	public function setSkills($Skills){
	 	$this->Skills=$Skills;
	}
	public function setEducations($Educations){
	 	$this->Educations=$Educations;
	}
	public function setLanguages($Languages){
	 	$this->Languages=$Languages;
	}
	public function setSkill($Skill){
	 	array_push($this->Skills,$Skill);
	}
	public function setEducation($Education){
	 	array_unshift($this->Educations,$Education);
	}
	public function setLanguage($Language){
	 	array_push($this->Languages,$Language);
	}
}
?>