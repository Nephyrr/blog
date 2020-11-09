Blog créer par Lucas Perez

# Intro

C'est un blog pour m'entraîner à réaliser des sites e-commerce en Symfony. 

Ce site permet pour l'instant de pouvoir voir différents articles. 
Un espace de login permet de se connecter, sous différents status, 
un admin qui permet de modifier, supprimer, ajouter un article,
ou un utilisateur, qui peut seulement visualiser les articles. 

Affichage dynamique des articles (images des élèves de ma promo comme teste). 

Nouveautés que j'ai déjà réalisées, mais pas encore dans ce projet : 
Les translations, le contrôle des API


Pour configuer l'application : 

# vendor : 

Ajouter le vendor avec la commande :

composer update

# .env : 
Récupérer le code du fichier env.dist, créer un fichier .env et coller le code précédemment copié

# script
Dans le dossier bdd, script .sql de l'application, avec toutes les données à ajouter
# infos
DATABASE_URL=mysql://root:root@127.0.0.1:8889/blog?serverVersion=5.7

Identifiant : root

Mot de passe : root

Nom de la database : blog

# utilisation des identifiants
Indentifiants pour se connecter dans la partie login du blog 

Identifiants admins (accès à la modification des articles): 

mail : lucasperez702@gmail.com
mdp : 1234

mail : a@a.a
mdp : a

Identifiants utilisateurs (accès au visuel des articles):

mail : test@test.com
mdp : test

mail: euh@euh.com
mdp : euh


# Running the app : server
$ symfony server:start
