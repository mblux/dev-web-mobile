import React, { useState } from 'react';
import './App.css';
import { personnes } from './pers';

function App() {
  const [filters, setFilters] = useState({
    ville: '',
    statut: '',
    recherche: ''
  });

  const handleFilterChange = (e) => {
    const { name, value } = e.target;
    setFilters(prev => ({
      ...prev,
      [name]: value
    }));
  };

  const resetFilters = () => {
    setFilters({
      ville: '',
      statut: '',
      recherche: ''
    });
  };

  const filteredPersonnes = personnes.filter(personne => {
    const matchesVille = !filters.ville || personne.ville === filters.ville;
    const matchesStatut = !filters.statut || personne.statut === filters.statut;
    const matchesRecherche = !filters.recherche || 
      personne.nom.toLowerCase().includes(filters.recherche.toLowerCase()) ||
      personne.competences.some(comp => 
        comp.toLowerCase().includes(filters.recherche.toLowerCase())
      );
    
    return matchesVille && matchesStatut && matchesRecherche;
  });

  return (
    <div className="container">
      <h1>Annuaire des Personnes</h1>

      <div className="filtre-container">
        <h4>Filtrer les résultats :</h4>
        <div className="filtre">
          <select 
            name="ville" 
            value={filters.ville}
            onChange={handleFilterChange}
          >
            <option value="">Toutes les villes</option>
            <option>Lille</option>
            <option>Bordeaux</option>
            <option>Lyon</option>
            <option>Toulouse</option>
            <option>Nantes</option>
            <option>Strasbourg</option>
          </select>

          <select 
            name="statut" 
            value={filters.statut}
            onChange={handleFilterChange}
          >
            <option value="">Tous les statuts</option>
            <option>Actif</option>
            <option>Inactif</option>
          </select>

          <input 
            type="text" 
            name="recherche"
            placeholder="Rechercher..." 
            value={filters.recherche}
            onChange={handleFilterChange}
          />
          <button 
            className="apply" 
            onClick={() => setFilters({...filters})}
          >
            Appliquer
          </button>
          <button className="reset" onClick={resetFilters}>
            Réinitialiser
          </button>
        </div>
      </div>

      <div className="cards">
        {filteredPersonnes.map(personne => (
          <div className="card" key={personne.id}>
            <h2>{personne.nom}</h2>
            <p><strong>Âge :</strong> {personne.age} ans</p>
            <p><strong>Email :</strong> {personne.email}</p>
            <p><strong>Ville :</strong> {personne.ville}</p>
            <p><strong>Statut :</strong> 
              <span className={`badge ${personne.statut.toLowerCase()}`}>
                {personne.statut}
              </span>
            </p>
            <p><strong>Compétences :</strong></p>
            <div className="skills">
              {personne.competences.map((competence, index) => (
                <span key={index}>{competence}</span>
              ))}
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default App;