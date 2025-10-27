import Musicien from "./Musicien.jsx"

const App = () => {

  let alert = true
  let nom = "toto"
  let liste = ["John", "Paul", "George", "Ringo", "Ringo"]

  return (
    <div>
      Coucou {nom} !!! !!!
      {
        alert?
        <div >
          Attention !!!
        </div>:
        <div>
          OK
        </div>
      }
      <hr />
      {
        liste.map( (elt, index) => (
          <Musicien key={index} nom={elt} prenom="titi"/>
        ) )
      }
    </div>
  )
}

export default App
