# Back

Ce projet est un serveur backend construit avec [Express.js](https://expressjs.com/). Il utilise [Mongoose](https://mongoosejs.com/) pour interagir avec MongoDB et inclut des middlewares tels que [cors](https://github.com/expressjs/cors), [dotenv](https://github.com/motdotla/dotenv), [helmet](https://helmetjs.github.io/) et [morgan](https://github.com/expressjs/morgan) pour améliorer la sécurité et la gestion des logs.

## Prérequis

- Node.js installé sur votre machine.
- Une instance MongoDB en cours d'exécution localement ou accessible via le réseau.

## Installation

Pour installer les dépendances, naviguez jusqu'au dossier racine du projet dans votre terminal et exécutez :

```bash
npm install

PORT=5000
MONGODB_URI=mongodb://localhost:27017/maBaseDeDonnees

Démarrage du Serveur

Pour démarrer le serveur en mode production, exécutez :

npm start

Pour le développement, vous pouvez utiliser nodemon pour redémarrer automatiquement le serveur après les modifications du code :

npm run dev
