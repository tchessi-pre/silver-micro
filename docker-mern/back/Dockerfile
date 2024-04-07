# Utiliser l'image officielle de Node.js comme image de base
FROM node:latest

# Définir le répertoire de travail dans le conteneur
WORKDIR /back

# Copier les fichiers package.json et package-lock.json
COPY package*.json ./

# Installer les dépendances du projet
RUN npm install

# Copier le reste des fichiers du projet dans le conteneur
COPY . .

# Exposer le port sur lequel l'application backend s'exécute
EXPOSE 5000

# Commander pour lancer l'application
CMD ["npm", "run", "dev"]