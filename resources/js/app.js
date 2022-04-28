require('./bootstrap');
import ReactDOM from 'react-dom';
import * as React from 'react';
import Index from '../../public/ui/landing/index'
import Dashboard from '../../public/ui/dashboard/index'
import { SnackbarProvider } from 'notistack';
import {
    BrowserRouter,
    Routes,
    Route, Navigate, useNavigate,

} from 'react-router-dom';

ReactDOM.render(
    <SnackbarProvider>
        <BrowserRouter>
        <Routes>
            <Route path="/faxful/public/" element={<Index/>} />
            <Route path="/faxful/public/dashboard" element={<Dashboard/>} />
        </Routes>
        </BrowserRouter>
    </SnackbarProvider>
    , document.querySelector('#app'));
