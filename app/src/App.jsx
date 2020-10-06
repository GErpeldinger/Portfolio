import React, {useState} from 'react';
import {BrowserRouter as Router, Switch, Route} from "react-router-dom";
import {createMuiTheme, MuiThemeProvider} from "@material-ui/core/styles";
import './scss/App.scss';

import NavBar from "./components/aside/NavBar";
import Home from "./components/page/Home";
import Info from "./components/page/Info/Info";
import Skill from "./components/page/Skill";
import Project from "./components/page/Project";
import Contact from "./components/page/Contact";

const theme = createMuiTheme({
    palette: {
        primary: {
            main: '#61c8e7'
        }
    }
})

const PAGES = {
    home: '/',
    info: '/infos',
    skill: '/skills',
    project: '/projets',
    contact: '/contact'
}

const App = () => {
    const [loading, setLoading] = useState(true)

    return (
        <MuiThemeProvider theme={theme}>
            <Router>
                <div className="App">
                    <aside>
                        <NavBar pages={PAGES} setLoading={setLoading} />
                    </aside>
                    <main>
                        <Switch>
                            <Route exact path={PAGES.home}>
                                <Home load={[loading, setLoading]} />
                            </Route>
                            <Route path={PAGES.info}>
                                <Info load={[loading, setLoading]} />
                            </Route>
                            <Route path={PAGES.skill}>
                                <Skill load={[loading, setLoading]} />
                            </Route>
                            <Route path={PAGES.project}>
                                <Project load={[loading, setLoading]} />
                            </Route>
                            <Route path={PAGES.contact}>
                                <Contact load={[loading, setLoading]} />
                            </Route>
                        </Switch>
                    </main>
                </div>
            </Router>
        </MuiThemeProvider>
    );
}

export default App;
