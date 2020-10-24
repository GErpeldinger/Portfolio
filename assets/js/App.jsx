import React from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { ROUTES } from "./utils/constants";

import NavBar from "./components/navbar/NavBar";

const App = () => {
    return (
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
    );
}

export default App;
