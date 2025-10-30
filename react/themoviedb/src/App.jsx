import axios from 'axios'
import { useState } from 'react'
import DataTable from "react-data-table-component";

function App() {

  const columns = [
      {
        name: <b>Nom</b>,
        selector: (film) => film.title,
        sortable: true,
      },
      {
        name: 'Année',
        selector: (film) => film.release_date,
        sortable: true,
      },
      {
        name: 'Poster',
        cell: (film) => <img style={{width: '60px'}} src={film.poster_path?'http://image.tmdb.org/t/p/w185' + film.poster_path:'https://placehold.co/185x274'} />,
        
      },
      {
        name: 'Vote',
        selector: film => film.vote_average,
        sortable: true
      }
    ];


  const [recherche, setRecherche] = useState("country")
  const [liste, setListe] = useState([])

  const handleClick = () => {
    axios
      .get("http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=" + recherche)
      .then( (reponse) => {
        setListe(reponse.data.results)
      })
  }

  return (
    <>
      <input 
        type="text" 
        value={recherche} 
        onChange={ (evt) => { setRecherche(evt.target.value) }}
      />
      <button
        onClick={handleClick}
        >
        Recherche
      </button>
      <hr />
        <DataTable
            columns={columns}
            data={liste}
        />
      <hr />
      <div>
        {
          liste.map( (film) => (
            <div>
              {film.title}
            </div>
          ) )
        }
      </div>
    </>
  )
}

export default App
