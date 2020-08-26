# L'Usine

Site en production: [usine.ch](https://usine.ch)

Une version de développement est disponible: [dev.usine.ch](https://dev.usine.ch).

## Contribuer

[Comment contribuer au site de L'Usine](https://github.com/usine/contribuer.usine.ch)

## Développement local

**Prérequis**
- git
- php

**1. Cloner le site en local**

```sh
git clone git@github.com:usine/usine.ch.git
cd usine.ch
```

**2. Installer les dépendances**

```sh
composer install
```

**3. Préparer la base de données**

Créer une base de données MySQL avec les accès corrects

**4. .env**

Dupliquer le fichier `.env.example` en `.env` et remplir les différentes variables.

Pour la variable APP_KEY, vous pouvez utiliser la commande suivante:
```sh
php artisan key:generate
```

**5. Migration**

Lancer les migrations de la base de données.

Avec données de test:
```sh
php artisan migrate:fresh --seed
```

Sans données de test:
```sh
php artisan migrate:fresh
```

**6. Création d'un premier utilisateur**

```sh
php artisan tinker
```

Puis, en remplaçant les valeurs:
```
DB::table('users')->insert(['name'=>'name','email'=>'email@example.com','password'=>Hash::make('password')])
```
