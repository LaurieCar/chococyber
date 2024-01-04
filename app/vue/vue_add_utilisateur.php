<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form>
        <label for="nom_utilisateur">Saisir le nom de l'utilisateur</label>
        <input type="text" name="nom_utilisateur">
        <label for="prenom_utilisateur">Saisir le prénom de l'utilisateur</label>
        <input type="text" name="prenom_utilisateur">
        <label for="mail_utilisateur">Saisir le mail de l'utilisateur</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir le mot de passe</label>
        <input type="password" name="password_utilisateur">
        <label for="password_verif">Confirmer le mot de passe</label>
        <input type="password" name="password_verif">
        <label for="image_utilisateur">Ajouter une image</label>
        <input type="file" name="image_utilisateur">
        <input type="submit" value="Ajouter" name="submit">
    </form>
    
    <p><?=$message?></p>
</body>
</html>