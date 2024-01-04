<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Liste des roles</title>
</head>
<body>
    <h1>Liste des roles :</h1>
    <!-- afficher la liste des roles --> 
    <?php foreach($roles as $role):?>
        <p><?=$role["id_roles"]." : ".$role["nom_roles"]?><a href="/mvccyber/roles/update/id?id=<?=$role["id_roles"]?>"><i class="fa-solid fa-pen"></i></a></p>
    <?php endforeach?>
    <!-- créer une liste deroulante-->
    <select name="">
        <?php foreach($roles as $role):?>
            <option value="<?=$role["id_roles"]?>"><?=$role["nom_roles"]?></option>
        <?php endforeach?>
    </select>

    <p><?= $message ?></p>
</body>
</html>