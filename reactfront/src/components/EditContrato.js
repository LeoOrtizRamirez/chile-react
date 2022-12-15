import axios from "axios";
import React, {useState, useEffect} from "react";
import { useNavigate, useParams } from "react-router-dom";

const endpoint = 'http://localhost:8000/api/contrato/'

const EditContrato = () => {
    const [entidad_contratante, setEntidadContratante] = useState('')
    const navigate = useNavigate()
    const {id} = useParams()

    const update = async (e) => {
        e.preventDefault()
        await axios.put(`${endpoint}${id}`, {
            entidad_contratante: entidad_contratante
        })
        navigate('/')
    }
    
    useEffect( () =>{
        const getContratoById = async () => {
            const response = await axios.get(`${endpoint}${id}`)
            setEntidadContratante(response.data.entidad_contratante)
        }
        getContratoById()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [] )

    return (
        <div className="container mt-4">
        <h3>Editar Contrato</h3>
        <form onSubmit={update}>
            <div className='mb-3'>
                <label className='form-label'>Entidad Contratante</label>
                <input 
                    value={entidad_contratante}
                    onChange={ (e)=> setEntidadContratante(e.target.value)}
                    type='text'
                    className='form-control'
                />
            </div>
            <button type='submit' className='btn btn-primary'>Actualizar</button>
        </form>
    </div>
    )
}

export default EditContrato

