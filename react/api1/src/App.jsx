import axios from 'axios'
import { useEffect, useState } from 'react'

function App() {

  const [films, setFilms] = useState([])

  useEffect( () => {

    axios
      .get("http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=toto")
      .then( (reponse) => {
        console.log(reponse.data.results)
        setFilms(reponse.data.results)
      } )

  }, [])

  return (
    <>
      <ul>

        {
          films.map( (film) => (
            <li>
              {film.title}
            </li>
          ) )
        }
      </ul>
    </>
  )
}

export default App
