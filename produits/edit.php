<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter</title>
    <?php 
    require 'config.php';
    require 'menu.php';
    $ref=$_GET["ref"];
    $q="select * from produit where reference = '$ref';";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($res);
    $qeury1="SELECT * FROM Categorie ;";
    $result1=mysqli_query($con , $qeury1);
    ?>
    <?php
    if(isset($_POST["submit"])){
        $lib=$_POST["libelle"];
        $date=$_POST["date"];
        $categorie=$_POST["categorie"];
        $prixu=$_POST["prixu"];
        $query="update produit set libelle='$lib', prixu='$prixu', dateachat='$date', idCategorie='$categorie' where reference='$ref';";
        $result=mysqli_query($con,$query);
        if($result){
            header("location:acceuil.php");
        }
    } 
    
    ?>
</head>
<body>
<form method="POST">
    <div class="container">
        <div class="row pt-4">
            <form action="" method="POST">
                <h2>Application gestion stagiaire</h2>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Libelle:</label>
                    <div class="col-sm-10">
                        <input type="text" name="libelle" placeholder="libelle" class="form-control" value="<?= $row["libelle"]; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Date Achat:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" placeholder="Date" class="form-control" value="<?php echo $row["dateachat"];?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Catégorie:</label>
                    <div class="col-sm-10">
                        <select name="categorie" class="form-select" aria-label="Default select example" id="" required>
                            <option value="" >----------------------------</option>
                            <?php while ($rows=mysqli_fetch_assoc($result1)) {?>
                            <option value="<?php echo $rows["idCategorie"] ?>" <?php if($row["idCategorie"]==$rows["idCategorie"])echo "selected"?> ><?= $rows["denom"] ?></option>
                            <?php }?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Prix Unitaire</label>
                    <div class="col-sm-10">
                        <input type="number" name="prixu" placeholder="Prix Unitaire" value="<?php echo $row["prixu"];?>" class="form-control" required>
                    </div>
                </div>                       
                <div class="col-sm-10">
                        <input type="submit" name="submit" value="EDIT" class="btn btn-primary">    
                </div>
            </form>
        </div>
    </div>
</form>    
</body>
</html>