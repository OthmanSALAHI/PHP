<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Acceuil</title>
</head>
<?php
    require 'config.php';
    require 'menu.php';
    session_start();
    
    if (!empty($_SESSION["user"])){
     $user=$_SESSION["user"];
     $qr="select * from produit;";
     $rest=mysqli_query($con,$qr);
    }else{
     header('location:login.php');
    }
    ?>
<body>
<?php
    $time = date("H");
    if ($time >= 6 && $time < 18) {
        echo '<h2 style="text-align: center;">Bonjour, ' . $user . '!</h2>';
    } else {
        echo '<h2 style="text-align: center;">Bonsoir, ' . $user . '!</h2>';
    }
?>
    <div class="container">
        <div class="row pt-4">
            <h2 style="text-align: center;">Produits</h2>
            <h4 style="text-align: center; color:green;"><?php if(isset($_GET["msg"])){
                echo $_GET["msg"];
            }
            ?></h4>
        </div>
        <table class="table table-stripped mt-3">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Libelle</th>
                    <th>Prix Unitaire</th>
                    <th>Date Achat</th>
                    <th>Photo Produit</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($r= mysqli_fetch_assoc($rest)){ ?>
                    <tr>
                        <td><?php echo $r["reference"]; ?></td>
                        <td><?php echo $r["libelle"]; ?></td>
                        <td><?php echo $r["prixu"]; ?></td>
                        <td><?php echo $r["dateachat"]; ?> </td>
                        <td><img style="width:60px;" src="images/<?php echo $r["photoproduit"]; ?>" alt=""></td>
                        <td><?php $categoryId = $r["idCategorie"]; $query = "select denom from Categorie where idCategorie = $categoryId"; $result = mysqli_query($con, $query); $row = mysqli_fetch_assoc($result); echo $row["denom"];?> </td>
                        </td>
                        <td>
                        <a href="edit.php?ref=<?php echo $r["reference"]?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                        <a href="delete.php?ref=<?php echo $r["reference"]?>"><button type="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button></a>
                    </td>
                    </tr>
                    <?php } ?>
                    
            </tbody>
        </table>
</body>
</html>