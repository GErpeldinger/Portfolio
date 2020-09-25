import React, {useEffect, useState} from 'react';
import PropTypes from 'prop-types';
import axios from 'axios';

import MenuLink from './MenuLink';
import ExternalLink from './ExternalLink';

import {faEnvelope, faEye, faHome, faTools, faUserTie} from '@fortawesome/free-solid-svg-icons';
import {faGithub, faLinkedin} from '@fortawesome/free-brands-svg-icons';

import avatar from '../../images/Avatar.jpg';

const NavBar = ({pages}) => {
    const [PAGES, page, handlePage] = pages
    const [linkLinkedIn, setLinkLinkedIn] = useState('')
    const [linkGitHub, setLinkGitHub] = useState('')

    useEffect(() => {
        axios.get('http://localhost:8000/api/links')
            .then(response => response.data)
            .then(data => {
                setLinkLinkedIn(data['hydra:member'][0]['url'])
                setLinkGitHub(data['hydra:member'][1]['url'])
            } )
    }, [])

    return (
        <nav className="NavBar">
            <img src={avatar} alt='Avatar' />
            <div>
                <MenuLink icon={faHome} name={PAGES.home} pages={[page, handlePage]}>Accueil</MenuLink>
                <MenuLink icon={faUserTie} name={PAGES.info} pages={[page, handlePage]}>Infos</MenuLink>
                <MenuLink icon={faTools} name={PAGES.skills} pages={[page, handlePage]}>Skills</MenuLink>
                <MenuLink icon={faEye} name={PAGES.projects} pages={[page, handlePage]}>Projets</MenuLink>
                <MenuLink icon={faEnvelope} name={PAGES.contact} pages={[page, handlePage]}>Contact</MenuLink>
            </div>
            <div>
                <ExternalLink icon={faLinkedin} url={linkLinkedIn}>LinkedIn</ExternalLink>
                <ExternalLink icon={faGithub} url={linkGitHub}>GitHub</ExternalLink>
            </div>
        </nav>
    );
}

NavBar.propTypes = {
    pages: PropTypes.array.isRequired
}

export default NavBar;
