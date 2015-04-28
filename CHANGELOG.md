Changelog
=========

v1.6 (en développement)
----

* Le module des réseaux sociaux à totalement été revu. Vous n'avez plus à préciser le lien vers votre page facebook ou votre compte twitter depuis la configuration du panel. Vous pouvez désormais ajouter vos propres boutons customisables depuis une nouvelle interface. Vous pouvez choisir le texte qui sera afficher, le lien vers lequel le bouton redirigera, l'icône, la couleur et l'ordre d'affichage. Un aperçu est également disponible pour visualiser le bouton
* Vous pouvez désormais consulter l'utilisation du disque dur depuis l'administration (par Edered)
* Dans la boutique les prérequis des articles sont désormais affichés au survol de la souris sur les boutons d'achats
* Vous pouvez désormais générer jusqu'à 25 codes cadeaux en une seule fois
* La page équipe et son fonctionnement a entièrement été revue. Vous pouvez désormais définir n'importe quelle grade et n'importe quelle couleur à un membre. De plus si les réseaux sociaux de ce membre sont renseignés ils sont affichés sur la page qui liste tous les membre de l'équipe du serveur
* Corrections de bugs majeurs
* {CSS} Modification de custom.css
* {SQL} Modification de la table extaz_team

v1.5 (15/04/2015)
----

* Vous pouvez désormais ajouter un script de suivi Google Analytics
* Ajout d'un système de commentaire lié aux actualités. Les administrateurs ont accès à la liste des commentaires, ils peuvent aussi les éditer et les supprimer
* Vous pouvez maintenant générer des codes cadeaux et accéder à la liste des codes déjà générés. Les codes cadeaux octroient un nombre de token préfini par l'administrateur et s'utilisent sur la page de rechargement
* Corrections de bugs
* {CSS} Modification de custom.css
* {SQL} Ajout d'une table extaz_codes
* {SQL} Ajout d'une table extaz_comments

v1.4 (03/03/2015)
----

* Vous pouvez maintenant choisir un prefix pour le chat lié au serveur
* Vous pouvez maintenant choisir le nombre de messages à afficher dans le chat
* Ajout d'un slider désactivable depuis l'administration
* Possiblité de changer de background depuis l'administration
* Améliorations d'interface
* Corrections de bugs
* Modifications mineures
* {CSS} Modification de style.css
* {CSS} Modification de custom.css
* {SQL} Ajout d'un champs use_slider (int, default: 1) dans la table extaz_informations
* {SQL} Ajout d'un champs background (int, default: 3) dans la table extaz_informations
* {SQL} Ajout d'un champs chat_prefix (text, default: '') dans la table extaz_informations
* {SQL} Ajout d'un champs chat_nb_messages (int, default: 20) dans la table extaz_informations

v1.3 (23/01/2015)
----

* Vous pouvez désormais visualiser l'ensemble des joueurs connectés sur le serveur avec tout un tas d'informations (pseudo, gamemode, niveau, monde, santé, première et dernière connexion et l'IP). Vous pouvez aussi depuis cette page, kicker, bannir, bannir IP et clear l'inventaire du joueur.
* Ajout d'un graphique pour visualiser l’utilisation de la mémoire vive du serveur
* Ajout d'un graphique pour visualiser les achats boutiques
* Ajout d'un graphique pour visualiser les achats Starpass
* Ajout d'un graphique pour visualiser les achats PayPal
* Ajout d'un graphique pour visualiser les inscriptions
* Ajout de la fonction whois, pour obtenir des informations sur un joueur en particulier.
* Vous pouvez envoyer une commande au serveur directement depuis l'administration 
* Possibilité de voir le chat en jeu et d'y envoyer des messages directement depuis l'administration
* Ajout de la gestion des donateurs (liste, graphique, édition, suppression)
* Ajout de la gestion des membres de l'équipe, il y avait déjà la liste il y a maintenant l’édition et la suppression
* Corrections de bugs
* Modifications mineurs

v1.2 (11/01/2015)
----

* Amélioration du panel d'administration
* Corrections de bug

v1.1 (04/01/2015)
----

* Retour de Starpass, retrait d'Oxopass faille de sécurité corrigée merci à [MTC](http://www.bukkit.fr/index.php/user/8641-mtc/)
* Améliorations d'interface
* {SQL} Retour à la 1.0.5 au niveau de la base de données

v1.0.7 (inconnue)
------

* Starpass est remplacé par Oxopass pour des raisons de sécurité
* {SQL} La table extaz_starpass_history rename en extaz_oxopass_history

v1.0.6 (inconnue)
------

* Correction d'une faille de sécurité
* {SQL} Ajout d'un champs starpass_key (int, default: '') dans la table extaz_informations

v1.0.5 (inconnue)
------

* Ajout d'un background (image)
* Pages statistiques achats aujourd'hui, inscrits aujourd'hui, etc
* Les utilisateurs peuvent fermer eux même leurs tickets
* Amélioration de la page de gestion des tickets non résolus
* Améliorations d'interface
* Corrections de bugs
* Optimisation du code
* {SQL} Ajout d'un champs user_id (int) dans la table extaz_support

v1.0.4 (inconnue)
------

* Vous pouvez désormais éxecuter plusieurs commandes après l'achat d'un
   item dans la boutique
* Envoie d'un email de notification à l'utilisateur lorsque vous
   répondez à un ticket du support
* Possibilité de refuser de recevoir des emails dans le profil
* Ajout d'un historique pour les achats via PayPal
* Ajout d'un système de happy hour paramétrable
* Améliorations d'interface
* Corrections de bugs
* {SQL} Ajout d'un champ allow_email (int, default: 1) dans la table extaz_users
* {SQL} Ajout d'un champ happy_hour (int, default: 0) dans la table extaz_informations
* {SQL} Ajout d'un champ happy_hour_bonus (int, default: 20) dans la table extaz_informations

v1.0.3 (inconnue)
------

* Possibilité de désactiver l'achat via la monnaie du serveur pour un
   seul objet dans la boutique, mettez le prix à -1
* Création d'un module "meilleur donateur" et "dernier donateur" dans
   la sidebar (screen)
* Améliorations d'interface
* Corrections de bugs
* {SQL} Ajout d'une table extaz_donation_ladder
* {SQL} Ajout d'un champ use_donation_ladder (int, default: 1) dans la table extaz_informations

v1.0.2 (inconnue)
------

* Corrections de divers bugs

v1.0.1 (inconnue)
------

* Modification du footer

v1.0 (inconnue)
----

* Création du projet
