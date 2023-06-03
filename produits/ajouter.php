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
    session_start();
    if(empty($_SESSION["user"])){
        header("location:login.php");
    }
    $q="select * from Categorie;";
    $r=mysqli_query($con,$q);
    if(isset($_POST["submit"])){
        $libelle=$_POST["libelle"];
        $dateachat=$_POST["date"];
        $prixu=$_POST["prixu"];
        $categorie=$_POST["categorie"];
        $img_name=$_FILES["photo"]["name"];
        $img_tmp=$_FILES["photo"]["tmp_name"];
        $folder='images/';
        move_uploaded_file($img_tmp,$folder.$img_name);
        $query="insert into produit values ('','$libelle','$prixu','$dateachat','$img_name','$categorie');";
        $result=mysqli_query($con,$query);
        if($result){
            $message="avec succes";
            header('location:acceuil.php?msg='.$message);
        }
    }

    ?>
</head>
<body>
<form method="POST" enctype="multipart/form-data" >
    <div class="container">
        <div class="row pt-4">
            <form action="" method="POST">
                <h2>Application gestion stagiaire</h2>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Libelle:</label>
                    <div class="col-sm-15">
                        <input type="text" name="libelle" placeholder="libelle" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Date Achat:</label>
                    <div class="col-sm-15">
                        <input type="date" name="date" placeholder="Date" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Catégorie:</label>
                    <div class="col-sm-15">
                        <select name="categorie" class="form-select" aria-label="Default select example" id="" required>
                            <option value="" >----------------------------</option>
                            <?php while($rows=mysqli_fetch_assoc($r)){ ?>
                            <option value="<?php echo $rows["idCategorie"]?>"><?php echo $rows["denom"]?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Prix Unitaire</label>
                    <div class="col-sm-15">
                        <input type="number" name="prixu" placeholder="Prix Unitaire" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">Photo:</label>
                    <div class="col-sm-15">
                        <input type="file" name="photo" class="form-control" accept="image/*" >
                    </div>
                </div>  

                <div class="col-sm-15">
                        <input type="submit" name="submit" value="Ajouter" class="btn btn-primary">    
                </div>
            </form>
        </div>
    </div>
</form>    
</body>
</html>