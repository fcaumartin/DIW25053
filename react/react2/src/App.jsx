import { useState } from 'react'

function App() {

  let nom = "toto"
  let tableau = [ "aaa", "bbb", "ccc" ]

  return (
    <div>
      Coucou 
      {nom} 
      <hr />
      {
        tableau.map( (element) => (
          <div>
            {element}
          </div>
        ) )
      }
    </div>
  )
}

export default App
