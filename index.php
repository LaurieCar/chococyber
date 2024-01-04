<?php
    // import configuration BDD
    include_once './app/utils/bddConnect.php';
    // import des fonctions utilitaires
    include_once './app/utils/utilitaire.php';
    // importer les model (requete sql)
    include_once './app/model/model_roles.php';
    // import des controllers
    include_once './app/controller/ctrl_page.php';
    include_once './app/controller/ctrl_roles.php';
    // utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    // Analyse de l'url avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    // test si l'url possède une route sinon on renvoie à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    switch ($path){
        case '/mvccyber/':
            home();
            break;
        case '/mvccyber/exemple':
            exemple();
            break;
        case '/mvccyber/roles/add':
            insertRoles($bdd);
            break;
        case '/mvccyber/roles/all':
            showAllRoles($bdd);
            break;
        case '/mvccyber/roles/update/id':
            updateRoles($bdd);
            break;
        default:
            error();
            break;
    }