const express = require('express');
const mongoose = require('mongoose');
require('dotenv').config();
const exampleRoutes = require('./routes/exampleRoute');
const helmet = require('helmet');
const cors = require('cors');
const morgan = require('morgan');

const app = express();

// Middleware pour la sécurité
app.use(helmet());

// Middleware pour activer CORS
app.use(cors());

// Middleware pour le logging
app.use(morgan('dev'));

// Middleware pour analyser le JSON
app.use(express.json());

// Connexion à MongoDB
mongoose.connect(process.env.MONGODB_URI)
  .then(() => console.log('Connected to MongoDB successfully !!!'))
  .catch(err => console.error('Could not connect to MongoDB', err));

// Route de base
app.get('/', (req, res) => {
  res.send('Bienvenue sur mon application Express !');
});

// Vérification de l'état de la connexion à MongoDB
app.get('/db-status', (req, res) => {
  const status = mongoose.connection.readyState;
  let message = '';

  switch (status) {
    case 0:
      message = 'MongoDB déconnecté';
      break;
    case 1:
      message = 'MongoDB connecté';
      break;
    case 2:
      message = 'Connexion en cours à MongoDB';
      break;
    case 3:
      message = 'Déconnexion de MongoDB en cours';
      break;
    default:
      message = 'État inconnu';
      break;
  }

  res.send(message);
});

// Utilisation des routes d'exemple
app.use('/api/examples', (req, res, next) => {
  console.log('Accès à /api/examples');
  next(); 
}, exampleRoutes);


// Middleware pour la gestion globale des erreurs
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).send('Quelque chose s\'est mal passé !');
});

// Démarrage du serveur
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`Server is running on port ${PORT}`));
