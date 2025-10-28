import { useState } from 'react'

function Demo() {
  
  const [ compteur, setCompteur ] = useState(666)
  const [ nom, setNom] = useState("toto")

  const handleClick = () => {
    console.log('coucou')
    setCompteur(compteur+1)
  }

  const handleChange = (evenement) => {
    console.log(evenement)
    setNom(evenement.target.value)
  }

  return (
    <div>
      <h1>Demo</h1>
      <div>
        {compteur}
      </div>
      <button onClick={handleClick}>Clique moi !</button>
      <input type="text" value={nom} onChange={handleChange}/>
      <div>
        {nom}
      </div>
    </div>
  )
}

export default Demo
