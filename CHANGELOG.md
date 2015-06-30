CHANGELOG
=========

v1.8 (en développement)
----

* Migration de CKeditor vers Summernote
* Vous pouvez désormais utiliser des variables dans les pages personnalisées (ex: %pseudo%, %email%, %groupe% etc)
* Pour éxécuter une commande via un produit de la boutique vous devez maintenant utiliser %player% pour désigner un joueur et &&& pour ajouter une nouvelle commande, ceci est également valable pour le système de vote
* Ajout du système de vote et gagne, vous pouvez faire gagner des tokens et/ou exécuter un/des commande(s)
* Vous pouvez désormais "réparer" le CMS depuis l'administration. Le CMS récupére les correctifs via GitHub puis les installe lui même
* Vous pouvez désormais uploader vos propres backgrounds depuis l'administration
* Les utilisateurs peuvent désormais visualiser l'historique des codes cadeaux déjà utilisés
* Vous pouvez désormais choisir la quantité lorsque vous achetez un produit dans la boutique
* Vous pouvez désormais mettre un produit en promotion dans la boutique
* Vous pouvez désormais cacher un produit dans la boutique
* Corrections de bugs mineurs
* {JS} Ajout de dropzone.js
* {CSS} Ajout de dropzone.css
* {CSS} Modification de custom.css
* {CSS} Modification de app.css
* {CAKE} Modification des routes

v1.7 (10/06/2015)
----

* Nettoyage du code PHP
* Vous pouvez désormais ajouter, éditer et supprimer très facilement des pages via le panel d'administration
* Chaque utilisateur peut désormais visualiser l'historique de toutes ses transactions à savoir : achats dans la boutique, achats starpass, achats paypal et les transactions de tokens
* Un rang modérateur est désormais diponible lors de l'édition d'un utilisateur, ce groupe modérateur a accès au panel d'administration, mais uniquement à la partie support. Cependant ils ont également la possibilité de modérer les commentaires et d'accéder au chat en temps réel
* Vous pouvez ajouter manuellement un prérequis (pour la boutique) à un utilisateur
* Lorsqu'une happy hour est en cours ce n'est plus affiché dans la sidebar. En revanche un bandeau publicitaire apparait sur chaque page pour prévenir les utilisateurs
* Vous pouvez désormais désactiver les captchas sur la page d'inscription et sur la page de contact
* Les utilisateurs peuvent désormais s'envoyer des tokens entre eux. Vous pouvez définir un taux de perte pour chaque transaction. Par exemple si vous fixez un taux de perte à 25% et qu'un utilisateur envoie 400 tokens, le destinataire n'en recevra que 300. Vous pouvez fixez un taux de perte entre 0 et 100%. Un historique des transactions est également disponible pour les administrateurs
* Refonte graphique de la boutique
* Dans la boutique les catégories ont désormais une réèlle utilité, vous pouvez désormais trier les produits grâce à leurs catégories sans recharger la page
* Vous pouvez désormais consulter la liste des plugins installés sur votre serveur depuis le panel d'administration
* Lors de l'envoi d'un message au support vous devez maintenant préciser le type de requête, signalement, question ou autre. Par conséquent vous pouvez désormais signaler un joueur via les tickets du support. Dans l'administration les signalements sont graphiquement différent des autres requêtes
* Si le port de votre serveur est 25565 alors il n'est pas affiché dans le header (à côte de l'adresse ip du serveur)
* Corrections de bugs mineurs
* {JS} Ajout de custom.js
* {JS} Ajout de humane.js
* {CSS} Ajout de flatty.css
* {CSS} Modification de app.css
* {CSS} Modification de custom.css
* {CSS} Modification de custom.css (admin)
* {CAKE} Modification des routes

v1.6 (14/05/2015)
----

* Vous pouvez désormais mettre le site en maintenance, ce qui aura pour effet d'empêcher tous les utilisateurs d'accéder au site. Cependant les administrateurs pourront toujours se connecter et naviguer normalement
* Le module des réseaux sociaux à totalement été revu. Vous n'avez plus à préciser le lien vers votre page facebook ou votre compte twitter depuis la configuration du panel. Vous pouvez désormais ajouter vos propres boutons customisables depuis une nouvelle interface. Vous pouvez choisir le texte qui sera afficher, le lien vers lequel le bouton redirigera, l'icône, la couleur et l'ordre d'affichage. Un aperçu est également disponible pour visualiser le bouton
* Vous pouvez désormais consulter l'utilisation du disque dur depuis l'administration (par Edered)
* Dans la boutique les prérequis des articles sont désormais affichés au survol de la souris sur les boutons d'achats
* Vous pouvez désormais générer jusqu'à 250 codes cadeaux en une seule fois
* La page équipe et son fonctionnement a entièrement été revue. Vous pouvez désormais définir n'importe quelle grade et n'importe quelle couleur à un membre. Un aperçu en direct est également disponible lors de l'ajout et de l'édition d'un membre. Si les réseaux sociaux de ce membre sont renseignés ils sont affichés sur la page de l'équipe du serveur
* Corrections de bugs majeurs
* {CSS} Modification de custom.css
* {CSS} Modification de app.css
* {CSS} Modification de less-style.css (admin)
* {CSS} Ajout d'un fichier selectBoxIt.css
* {CSS} Ajout d'un fichier custom.css (admin)
* {JS} Ajout d'un fichier selectBoxIt.js


v1.5 (15/04/2015)
----

* Vous pouvez désormais ajouter un script de suivi Google Analytics
* Ajout d'un système de commentaire lié aux actualités. Les administrateurs ont accès à la liste des commentaires, ils peuvent aussi les éditer et les supprimer
* Vous pouvez maintenant générer des codes cadeaux et accéder à la liste des codes déjà générés. Les codes cadeaux octroient un nombre de token préfini par l'administrateur et s'utilisent sur la page de rechargement
* Corrections de bugs
* {CSS} Modification de custom.css

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
