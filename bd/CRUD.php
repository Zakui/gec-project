<?php
class CRUD{
	private $bdd ;
	public function __construct($bdd){
		 $this->setDb($bdd);
		 }

    public function setDb($p){
		 $this -> bdd = $p ;
		 }

	 public function insertUser(User $user){
		$req = $this -> bdd -> prepare(
								'INSERT IGNORE INTO user (nomUser,prenomUser,emailUser,passUser,telephoneUser,dateInscription,typeUser)
						         VALUES(:nomUser,:prenomUser,:emailUser,:passUser,:telephoneUser,NOW(),typeUser)
							');
				$req->execute(
					array(
						'nomUser' => $user -> getNomUser(),
						'prenomUser' => $user -> getPrenomUser(),
						'emailUser' => $user -> getEmailUser(),
						'passUser' => $user -> getPassUser(),
						'telephoneUser' => $user -> getTelephoneUser(),
						'typeUser' => $user -> getTypeUser()
					)
				);
		}

	public function selectUserByEmailPass($email,$pass){
		$email = htmlspecialchars($email);
		$pass = htmlspecialchars($pass);

		$requete = $this -> bdd ->prepare('SELECT * FROM user
											WHERE emailUser = :email AND passUser = :pass
											LIMIT 1
									');

		 $requete->execute(array(
						'email' => $email,
						'pass' => $pass
						));

		$users = array();
		if($requete ->rowCount()>0){
			while($tmp = $requete -> fetch()){
					$users[] = new User($tmp);
			}
			return $users;
		}else return null;
	}//fct

	public function selectUserById($id){
		$id = htmlspecialchars($id);

		$requete = $this -> bdd ->prepare('SELECT * FROM user
											WHERE idUser = :id
											LIMIT 1
									    ');
		 $requete->execute(array(
						'id' => $id
						));

		if($requete ->rowCount()>0){
			$tmp = $requete -> fetch();
			$user = new User($tmp);
			return $user;
		}else return null;
	}//fct


	//seule fonction de modification des infos et du password
	public function updateUser(User $user){
        $req = $this->bdd->prepare('UPDATE user
									SET
										nomUser = :nom,
										prenomUser = :prenom,
										emailUser = :email,
										passUser = :pass,
										telephoneUser = :telephone,
										typeUser = :typeUser
									WHERE idUser =:id
									');
		$req->execute(array(
						'nom' => $user -> getNomUser(),
						'prenom' => $user -> getPrenomUser(),
						'email' => $user -> getEmailUser(),
						'pass' => $user -> getPassUser(),
						'telephone' => $user -> getTelephoneUser(),
						'typeUser' => $user -> getTypeUser(),
						'id' => $user -> getIdUser()
				));
		return true;
  }//fct

}//class

?>
