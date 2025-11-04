import { useNavigate } from "react-router";

function Form() {

    const navigateur = useNavigate();

    const handleClick = () => {



        console.log('clique...')

        navigateur("/list")

    }

  return (
    <div>
      Formulaire
      <hr />
      Nom <input type="text" /><br />
      Prenom <input type="text" /><br />
      <button onClick={handleClick}>Envoyer</button>
    </div>
  )
}

export default Form
