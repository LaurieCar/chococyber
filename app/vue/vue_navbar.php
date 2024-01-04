<!-- Menu connecté -->
<?php if(isset($_SESSION["connected"])):?>
    <nav>
        <ul>
            <li><a href="/mvccyber">Home</a></li>
            <li><a href="/mvccyber/roles/all">Afficher Roles</a></li>
            <li><a href="/mvccyber/roles/add">Ajouter Roles</a></li>
            <li><a href="/mvccyber/utilisateur/add">Inscription</a></li>
        </ul>
    </nav>
<!-- Menu visiteur -->
<?php else :?>
    <nav>
        <ul>
            <li><a href="/mvccyber">Home</a></li>
            <li><a href="/mvccyber/roles/all">Afficher Roles</a></li>
            <li><a href="/mvccyber/utilisateur/connexion">Connexion</a></li>
            <li><a href="/mvccyber/utilisateur/add">Inscription</a></li>
        </ul>
    </nav>
<?php endif ?>