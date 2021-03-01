Installation

cloner le repo projet hackathon-developpement-securite-teamosaurus-fantasticus
git clone https://github.com/it-akademy-students/hackathon-developpement-securite-teamosaurus-fantasticus.git

Une fois le repository cloné, se déplacer dans le dossier testMyElephant: 
se déplacer dans testMyElephant
exécuter composer install
connexion à SGBD MySQL
Créer une database “testMyElephant”
copier coller .env.example et renommer la copie en .env
Compléter les lignes 13, 14 &15 de votre fichier .env
exécuter php artisan key:generate
exécuter npm install
exécuter php artisan migrate

Pour activer la gestion des cookies :

il faut run composer update puis la commande ci dessous
php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="public"
exécuter npm run dev
Lancer le serveurphp artisan serve (en dernier)
