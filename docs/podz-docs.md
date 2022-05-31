<div style="text-align: center; padding-top: 150px;">
<p style="text-align: center; border: none; font-size: 50px; font-weight: 500;">Documentation de Podz</p>
<p style="text-align: center; border: none; font-size: 2rem;">Application web de publication de podcasts</p>
<div style="display:flex; padding: 50px 100px; justify-content: center; font-family: Fira Code;">
<img src="logo.png" style="box-shadow: none">
</div>
<div style="display: flex; justify-content: center; margin-bottom: 50px;">
<img style="box-shadow: none; height: 100px; margin: 0px 10px;" src="imgs/tailwind.png" />
<img style="box-shadow: none; height: 100px; margin: 0px 10px;" src="imgs/alpine.png" />
<img style="box-shadow: none; height: 100px; margin: 0px 10px;" src="imgs/livewire.png" />
<img style="box-shadow: none; height: 100px; margin: 0px 10px;" src="imgs/laravel.png" />
</div>

<h2 style="text-align: center; border: none; font-size: 35px;">Projet TPI - 2022</h2>
<h2 style="text-align: center; border: none; font-size: 1.5rem;">Samuel Roland, SI-MI4A</h2>
</div>

<div class="page"/> 

<div style="font-size: 28px; margin-top: 20px;">Table des matières</div>

<div class="toc">

- [Analyse préliminaire](#analyse-préliminaire)<span class="atright">3</span>
  - [Introduction](#introduction)<span class="atright">3</span>
  - [Glossaire](#glossaire)<span class="atright">3</span>
  - [Objectifs](#objectifs)<span class="atright">4</span>
  - [Planification initiale](#planification-initiale)<span class="atright">5</span>
- [Analyse / Conception](#analyse--conception)<span class="atright">7</span>
    - [Technologies utilisées](#technologies-utilisées)<span class="atright">7</span>
    - [Outils d'aide](#outils-daide)<span class="atright">8</span>
    - [Modèle Conceptuel de Données](#modèle-conceptuel-de-données)<span class="atright">9</span>
    - [Modèle Logique de Données](#modèle-logique-de-données)<span class="atright">11</span>
    - [Maquettes](#maquettes)<span class="atright">12</span>
  - [Stratégie de test](#stratégie-de-test)<span class="atright">19</span>
    - [Où sont écrits les tests ?](#où-sont-écrits-les-tests-)<span class="atright">19</span>
    - [Les données de tests](#les-données-de-tests)<span class="atright">19</span>
    - [Comment lancer les tests ?](#comment-lancer-les-tests-)<span class="atright">21</span>
  - [Planification](#planification)<span class="atright">22</span>
  - [Dossier de conception](#dossier-de-conception)<span class="atright">24</span>
    - [Résumé des podcasts](#résumé-des-podcasts)<span class="atright">24</span>
    - [Visibilité des épisodes](#visibilité-des-épisodes)<span class="atright">24</span>
    - [Traduction](#traduction)<span class="atright">24</span>
    - [Vues de Jetstream](#vues-de-jetstream)<span class="atright">24</span>
    - [Routes](#routes)<span class="atright">24</span>
    - [Upload d'un fichier audio pour la création d'un épisode](#upload-dun-fichier-audio-pour-la-création-dun-épisode)<span class="atright">25</span>
    - [Suppression d'un épisode](#suppression-dun-épisode)<span class="atright">26</span>
    - [Éléments réutilisables](#éléments-réutilisables)<span class="atright">26</span>
- [Réalisation](#réalisation)<span class="atright">28</span>
  - [Dossier de réalisation](#dossier-de-réalisation)<span class="atright">28</span>
  - [Construction de la documentation](#construction-de-la-documentation)<span class="atright">29</span>
  - [Résultats des tests effectués](#résultats-des-tests-effectués)<span class="atright">30</span>
    - [Couverture des tests](#couverture-des-tests)<span class="atright">31</span>
- [Conclusions](#conclusions)<span class="atright">33</span>
  - [Erreurs restantes](#erreurs-restantes)<span class="atright">33</span>
  - [Objectifs atteints / non-atteints](#objectifs-atteints--non-atteints)<span class="atright">33</span>
  - [Difficultés particulières](#difficultés-particulières)<span class="atright">34</span>
  - [Points positifs / négatifs](#points-positifs--négatifs)<span class="atright">35</span>
  - [Bilan personnel](#bilan-personnel)<span class="atright">35</span>
  - [Suites possibles pour le projet](#suites-possibles-pour-le-projet)<span class="atright">36</span>
  - [Remerciements](#remerciements)<span class="atright">36</span>
- [Annexes](#annexes)<span class="atright">37</span>
  - [Résumé du rapport du TPI](#résumé-du-rapport-du-tpi)<span class="atright">37</span>
  - [Sources – Bibliographie](#sources--bibliographie)<span class="atright">37</span>
  - [Journal de travail](#journal-de-travail)<span class="atright">37</span>
  - [Manuel d'installation](#manuel-dinstallation)<span class="atright">37</span>
  - [Archives du projet](#archives-du-projet)<span class="atright">37</span>

</div>

<div class="page"/><!-- saut de page -->

## Analyse préliminaire
### Introduction

Podz est une application web de publication de podcasts, développée pour le TPI de Samuel Roland en SI-MI4A. Les auteurs peuvent créer des podcasts, publier et gérer des épisodes, planifier la publication d'épisodes dans le futur et les cacher. L'application est basée sous Laravel 9 et ne part pas d'un projet existant.

### Glossaire

- **AJAX**: Asynchronous JavaScript and XML: méthode pour faire des requêtes HTTP en arrière-plan dans un navigateur afin d'éviter un rechargement complet de la page 
- **BDD**: Behaviour Driven Development
- **Blade**: moteur de vue de Laravel
- **CSS**: Cascading Style Sheets
- **Framework**: ensemble de librairies et de conventions qui donnent un cadre pour développer une application
- **HTML**: Hypertext Markup Language
- **IDE**: Integrated Development Environment
- **JS**: JavaScript
- **MCD**: Modèle Conceptuel de Données
- **MLD**: Modèle Logique de Données
- **MVC**: Modèle Vue Contrôleur
- **PHP**: PHP Hypertext Preprocessor
- **POO**: Programmation orientée objet
- **RSS**: RDF Site Summary ou Really Simple Syndication: système de flux web pour diffuser du contenu (articles, podcasts, ...)
- **Sprint**: court cycle de travail (1-4 semaines) avec une revue du travail à la fin du cycle, généralement utilisé dans la méthode Scrum.
- **SQL**: Structured Query Language
- **Stack**: ensemble cohérent de technologies pour un but donné
- **Starter kit**: kit de démarrage permettant de sauter les premières étapes
- **TALL**: TailwindCSS - AlpineJS - Livewire - Laravel : stack de 4 frameworks web

<div class="together">

### Objectifs

Voici la liste des objectifs à atteindre, tirée du cahier des charges:

**Fonctionnalités générales (reprises d’un ancien projet)**
- Création de comptes utilisateurs.
- Authentification des utilisateurs.
- Il n’y aura pas de partie back-office ni de rôle administrateur.

Ces fonctionnalités sont implémentées par Jetstream, je n'ai donc pas besoin de les implémenter.

**Fonctionnalités détaillées selon le type d’utilisateur**
- En tant que visiteur (personne non authentifiée) :
  - Consultation de la liste des podcasts.
  - Consultation du détail d’un podcast : épisodes
  - Ecoute d’un épisode d’un podcast.
- En tant qu’utilisateur authentifié, en plus des fonctionnalités accessibles à tout visiteur :
    - Création d’un nouveau podcast, édition d’un de ses podcasts existant.  
  - Sur l’un de ses podcasts :
    - Affichage de la liste des épisodes avec toutes les données liées.
    - Ajout d’un nouvel épisode.
    - Edition d’un épisode.
    - Suppression d’un épisode.
</div>

**En plus de cela, le travail sera évalué sur les 7 points spécifiques suivants:**
1. Modélisation des données pertinentes (types, tailles, associations).
1. Respect du modèle MVC.
1. Ergonomie de l’interface utilisateur.
1. Gestion des erreurs de saisie des utilisateurs.
1. Respect des normes d’écriture de code.
1. Utilisation d’un SCM type git avec commits atomiques, petits et fréquents.
1. Lecture audio du podcast bien réalisée.

<div class="page">

### Planification initiale
Le projet n'a pas de méthode de gestion de projet formel, mais plutôt une adaptation de la méthode Scrum (je travaille en Sprint et mon chef de projet vient de faire des retours 1 fois par cycle). Je ne voulais pas partir avec des gros outils comme IceScrum, j'ai préféré partir sur GitHub Projects et gérer des Issues dans des Kanbans. Les étiquettes des Issues indiquent le temps estimé (ex : `t-3` = temps estimé de 3h). Le projet se découpe en 5 sprints, la majorité durent 1 semaine, entre le 02.05.2022 et le 31.05.2022. Comme demandé par l’expert 1, une tâche de documentation quotidienne (avec 4 cases à cocher pour les 4 jours de travail) existe pour chaque sprint (ce qui donne 1h par jour).

**Dates des sprints**:
- **Sprint 1**: du 02.05.2022 au 06.05.2022
- **Sprint 2**: du 09.05.2022 au 13.05.2022
- **Sprint 3**: du 16.05.2022 au 20.05.2022
- **Sprint 4**: du 23.05.2022 au 27.05.2022
- **Sprint 5**: du 30.05.2022 au 31.05.2022

Voici à quoi ressemble mes kanbans pour chaque Sprint:
![kanban](imgs/kanban-example.png)

La planification initiale rendue le premier jour dans un document séparé avait une mise en page peu pratique, j'ai donc repris les données et j'ai changé l'affichage pour plus de lisibilité. L'ordre des tâches est le même qu'il y avait dans les colonnes Todo sur GitHub au début du projet.  

<div class="page">

:[fragment](markdown-build/planification-initiale.md)

<div class="page"/>

## Analyse / Conception

#### Technologies utilisées
J'ai choisi la stack **TALL** (*TailwindCSS - AlpineJS - Livewire - Laravel*) pour ce projet, car je suis à l'aise avec ces 4 frameworks et parce qu'ils permettent d'être productif pour développer une application web.

**Petits aperçus de ces frameworks**
- **[Laravel](https://laravel.com/)**: un framework PHP basé sur le modèle MVC et en POO. Laravel donne accès à beaucoup de classes et fonctions très pratiques, d'avoir une structure imposée, d'avoir des solutions simples aux problèmes récurrents (traductions, authentification, gestion des dates, ...). Tout ceci simplifie beaucoup le développement d'applications web en PHP une fois qu'on est à l'aise avec les bases.
- **[Livewire](https://laravel-livewire.com/)**: un framework pour Laravel permettant de faire des composants fullstack réactifs. L'idée est d'utiliser la puissance de Blade et PHP pour avoir des parties réactives sur le frontend (normalement codées en Javascript) sans devoir coder des requêtes AJAX.
- **[AlpineJS](https://alpinejs.dev/)**: un petit framework Javascript relativement simple à apprendre, utilisée ici pour gérer certaines interactions que Livewire ne permet pas, ou qui concernent des états d'affichage (là où des requêtes sur le backend seraient inutiles). Les composants s'écrivent inline (sur les balises HTML directement). Très pratique pour afficher un dropdown, faire une barre de progression, ...
- **[TailwindCSS](https://tailwindcss.com/)**: un framework CSS, concurrent de Bootstrap mais centré autour des propriétés CSS (en ayant des classes utilitaires - "utility-first") au lieu de fournir des classes "composants". C'est très puissant pour construire rapidement des interfaces, en écrivant quasiment jamais de CSS pur. Pour faire du responsive c'est très pratique parce qu'il suffit d'utiliser un préfixe d'écran devant n'importe quelle classe pour utiliser des media queries. Par exemple, on peut utiliser `md:text-white` pour dire que le texte est blanc sur les écrans medium et au-dessus.

Divers:
- **[Jetstream](https://jetstream.laravel.com/2.x/introduction.html)**: Un starter Kit Laravel mettant en place les fonctionnalités d'authentification, tels que la connexion, la création de compte, la gestion du compte et beaucoup d'autres. L'option Livewire a été utilisée.

<div class="page"/>

#### Outils d'aide
Pour m'aider dans mon développement, j'ai utilisé différent outils, ils ne sont pas requis pour travailler sur Podz, mais peuvent être très utiles:
- **[Clockwork](https://underground.works/clockwork/)**: paquet Composer et extension web pour debugger les performances, les requêtes SQL, voir le temps d'exécution, ... Le paquet Composer est déjà installé.
![clockwork](imgs/clockwork.png)
- **[Laravel Valet](https://laravel.com/docs/9.x/valet)**: fait tourner des serveurs web avec Nginx les rendant accessibles via des domaines en `.test`. Ce qui me permet de faire tourner mon serveur sous `podz.test` en HTTPS sans avoir besoin de me soucier de démarrer et d'arrêter ce serveur ni de gérer plusieurs ports quand plusieurs serveurs sont allumés. L'outil fonctionne pour MacOS, mais des forks pour [Windows](https://github.com/cretueusebiu/valet-windows) et [Linux](https://cpriego.github.io/valet-linux/) existent également. Attention à bien suivre la procédure d'installation pour ne pas être coupé d'internet à cause du DNS local mal configuré.
![valet](imgs/valet.png)

</div>

<div class="page"/>

#### Modèle Conceptuel de Données
![MCD](MCD.png)
</div>

**Spécificités dans Episodes**:
- Les combinaisons du numéro et du podcast lié, ainsi que le titre et le podcast lié, sont uniques (exemple: on ne peut pas avoir 2 fois un épisode 4 du podcast "Summer stories", et on ne peut pas avoir 2 fois un épisode nommé "Summer 2020 review" du podcast "Summer stories").
- La date de création est définie par la date de création de l'épisode sur la plateforme, peu importe ses autres informations (la publication ou l'état caché n'a pas d'influence sur cette date). Cette date ne change jamais et n'est affichée qu'à l'auteur.
- La date de publication peut être dans le passé ou mais aussi dans le futur. Si elle est dans le futur, l'épisode n'est pas encore publié (jusqu'à la date définie). Ceci permet de programmer dans le futur une publication.
- Le champ Caché est par défaut à Faux et n'a pas d'effet dans ce cas. S'il est Vrai, l'épisode ne sera pas visible dans les détails du podcast.

**Spécificités dans Podcasts**:
- La combinaison du titre et de l'auteur est unique. Exemple: Michelle ne peut pas publier 2 podcasts s'appelant "My story", par contre Michelle et Bob peuvent chacun publier 1 podcast nommé "My story".

<div class="together">

#### Modèle Logique de Données

![MLD](MLD.png)

</div>

Ce MLD n'a pas été fait à la main mais a été rétro-ingéniéré depuis la base de données, après avoir codé les migrations. Certains champs (`two_factor_*`) sont créés par une migration générée par Jetstream, je n'en ai pas besoin mais je ne vais pas les retirer pour ne pas risquer de casser certaines vues existantes. Ce MLD omet volontairement les tables générées par Laravel et propres à chaque application Laravel (`sessions`, `migrations`, ...), une partie provient de migrations créées par Jetstream. Ne vous étonnez donc pas de trouver d'autres tables dans la base de données, je ne les utilise pas directement. 

Les champs `created_at` et `updated_at` sont gérés automatiquement par Laravel (grâce au timestamps activés dans la migration), je n'utilise que le `created_at` en lecture seulement.

<!--
Le concept complet avec toutes ses annexes :

Par exemple : 
•	Multimédia: carte de site, maquettes papier, story board préliminaire, …
•	Bases de données: interfaces graphiques, modèle conceptuel.
•	Programmation: interfaces graphiques, maquettes, analyse fonctionnelle…
•	…
-->
<div class="together">

#### Maquettes
Le gabarit est déjà designé par Jetstream. Voici ce que voit un visiteur (déconnecté):
![page](models/Gabarit-visitor.png)
Et maintenant ce que voit un auteur (connecté):
![page](models/Gabarit-author.png)
Pour pouvoir utiliser les fonctionnalités requises, voici la liste complète des pages nécessaires et leur maquette:

- Page Connexion
- Page Inscription
- Page Liste des podcasts
- Page Page Détails d'un podcast
  - Vue visiteur
  - Vue Détails et édition pour auteur
- Page Création d'un podcast

</div>

**Page Connexion**  
![page](models/Connexion.png)

**Page Inscription**  
![page](models/Inscription.png)

<div class="together">

**Page Liste des podcasts**  
Cette page est visible publiquement et c'est la page par défaut de l'application, on y accède également via le bouton "Podcasts" en haut à gauche. On peut cliquer sur un podcast pour accéder à ses détails.
![page](models/Podcasts_page.png)

</div>

<div class="together">

**Page Détails d'un podcast**

**Vue visiteur**  
Les visiteurs ne voient que les épisodes qui sont visibles et ils ne voient que le numéro, le titre, la description, l'audio et la date (mais sans l'heure et la minute de publication).
![page](models/Page_d%C3%A9tails_podcast_visiteur.png)
</div>

<div class="together">

**Vue Détails et édition pour auteur**  
L'auteur voit toutes les informations de ses podcasts contrairement au visiteur. L'auteur a une vue visiteur sur les podcasts qui ne lui appartiennent pas. Nous sommes le 09.05.2022 dans cette maquette, l'épisode 4 est caché et le 5 est planifié pour le 10.05.2022 à 15:08. L'épisode 4 est caché parce que l'auteur a décidé après coup de le remettre en privé. Voici l'apparence de la page quand un auteur la charge.
![page](models/Vue-auteur-podcast-details.png)
</div>

<div class="together">

Quand l'auteur clique sur les icônes d'édition, des formulaires s'affichent pour les éléments sélectionnés afin de permettre l'édition ou la suppression. Quand on clique sur `Nouvel épisode...` (voir maquette précédante), le formulaire de création apparaît juste en dessous. On peut éditer plusieurs éléments à la fois, il n'y aura pas de problèmes puisque la page ne se rafraîchit pas mais est découpée en plusieurs composants Livewire.
![page](models/Vue-auteur-podcast-details-edition.png)

</div>

<div class="together">

**Page Création d'un podcast**  
Simple formulaire pour créer un nouveau podcast, avec affichage des erreurs en dessous des champs si jamais les valeurs rentrées sont invalides.
![page](models/Page_cr%C3%A9er_podcast.png)
</div>

<div class="together">

### Stratégie de test

Cette section concerne la manière dont est testé Podz durant le projet. Je teste manuellement les fonctionnalités dans mon navigateur (Firefox) et j'écris aussi des tests automatisés avec PHPUnit (un framework PHP de tests). La plupart des fonctionnalités sont couvertes par ces tests automatisés et quand cela n'est pas le cas, je regarde à la main si cela fonctionne. 

La stratégie de développement est le BDD (Behaviour Driven Development). Cela consiste à écrire des tests qui testent le comportement avant de coder, s'assurer que le test plante, puis développer jusqu'à que le test passe. Ensuite on peut refactoriser pour augmenter la qualité tout en s'assurant que cela fonctionne. J'ai fait quelques tests unitaires mais la majorité sont des tests fonctionnels. Toute la suite de tests est lancée très fréquemment (plusieurs fois par jour) pour s'assurer qu'une nouvelle fonctionnalité n'a pas cassé une autre en chemin.
</div>
<!-- todo: check BDD meaning -->

#### Où sont écrits les tests ?
Tous les tests se trouvent dans le dossier `tests` à la racine du repository. Le dossier `Feature` contient les tests fonctionnels, `Unit` les tests unitaires et `Jetstream` les tests créé par Jetstream (ces derniers ont été retiré de `Feature` afin de ne pas les exécuter constamment).

#### Les données de tests

<!-- todo: à corriger -->
Des factories et le seeder ont été codés pour ne pas devoir rentrer des valeurs à la main. Dans mon seeder `DatabaseSeeder` je génère peu d'éléments (minimum de 2) pour les tests automatisés, afin d'accélérer l'exécution. Je génère plus d'éléments pour l'application locale afin d'avoir une situation plus réaliste dans le navigateur. Dans `EpisodeFactory`, j'ai fait en sorte que les épisodes soient toujours visibles et publiés dans le passé (afin d'éviter des tests qui plantent à cause de cette partie aléatoire non supportée). Quand les tests doivent avoir des épisodes cachés (pour tester les cas de visibilité), ils en créent eux-mêmes quelques-uns avant.

Etant le choix par défaut dans Laravel, j'ai utilisé le paquet Faker dans mes factories pour générer différents types de données. Le texte généré est en Lorem Ipsum. Ce qui est pratique comparé à l'écriture de données manuelles, c'est qu'on peut avoir des textes très longs permettant de valider dans nos interfaces que les valeurs extrêmes sont correctement affichées.

**Exemple de données fictives générées par Faker**:
![faker](imgs/faker-example.png)

Avant chaque test, on retourne à l'état initiale grâce au trait `RefreshDatabase`. Puis le seeder `DatabaseSeeder` s'exécute grâce au `$seed` défini à `true`. Ces 2 configurations sont faites dans `tests/TestCase.php`, ce qui permet au final que tous les tests sont lancées sur une base de données propre et remplie.

Afin de ne pas impacter la base de données de développement, les tests sont lancés sur une base de données SQLite en mémoire. Voici les lignes en bas du fichier de configuration de PHPUnit `phpunit.xml`, qui redéfinit 2 variables d'environnement permettant d'avoir une base de données en RAM.
```xml
<env name="DB_DATABASE" value=":memory:"/>
<env name="DB_CONNECTION" value="sqlite"/>
```

<div class="page">

#### Comment lancer les tests ?
Il est nécessaire d'avoir mis en place le projet et d'avoir l'extension PHP SQLite tout d'abord. Ensuite, il y a différentes manières de lancer les tests dans un terminal dans le dossier du projet:
- `php artisan test`
- `./vendor/bin/phpunit`
- `phpunit` (seulement si phpunit a été installé séparement/globalement)

Les tests en dehors du dossier `tests/Unit` et `tests/Feature` ne sont pas lancés. Pour exécuter les tests de Jetstream si besoin, il faut lancer `php artisan test tests/Jetstream` ou pour tout inclure `php artisan test tests`.

Vous pouvez passer des paramètres à `phpunit` (fonctionne aussi avec la commande `php artisan test`).

**Exemples**:
1. pour exécuter seulement 1 test nommé `test_podcasts_page_exists` on peut filtrer:  
`php artisan test --filter test_podcasts_page_exists`
1. pour exécuter une classe de tests donnée:  
`php artisan test tests/Feature/PodcastsTest.php`
1. pour exécuter les tests d'un dossier:  
`php artisan test tests/Unit`

Je recommande de configurer un raccourci clavier dans votre IDE pour lancer les tests. J'ai utilisé ce réglage de raccourci dans VSCode pour lancer tous les tests lors d'un `ctrl+t ctrl+t`
```json
{
    "key": "ctrl+t ctrl+t",
    "command": "workbench.action.terminal.sendSequence",
    "args": {
        "text": "php artisan test\u000D"
    }
}
```
<div class="page"/>

### Planification
La liste des tâches est la même qu'au départ, les estimations n'ont pas été modifiées. Afin de comparer ce qui avait été prévu et ce qui s'est réellement passé finalement, j'ai rajouté quelques colonnes. Tout le tableau est ordré par la date d'achèvement des tâches, ce qui explique que ce n'est pas exactement le même ordre que la planification initiale. `S-d` signifie `Sprint de départ` et `S-f` signifie `Sprint final` (est différent pour les tâches achevée en retard ou en avance). Le Delta est le résultat de Temps estimé - Temps passé. Ce calcul n'a pas été fait pour le tâches des "Documentation quotidienne" car ce n'est pas un temps estimé mais planifié.
:[fragment](markdown-build/planification-finale.md)

*Tâches diverses* contient toutes les activités qui ne sont pas reliés à des Issues sur GitHub, ce comptage se base sur le journal de travail (voir les entrées qui n'ont pas de tâche assignée). Ceci inclut les visites de M. Hurni et des experts et la résolution de petits bugs.

**Analyse des différences**  
Quand on compare le temps estimé et passé on voit que j'ai sur-estimé certaines tâches simples, et que j'ai beaucoup sous-estimé les tâches plus complexes et longues. À partir du sprint 3, presque toutes les tâches ont été terminée un ou deux sprints plus tard. Les 2 tâches les plus sous-estimées sont "Ajout d'un nouvel épisode" et "Finalisation de la documentation". Je n'avais pas imaginé avoir autant de peine pour la création d'épisode, et qu'il y avait autant de choses à expliquer dans la documentation.

Je m'en suis rendu compte tard, mais mon sprint 4 était prévu sur toute la semaine alors que le jeudi et vendredi étaient fériés. Si on regarde mon journal de travail, on voit que je n'ai pas réussi à faire de la documentation tous les jours. Dans ce tableau, il y a aussi des petits bouts de documentations écrits pour les fonctionnalités en tant que tels dont le temps est compté avec celles-ci. J'étais très concentré sur le code en sprint 2 et j'ai fait moins de documentation que le reste des sprints. A la fin j'avais du retard sur les finitions du code et surtout sur ma documentation, j'ai donc décidé de faire quelques heures à la maison.

<div class="page">

### Dossier de conception

#### Résumé des podcasts  
Sur la page Podcasts, il y a un résumé des descriptions des podcasts, qui se limitent à 150 caractères (+3 petits points), puisque la description est trop longue pour être affichée entièrement et l'utilisation de `text-overflow: ellipsis` en CSS sur plusieurs lignes n'est pas très simple. Raccourcir en PHP était donc l'autre solution. Un attribut `summary` de la classe `Podcast` permet de récupérer facilement ce résumé. Si la description est plus courte que la limite, la description est utilisée.

#### Visibilité des épisodes
Pour qu'un épisode soit visible publiquement il faut que sa date de publication soit dans le passé et que son état Caché soit Faux. Si cette condition n'est pas vraie, l'épisode n'est visible que par l'auteur. Si on regarde en détail le code et les routes, on s'aperçoit que les fichiers étant sur le disque public, il n'y a pas d'autorisations appliquée au chargement des fichiers audios. Ainsi si on mémorise le nom du fichier audio, et que l'épisode devient ensuite invisible, on pourra toujours accéder publiquement via le lien d'accès direct (ex: `https://podz.test/storage/episodes/UyJ7nE5TewwbnjXRAhrmWX6Ht45.ogg`). Cette sécurité n'était pas demandée donc je ne l'ai pas implémentée mais cela pourrait être une idée d'amélioration. Pour corriger ceci, il faudrait bouger les épisodes dans le disque `local` qui n'est pas publiquement accessible, et "streamer" les fichiers audio via une route dédiée de notre application, de sorte à pouvoir appliquer un contrôle des droits d'accès et bloquer l'accès du fichier audio sur un épisode caché si ce n'est pas l'auteur.

#### Traduction  
Pour que les messages d'erreurs soient en français. J'utilise le système d'internationalisation de Laravel et j'ai défini le français comme langue par défaut et l'anglais comme langue de repli ("fallback langage") au cas où quelque chose n'aurait pas été traduit en français. J'ai dupliqué le fichier `lang/fr/validation.php` à partir `lang/en/validation.php` et j'ai traduit les quelques messages d'erreurs que j'utilisais.

#### Vues de Jetstream  
Le `navigation-menu.blade.php` a été modifié afin d'avoir les bons boutons. Le logo de Jetstream était modifiable dans 3-4 fichiers différents, j'ai préféré regrouper le tout dans `logo.blade.php` afin de centraliser. Le logo utilise la couleur `green` définie dans `tailwind.config.js`. Le gabarit `layouts.guest` a été supprimé au profit d'un seul gabarit `layouts.app`, le menu de navigation s'adapte pour si on est connecté ou non.

<div class="togheter">

#### Routes
J'ai suivi les conventions des noms et URLs des routes comme pour les contrôleurs ressources (je n'en ai pas utilisé dans ce projet).

![laravel-doc-image](imgs/routes-convention.png)
*Tiré de la [documentation de Laravel](https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller)*
</div>

<!--
Fournir tous les document de conception:

•	le choix du matériel HW
•	le choix des systèmes d'exploitation pour la réalisation et l'utilisation
•	le choix des outils logiciels pour la réalisation et l'utilisation
•	site web: réaliser les maquettes avec un logiciel, décrire toutes les animations sur papier, définir les mots-clés, choisir une formule d'hébergement, définir la méthode de mise à jour, …
•	bases de données: décrire le modèle relationnel, le contenu détaillé des tables (caractéristiques de chaque champs) et les requêtes.
•	programmation et scripts: organigramme, architecture du programme, découpage modulaire, entrées-sorties des modules, pseudo-code / structogramme…

Le dossier de conception devrait permettre de sous-traiter la réalisation du projet !
-->
#### Upload d'un fichier audio pour la création d'un épisode
J'ai décidé de fixer la taille maximum d'upload de fichiers à 150MB. Cette limite est fixée dans l'application, au niveau de la validation à la création d'un épisode et dans la taille maximum pour l'upload de fichiers temporaires de Livewire. Ces 2 paramètres dans la configuration de PHP (fichier `php.ini`) doivent être augmentées au-dessus de 150MB: `upload_max_filesize` et `post_max_size`.

Les fichiers audios sont stockés dans `storage/app/public/episodes` c'est-à-dire dans le dossier `episodes` du dossier `public` avec un nom aléatoire unique.

<div class="together">

#### Suppression d'un épisode
J'ai surchargé la méthode `delete` dans `Episode.php` afin d'ajouter la suppression du fichier en même temps que la suppression de l'enregistrement. J'ai mis le tout dans une transaction pour éviter d'avoir l'incohérence du fichier qui existe sur le disque mais il n'y a plus d'épisode lié dans la base de donnée. Cette transaction n'empêche pas d'avoir l'incohérence inverse, puisque la suppression sur le disque n'est pas une requête SQL (et ne peut pas être rollback).


```php
public function delete()
{
    DB::transaction(function () {
        //Delete file on disk first
        Storage::disk('public')->delete($this->path);

        //Then delete the record in db
        parent::delete();
    });
}
```
</div>

#### Éléments réutilisables

**Le composant Field**  
Un composant Blade permettant d'abstraire les éléments communs à tous les champs de formulaire: l'affichage du label, le design basique et l'affichage des erreurs de validations.

*Propriétés du composant*
| Nom           | Type   | Requis | Description                                                                                                           |
| ------------- | ------ | ------ | --------------------------------------------------------------------------------------------------------------------- |
| `name`        | String | Oui    | Le nom technique du champ, utilisé pour l'attribut `name` de l'input et par le `@error()` et par la fonction `old()`. |
| `label`       | String | Non    | Nom du label au-dessus du champ.                                                                                      |
| `type`        | String | Non    | Type de l'`<input>`. Par défaut `text`. Si `textarea` est donné, une balise `<textarea>` est utilisée à la place.     |
| `placeholder` | String | Non    | Un placeholder qui est ajouté directement sur le champ.                                                               |
| `cssOnField`  | String | Non    | Des classes CSS qui sont ajoutées directement sur le champ.                                                           |

Tous les autres attributs non reconnus sont transférés à la `div` racine du composant, ce qui permet d'ajouter du style ou d'autres attributs HTML pour tout le composant. Tous les attributs commençant par `wire:model` sont ajoutés au champ pour permettre l'utilisation de ce composant avec Livewire.

<div class="together">

Exemple d'utilisation:
```html
<form action="{{ route('podcasts.store') }}" method="POST">
<x-field label="Title" name="title"></x-field>
<x-field label="Description" type="textarea" name="description"></x-field>
<x-field label="Date de naissance" type="date" name="user.date"></x-field>
[...]
</form>
```

Un autre exemple d'utilisation dans le cas d'un formulaire géré par Livewire:

```html
<div>
    <x-field 
        wire:keyup.enter="update" 
        placeholder="Rentrez un titre court et marquant." 
        label="Title" name="podcast.title" 
        wire:model.lazy="podcast.title">
    </x-field>
    <x-field 
        label="Description" type="textarea" 
        name="podcast.description" wire:model.lazy="podcast.description">
    </x-field>
    @csrf
    <button wire:click.prevent="update" class="btn mt-1">Enregistrer</button>
</div>
```
</div>

**Classes CSS et couleurs**  
J'ai défini 3 nouvelles couleurs Tailwind, qu'on peut utiliser partout où les couleurs fonctionnent avec TailwindCSS (`border-green`, `text-lightblue`, `bg-blue`, ...)
```javascript
//Extrait de tailwind.config.js
colors: {
    'green': '#0d9488',
    'blue': '#0d1594',
    'lightblue': '#0d159414',
}
```

Il y a aussi des classes CSS qui peuvent être utilisées pour avoir un design commun à travers l'interface:
- `text-info`: pour les messages d'informations
- `btn`: pour les boutons

<div class="page"/>

## Réalisation

Podz est maintenant en version 1 (v1), cette version est affichée à droite du logo. Il n'y a pas d'autres numéros avant.

### Dossier de réalisation

<!-- réduire taille du texte pour éviter les overflow-->
**Structure du repository**  
Certains dossiers de Laravel moins pertinents ont été remplacés par des `...`. Seulement les dossiers et les fichiers à la racine sont affichés. Uniquement ceux que j'ai utilisé sont définis.

<pre class="text-sm">
podz                      <span>Racine du repository</span>
├─ app                    <span></span>
│   ├─ Actions            <span></span>
│   │   ├─ Fortify        <span></span>
│   │   └─ Jetstream      <span></span>
│   ├─ Console            <span></span>
│   ├─ Exceptions         <span></span>
│   ├─ Http               <span></span>
│   │   ├─ Controllers    <span>Les classes contrôleurs</span>
│   │   ├─ Livewire       <span>Les classes des composants Livewire</span>
│   │   └─ Middleware     <span></span>
│   ├─ Models             <span>Les classes modèles</span>
│   ├─ Providers          <span></span>
│   └─ View               <span>Les classes des vues, pour les composants Blade</span>
│       └─ Components     <span></span>
├─ ...                    <span></span>
├─ config                 <span>Les fichiers de configuration globaux</span>
├─ database               <span>Tout ce qui concerne la gestion de la base de données</span>
│   ├─ factories          <span>Les factories pour créer des données fictives</span>
│   ├─ migrations         <span>Les migrations pour définir la structure des tables</span>
│   └─ seeders            <span>Les seeders pour remplir la base de données avec les factories</span>
├─ docs                   <span>Dossier pour stocker les éléments de documentations (MCD, MLD)</span>
│   ├─ imgs               <span>Les images utilisées dans cette documentation</span>
│   ├─ models             <span>Les exports des maquettes</span>
│   └─ sources            <span>Les fichiers source binaires des maquettes, MCD et MLD</span>
├─ lang                   <span>Les fichiers de langues</span>
│   ├─ en                 <span></span>
│   └─ fr                 <span>Certaines traductions en français</span>
├─ public                 <span></span>
├─ resources              <span>Toutes les ressources utiles à générer nos vues</span>
│   ├─ css                <span>Style CSS global écrit dans app.css</span>
│   ├─ js                 <span>Javascript global écrit dans app.js</span>
│   ├─ markdown           <span></span>
│   └─ views              <span></span>
│       ├─ api            <span></span>
│       ├─ auth           <span></span>
│       ├─ components     <span></span>
│       ├─ layouts        <span>Contient le gabarit app.blade.php</span>
│       ├─ livewire       <span>Les vues pour Livewire</span>
│       ├─ podcasts       <span>Les vues pour les podcasts</span>
│       ├─ profile        <span></span>
│       └─ vendor         <span></span>
│           └─ jetstream  <span>Les vues de Jetstream </span>
│               └─ ...    <span></span>
├─ routes                 <span>Configuration des routes dans web.php</span>
├─ storage                <span>Espace de stockage dédié</span>
│   ├─ app                <span>Dossier ciblé par le disque "local"</span>
│   │   ├─ public         <span>Dossier publiquement accessible et ciblé par le disque "public"</span>
│   │   └─ testing        <span>Fichiers audios de tests pour le développement</span>
│   ├─ clockwork          <span></span>
│   ├─ ...                <span></span>
│   └─ logs               <span>Emplacement de laravel.log</span>
├─ tests                  <span>Tests automatisés</span>
│   ├─ Feature            <span>Tests fonctionnels</span>
│   ├─ Jetstream          <span>Tests créés par Jetstream</span>
│   └─ Unit               <span>Tests unitaires</span>
│                         <span></span>
│   .editorconfig         <span></span>
│   .env.example          <span>Fichier .env d'exemple</span>                    
│   .gitattributes        <span></span>
│   .gitignore            <span></span>
│   .styleci.yml          <span></span>
│   artisan               <span>Le CLI artisan</span>
│   composer.json         <span>Liste des paquets Composer requis</span>
│   composer.lock         <span>Liste des paquets Composer installées et leur version</span>
│   package-lock.json     <span>Liste des paquets NPM installées et leur version</span>
│   package.json          <span>Liste des paquets NPM requis</span>
│   phpunit.xml           <span>Fichier de configuration de PhpUnit</span>
│   README.md             <span></span>
│   tailwind.config.js    <span>Configuration de Tailwind</span>
│   webpack.mix.js        <span>Configuration du build JS et CSS avec Webpack pour Mix</span>
</pre>

<!--

Décrire la réalisation "physique" de votre projet

•	les répertoires où le logiciel est installé
•	la liste de tous les fichiers et une rapide description de leur contenu (des noms qui parlent !)
•	les versions des systèmes d'exploitation et des outils logiciels
•	la description exacte du matériel
•	le numéro de version de votre produit !
•	programmation et scripts: librairies externes, dictionnaire des données, reconstruction du logiciel - cible à partir des sources.

NOTE : Evitez d’inclure les listings des sources, à moins que vous ne désiriez en expliquer une partie vous paraissant importante. Dans ce cas n’incluez que cette partie…
-->

### Construction de la documentation
La documentation étant écrite en Markdown, j'ai du régler plusieurs problèmes pour avoir le même résultat visuel que si j'avais travaillé dans Word.

Pour l'exporter en PDF et avoir cette apparence, j'ai utilisé VSCode et une extension nommée `Markdown PDF` (id: `yzane.markdown-pdf`), de lancer la palette de commandes (Ctrl + Maj + P), puis de choisir l'action `Markdown PDF: Export (pdf)`. Le résultat sera le fichier `podz-docs.pdf` à côté de ce fichier. Même fonctionnement pour le journal de travail et le README s'il y a besoin de les exporter. J'ai du écrire du CSS `docs/markdown-build/pdf-export.css` pour améliorer le design de l'export qui n'était pas très joli. Toutes les configurations pour l'extension sont faites dans le fichier `.vscode/settings.json` (en-tête et pied de page, choix du thème du surlignage avec HighlightJS, taille des marges et feuilles de styles).

Comme j'utilise Git, je n'ai pas besoin de garder d'anciennes versions avec un numéro de version choisi, puisque tout l'historique est consultable. Pour retrouver la documentation à une date donnée, il suffit d'aller sur GitHub sous les commits, de prendre le dernier commit avant cette date, de cliquer sur Browse files puis d'aller chercher le documents dans le dossier `docs`.

### Résultats des tests effectués
<!-- Compléter temps !! -->
Cette capture montre le résultat des tests exécutés le 30.05.2022. Tous les tests passent.
![img](imgs/tests-results.png)

Voici la liste complète des tests, les noms devraient permettre d'avoir une idée de ce qui est testé et quels cas sont couverts.

1. **`Tests\Unit\EpisodeTest`**
    1. `path is well built`

2. **`Tests\Unit\PodcastTest`**
    1. `podcasts summary is correctly extracted`
    2. `podcasts summary doesnt extract when description length is already good`
    3. `get next number really gives next number`

3. **`Tests\Feature\EpisodeCreationTest`**
    1. `podcast details page uses episode creation component`
    2. `podcast details page doesnt use episode creation if not author`
    3. `episode creation works`
    4. `data are correctly validated`
    5. `audio file type is validated`
    6. `default value of the episode are set`
    7. `publishing fails silently if forbidden`
    8. `publishing 2 episodes with same title in a podcast is not possible`

4. **`Tests\Feature\EpisodeDeletionTest`**
    1. `episode deletion works`
    2. `episode deletion is only authorized to the author`

5. **`Tests\Feature\EpisodeUpdateTest`**
    1. `podcast details page uses episode update component`
    2. `podcast details page doesnt use episode update if not author`
    3. `episode update works`
    4. `data are correctly validated`
    5. `datetime value is set after mount`
    6. `update fails silently if forbidden`
    7. `updating title to another episode title in the same podcast fails`

6. **`Tests\Feature\PodcastCreationTest`**
    1. `create a podcast page exists`
    2. `create a podcast page is guarded`
    3. `store route is guarded`
    4. `podcast creation works`
    5. `podcast is not created on invalid request`
    6. `new podcast button is present`
    7. `new podcast button doesnt exist as visitor`

7. **`Tests\Feature\PodcastDetailsTest`**
    1. `podcasts details page exists`
    2. `podcast info component is included in the page`
    3. `all information are displayed for the author`
    4. `a message is displayed when no episode is published`
    5. `prefix text of future release date is displayed correctly for author`
    6. `release date displays only date for the public`
    7. `future episodes are not publicly visible`
    8. `past hidden episodes are nt visible for the public`
    9. `only required info are displayed publicly`

8. **`Tests\Feature\PodcastUpdateTest`**
    1. `podcast details page contains update component`
    2. `podcast details page doesnt contain update component as visitor and as non author`
    3. `details can be updated`
    4. `details must be valid`

9. **`Tests\Feature\PodcastsTest`**
    1. `podcasts page exists`
    2. `the page has title and description`
    3. `all podcasts are displayed with their data`

#### Couverture des tests
Comme les tests sont écrits et exécutés en PHP, les tests ne peuvent que tester le comportement backend. Les interactions frontend ne peuvent pas être testées avec les outils actuels.

Pour la plupart des fonctionnalités, j'ai suivi cette ordre pour décider des tests à écrire et de leur contenu:
1. D'abord écrire un test pour vérifier que la page existe ou que le composant Livewire testé est bien chargé dans une des pages.
2. Ensuite tester le comportement idéal (avec toutes les données valides).
3. Puis tester les validations des données.
4. Et finalement valider les permissions de visibilité ou d'accès (ex: être sûr qu'un visiteur ne peut pas modifier un épisode ou ne peut pas voir d'épisode s'il est invisible).

**Ce que les tests ne couvrent pas**:
- La validation de la taille maximale d'upload d'un fichier pour la création d'épisode

    Les tests manuels ont permis de vérifier que cela fonctionnait. Un test manuel avec un fichier mp3 de 170Mo a été fait plusieurs fois afin de vérifier la limite de 150Mo. En voici la démonstration:

    ![file-upload-error](imgs/file-upload-error.png)
- Les méthodes `episodes()` et `publicEpisodes()` de `Podcast` en test unitaire
- La présence des icônes, selon la personne connectée (puisqu'ils sont en SVG ils n'ont pas de nom et c'est difficile de les identifier)

<div class="page"/>

## Conclusions

### Erreurs restantes
- Au lancement des tests, les fichiers audios créés ne devraient pas aller dans le dossier `storage/app/public/episodes` mais un faux dossier de stockage (avec `Storage::fake('public');`), mais cela ne marche pas vraiment et je ne sais pas pourquoi.

### Objectifs atteints / non-atteints

Tous les objectifs fixés au départ ont été atteints.
| Objectif                                                                                      | Atteint ? |
| --------------------------------------------------------------------------------------------- | --------- |
| En tant que visiteur (personne non authentifiée) :                                            |           |
| <li>Consultation de la liste des podcasts.</li>                                               | Oui       |
| <li>Consultation du détail d’un podcast : épisodes  </li>                                     | Oui       |
| <li>Ecoute d’un épisode d’un podcast.    </li>                                                | Oui       |
| En tant qu’utilisateur authentifié, en plus des fonctionnalités accessibles à tout visiteur : |           |
| <li>Création d’un nouveau podcast, édition d’un de ses podcasts existant.    </li>            | Oui       |
| Sur l’un de ses podcasts :                                            </li>                   |           |
| <li>Affichage de la liste des épisodes avec toutes les données liées.  </li>                  | Oui       |
| <li>Ajout d’un nouvel épisode.                                           </li>                | Oui       |
| <li>Edition d’un épisode.                                          </li>                      | Oui       |
| <li>Suppression d’un épisode.                                       </li>                     | Oui       |

<div class="together">

### Difficultés particulières

- L'upload de fichiers et les tests associés ont été assez difficiles, comme expliqué dans mon journal de travail. Pour comprendre pourquoi les tests ne passaient pas alors que mon code était correct quand on faisait `UploadedFile::fake()->create('audio.m4a', 100, 'audio/mp4')` par ex., j'ai regardé dans le code de la classe `FileFactory` (dans `vendor\laravel\framework\src\Illuminate\Http\Testing\FileFactory.php`) dans mon IDE (en faisant Ctrl+click sur la méthode `create()`) et j'ai trouvé ceci:
  

  ```php
  /**
   * Create a new fake file.
   *
   * @param  string  $name
   * @param  string|int  $kilobytes
   * @param  string|null  $mimeType
   * @return \Illuminate\Http\Testing\File
   */
  public function create($name, $kilobytes = 0, $mimeType = null)
  {
      if (is_string($kilobytes)) {
          return $this->createWithContent($name, $kilobytes);
      }

      return tap(new File($name, tmpfile()), function ($file) use ($kilobytes, $mimeType) {
          $file->sizeToReport = $kilobytes * 1024;
          $file->mimeTypeToReport = $mimeType;
      });
  }
  ```

  On voit que le fichier contient le résultat `tmpfile()` (fonction PHP qui crée des fichiers temporaires), en inspectant avec un éditeur hexadécimal on y trouve une vingtaine d'octets toujours les mêmes, le contenu le correspond donc ni à la bonne taille ni au bon type MIME demandé. Pour que cela fonctionne quand même avec Laravel, la taille et le type MIME - que la classe retourne quand on lui demande - sont définis dans des attributs de la classe. Le problème dans mon application, c'est probablement parce que j'utilise Livewire qui stocke les fichiers dans un dossier temporaire puis les déplacent dans le bon dossier à la sauvegarde. Ce n'est qu'une hypothèse que je n'ai pas pu le vérifier (cela aurait demandé des recherches plus longues) mais j'imagine que l'objet `UploadedFile` final est rechargé ou recréé avec le fichier sur le disque, le type MIME et la taille étant fictifs sont donc perdus durant le processus.

  Pour résoudre ce problème, j'ai finalement créé différents vrais fichiers de différents formats dans `storage/app/testing` avec FFmpeg, et créé des fichiers bidons (`test.pdf`), que j'utilise comme fichier à l'upload.
  </div>


- L'export PDF de mes documentations et la construction des planifications ont été complexes, avec toutes les choses à inclure à inclure et moyens de détourner les contraintes. Pour la planification finale, il y avait beaucoup de valeurs qui devaient être recopiées de GitHub. Au lieu de tout faire à la main j'ai préféré scripter sa génération. J'ai créé un fichier `planifdata.json` avec les infos des Issues tirées de l'API de GitHub dans lequel j'ai ajouté le temps passé sur chaque tâche (en calculant les sommes des temps indiqué dans mon journal de travail). Mon script fonctionne très bien et est super pratique. J'ai du faire du design de mon document en CSS et parfois écraser le style par défaut de l'extension, cela m'a pris un certain temps.

### Points positifs / négatifs

Les tests automatisés sont un point positif du projet, car sont robustes et m'ont beaucoup aidé durant le développement.
Au niveau de la planification j'aurai puis mieux gérer mon temps en classe. Parfois je suis resté bloqué sur l'écriture de tests que j'aurai pu outrepasser et d'autres fois j'étais déconcentré et/ou j'aidais des collègues sur Laravel. Mieux avancer et être un peu plus concentré aurait peut-être permis de ne pas avoir trop de retard à la fin. J'aurai aussi pu faire les calculs des totals de temps de travail pour me rendre compte de mon avance ou retard.

Au niveau de la documentation, faire de la documentation plus régulièrement aurait permis de varier un peu le travail final. Je pense avoir fait une documentation assez qualitative et soignée. J'ai mis plus de détails et de soin dans cette documentation que d'habitude, c'était important pour moi de rendre des documents soignés. Un autre point positif est d'avoir réussi finir toutes les fonctionnalités demandées.

### Bilan personnel

J'ai eu beaucoup de plaisir à développer Podz, surtout avec l'écriture des tests. Contrairement à mon Pré-TPI où je n'avais pas pu terminer le développement et la documentation, je suis plutôt content d'avoir réussi à finir toutes les fonctionnalités demandées dans les temps et d'avoir pu faire correctement la documentation. Je me sens encore plus à l'aise qu'avant pour écrire des tests, même pour des cas plus complexe pour gérer des fichiers et des erreurs. J'ai compris les stratégies de base pour savoir ce qu'on peut tester ou pas, quand je dois en écrire un nouveau je sais donc rapidement quels sont les éléments à inclure. Au passage, j'ai appris que tous les navigateurs ne supportent pas tous les fichiers audio (surtout s'ils sont propriétaires), Firefox par ex. a quelques difficultés avec les fichiers `.m4a`.
Comme durant mon Pré-TPI, j'ai eu de la peine avec l'upload de fichiers parce que je n'arrivais pas à écrire des tests corrects. Donc j'ai beaucoup testé à la main et cela devenait vite chronophage. Grâce à l'aide M. Hurni mon chef de projet, j'ai pu changer de stratégie pour ces tests, je serai comment m'y prendre à l'avenir.

<div class="page">

### Suites possibles pour le projet
De nombreuses fonctionnalités pourraient implémentés si le projet est réutilisé par quelqu'un d'autre. Voici une petite liste d'idées:
1. Ajouter un flux RSS ce qui permet d'écouter le podcast depuis un lecteur de podcasts (comme Apple Podcasts par exemple). Ce flux pourrait être utilisé pour republier le contenu sur d'autres plateformes (Spotify, Apple Podcasts, Soundcloud, ...).
2. Comme expliqué pour l'upload de fichiers, les fichiers audio pourraient être sécurisé derrière une route Laravel et non un accès direct, en passant par le disque `local`.
3. L'ajout d'images comme pochette de podcasts
4. Ajout de commentaires pour chaque épisode

Et beaucoup d'autres possibilités encore...

### Remerciements
J'aimerai remercier M. Hurni pour les retours et les conseils techniques qu'il m'a apporté au Pré-TPI et au TPI. Il a pu répondre à mes nombreuses questions et j'ai senti une vraie progression avec Laravel en général et l'écriture de tests. J'espère avoir pu utiliser au mieux ces feedbacks et continuer de m'améliorer continuellement sur Laravel et les autres frameworks à l'avenir, pour produire du code de qualité et maîtriser de plus en plus ces technologies.

Je remercie aussi Gatien Jayme pour sa relecture de ma documentation.

<div class="page"/>

## Annexes
### Résumé du rapport du TPI
Le résumé est disponible en document séparé (voir archives) ou directement sur GitHub [en Markdown](https://github.com/samuelroland/podz/blob/main/docs/podz-résumé-tpi.md).

### Sources – Bibliographie
Pour résoudre mes différents problèmes j'ai surtout utilisé StackOverflow et les documentations officielles des 4 frameworks que j'utilise:
- **[Documentation de Laravel](https://laravel.com/docs)**
- **[Documentation de Livewire](https://laravel-livewire.com/docs)**
- **[Documentation de AlpineJS](https://alpinejs.dev/docs)**
- **[Documentation de TailwindCSS](https://tailwindcss.com/docs)**

J'ai aussi utilisé le site [**Mozilla Developer Network**](https://developer.mozilla.org/fr/) comme référence pour le HTML et le CSS.

- **Icônes**: les icônes ont été copié-collées (en SVG) depuis [heroicons.com](https://heroicons.com/), elles sont publiées sous licence MIT.

- [Liste des Types de médias, par l'IANA](https://www.iana.org/assignments/media-types/media-types.xhtml). Cette ressource m'a été utile pour trouver les types MIME des fichiers audios .ogg, .opus, et .mp3 pour la validation lors de la création d'épisode.

**Aides humaines**
- **M. Hurni**: conseils et retours réguliers, réponses à mes questions.
- **Gatien Jayme**: aide relecture des documents
<!--

Liste des livres utilisés (Titre, auteur, date), des sites Internet (URL) consultés, des articles (Revue, date, titre, auteur)… Et de toutes les aides externes (noms)   
-->
### Journal de travail
Le journal est disponible en document séparé (voir archives) ou directement sur GitHub [en Markdown](https://github.com/samuelroland/podz/blob/main/docs/podz-journal.md) ou [en PDF](https://github.com/samuelroland/podz/blob/main/docs/podz-journal.md).

### Manuel d'installation
Toutes les informations nécessaires à l'installation du projet se trouve dans le README disponible en document séparé (voir archives) ou sur GitHub [en Markdown](https://github.com/samuelroland/podz/blob/main/README.md).

### Archives du projet
- `podz-code.zip`: repository Git
- `podz-documentation.pdf`: cette documentation
- `podz-journal-de-travail.pdf`: journal de travail du projet
- `podz-résumé-tpi.pdf`: résumé du TPI
- `podz-readme.pdf`: le README avec la procédure de mise en place du projet