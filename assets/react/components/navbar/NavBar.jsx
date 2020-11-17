import React, { Fragment, useEffect } from 'react';
import { useMediaQuery } from 'react-responsive';
import { API_LINKS, LARGE_DEVICE_MIN_WIDTH, ROUTES } from '../../utils/constants';
import { useGetWithAxios } from '../../utils/hooks';
import { faEnvelope, faEye, faHome, faTools } from '@fortawesome/free-solid-svg-icons';
import { faGithub, faLinkedin } from '@fortawesome/free-brands-svg-icons';
import MenuLink from './MenuLink';
import VerticalLine from './VerticalLine';

const NavBar = () => {
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })
    const {items: links, load, loading} = useGetWithAxios(API_LINKS.links)

    useEffect(() => load(), [])

    const internalLinks = <Fragment>
        <MenuLink url={ROUTES.home} icon={faHome}>Accueil</MenuLink>
        {/* <MenuLink url={ROUTES.skill} icon={faTools}>Compétences</MenuLink> */}
        <MenuLink url={ROUTES.projects} icon={faEye}>Projets</MenuLink>
    </Fragment>

    const externalLinks = !loading && <Fragment>
        <MenuLink url={links[0].href} icon={faEnvelope} external>Contact</MenuLink>
        <MenuLink url={links[1].href} icon={faLinkedin} external>LinkedIn</MenuLink>
        <MenuLink url={links[2].href} icon={faGithub} external>GitHub</MenuLink>
    </Fragment>

    let value = <Fragment>{internalLinks}{externalLinks}</Fragment>
    if (isDesktop) {
        value = <Fragment>
            <VerticalLine/>
            <div className="menu">
                <div>{internalLinks}</div>
                <div>{externalLinks}</div>
            </div>
            <VerticalLine position="bottom"/>
        </Fragment>
    }

    return (
        <nav className="NavBar">
            {value}
        </nav>
    )
}

export default NavBar;
