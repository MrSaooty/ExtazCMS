ExtazCMS
========
 - Topic bukkit.fr : [cliquez ici](http://www.bukkit.fr/index.php/topic/15381-107-extazcms-un-v%C3%A9ritable-site-pour-votre-serveur-minecraft/)
 - Changelog : [cliquez ici](https://github.com/MrSaooty/ExtazCMS/blob/master/CHANGELOG.md)

Installation du CMS
-------------------
 1. Téléchargez l'archive puis décompressez là
 2. Placez son contenu à la racine de votre FTP ou dans votre dossier www
 3. Exécutez le fichier tables.sql dans votre base de données
 4. Rendez vous dans app/Config/database.php et modifier les lignes 225 et 230
 5. La ligne 225 doit être composée de chiffres ou de lettres et être extrêmement longue
 6. La ligne 230 ne doit contenir que des chiffres et également très longue.  Après avoir modifié ces lignes n'y touchez plus jamais. Elles servent entre autre au cryptage des mots de passe. Si vous les modifiez à nouveau plus personne ne pourra se connecter à l'espace membre
 7. Le CMS fonctionne correctement rendez vous sur celui-ci et inscrivez-vous. Le premier compte créé est automatiquement administrateur. Rendez vous maintenant dans administration puis modifier les informations

**CAPTCHA**

Le captcha fournit par [Are You A Humain](http://areyouahuman.com/)    nécessite néanmoins une clef de sécurité personnelle, par défaut deux    clefs sont fournies avec le CMS mais celles-ci sont disponibles    publiquement. Pour la sécurité de votre CMS, créez un compte sur le    site de Are You A Human    ([ici](http://portal.areyouahuman.com/signup/basic)) puis ajoutez un    site et récupérez vos deux clefs de sécurité et modifiez les dans    app/Lib/AYAH/ayah_config.php.

Starpass
--------
 - Url de la page d'accès : http://votre-site.fr/recharger
 - Url du document: http://votre-site.fr/starpass
 - Url de la page d'erreur: http://votre-site.fr/recharger

----------


