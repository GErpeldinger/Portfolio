import React, {useCallback, useState} from 'react';
import './scss/App.scss';

import NavBar from "./components/aside/NavBar";
import Home from "./components/page/Home";
import Info from "./components/page/Info/Info";

import {createMuiTheme, MuiThemeProvider} from "@material-ui/core/styles";

const theme = createMuiTheme({
    palette: {
        primary: {
            main: '#61c8e7'
        }
    }
})

const PAGES = {
    home: 'home',
    info: 'info',
    skills: 'skills',
    projects: 'projects',
    contact: 'contact'
}

const App = () => {
    const [page, setPage] = useState(PAGES.home)
    const handlePage = useCallback((newPage) => {
        if (page !== newPage) {
            setPage(newPage)
            setLoading(true)
        }
    }, [page])
    const [loading, setLoading] = useState(true)

    return (
        <MuiThemeProvider theme={theme}>
            <div className="App">
                <aside>
                    <NavBar pages={[PAGES, page, handlePage]} />
                </aside>
                <main>
                    {page === PAGES.home && <Home load={[loading, setLoading]} />}
                    {page === PAGES.info && <Info load={[loading, setLoading]} />}
                </main>
            </div>
        </MuiThemeProvider>
    );
}

export default App;
