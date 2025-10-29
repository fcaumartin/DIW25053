import { useState } from 'react'

function Exercice2() {

  const [compteur, setCompteur] = useState(0)

  const handleClick = () => {
    let tmp = compteur + 1
    setCompteur(tmp)
  }

  return (
    <div>
      <button onClick={handleClick}>Compteur = {compteur}</button>
    </div>
  )
}

export default Exercice2
