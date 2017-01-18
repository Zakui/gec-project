<?php
class User {

	private $idUser ;
	private $nomUser ;
	private $prenomUser ;
	private $emailUser ;
	private $passUser ;
	private $telephoneUser ;
	private $dateInscription ;
	private $typeUser ;

	// les getteurs
	public function  getIdUser  () { return $this ->  idUser; }
	public function  getNomUser  () { return $this -> nomUser ; }
	public function  getPrenomUser  () { return $this -> prenomUser ; }
	public function  getEmailUser  () { return $this -> emailUser ; }
	public function  getPassUser  () { return $this -> passUser ; }
	public function  getTelephoneUser  () { return $this -> telephoneUser ; }
	public function  getDateInscription  () { return $this -> dateInscription ; }
	public function  getTypeUser  () { return $this -> typeUser ; }

	//les setters
	public function  setIdUser($p) { $this -> idUser = $p ; }
	public function  setNomUser ($p) { $this -> nomUser = $p ; }
	public function  setPrenomUser ($p) { $this -> prenomUser = $p ; }
	public function  setEmailUser ($p) { $this -> emailUser = $p ; }
	public function  setPassUser ($p) { $this -> passUser = $p ; }
	public function  setTelephoneUser ($p) { $this -> telephoneUser = $p ; }
	public function  setDateInscription ($p) { $this -> dateInscription = $p ; }
	public function  setTypeUser ($p) { $this -> typeUser = $p ; }


	public function __construct(array $donnee){
		$this -> hydrate($donnee);
	}


	//fonction d'arrosage
	public function hydrate(array $tab) {
		foreach ($tab as $cle => $valeur){
			  // echo"la cle $cle et la valeur $valeur <br/>";
				$methode = 'set'.ucfirst($cle);
				if (method_exists($this, $methode)){
				   	$this -> $methode($valeur);
				}else {
					// echo "la methode : $methode n'existe pas <br/>";
				}
			}
	}

}//class

?>
