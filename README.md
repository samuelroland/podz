# Podz
## Projet TPI - Application de publication de podcasts
Samuel Roland

## Documentations
- **[Documentation du projet](/docs/podz-docs.md)**
- **[Journal de travail](/docs/podz-journal.md)**

## Prérequis
### Compétences
Pour modifier ce projet vous avez besoin de savoir développer avec Laravel, apprendre Livewire, AlpineJS et TailwindCSS. Les premiers sont les 2 plus importants à savoir pour faire des modifications, les suivants peuvent être appris au fur et à mesure.

### Outils
Vous avez besoin de:
- PHP v8+
- MySQL v8+
- Git v2+
- An IDE for PHP: VSCode with some specific extensions, PHPStorm, ...

## Mise en place
## Mise en place de l'environnement

Configurer votre fichier `php.ini` pour activer les extensions suivantes:
- SQLITE
- PDO MySQL
- Openssl
- Curl
- GD
  
TODO: to check

### Mise en place du projet
1. Cloner le repository et aller dans le dossier:
    ```bash
    git clone https://github.com/samuelroland/galeriz.git
    cd galeriz
    ```
1. Installer les paquets Composer NodeJS
    ```bash
    composer install
    npm install
    ```

1. Copier le fichier d'environnement et générer la clé d'application 
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    Créer une base de données nommée `podz` sur votre serveur MySQL, et remplissez les valeurs de DB_USERNAME et le DB_PASSWORD dans le fichier `.env`.

1. Créer le lien symbolique pour l'accès au stockage local
    ```bash
    php artisan storage:link
    ```

1. Créer les tables dans la base de données
    ```bash
    php artisan migrate
    ```

2. Si vous voulez développer Podz, vous pouvez remplir la base de données avec des données aléatoires de tests
    ```bash
    php artisan db:seed
    ```

3. Plus tard, si vous souhaiter recréer votre base de données et y ajouter des données de tests
    ```bash
    php artisan migrate:fresh --seed
    ```

### Lancer le serveur de développement

1. Vous avez besoin de compiler les fichiers JS et CSS avec Laravel Mix en mode watch (rafraichissement à chaque modification):
    ```bash
    npm run watch
    ```
    Le résultat de ce processus est le fichier `public/css/app.css` et `public/js/app.js`.
1. Si vous n'aller pas travailler dessus mais que vous avez juste besoin de voir l'application, vous pouvez lancer cette autre commande qui fait le processus 1 seule fois.
    ```bash
    npm run dev
    ```

2. Et dans un autre terminal, vous pouver démarrer votre serveur:
    ```bash
    php artisan server
    ```
3. Il ne reste plus qu'à ouvrir votre navigateur sur `localhost:8000` ou l'autre adresse affichée et vous devriez pouvoir vous connecter avec les identifiants suivants: `sam@example.com` - `password` ou vous créer un nouveau compte.

### Préparation et mise en production
Une fois l'environnement et le projet mis en place (sans le remplissage des données de tests), il faut compiler et optimiser les fichiers JS et CSS pour la production (minification, purgation, ...) afin d'être d'avoir des fichiers légers.

1. Pour compiler pour la production
    ```bash
    npm run prod
    ```
1. Vous pouvez maintenant démarrer un serveur Apache ou Nginx dans le dossier `public` puis visiter l'URL ou l'IP définie pour ce serveur.
