import { useState } from 'react'
import Liste from './Liste'
import Form from './Form'
import { Link, Route, Routes } from 'react-router'


function App() {

  return (
    <>
      <nav>
        <Link to="/list">Liste</Link>
        &nbsp;
        <Link to="/form">Formulaire</Link>
      </nav>
      <Routes>
        <Route path="list" element={<Liste />} />
        <Route path="form" element={<Form />} />
      </Routes>
    </>
  )
}

export default App
