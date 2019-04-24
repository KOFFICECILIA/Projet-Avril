<?php
    $nom = $erNom = $erreur = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $choix = $_POST['choix'];
        $commune = $_POST['commune'];
        $valide = true;

        if(empty($nom)) {
            $erNom = "Veuillez entrer votre nom";
            $valide = false;
        }

        if($valide) {
            require 'config/base.php';
            $req = $base->prepare('INSERT INTO commandes (nom, sexe, choix, commune) VALUES (?, ?, ?, ?)');
            $req->execute(array($nom, $sexe, $choix, $commune));

            $erreur = "Votre commande a bien été passé !";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plan de construction</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="commande.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 barre-gauche">
                <span class="gauche">KMCAD</span>
                <br>
                <hr> 
                <a href="index.html">Accueil</a>
                <a href="service.html">Service</a>
                <a href="">Contact</a>
                <hr>
                <br>
                <span class="gauche">KMCAD</span>
            </div>
            <div  class="offset-1 barre-droite col-md-11">
                <ul>
                    <a href="index.html"><li>Accueil</li></a>
                    <a href="service.html"><li>Service</li></a>
                    <a href=""><li>Contact</li></a>
                    <li><span class="logo">KMCAD</span></li>    
                </ul>
            </div>
        <div class="col-md-4 container">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <h1>Commander</h1>
           <div class="formulaire">
                <div class="form-group">
                    <label for="name">Nom et Prénom<span class="etoile">*</span> :</label>
                    <input class="form-control" name="nom" type="text" placeholder="Entrez votre Nom et Prenom">
                </div>
                <div class="form-group">
                    <label for="sexe">Sexe<span class="etoile">*</span> :</label>
                    <select name="sexe" id="sexe" class="form-control">
                        <option value="feminin">féminin</option>
                        <option value="masculin" selected>masculin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="choix">choix<span class="etoile">*</span> :</label>
                    <select name="choix" id="choix" class="form-control">
                        <option value="materiel1">materiel1</option>
                        <option value="materiel2" selected>materiel2</option>
                        <option value="materiel3">materiel3</option>
                        <option value="architecte1">architecte1</option>
                        <option value="architecte">architecte2</option>
                        <option value="architecte3">architecte3</option>
                    </select>
                </div>
                <div>
                    <label for="commune" >commune<span class="etoile">*</span></label>
                        <select name="commune" class="form-control">
                            <option value=""></option>
                            <option value="abobo">ABOBO</option>
                            <option value="adjame">ADJAME</option>
                            <option value="anyama">ANYAMAN</option>
                            <option value="bingerville">BINGERVILLE</option>
                            <option value="cocody">COCODY</option>
                            <option value="gonzague">GONZAGUE</option>
                            <option value="koumassi">KOUMASSI</option>
                            <option value="marcory" selected>MARCORY</option>
                            <option value="port-bouet">PORT-BOUET</option>
                            <option value="plateau">PLATEAU</option>
                            <option value="treichville">TREICHVILLE</option>
                            <option value="yopougon">YOPOUGON</option>
                        </select>
                </div>
                <input type="submit" name="" value="ENVOYER">
                     </div>
                </div>
           </div>
          </form>
          <p style="margin-left:43%; color: red">
              <?php echo $erNom . '<br />' . $erreur ?>
          </p>
       </div>
    </div> 
    </div>      
</body>
</html>