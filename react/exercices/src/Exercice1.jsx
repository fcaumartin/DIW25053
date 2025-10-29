import { useState } from 'react'

function Exercice1() {1

  const [nom, setNom] = useState("")
  const [prenom, setPrenom] = useState("")

  const handleChangeNom = (evt) => {
    setNom(evt.target.value)
  }

  const handleChangePrenom = (evt) => {
    setPrenom(evt.target.value)
  }

  return (
    <div>
      <input type="text" placeholder="Votre nom..." value={nom} onChange={handleChangeNom}/>
      <input type="text" placeholder="Votre prénom..." value={prenom} onChange={handleChangePrenom}/>
      <div>
        Bonjour {prenom} {nom}
      </div>
    </div>

  )
}

export default Exercice1

