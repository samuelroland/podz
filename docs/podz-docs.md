
<div style="text-align: center; padding: 150px 0px;">
<p style="text-align: center; border: none; font-size: 3rem;">Documentation de Podz</p>
<p style="text-align: center; border: none; font-size: 2rem;">Application web de publication de podcasts</p>
<div style="display:flex; padding: 50px 100px; justify-content: center; font-family: Fira Code;">
<img src="logo.png" style="">
</div>
<h2 style="text-align: center; font-size: 1.6rem;">Projet TPI - 2022</h2>
<h2 style="text-align: center; font-size: 1.3rem;">Samuel Roland</h2>

</div>

<div class="page"/> 

## Analyse préliminaire

**Table des matières**
- [Analyse préliminaire](#analyse-préliminaire)
  - [Introduction](#introduction)
  - [Objectifs](#objectifs)
  - [Planification initiale](#planification-initiale)
- [Analyse / Conception](#analyse--conception)
  - [Concept](#concept)
    - [Technologies utilisées](#technologies-utilisées)
    - [Base de données: MCD](#base-de-données-mcd)
    - [Base de données: MLD](#base-de-données-mld)
  - [Stratégie de test](#stratégie-de-test)
  - [Risques techniques](#risques-techniques)
  - [Planification](#planification)
  - [Dossier de conception](#dossier-de-conception)
- [Réalisation](#réalisation)
  - [Dossier de réalisation](#dossier-de-réalisation)
  - [Description des tests effectués](#description-des-tests-effectués)
  - [Erreurs restantes](#erreurs-restantes)
  - [Liste des documents fournis](#liste-des-documents-fournis)
- [Conclusions](#conclusions)
- [Annexes](#annexes)
  - [Résumé du rapport du TPI / version succincte de la documentation](#résumé-du-rapport-du-tpi--version-succincte-de-la-documentation)
  - [Sources – Bibliographie](#sources--bibliographie)
  - [Journal de travail](#journal-de-travail)
  - [Manuel d'Installation](#manuel-dinstallation)
  - [Manuel d'Utilisation](#manuel-dutilisation)
  - [Archives du projet](#archives-du-projet)

<div class="page"/><!-- saut de page -->

### Introduction
todo: import sections du canva.
<!--
1.1	Introduction 

Ce chapitre décrit brièvement le projet, le cadre dans lequel il est réalisé, les raisons de ce choix et ce qu'il peut apporter à l'élève ou à l'école. Il n'est pas nécessaire de rentrer dans les détails (ceux-ci seront abordés plus loin) mais cela doit être aussi clair et complet que possible (idées de solutions). Ce chapitre contient également l'inventaire et la description des travaux qui auraient déjà été effectués pour ce projet.

-->

### Objectifs
<!-- 

Ce chapitre énumère les objectifs du projet. L'atteinte ou non de ceux-ci devra pouvoir être contrôlée à la fin du projet. Les objectifs pourront éventuellement être revus après l'analyse. 

Ces éléments peuvent être repris des spécifications de départ.
-->

### Planification initiale
<!--
Ce chapitre montre la planification du projet. Celui-ci peut être découpé en tâches qui seront planifiées. Il s'agit de la première planification du projet, celle-ci devra être revue après l'analyse. Cette planification sera présentée sous la forme d'un diagramme.

Ces éléments peuvent être repris des spécifications de départ.
-->
## Analyse / Conception
### Concept

#### Technologies utilisées
J'ai choisi la stack TALL (TailwindCSS - AlpineJS - Livewire - Laravel) pour ce projet, car je suis à l'aise avec ces 4 frameworks et qu'ils permettent d'être très productif pour développer une application web.

Petits aperçus de ce que sont ces frameworks:
- **Laravel**: un framework PHP
TODO

#### Base de données: MCD
![MCD](MCD.png)
En dehors des champs évidents qui n'ont pas besoin d'explications, voici quelques aspects techniques demandant des explications.

**Dans Episodes**:
- Les combinaisons du Numéro et du podcast, ainsi que le titre et le podcast, sont uniques (exemple: on ne peut pas avoir 2 fois l'épisode 4 du podcast "Summer stories", et on ne peut pas avoir 2 fois un épisode nommé "Summer 2020 review" du podcast "Summer stories").
- La date de création est définie par la date de création de l'épisode sur la plateforme (avec l'upload du fichier), peu importe ses autres informations (la publication ou l'état caché n'a pas d'influence sur la date). Cette date ne change jamais.
- La date de publication est par défaut nulle. Quand elle n'est pas nulle, la date de publication peut être dans le passé comme le futur. Si elle est dans le futur, l'épisode n'est pas encore publié (jusqu'à la date définie). Ceci permet de programmer dans le futur une publication.
- Le champ Caché est par défaut à Faux et n'a pas d'effet dans ce cas. S'il est Vrai, l'épisode ne sera pas visible dans les détails du podcast.

**Dans Podcasts**:
- La combinaison du titre et de l'auteur est unique. Exemple: Michelle ne peut pas publier 2 podcasts s'appelant "My story", par contre Michelle et Bob peuvent chacun publier 1 podcast nommé "My story".

#### Base de données: MLD
todo
todo: tables et champs gérés par Laravel...
 
<!--
Le concept complet avec toutes ses annexes :

Par exemple : 
•	Multimédia: carte de site, maquettes papier, story board préliminaire, …
•	Bases de données: interfaces graphiques, modèle conceptuel.
•	Programmation: interfaces graphiques, maquettes, analyse fonctionnelle…
•	…
-->

### Stratégie de test

<!--

Décrire la stratégie globale de test: 

•	types de des tests et ordre dans lequel ils seront effectués.
•	les moyens à mettre en œuvre.
•	couverture des tests (tests exhaustifs ou non, si non, pourquoi ?).
•	données de test à prévoir (données réelles ?).
•	les testeurs extérieurs éventuels.
-->

### Risques techniques
<!--

•	risques techniques (complexité, manque de compétences, …).

Décrire aussi quelles solutions ont été appliquées pour réduire les risques (priorités, formation, actions, …).
-->
### Planification
<!--
Révision de la planification initiale du projet :

•	planning indiquant les dates de début et de fin du projet ainsi que le découpage connu des diverses phases. 
•	partage des tâches en cas de travail à plusieurs.

Il s’agit en principe de la planification définitive du projet. Elle peut être ensuite affinée (découpage des tâches). Si les délais doivent être ensuite modifiés, le responsable de projet doit être avisé, et les raisons doivent être expliquées dans l’historique.
-->

### Dossier de conception
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
## Réalisation
### Dossier de réalisation
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
### Description des tests effectués
<!--

Pour chaque partie testée de votre projet, il faut décrire:

•	les conditions exactes de chaque test
•	les preuves de test (papier ou fichier)
•	tests sans preuve: fournir au moins une description 
-->
### Erreurs restantes  
<!--

S'il reste encore des erreurs: 

•	Description détaillée
•	Conséquences sur l'utilisation du produit
•	Actions envisagées ou possibles
-->

### Liste des documents fournis
<!--

Lister les documents fournis au client avec votre produit, en indiquant les numéros de versions 

•	le rapport de projet
•	le manuel d'Installation (en annexe)
•	le manuel d'Utilisation avec des exemples graphiques (en annexe)
•	autres…
-->

## Conclusions
<!--

Développez en tous cas les points suivants:

•	Objectifs atteints / non-atteints
•	Points positifs / négatifs
•	Difficultés particulières
•	Suites possibles pour le projet (évolutions & améliorations)

 -->
## Annexes

### Résumé du rapport du TPI / version succincte de la documentation

### Sources – Bibliographie
<!--

Liste des livres utilisés (Titre, auteur, date), des sites Internet (URL) consultés, des articles (Revue, date, titre, auteur)… Et de toutes les aides externes (noms)   
-->
### Journal de travail

### Manuel d'Installation

### Manuel d'Utilisation

### Archives du projet 

<!-- 
Media, … dans une fourre en plastique 
-->