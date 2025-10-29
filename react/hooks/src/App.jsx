import { useEffect, useState } from 'react'

function App() {

  const [count, setCount] = useState(0)

  useEffect( () => {
    console.log("chargement app...")
  }, [])

  useEffect( () => {
    console.log("changement count...")
  }, [count])

  return (
    <>
      <h1>Hooks</h1>
        <button onClick={() => setCount((count) => count + 1)}>
          count is {count}
        </button>
    </>
  )
}

export default App
