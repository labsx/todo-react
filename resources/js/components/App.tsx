// import React from 'react';
// import { BrowserRouter } from 'react-router-dom';
// import Routes from './routes/Routes';
// const App = () => {
//     return <BrowserRouter>
//              <Routes />
//            </BrowserRouter>
// }
// export default App;

import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import Routes from './routes/Routes';
import { TaskProvider } from './context/TaskContext'; 

const App = () => {
    return (
      <BrowserRouter>
      <TaskProvider>

        <Routes />
     </TaskProvider>
      </BrowserRouter>
    );
}

export default App;