import React, { Fragment } from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { MuiThemeProvider } from "@material-ui/core/styles";
import { THEME } from './utils/themeMUI'
import { ROUTES } from "./utils/constants";

import NavBar from "./components/navbar/NavBar";
import Home from "./routes/Home";
import Projects from "./routes/Projects";
import Project from "./routes/Project";

const App = () => {
    return (
        <MuiThemeProvider theme={THEME}>
            <Router>
                <Fragment>
                    <NavBar/>
                    <main>
                        <Switch>
                            <Route exact path={ROUTES.home} component={Home}/>
                            <Route exact path={ROUTES.projects} component={Projects}/>
                            <Route path={ROUTES.project} component={Project}/>
                        </Switch>
                    </main>
                </Fragment>
            </Router>
        </MuiThemeProvider>
    );
}

export default App;
