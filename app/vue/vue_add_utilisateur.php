<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>
    <?php include "./app/vue/vue_navbar.php"?>
    <h1>S'inscrire</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nom_utilisateur">Saisir le nom de l'utilisateur</label>
        <input type="text" name="nom_utilisateur">
        <label for="prenom_utilisateur">Saisir le prénom de l'utilisateur</label>
        <input type="text" name="prenom_utilisateur">
        <label for="mail_utilisateur">Saisir le mail de l'utilisateur</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir le mot de passe</label>
        <input type="password" name="password_utilisateur">
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation">
        <label for="image_utilisateur">Ajouter une image</label>
        <input type="file" name="image_utilisateur">
        <input type="submit" value="S'inscrire" name="submit">
    </form>
    <!-- Message pour gérer les erreurs-->
    <p><?=$message?></p>
</body>
</html>