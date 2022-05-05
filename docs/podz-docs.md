
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
### Introduction
todo: import sections du canva.

**Table des matières**
- [Documentation de Podz](#documentation-de-podz)
  - [Analyse préliminaire](#analyse-préliminaire)
    - [Introduction](#introduction)
    - [Base de données](#base-de-données)
      - [MCD](#mcd)
      - [MLD](#mld)

### Base de données
#### MCD
![MCD](MCD.png)
En dehors des champs évidents qui n'ont pas besoin d'explications, voici quelques aspects techniques demandant des explications.

**Dans Episodes**:
- Les combinaisons du Numéro et du podcast, ainsi que le titre et le podcast, sont uniques (exemple: on ne peut pas avoir 2 fois l'épisode 4 du podcast "Summer stories", et on ne peut pas avoir 2 fois un épisode nommé "Summer 2020 review" du podcast "Summer stories").
- La date de création est définie par la date de création de l'épisode sur la plateforme (avec l'upload du fichier), peu importe ses autres informations (la publication ou l'état caché n'a pas d'influence sur la date). Cette date ne change jamais.
- La date de publication est par défaut nulle. Quand elle n'est pas nulle, la date de publication peut être dans le passé comme le futur. Si elle est dans le futur, l'épisode n'est pas encore publié (jusqu'à la date définie). Ceci permet de programmer dans le futur une publication.
- Le champ Caché est par défaut à Faux et n'a pas d'effet dans ce cas. S'il est Vrai, l'épisode ne sera pas visible dans les détails du podcast.

**Dans Podcasts**:
- La combinaison du titre et de l'auteur est unique. Exemple: Michelle ne peut pas publier 2 podcasts s'appelant "My story", par contre Michelle et Bob peuvent chacun publier 1 podcast nommé "My story".

#### MLD
todo
todo: tables et champs gérés par Laravel...