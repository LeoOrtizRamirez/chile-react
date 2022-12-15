import './customcss/style.css'
import { BrowserRouter, Routes, Route } from 'react-router-dom';

//importar nuestros componentes
import ShowContratos from './components/ShowContratos';
import CreateContrato from './components/CreateContrato';
import EditContrato from './components/EditContrato';


function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path='/' element={ <ShowContratos/> } />
          <Route path='/create' element={ <CreateContrato/> } />
          <Route path='/edit/:id' element={ <EditContrato/> } />
        </Routes>
      </BrowserRouter>      
    </div>
  );
}

export default App;
