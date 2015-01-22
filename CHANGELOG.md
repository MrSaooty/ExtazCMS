Changelog
=========

v1.3
----

 - Vous pouvez désormais visualiser l'ensemble des joueurs connectés sur le serveur avec tout un tas d'informations (pseudo, gamemode, niveau, monde, santé, première et dernière connexion et l'IP). Vous pouvez aussi depuis cette page, kicker, bannir, bannir IP et clear l'inventaire du joueur.
 - Ajout d'un graphique pour visualiser l’utilisation de la mémoire vive du serveur
 - Ajout d'un graphique pour visualiser les achats boutiques
 - Ajout d'un graphique pour visualiser les achats Starpass
 - Ajout d'un graphique pour visualiser les achats PayPal
 - Ajout d'un graphique pour visualiser les inscriptions
 - Ajout de la fonction whois, pour obtenir des informations sur un joueur en particulier.
 - Vous pouvez envoyer une commande au serveur directement depuis l'administration 
 - Possibilité de voir le chat en jeu et d'y envoyer des messages directement depuis l'administration
 - Ajout de la gestion des donateurs (liste, graphique, édition, suppression)
 - Ajout de la gestion des membres de l'équipe, il y avait déjà la liste il y a maintenant l’édition et la suppression
 - Corrections de bugs
 - Modifications mineurs

v1.2
----

 - Amélioration du panel d'administration
 - Corrections de bug

v1.1
----

 - Retour de Starpass, retrait d'Oxopass faille de sécurité corrigée merci à [MTC](http://www.bukkit.fr/index.php/user/8641-mtc/)
 - Améliorations d'interface
 - {SQL} Retour à la 1.0.5 au niveau de la base de données

v1.0.7
------

 - Starpass est remplacé par Oxopass pour des raisons de sécurité
 - {SQL} La table extaz_starpass_history rename en extaz_oxopass_history

v1.0.6
------

 - Correction d'une faille de sécurité
 - {SQL} Ajout d'un champs starpass_key dans la table extaz_informations

v1.0.5
------

 - Ajout d'un background (image)
 - Pages statistiques achats aujourd'hui, inscrits aujourd'hui, etc
 - Les utilisateurs peuvent fermer eux même leurs tickets
 - Amélioration de la page de gestion des tickets non résolus
 - Améliorations d'interface
 - Corrections de bugs
 - Optimisation du code
 - {SQL} Ajout d'un champs user_id dans la table extaz_support

v1.0.4
------

 - Vous pouvez désormais éxecuter plusieurs commandes après l'achat d'un
   item dans la boutique
 - Envoie d'un email de notification à l'utilisateur lorsque vous
   répondez à un ticket du support
 - Possibilité de refuser de recevoir des emails dans le profil
 - Ajout d'un historique pour les achats via PayPal
 - Ajout d'un système de happy hour paramétrable
 - Améliorations d'interface
 - Corrections de bugs
 - {SQL} Ajout d'un champ allow_email dans la table extaz_users
 - {SQL} Ajout d'un champ happy_hour dans la table extaz_informations
 - {SQL} Ajout d'un champ happy_hour_bonus dans la table
   extaz_informations

v1.0.3
------

 - Possibilité de désactiver l'achat via la monnaie du serveur pour un
   seul objet dans la boutique, mettez le prix à -1
 - Création d'un module "meilleur donateur" et "dernier donateur" dans
   la sidebar (screen)
 - Améliorations d'interface
 - Corrections de bugs
 - {SQL} Ajout d'une table extaz_donation_ladder
 - {SQL} Ajout d'un champ use_donation_ladder dans la extaz_table
   informations

v1.0.2
------

 - Corrections de divers bugs

v1.0.1
------

 - Modification du footer

v1.0
----

 - Création du projet
