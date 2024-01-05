<?php
    // fonction pour gérer l'ajout des utilisateurs en bdd
    function addUtilisateur($bdd){
        // stocker les messages d'erreur
        $message = "";
        // test si le bouton est cliqué
        if(isset($_POST["submit"])){
            // test si les champs sont remplis
            if(!empty($_POST["nom_utilisateur"]) AND !empty($_POST["prenom_utilisateur"]) AND !empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"]) AND !empty($_POST["password_confirmation"])){
                // test si les 2 password sont identiques
                if($_POST["password_utilisateur"]===$_POST["password_confirmation"]){
                    // nettoyer mail
                    $email = cleanInput($_POST["mail_utilisateur"]);
                    // test si l'utilisateur n'existe pas
                    if(!getUtilisateurByMail($bdd,$email)){
                        // nettoyer entrée utilisateur
                        $nom = cleanInput($_POST["nom_utilisateur"]);
                        $prenom = cleanInput($_POST["prenom_utilisateur"]);
                        $password = password_hash(cleanInput($_POST["password_utilisateur"]), PASSWORD_DEFAULT);

                        // test si l'image a été importé
                        if($_FILES["image_utilisateur"]["tmp_name"] !=""){
                            $image = "/public/media/".$_FILES["image_utilisateur"]["name"];
                            // déplacement du fichier image
                            move_uploaded_file($_FILES["image_utilisateur"]["tmp_name"], $image);
                        }
                        // test pas d'image
                        else{
                            $image = '/public/media/Capture.PNG';
                        }
                        // ajouter l'utilisateur en bdd
                        insertUtilisateur($bdd,$nom,$prenom,$email,$password,'/public/media/Capture.PNG',1);
                        $message = "le compte a été ajouté en bdd";
                    }
                    // test si l'utilisateur existe en bdd
                    else{
                        $message = "l'utilisateur existe deja en bdd";
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