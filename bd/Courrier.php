<?php
class Courrier {

	private $courrierId ;
	private $registrationNumbre ;
	private $courrierTitle ;
	private $courrierDescription ;
	private $coverDocument ;
	private $stamp ;
	private $arrivalDate ;
	private $pageNumber ;
  private $source ;
	private $reference ;

	// les getteurs
	public function  getCourrierId  () { return $this ->  courrierId; }
	public function  getRegistrationNumbre  () { return $this -> registrationNumbre ; }
	public function  getCourrierTitle  () { return $this -> courrierTitle ; }
	public function  getCourrierDescription  () { return $this -> courrierDescription ; }
	public function  getCoverDocument  () { return $this -> coverDocument ; }
	public function  getStamp  () { return $this -> stamp ; }
	public function  getArrivalDate  () { return $this -> arrivalDate ; }
	public function  getPageNumber  () { return $this -> pageNumber ; }
  public function  getSource  () { return $this -> source ; }
	public function  getReference  () { return $this -> reference ; }

	//les setters
  public function  setCourrierId  ($p) {$this ->  courrierId = $p; }
	public function  setRegistrationNumbre ($p) { $this -> registrationNumbre = $p ; }
	public function  setCourrierTitle ($p) { $this -> courrierTitle = $p ; }
	public function  setCourrierDescription ($p) { $this -> courrierDescription = $p ; }
	public function  setCoverDocument ($p) { $this -> coverDocument = $p ; }
	public function  setStamp ($p) { $this -> stamp = $p ; }
	public function  setArrivalDate ($p) { $this -> arrivalDate = $p ; }
	public function  setPageNumber ($p) { $this -> pageNumber = $p ; }
  public function  setSource ($p) { $this -> source = $p ; }
	public function  setReference ($p) { $this -> reference = $p ; }


	public function __construct(array $donnee=[]){
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
