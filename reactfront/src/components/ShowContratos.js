import React, {useEffect, useState} from 'react'
import axios from 'axios'
import {Link} from 'react-router-dom'

const endpoint = 'http://localhost:8000/api'

const ShowContratos = () => {
  const [ contratos, setContratos ] = useState( [] )

  useEffect ( ()=> {
      getAllContratos()
  }, [])

  const getAllContratos = async () => {
    const response = await axios.get(`${endpoint}/contratos`)
    setContratos(response.data)
    //console.log(response.data)
  }

  const deleteContrato = async (id) => {
    await axios.delete(`${endpoint}/contrato/${id}`)
    getAllContratos()
  }
  return (
    <div>
            <Link to="/create" className='btn btn-success btn-lg mt-2 mb-2 text-white'>Create</Link>

        <table className='table table-bordered'>
            <thead className='bg-light text-dark'>
                <tr>
                    <th>Acciones</th>
                    <th>Portal</th>
                    <th>Entidad</th>
                    <th>Objeto</th>
                    <th>Cuantía</th>
                    <th>Modalidad</th>
                    <th>Número</th>
                    <th>Estado</th>
                    <th>F. publicación</th>
                    <th>Ubicación</th>
                    <th>Contratista</th>
                    <th>Actividad económica</th>
                </tr>
            </thead>
            <tbody>
                { contratos.map( (contrato) => (
                    <tr key={contrato.id}>
                        <td>
                            <Link to={`/edit/${contrato.id}`} className='btn btn-warning'>Edit</Link>
                            <button onClick={ ()=>deleteContrato(contrato.id) } className='btn btn-danger'>Delete</button>
                        </td>
                        <td> {contrato.fuente.alias_portal} </td>    
                        <td> {contrato.entidad_contratante} </td>    
                        <td> {contrato.objeto.substr(0, 30)}... <Link to="" className="text-primary">Ver más</Link></td>  
                        <td> {contrato.valor > 0 ? contrato.valor.toLocaleString("co-CO") : contrato.valor_texto} </td> 
                        <td> {contrato.modalidad} </td> 
                        <td> {contrato.codigo_proceso} </td>    
                        <td> {contrato.estado_proceso} </td> 
                        <td> {contrato.fecha_publicacion} </td> 
                        <td> {contrato.ubicacion} </td> 
                        <td> {contrato.contratista} </td> 
                        <td> {contrato.actividad_economica} </td> 
                    </tr>
                )) }
            </tbody>
        </table>
    </div>
  )
}

export default ShowContratos