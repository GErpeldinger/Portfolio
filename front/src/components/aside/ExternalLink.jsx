import React from 'react';
import {object, string} from 'prop-types';

import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

const ExternalLink = ({url, icon, children}) => {
    return (
        <a className="Icon" href={url} target="_blank" rel="noopener noreferrer">
            <span className="icon"><FontAwesomeIcon icon={icon}/></span>
            <span className="text">{children}</span>
        </a>
    );
}

ExternalLink.propTypes = {
    url: string.isRequired,
    icon: object.isRequired,
    children: string.isRequired,
}

export default ExternalLink;
