import React, { Fragment } from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { createMuiTheme, MuiThemeProvider } from "@material-ui/core/styles";
import { COLORS, ROUTES } from "./utils/constants";

import NavBar from "./components/navbar/NavBar";
import Projects from "./routes/Projects";
import Project from "./routes/Project";

const theme = createMuiTheme({
    palette: {
        primary: {
            main: COLORS.primary
        },
    }
})

const App = () => {
    return (
        <MuiThemeProvider theme={theme}>
            <Router>
                <Fragment>
                    <NavBar/>
                    <main>
                        <Switch>
                            <Route exact path={ROUTES.home}/>
                            <Route path={ROUTES.skill}/>
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
