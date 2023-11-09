# TPproj

Le projet Senepart est une collaboration entre **Damien**, **Edouard** et **Tom** pour la première rotation, la seconde ayant pour membres **Hugo**, **Damien** et **Hassan**, ayant pour but d'offrir une expérience utilisateur optimale dans le domaine de la géolocalisation.

## 🌐 Adresses IP des Machines Virtuelles 

Les machines virtuelles dédiées au projet sont accessibles via les adresses IP suivantes:
- **Site Web** : `192.168.65.237`
- **Base de Données** : `192.168.64.200`

## 🗃 Base de Données : Lawrence 

Pour accéder à cette base de données, voici les identifiants:
- **Identifiant** : `root`
- **Mot de passe** : `root`

### Structure de la base de données

**TpGPS**

**Table : trame**

| Champ     | Type           | Spécificité          |
|-----------|----------------|----------------------|
| id        | int            | Clé primaire         |
| longitude | varchar(1000)  |                      |
| latitude  | varchar(1000)  |                      |
| date      | datetime       |                      |



## 📁 Structure du Code

Les fichiers et répertoires sont organisés :

 



### Fichiers Principaux :

- `acceuil.php` : Page d'accueil.
- `admin.php` : Gestion des informations de compte utilisateur.
- `connexion.php` : Page de connexion.
- `inscription.php` : Page d'inscription.
- `readme.md` : Documentation du code (ce fichier).

> **Conseil** : Pour une meilleure compréhension du projet, n'hésitez pas à parcourir chaque fichier et répertoire.
