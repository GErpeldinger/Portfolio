import React, { useEffect } from 'react';
import ReactFullPage from '@fullpage/react-fullpage';
import Homepage from '../components/home/Homepage';
import Introduction from '../components/home/Introduction';
import Skills from '../components/home/Skills';

const Home = () => {
    useEffect(() => {
        const main = document.querySelector('main')
        main.style.overflowY = 'unset'

        return () => { main.style.overflowY = 'scroll' }
    }, [])

    return (
        <div className="Home">
            <ul id="menu">
                <li data-menuanchor="accueil" className="active"><a href="#accueil">Accueil</a></li>
                <li data-menuanchor="presentation"><a href="#presentation">Présentation</a></li>
                <li data-menuanchor="competences"><a href="#competences">Compétences</a></li>
            </ul>
            <ReactFullPage
                licenseKey={'YOUR_KEY_HERE'}
                anchors={['accueil', 'presentation', 'competences']}
                menu='#menu'
                navigation={true}
                navigationPosition='right'
                loopTop={true}
                loopBottom={true}
                render={() => {
                    return (
                        <ReactFullPage.Wrapper>
                            <div className="section">
                                <Homepage/>
                            </div>
                            <div className="section">
                                <Introduction/>
                            </div>
                            <div className="section">
                                <Skills/>
                            </div>
                        </ReactFullPage.Wrapper>
                    )
                }}
            />
        </div>
    );
}

export default Home;
