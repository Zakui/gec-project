<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>GESTIONNAIRE DE COURRIER</title>
</head>
<body>
  <div class="jumbotron">
    <div class="container">
      <div class="head-log container-head">
        <img src="./img/icone_guinee.png" alt="icone de la guinee" width="80" height="100">
        <span>GESTIONNAIRE DE COURRIER DU MINISTERE DES FINANCES</span>
      </div>
      <div class="head-user container-head pull-right">
        <img src="./img/usr.jpg" alt="User image" class="img-circle">
        <div style="text-align:center; margin-top: 5px;"><strong>JULES THEA</strong></div>
      </div>
    </div>
  </div>
  <?php
    require_once('bd/Courrier.php');
    require_once('bd/connection_bd.php');
    require_once('bd/CRUD.php');
    $obj_bdd = new CRUD ($bdd);
    $courrier = new Courrier();

    $registrationNumbre = rand();
    $courrierTitle = ((isset($_POST['titre']) && !empty($_POST['titre'])) ? $_POST['titre']: '');
    $courrierDescription = ((isset($_POST['desc']) && !empty($_POST['desc'])) ? $_POST['desc']: '');
    $arrivalDate = ((isset($_POST['arrivalDate']) && !empty($_POST['arrivalDate'])) ? $_POST['arrivalDate']: '');
    $pageNumber = ((isset($_POST['nombrePage']) && !empty($_POST['nombrePage'])) ? $_POST['nombrePage']: '');
    $source = ((isset($_POST['source']) && !empty($_POST['source'])) ? $_POST['source']: '');
    $reference = ((isset($_POST['reference']) && !empty($_POST['reference'])) ? $_POST['reference']: '');

    if ($courrierTitle && $courrierTitle != '') {
      $courrier -> setRegistrationNumbre ($registrationNumbre);
    	$courrier -> setCourrierTitle ($courrierTitle);
    	$courrier -> setCourrierDescription ($courrierDescription);
    	$courrier -> setArrivalDate ($arrivalDate);
    	$courrier -> setPageNumber ($pageNumber);
      $courrier -> setSource ($source);
    	$courrier -> setReference ($reference);

      try {
        $obj_bdd -> insertCourrier($courrier) ;
        header('location:board.php');
      } catch (Exception $e) {
        echo $e;
      }
    }
   ?>
  <div class="container">
    <form class="formulaire-courrier" action="nouveau-courrier.php" method="post">
      <h2 class="header text-center">AJOUT DE COURRIER</h2>
      <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="titre du courrier">
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        <textarea class="form-control" rows="4" id="desc" name="desc" placeholder="description du courrier"></textarea>
      </div>
      <div class="form-group">
        <label for="nombrePage">Nombre de page</label>
        <input type="number" class="form-control" id="nombrePage" name="nombrePage" placeholder="nombre de page">
      </div>
      <div class="form-group">
        <label for="arrivalDate">Date d'arrive</label>
        <input type="date" class="form-control" id="arrivalDate" name="arrivalDate">
      </div>
      <div class="form-group">
        <label for="source">Source</label>
        <input type="text" class="form-control" id="source" name="source" placeholder="source du courrier">
      </div>
      <div class="form-group">
        <label for="reference">Reference</label>
        <input type="text" class="form-control" id="reference" name="reference" placeholder="reference du courrier">
      </div>
      <div class="form-group">
        <label for="inputFile">importer</label>
        <input type="file" id="inputFile">
        <button type="button" class="btn btn-default">+</button>
      </div>
      <button type="submit" class="btn btn-success">CREER</button>
    </form>
    <embed class="overview-file" src="./img/test.pdf" />
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
