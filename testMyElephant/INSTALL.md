# Installation
***



## Cloner le repository



git clone [https://github.com/it-akademy-students/hackathon-developpement-securite-teamosaurus-fantasticus.git](https://github.com/it-akademy-students/hackathon-developpement-securite-teamosaurus-fantasticus.git)

***
Une fois le repository cloné, se déplacer dans le dossier enfant "testMyElephant": `cd testMyElephant`

1. Exécuter `composer install`

2. Connectez-vous à votre gestionnaire de base de données

3. Créer une database nommée 'testMyElephant'

4. Copier coller le fichier .env.example situé à la racine du projet et renommez la copie en '.env'

5. Compléter les lignes 13, 14 &15 de votre fichier .env soit:
>DB_DATABASE=testMyElephant  
DB_USERNAME= *votre_nom*  
DB_PASSWORD= *votre_mot_de_passe*

6. Exécuter `php artisan key:generate`
7. Exécuter `npm install`
8. Exécuter `php artisan migrate`<br>
9. Pour activer la gestion des cookies : <br>
Executer `composer update` puis la commande ci-dessous <br>
`php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="public"`

10. Exécutez `npm run dev`  
11. Exécuter `php artisan serve`
