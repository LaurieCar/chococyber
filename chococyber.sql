CREATE DATABASE chococyber;
use chococyber;

create table utilisateur(
id_utilisateur int primary key auto_increment not null,
nom_utilisateur varchar(50) not null,
prenom_utilisateur varchar(50) not null,
mail_utilisateur varchar(50) unique not null,
password_utilisateur varchar(100) not null,
image_utilisateur varchar(255),
statut_utilisateur tinyint(1) default 1,
id_roles int not null
)Engine=InnoDB;

create table roles(
id_roles int primary key auto_increment not null,
nom_roles varchar(50) not null
)Engine=InnoDB;

create table chocoblast(
id_chocoblast int primary key auto_increment not null,
slogan_chocoblast text not null,
date_chocoblast datetime not null,
statut_chocoblast tinyint(1) default 1,
cible_chocoblast int not null,
auteur_chocoblast int not null
)Engine=InnoDB;

create table commentaire(
id_commentaire int primary key auto_increment not null,
text_commentaire text not null,
date_commentaire datetime not null,
statut_commentaire tinyint(1) default 1,
id_chocoblast int not null,
auteur_commentaire int not null
)Engine=InnoDB;

-- ajout contraintes foreign key
alter table utilisateur
add constraint fk_ajouter_roles
foreign key(id_roles)
references roles(id_roles);

alter table chocoblast
add constraint fk_rediger_utilisateur
foreign key(auteur_chocoblast)
references utilisateur(id_utilisateur);

alter table chocoblast
add constraint fk_cibler_utilisateur
foreign key(cible_chocoblast)
references utilisateur(id_utilisateur);

alter table commentaire
add constraint fk_commenter_chocoblast
foreign key(id_chocoblast)
references chocoblast(id_chocoblast);

alter table commentaire
add constraint fk_ecrire_utilisateur
foreign key(auteur_commentaire)
references utilisateur(id_utilisateur);