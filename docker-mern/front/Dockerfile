# Utiliser l'image officielle Node.js pour construire le projet
FROM node:latest

# Définir le répertoire de travail dans le conteneur
WORKDIR /front

# Copier les fichiers package.json et package-lock.json
COPY package*.json ./

# Installer les dépendances du projet
RUN npm install

# Copier les autres fichiers et dossiers du projet dans le conteneur
COPY . .

# Construire l'application React (étape optionnelle si vous servez directement en mode développement)
# RUN npm run build

# Exposer le port 3000
EXPOSE 3000

# Commander pour lancer l'application en mode de développement
CMD ["npm", "start"]
