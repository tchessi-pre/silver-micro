# Utiliser l'image officielle de Node.js
FROM node:14

# Définir le répertoire de travail dans le conteneur
WORKDIR /app

# Copier les fichiers package.json et package-lock.json
COPY package*.json ./

# Installer les dépendances du projet, incluant serve pour le déploiement
RUN npm install
RUN npm install -g serve

# Copier tous les fichiers du projet dans le répertoire de travail
COPY . .

# Construire l'application pour la production
RUN npm run build

# Exposer le port 3000 pour l'application
EXPOSE 3000

# Lancer serve pour servir l'application
CMD ["serve", "-s", "build", "-l", "3000"]
