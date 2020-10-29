import React from 'react';
import ReactDOM from 'react-dom';
import '../scss/app.scss';

import App from './App.jsx';
import AdminNavBar from "./components/admin_navbar/AdminNavBar";

ReactDOM.render(
    <React.StrictMode>
        <App/>
    </React.StrictMode>,
    document.querySelector('#App')
)

const adminNavBar = document.querySelector('#AdminNavBar')
if (adminNavBar) {
    ReactDOM.render(<AdminNavBar/>, adminNavBar)
}
