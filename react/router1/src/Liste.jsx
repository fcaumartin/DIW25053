import axios from 'axios'
import { useEffect, useState } from 'react'

function Liste() {

  const [liste, setListe] = useState([{nom: "test", prenom: "test"}])

  useEffect( () => {
    console.log("chargement liste...")
    axios
      .get("http://127.0.0.1:8000/liste.php")
      .then( (reponse) => {
        setListe(reponse.data)
      })
  }, [])

  return (
    <div>
      Liste
      <div>
        {
          liste.map( (client) => (
            <div>
              {client.nom} {client.prenom}
            </div>
          ) )
        }
      </div>
    </div>
  )
}

export default Liste
