import React, {useEffect, useState} from 'react';
import {func, object} from 'prop-types';
import axios from 'axios';

import MenuLink from './MenuLink';
import ExternalLink from './ExternalLink';

import {faEnvelope, faEye, faHome, faTools, faUserTie} from '@fortawesome/free-solid-svg-icons';
import {faGithub, faLinkedin} from '@fortawesome/free-brands-svg-icons';

import avatar from '../../images/Avatar.jpg';

const NavBar = ({pages, setLoading}) => {
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
                <MenuLink icon={faHome} url={pages.home} setLoading={setLoading}>Accueil</MenuLink>
                <MenuLink icon={faUserTie} url={pages.info} setLoading={setLoading}>Infos</MenuLink>
                <MenuLink icon={faTools} url={pages.skill} setLoading={setLoading}>Skills</MenuLink>
                <MenuLink icon={faEye} url={pages.project} setLoading={setLoading}>Projets</MenuLink>
                <MenuLink icon={faEnvelope} url={pages.contact} setLoading={setLoading}>Contact</MenuLink>
            </div>
            <div>
                <ExternalLink icon={faLinkedin} url={linkLinkedIn}>LinkedIn</ExternalLink>
                <ExternalLink icon={faGithub} url={linkGitHub}>GitHub</ExternalLink>
            </div>
        </nav>
    );
}

NavBar.propTypes = {
    pages: object.isRequired,
    setLoading: func.isRequired
}

export default NavBar;
