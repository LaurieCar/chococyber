<?php
    // fonction pour gérer l'ajout des utilisateurs en bdd
    function insertUtilisateur($bdd){
        // stocker les messages d'erreur
        $message = "";
        // test si le bouton est cliqué
        if(isset($_POST["submit"])){
            // test si les champs sont remplis
            if(!empty($_POST["nom_utilisateur"]) AND !empty($_POST["prenom_utilisateur"]) AND !empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"]) AND !empty($_POST["password_verif"])){
                // test si les 2 password sont identiques
                if($_POST["password_utilisateur"]===$_POST["password_verif"]){
                    // nettoyer mail et password
                    $email = cleanInput($_POST["mail_utilisateur"]);
                    $password = cleanInput($_POST["password_utilisateur"]);
                    $password_verif = cleanInput($_POST["password_verif"]);
                    // nettoyer nom et prenom
                    $nom = cleanInput($_POST["nom_utilisateur"]);
                    $prenom = cleanInput($_POST["prenom_utilisateur"]);
                    // hasher le mdp
                    $hash = password_hash($password,PASSWORD_DEFAULT);
                    $hash_verif = password_hash($password_verif,PASSWORD_DEFAULT);
                    // test si l'utilisateur n'existe pas
                    if(empty(getUtilisateurByMail($bdd,$email))){
                        // ajouter l'utilisateur en bdd
                        addUtilisateur($bdd,$nom,$prenom,$email,$hash,$hash_verif);
                        $message = "l'utilisateur ".$nom .$prenom." a été ajouté en bdd";
                    }
                    // test si l'utilisateur existe en bdd
                    else{
                        $message = "l'utilisateur ".$nom .$prenom." existe deja en bdd";
                    }
                }
                // test si les mots de passe sont différents
                else{
                    $message = "Les mots de passe ne sont pas identiques";
                }
            }
            // test si les champs ne sont pas remplis
            else{
                $message = "Veuillez remplir tous les champs du formulaire";
            }
        }
        
        // importer la vue (fichier html)
        include_once './app/vue/vue_add_utilisateur.php';
    }
?>