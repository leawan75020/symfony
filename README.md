# symfony-pizza
CRUD= create read update delete: les actions à réaliser sur une enitié




Création d'un projet symfony:
 1- ouvrir le terminal dans un dossier qui va contenir le projet
 2- la commande: symfony new nom-du-projet --webapp
 2.bis- ouvrir le dossier crée (donc le projet crée par la commande) dans VsCode et ouvrir le terminal intégré dans VsCode
 3- lancer le serveur apache (wamp, xamp, mamp...)
 4- Modifier le fichier .env
                a- mettre en commentaire la ligne 28
                b- décommenter la ligne 27
                c- remplacer la ligne 27 par les bons paramètres . exemple: DATABASE_URL="mysql://root@127.0.0.1:3306/bd_calculatrice?serverVersion=8&charset=utf8mb4"
                d- sauvegarder
5- exécuter la commande : symfony console doctrine:database:create
6- lancer le serveur symfony avec la commande: symfony server:start --port=4444
7- en cas d'erreur dans le lancement du serveur
        a- exécuter:           symfony server:stop               
        b- refaire l'étape 6




Création d'un controller : 


                symfony console make:controller nom_du_controller


Création d'une entité:


 1.                 symfony console make:entity nom_de_l'entite


2.          interagir avec la console en lisant les messages et en ajoutant les propriétés au fur et à mesure 
3. mettre à jour le schéma de la base de données:    
symfony console doctrine:schema:update  --force
ou bien avec la commande:
symfony console d:s:u -f
