<?php
class Service{
	private $Id;
	private $Name;
	private $Description;
	private $Sdesc;
	private $Mdesc;
	private $Ldesc;
	private $Sprice;
	private $Mprice;
	private $Lprice;
	private $Sdays;
	private $Mdays;
	private $Ldays;

    public function getName(){
		return $this->Name;
	}
	public function getDescription(){
		return $this->Description;
	}
	public function getSdesc(){
		return $this->Sdesc;
	}
	public function getMdesc(){
		return $this->Mdesc;
	}
	public function getLdesc(){
		return $this->Ldesc;
	}
	public function getSprice(){
		return $this->Sprice;
	}
	public function getMprice(){
		return $this->Mprice;
	}
	public function getLprice(){
		return $this->Lprice;
	}
	public function getSdays(){
		return $this->Sdays;
	}public function getMdays(){
		return $this->Mdays;
	}public function getLdays(){
		return $this->Ldays;
	}
	public function getId(){
		return $this->Id;
	}
	
	public function setId($Id){
		$this->Id=$Id;
	}
	public function setSdesc($Sdesc){
		$this->Sdesc=$Sdesc;
	}
	public function setMdesc($Mdesc){
		$this->Mdesc=$Mdesc;
	}
	public function setLdesc($Ldesc){
		$this->Ldesc=$Ldesc;
	}
	public function setSprice($Sprice){
		$this->Sprice=$Sprice;
	}
	public function setMprice($Mprice){
		$this->Mprice=$Mprice;
	}
	public function setLprice($Lprice){
		$this->Lprice=$Lprice;
	}
	public function setSdays($Sdays){
		$this->Sdays=$Sdays;
	}
	public function setMdays($Mdays){
		$this->Mdays=$Mdays;
	}
	public function setLdays($Ldays){
		$this->Ldays=$Ldays;
	}
	public function setName($Name){
		$this->Name=$Name;
	}
	public function setDescription($Description){
		$this->Description=$Description;
	}
}
?>