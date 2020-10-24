import React, { Fragment } from 'react';
import { useMediaQuery } from 'react-responsive';
import { faEnvelope, faEye, faHome, faTools } from '@fortawesome/free-solid-svg-icons';
import { faGithub, faLinkedin } from '@fortawesome/free-brands-svg-icons';
import { LARGE_DEVICE_MIN_WIDTH, LINKS, ROUTES } from "../../utils/constants";

import MenuLink from "./MenuLink";
import VerticalLine from "./VerticalLine";

const NavBar = () => {
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })

    const internalLinks = <Fragment>
        <MenuLink url={ROUTES.home} icon={faHome}>Accueil</MenuLink>
        <MenuLink url={ROUTES.skill} icon={faTools}>Compétences</MenuLink>
        <MenuLink url={ROUTES.project} icon={faEye}>Projets</MenuLink>
    </Fragment>

    const externalLinks = <Fragment>
        <MenuLink url={LINKS.email} icon={faEnvelope} external>Contact</MenuLink>
        <MenuLink url={LINKS.linkedin} icon={faLinkedin} external>LinkedIn</MenuLink>
        <MenuLink url={LINKS.github} icon={faGithub} external>GitHub</MenuLink>
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
