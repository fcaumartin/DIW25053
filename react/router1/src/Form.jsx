import axios from "axios";
import { useState } from "react";
import { useNavigate } from "react-router";

function Form() {

    const navigateur = useNavigate();

    const [nom, setNom] = useState("")
    const [prenom, setPrenom] = useState("")

    const handleClick = () => {


        axios
            .post(
                "http://127.0.0.1:8000/post.php",
                {
                    nom: nom,
                    prenom: prenom
                },
                {
                    headers: {
                        "Content-type" : "application/json"
                    }
                }
            )

        console.log('clique...')

        navigateur("/list")

    }

  return (
    <div>
      Formulaire
      <hr />
      Nom 
      <input 
            type="text" 
            value={nom} 
            onChange={ (evt) => setNom(evt.target.value)}
        /><br />
        Prenom 
        <input 
            type="text" 
            value={prenom} 
            onChange={ (evt) => setPrenom(evt.target.value)}
        /><br />
      <button onClick={handleClick}>Envoyer</button>
    </div>
  )
}

export default Form
