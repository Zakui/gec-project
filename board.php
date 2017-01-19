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
  <div class="container">
      <div class="head-container">
        <form class="container-head" action="nouveau-courrier.php" method="post">
          <button type="submit" class="btn btn-success btn-lg">Creer un nouveau courrier</button>
        </form>
        <form class="container-head pull-right" action="#">
          <input type="text" placeholder="Rechercher un courrier">
        </form>
      </div>
      <div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>NUMERO D'ENREGISTREMENT</th>
              <th>TITRE</th>
              <th>DESCRIPTION</th>
              <th>DATE D'ARRIVE</th>
              <th>SOURCE</th>
              <th>REFERENCE</th>
              <th>NOMBRE DE PAGE</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once('bd/Courrier.php');
              require_once('bd/connection_bd.php');
              require_once('bd/CRUD.php');
              $obj_bdd = new CRUD ($bdd);

              $courriers = $obj_bdd -> selectCourrierAll();

              if ($courriers != null) {
                foreach ($courriers AS $courrier) {
                  $id = $courrier -> getCourrierId();

                  echo "<tr>
                          <td><a href='courriers.php?id=$id'>".$courrier -> getRegistrationNumbre()."</a></td>
                          <td>".$courrier->getCourrierTitle()."</td>
                          <td>".$courrier->getCourrierDescription()."</td>
                          <td>".$courrier->getArrivalDate()."</td>
                          <td>".$courrier->getSource()."</td>
                          <td>".$courrier->getReference()."</td>
                          <td>".$courrier->getPageNumber()."</td>
                        </tr>";
                }
              }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
