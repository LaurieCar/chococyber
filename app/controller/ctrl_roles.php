<?php
    //fonction pour gérer l'ajout des roles en bdd
    function addRoles($bdd){
        // stocker les messages d'erreur
        $message = "";
        // test si le bouton est cliqué
        if(isset($_POST["submit"])){
            //tester si le champ non_roles est rempli
            if(!empty($_POST["nom_roles"])){
                // nettoyer nom_roles
                $nom = cleanInput($_POST["nom_roles"]) ;
                //test si le role n'existe pas
                if(empty(getRolesByName($bdd,$nom))){
                    // ajouter le role en bdd
                    addRoles($bdd,$nom);
                    $message = "Le role ".$nom." a été ajouté en BDD";
                }
                //test si le role existe deja en bdd
                else{
                    $message= "Le role ".$nom." existe deja en bdd";
                }
            }
            // test si nom_roles est vide
            else{
                $message = "Veuillez remplir le champ de formulaire";
            }

        }
        // importer la vue (fichier html)
        include_once './app/vue/vue_add_roles.php';
    }

    function showAllRoles($bdd){
        $message = "";
        // Recuperation de la liste des roles
        $roles = getAllRoles($bdd);
        // test si la liste est vide
        if(!$roles){
            $message = "Il n'y a pas de roles dans la BDD";
        }
        // importer la vue (fichier html)
        include_once './app/vue/vue_get_all_roles.php';
    }

   function updateRoles($bdd){
        //nettoyer id
        $id = cleanInput($_GET["id"]);
        // test si le role existe (par son id)
        if(empty(getRolesById($bdd,$id))){
            header('location: /mvccyber/roles/all');
        }
        // variable message erreur
        $message = "";
        // tester si le bouton est submit
        if(isset($_POST["submit"])){
            // tester si le champ nom_roles est rempli
            if(!empty($_POST["nom_roles"])){
                //nettoyer nom_roles
                $nom = cleanInput($_POST["nom_roles"]);
                // test si le role n'existe pas
                if(empty(getRolesByName($bdd,$nom))){
                    // modifier le role en BDD
                    updateRolesByName($bdd,$id,$nom);
                    $message = "Le role ".$nom." a été modifié en BDD";
                    // redirection quand modifié
                    header("Refresh:1; url=/mvccyber/roles/all");
                }
                // test si le role existe déja en bdd
                else{
                    $message = "Le role ".$nom. " existe déja en bdd";
                }
            }
            // test si nom_roles est vide
            else{
                $message = "Veuillez remplir le champ de formulaire";
            }

        }
        // importer la vue
        include_once './app/vue/vue_update_roles.php';
   }
?>