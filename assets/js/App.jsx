import React from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { createMuiTheme, MuiThemeProvider } from "@material-ui/core/styles";
import { COLORS, ROUTES } from "./utils/constants";

import NavBar from "./components/navbar/NavBar";

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
                <div className="App">
                    <NavBar/>
                    <main>
                        <Switch>
                            <Route exact path={ROUTES.home}>

                            </Route>
                            <Route path={ROUTES.skill}>

                            </Route>
                            <Route path={ROUTES.project}>

                            </Route>
                        </Switch>
                    </main>
                </div>
            </Router>
        </MuiThemeProvider>
    );
}

export default App;
