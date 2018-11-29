<?php
require 'Owner.php';
require 'Service.php';
require 'Product.php';

class Controller {
		
		private $con;

		public function __construct($pdo) {
			
			$this->con = $pdo;
		}
		public function getCon() {
			
			return $this->con;
			
		}
		public function getServices($found){
			$a = $this->getCon()->query('SELECT * FROM Services WHERE Name Like "%'.$found.'%"');
			$a->setFetchMode(PDO::FETCH_CLASS, 'Service');
			$result = $a->fetchAll();
			return $result;			
		}
		public function getProducts($found){
			$a = $this->getCon()->query('SELECT * FROM Products WHERE Name Like "%'.$found.'%" ORDER BY Id DESC');
			$a->setFetchMode(PDO::FETCH_CLASS, 'Product');
			$result = $a->fetchAll();
			return $result;			
		}
		public function getService($found){
			$a = $this->getCon()->query('SELECT * FROM Services WHERE Id = '.$found);
			$a->setFetchMode(PDO::FETCH_CLASS, 'Service');
			$results = $a->fetchAll();
			foreach ($results as $b){$result=$b;}
			return $result;			
		}
		public function getProduct($found){
			$a = $this->getCon()->query('SELECT * FROM Products WHERE Id = '.$found);
			$a->setFetchMode(PDO::FETCH_CLASS, 'Product');
			$results = $a->fetchAll();
			foreach ($results as $b){$result=$b;}
			return $result;			
		}
		public function getOwner($own)
		{
			$json = file_get_contents($own);
			$J = json_decode($json, true);
			$O=new Owner();
			$O->setName($J['Name']);
			$O->setBirth($J['Birth']);
			$O->setFrom($J['From']);
			$O->setAdresse($J['Adresse']);
			$O->setEmail($J['Email']);
			$O->setPhone($J['Phone']);
			$O->setDescription($J['Description']);
			$O->setSkills($J['Skills']);
			$O->setEducations($J['Educations']);
			$O->setLanguages($J['Languages']);
			return $O;
		}
		public function updateOwner($n,$b,$f,$a,$e,$p,$d){
			$O=$this->getOwner("../Json/Owner.json");
			$O->setName($n);
			$O->setBirth($b);
			$O->setFrom($f);
			$O->setAdresse($a);
			$O->setEmail($e);
			$O->setPhone($p);
			$O->setDescription($d);
			$json = json_encode($O);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function newSkill($type,$name){
			$o=$this->getOwner("../Json/Owner.json");
			$s = array();
			array_push($s,$type);
			array_push($s,$name);
			$o->setSkill($s);
			$json = json_encode($o);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function deleteSkill($name){
			$o=$this->getOwner("../Json/Owner.json");
			$s = $o->getSkills();
			$i=0;
			foreach ($s as $sk) {
				if ($sk[1]==$name) {
					array_splice($s, $i, 1);break;
				}
				$i++;
			}
			$o->setSkills($s);
			$json = json_encode($o);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function newLanguage($type,$name){
			$o=$this->getOwner("../Json/Owner.json");
			$s = array();
			array_push($s,$name);
			array_push($s,$type);
			$o->setLanguage($s);
			$json = json_encode($o);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function deleteLanguage($name){
			$o=$this->getOwner("../Json/Owner.json");
			$s = $o->getLanguages();
			$i=0;
			foreach ($s as $sk) {
				if ($sk[0]==$name) {
					array_splice($s, $i, 1);break;
				}
				$i++;
			}
			$o->setLanguages($s);
			$json = json_encode($o);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function newEducation($type,$name){
			$o=$this->getOwner("../Json/Owner.json");
			$s = array();
			array_push($s,$type);
			array_push($s,$name);
			$o->setEducation($s);
			$json = json_encode($o);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function deleteEducation($name){
			$o=$this->getOwner("../Json/Owner.json");
			$s = $o->getEducations();
			$i=0;
			foreach ($s as $sk) {
				if ($sk[0]==$name) {
					array_splice($s, $i, 1);break;
				}
				$i++;
			}
			$o->setEducations($s);
			$json = json_encode($o);
			$fp = fopen("../Json/Owner.json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		public function deleteService($id){
			$p=$this->getService($id);
			$n = $p->getName();
			$query = $this->getCon()->prepare("DELETE FROM Services WHERE Id = ?");
			$query->execute(array($id));
			unlink('../Img/Services/'.$n.'.jpg');
		}
		public function deleteProduct($id){
			$p=$this->getProduct($id);
			$n = $p->getName();
			$query = $this->getCon()->prepare("DELETE FROM Products WHERE Id = ?");
			$query->execute(array($id));
			unlink('../Img/Products/Logo/'.$n.'.jpg');
			unlink('../Img/Products/NameLogo/'.$n.'.jpg');
			unlink('../Img/Products/Screens/'.$n.'1.jpg');
			unlink('../Img/Products/Screens/'.$n.'2.jpg');
			unlink('../Img/Products/Screens/'.$n.'3.jpg');
			unlink('../Img/Products/Screens/'.$n.'4.jpg');
			unlink('../Img/Products/Screens/'.$n.'5.jpg');
			unlink('../Img/Products/Screens/'.$n.'6.jpg');
		}
		function newService($vName, $vDescription, $vSdesc, $vMdesc, $vLdesc, $vSprice, $vLdays, $vMprice, $vLprice, $vSdays, $vMdays){
			$query = $this->getCon()->prepare("INSERT INTO Services (Name, Description, Sdesc, Mdesc, Ldesc, Sprice, Ldays, Mprice, Lprice, Sdays, Mdays) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$query->execute(array($vName, $vDescription, $vSdesc, $vMdesc, $vLdesc, $vSprice, $vLdays, $vMprice, $vLprice, $vSdays, $vMdays));
		}
		function newProduct($vName, $vDescription, $vPrice){
			$query = $this->getCon()->prepare("INSERT INTO Products (Name, Description, Price) VALUES (?, ?, ?)");
			$query->execute(array($vName, $vDescription, $vPrice));
		}
}