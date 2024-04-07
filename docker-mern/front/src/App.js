import React, { useEffect, useState } from 'react';
import logo from './logo.svg';
import './App.css';
import axios from 'axios'; // Importez Axios

function App() {
  const [dbStatus, setDbStatus] = useState('');
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');

  useEffect(() => {
    axios.get('http://localhost:5000/db-status')
      .then(response => {
        setDbStatus(response.data);
        setLoading(false);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
        setError('Erreur lors du chargement des données');
        setLoading(false);
      });
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Bienvenue sur ma plateforme MERN Docker !
        </p>
        {loading ? (
          <p>Chargement en cours...</p>
        ) : error ? (
          <p>{error}</p>
        ) : (
          <p>Status de la base de données MongoDB: {dbStatus}</p>
        )}
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;
