<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="css/navbar.css">


<nav class="navbar navbar-expand-lg navbar-light" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <a class="navbar-brand" href="#"><img src="img/logojess01.jpg" class="logojess"/></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./">HOME <span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="?p=presentation" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    PRESENTATION
                </a>
                <div class="dropdown-menu active" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="?p=myadmin">Se connecter</a>
                    <div class="dropdown-divider"><hr></div>
                    <a class="dropdown-item" href="?p=ajoupres">Ajouter une image</a>
                    <a class="dropdown-item" href="?p=presentation">Lire les images</a>
                    <a class="dropdown-item" href="?p=updatepres">Modifier une image</a>
                    <a class="dropdown-item" href="?p=deletepres">Supprimer une image</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?p=Tutos">TUTOS <span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?p=projet">PROJET<span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="?p=liens.php" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    LIENS
                </a>
                <div class="dropdown-menu active" aria-labelledby="navbarDropdown2">
                    <a class="dropdown-item" href="?p=myadmin">Se connecter</a>
                    <div class="dropdown-divider"><hr></div>
                    <a class="dropdown-item" href="?p=ajoutliens">Ajouter un lien</a>
                    <a class="dropdown-item" href="?p=liens_admin">Lire les liens</a>
                    <a class="dropdown-item" href="?p=updateliens">Modifier un lien</a>
                    <a class="dropdown-item" href="?p=deleteliens">Supprimer un lien</a>
                </div>
            </li>
            <li class="nav-item active">
                <a href="?p=cv1" class="nav-link">CV<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a href="?p=liste_contact" class="nav-link">CONTACT<span class="sr-only"></span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="badge badge-pill badge-success badge-lg my-2 my-sm-0" type="button"><a href="?p=myadmin" style="color:white;"><h4>SE DECONNECTER</h4></a></button>
        </form>
    </div>
</nav>
