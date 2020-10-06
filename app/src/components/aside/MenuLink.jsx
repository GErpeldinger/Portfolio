import React from 'react';
import {Link, useLocation} from 'react-router-dom';
import {func, object, string} from 'prop-types';

import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

const MenuLink = ({icon, url, setLoading, children}) => {
    const location = useLocation()

    const handleLoading = () => {
        if (location.pathname !== url) {
            setLoading(true)
        }
    }

    return (
        <Link className="Icon" to={url} onClick={handleLoading}>
            <span className={'icon ' + (location.pathname === url ? 'active' : '')}><FontAwesomeIcon icon={icon}/></span>
            <span className={'text ' + (location.pathname === url ? 'active' : '')}>{children}</span>
        </Link>
    );
}

MenuLink.propTypes = {
    icon: object.isRequired,
    url: string.isRequired,
    setLoading: func.isRequired,
    children: string.isRequired
}

export default MenuLink;
