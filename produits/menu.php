<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .bg-nav{
            box-shadow:0 .5rem 1.5rem rgba(0,0,0,.1);
            background: #fff;
            z-index: 1000;
        }
        .navbar .navbar-brand{
        	color: #0f056b;
        	font-weight: bold;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #666;
            font-weight: bold;
        }
        .navbar-light .navbar-nav .nav-link:hover{
            color: #fff;
            background: #0f056b;
            border-radius: 5px;
        }
        .navbar-text{
        	color: #666;
            font-weight: bold;
        }
        .container{
        	margin-top: 2rem;
        	background-color: #fff;
        	border-radius: 5px;
        	box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
        }
        .red-icon{
        	color: red;
        	cursor: pointer;
        }

    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>MENU</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Application Produits</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="acceuil.php">Acceuil</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ajouter.php">Ajouter un produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Quitter la session</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>