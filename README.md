#  Système de Gestion de Banque de Sang (Projet DOUBLE)

Bienvenue dans le projet **BLOODBANK**, une plateforme complète de gestion de banque de sang conçue pour faciliter le don, le stockage et la distribution de produits sanguins.

##  Présentation du Projet

Ce système permet de mettre en relation les donneurs, les patients et les centres de transfusion sanguine. Il offre une gestion rigoureuse des stocks, un système de réservation moderne pour les patients et des outils de suivi pour les administrateurs et gestionnaires de centres.

---

## Rôles et Utilisateurs

La plateforme gère plusieurs types d'utilisateurs avec des permissions spécifiques :

| Rôle | Description |
| :--- | :--- |
| **Administrateur** | Gestion totale du système, des utilisateurs, des centres et vision globale du stock. |
| **Gestionnaire** | Responsable d'un centre de transfusion spécifique, gère le stock local, les alertes et les réservations. |
| **Donneur** | Peut prendre rendez-vous pour des dons, consulter son historique et voir les campagnes en cours. |
| **Patient / Client** | Peut rechercher du sang par région/type, effectuer des réservations et suivre ses commandes. |

---

##  Fonctionnalités Principales

###  Gestion des Dons
- **Prise de rendez-vous** : Système fluide pour planifier un don de sang.
- **Campagnes de don** : Création et suivi de campagnes publiques pour attirer les donneurs.
- **Historique de dons** : Suivi personnalisé pour chaque donneur.

###  Gestion du Stock (Inventaire)
- **Suivi par Centre** : Inventaire précis par centre de transfusion et par région.
- **Poches de Sang** : Gestion individuelle des poches avec dates d'expiration.
- **Alertes de Seuil** : Notifications automatiques lorsque le stock d'un groupe sanguin devient critique (bas).

###  Système de Réservation et Commande
- **Recherche Avancée** : Trouver du sang par groupe et par région en temps réel.
- **Panier de Réservation** : Possibilité de réserver plusieurs poches.
- **Validation Médicale** : Importation et vérification des ordonnances/prescriptions.
- **Paiement Flexible** : Système d'acompte (50%) et paiement du solde restant.

###  Notifications et Dashboard
- **Cloche de Notification** : Alertes en temps réel pour les nouvelles commandes et alertes de stock.
- **Dashboards Personnalisés** : Statistiques et indicateurs clés selon le rôle de l'utilisateur.

---

##  Installation et Configuration

### Prérequis
- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL ou SQLite

### Étapes d'installation

1. **Cloner le projet**
   ```bash
   git clone [url-du-repo]
   cd DOUBLE
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configurer l'environnement**
   - Copier `.env.example` vers `.env`
   - Configurer la base de données dans le fichier `.env`
   - Générer la clé d'application : `php artisan key:generate`

5. **Migrations et Données de test**
   ```bash
   php artisan migrate --seed
   ```

6. **Lancer le projet**
   - Lancer le serveur de développement : `php artisan serve`
   - Lancer Vite pour le front-end : `npm run dev`

---

## 🛠 Technologies Utilisées

- **Backend** : Laravel (PHP)
- **Frontend** : Tailwind CSS, Vite
- **Base de données** : MySQL / SQLite
- **Authentification** : Laravel Breeze

---

##  État d'avancement (Sprints)

- **Sprint 4** : Mise en place du téléchargement d'ordonnances et workflow de validation documentaire.
- **Sprint 5** : Système d'alertes de stock critique, notifications en temps réel (cloche) et finalisation du processus de paiement.

---
*Projet développé dans le cadre de la modernisation de la gestion sanguine.*


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="État du build"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Téléchargements totaux"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Dernière version stable"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Licence"></a>
</p>

## À propos de Laravel

Laravel est un framework d'application web avec une syntaxe expressive et élégante. Nous pensons que le développement doit être une expérience agréable et créative pour être véritablement épanouissant. Laravel simplifie le développement en facilitant les tâches courantes utilisées dans de nombreux projets web, telles que :

- [Moteur de routage simple et rapide](https://laravel.com/docs/routing).
- [Puissant conteneur d'injection de dépendances](https://laravel.com/docs/container).
- Plusieurs back-ends pour le stockage de [session](https://laravel.com/docs/session) et de [cache](https://laravel.com/docs/cache).
- [ORM de base de données](https://laravel.com/docs/eloquent) expressif et intuitif.
- [Migrations de schéma](https://laravel.com/docs/migrations) indépendantes de la base de données.
- [Traitement robuste des tâches en arrière-plan](https://laravel.com/docs/queues).
- [Diffusion d'événements en temps réel](https://laravel.com/docs/broadcasting).

Laravel est accessible, puissant et fournit les outils nécessaires pour de grandes applications robustes.

## Apprendre Laravel

Laravel dispose de la [documentation](https://laravel.com/docs) la plus étendue et la plus complète, ainsi que d'une bibliothèque de tutoriels vidéo parmi tous les frameworks d'application web modernes, ce qui facilite grandement la prise en main du framework.

Vous pouvez également essayer le [Laravel Bootcamp](https://bootcamp.laravel.com), où vous serez guidé à travers la construction d'une application Laravel moderne à partir de zéro.

Si vous n'avez pas envie de lire, [Laracasts](https://laracasts.com) peut vous aider. Laracasts contient des milliers de tutoriels vidéo sur divers sujets, notamment Laravel, le PHP moderne, les tests unitaires et le JavaScript. Améliorez vos compétences en explorant notre bibliothèque vidéo complète.

## Sponsors de Laravel

Nous souhaiterions exprimer nos remerciements aux sponsors suivants pour le financement du développement de Laravel. Si vous souhaitez devenir sponsor, veuillez visiter le [programme des partenaires Laravel](https://partners.laravel.com).

### Partenaires Premium

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contribuer

Merci de considérer votre contribution au framework Laravel ! Le guide de contribution se trouve dans la [documentation de Laravel](https://laravel.com/docs/contributions).

## Code de Conduite

Afin de garantir que la communauté Laravel soit accueillante pour tous, veuillez consulter et respecter le [Code de Conduite](https://laravel.com/docs/contributions#code-of-conduct).

## Vulnérabilités de Sécurité

Si vous découvrez une vulnérabilité de sécurité au sein de Laravel, veuillez envoyer un e-mail à Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). Toutes les vulnérabilités de sécurité seront traitées promptement.

## Licence

Le framework Laravel est un logiciel libre sous [licence MIT](https://opensource.org/licenses/MIT).

