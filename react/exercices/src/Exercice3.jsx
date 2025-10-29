import { useState } from 'react'

function Exercice3() {

  const [element, setElement] = useState("")
  const [tableau, setTableau] = useState(["aa", "bb", "aa"])

  const handleChange = (evt) => {
    setElement(evt.target.value)
  }

  const handleClick = () => {

    // tableau.push(element)
    // setTableau([...tableau])

    // setTableau([ ...tableau, element])

    let tmp = [...tableau]
    tmp.push(element)
    setTableau(tmp)

    setElement("")
  }

  return (
    <div>
      <input type="text" value={element} onChange={handleChange}/>

      <button onClick={handleClick}>Ajouter</button>
      
      <ul>
        {
          tableau.map ( (item, index) => (
            <li key={index}>
              {item}
            </li>
          ) )
        }
      </ul>
    </div>
  )
}

export default Exercice3
