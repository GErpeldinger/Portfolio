import React from 'react';
import {object, string, array} from 'prop-types';

import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

const MenuLink = ({icon, name, pages, children}) => {
    const [page, handleChange] = pages
    const handleClick = () => {
        handleChange(name)
    }
    return (
        <div className="Icon" onClick={handleClick}>
            <span className={'icon ' + (name === page ? 'active' : '')}><FontAwesomeIcon icon={icon}/></span>
            <span className={'text ' + (name === page ? 'active' : '')}>{children}</span>
        </div>
    );
}

MenuLink.propTypes = {
    icon: object.isRequired,
    name: string.isRequired,
    pages: array.isRequired,
    children: string.isRequired
}

export default MenuLink;
