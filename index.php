<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Covoit Lbahja</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="./img/nav_arrow.png" width= "30" height="30"/>Covoit Lbahja</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-left" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        
      <li class ="nav-item">
        <a class="btn btn-danger" href="#"><img src="./img/plus-sign.png" width ="22" height="22"/> Proposer un trajet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact"> </a>
        </li>
        <li class ="nav-item">
        <a class="btn btn-danger" href="#">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact"> </a>
        </li>
        <li class ="nav-item">
        <a class="btn btn-danger" data-toggle="modal" href= "#"data-target="#connexion">Connexion</a>
        </li>
        
      </ul>
    </div>
  </nav>

  <section id = "infos" class = "hero text-center" style ="background-image : url(./img/place.jpg);">
  <div class="container">
      <br>
      <h1 style="color :rgb(220, 53, 69);">Bienvenue dans Covoit Labhja</h1>
        <div class="row justify-content-center">
          <div class="col-md-6">
          <p class="lead" style="color :white;">
            <b> ipsum dolor sit amet conse
            Lorem Lorem Lorem ipsum dolor sit, 
            e harum doloremque a culpa eaque.</b>
          </p>
          <div class="btn btn-warning ">Plus +++</div>
        </div>
        </div>
    </div>
  </section>
  <section id= "chercheTrajets">
  <br>
  <p  class= "text-left h2" style="color :rgb(220, 53, 69);">Chercher Les Trajets qui vous convient</p>
  <form action="">
  <div class= "form-row align-items-center">
      <div class="col-4">
      <label for="inputDes">Destination</label>
      <select name="des" id="des" required class="form-control">
      <option value="indiff" default>Indifférent</option>
      <option value="fac_sc">Faculté des Sciences Semlalia</option>
      <option value="fstg">Faculté des Sciences et Techniques Gueliz</option>
      <option value="ensam">Ecole Nationale des Sciences Appliqués</option>
      <option value="fac_eco">Faculté des Sciences Economiques et Juridiques</option>
      <option value="fac_lette">Faculté des Lettres et Sciences Humaines</option>
      <option value="isga_mar">Insitut Supérieur D'ingénierie et des Affaires</option>
      <option value="fac_med">Faculté de Medecine et Pharmacie</option>
      </select>
      </div>
      <div class="col-4">
      
      <label for="quartDep">Quartier de depart</label>
      <select name="quartDep" id="quartDep" required class="form-control">
      <option value="indiff" default>Indifférent</option>
      <option value="mhamid">Mhamid</option>
      <option value="daoudiate">Daoudiate</option>
      <option value="azli">Azli</option>
      <option value="gueliz">Gueliz</option>
      <option value="sidi_youssef">Sidi Youssef Ben Ali</option>
      <option value="dwar_askar">Dwar Al Askar</option>
     
      </select>
      </div>
      <div class="col-4">
      <label for="dateDep">Date de Depart</label>
      <input type="date" name="dateDep" class="form-control">
      </div>
      </div>
      <br>
<div class = "form-row align-items-left">
      <div class="col-auto">
      <button type="submit" class= "btn btn-danger mb-2">Chercher des trajets</button>
      </div>
      <div class= "col-auto">
      <button type="reset" class= "btn btn-danger mb-2">Effacer Les Filtres</button>
      </div>
      </div> 
  
  </form>
  
  </section>

  <section id="resRecherche">
  
  <div class="container">
  <div class= "row">
  
   <div id="listTrajets" class= "col-6">
   <ul class="list-unstyles">
  <li >trajet 1</li>
  <li>trajet 2</li>
  <li>trajet 3</li>
  <li>trajet 4</li>
  <li>trajet 5</li>
  <li >trajet 6</li>
</ul>
   
   </div>
   <div id="mapTrajets" class= "col-6" >
   
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d217567.8101667286!2d-7.963207274827826!3d31.565415283414605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sma!4v1520797099191"
    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
   </div>

  </div>
  </div>
  
  </section>











   <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="connexion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Veuillez entrez vos Login et Mot de passe pour se connectez</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email ou Login</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez email ou login">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe </label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
  </div>
  <button type="submit" class="btn btn-primary">Se Connecter</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Mot de passe oublié </button>
      </div>
    </div>
  </div>
</div>
   <script src="./js/jquery.js"></script>
  <script src="./js/jquery.smooth-scroll.js">
  </script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/popper.js"></script> 
</body>
</html>