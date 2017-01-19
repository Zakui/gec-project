<?php session_start();
	$_SESSION['isConnected'] = false;
	$_SESSION['idUser'] = '';
	$_SESSION['emailUser'] = '';


	?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

<div class="container">
	<?php
	require_once('bd/connection_bd.php');
	require_once('bd/User.php');
	require_once('bd/CRUD.php');

	$obj_bdd = new CRUD ($bdd);

	$_ERROR['state'] = false;
	$_ERROR['message'] =  '';

	$_POST['email'] = isset($_POST['email']) ? $_POST['email'] : '';
	$_POST['pass'] =  isset($_POST['pass'])  ? $_POST['pass'] : '';

		function test_post($var){
			if(isset($var) && !empty($var)){
				$var = htmlspecialchars($var);
				return true ;
			}else
				return false ;
		}
		if(test_post($_POST['email'])) {
			if(test_post($_POST['pass'])) {

				$res = $obj_bdd -> selectUserByEmailPass($_POST['email'], $_POST['pass']);

				if($res != null){
				 $_ERROR['state'] = false;

				 $_SESSION['isConnected'] = true ;
				 $_SESSION['idUser'] = $res[0] -> getIdUser();
				 $_SESSION['emailUser'] = $res[0] -> getEmailUser() ;

				 //redirection vers le l'acceuil
				 header('location:board.php');

				}else{
					$_ERROR['state'] = true;
					$_ERROR['message'] =  'Email ou mot de passe erroné <br/> Veuillez réessayer encore !';
				}

			} else {
			$_ERROR['state'] = true;
			$_ERROR['message'] = 'vous devez fournir votre email et votre mot de passe';

			}
		}

	?>


 <div class="thumbnail">
   <img src="img/icone_guinee.png"/>
 </div>
 <div class="text-ministere">MINISTERE DE L'ECONOMIE ET DES FINANCES</div>
 <div class="form">
  <form class="login-form" method='POST' action='index.php'>
  <?php
	if(isset($_ERROR) && $_ERROR['state']){
		echo "
			<div class='error_message'>
				$_ERROR[message]
			</div>
			";
	}
  ?>
    <input type="text" name='email' placeholder='email' <?php echo "value='".((test_post($_POST['email']))?$_POST['email']:'')."'";  ?> />
    <input type="password" name='pass' placeholder="mot de passe"/>
    <input type='submit' value='Connection' id='btn' />
    <p class="message">Mot de passe oublier ? <a href="#">Reinitialiser</a></p>
  </form>
</div>
</div>

</body>
</html>
