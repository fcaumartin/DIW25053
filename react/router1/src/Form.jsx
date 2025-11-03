import { useNavigate } from "react-router";

function Form() {

const handleClick = () => {

    const navigateur = useNavigate();


    console.log('clique...')

    navigateur("/list", { replace: true })

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
