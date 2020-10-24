import React, { Fragment, useState } from 'react';
import PropTypes from 'prop-types';
import { useMediaQuery } from "react-responsive";
import { Link, useLocation } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { MEDIUM_DEVICE_MIN_WIDTH, LARGE_DEVICE_MIN_WIDTH } from "../../utils/constants";

const MenuLink = ({ url, icon, external, children }) => {
    const isTablet = useMediaQuery({ query: MEDIUM_DEVICE_MIN_WIDTH })
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })

    const [hover, setHover] = useState(false)
    const toggleHover = () => setHover(hover => !hover)
    const handleMouse = () => isDesktop ? toggleHover() : ''

    const location = useLocation()
    const className = 'MenuLink' + (!external && location.pathname === url ? ' MenuLinkActive' : '')

    const handleValue = () => isDesktop ? (hover ? children : <FontAwesomeIcon icon={icon}/>)
        : isTablet ? <Fragment><FontAwesomeIcon icon={icon}/> {children}</Fragment>
            : <FontAwesomeIcon icon={icon}/>

    if (external) {
        return (
            <a className={className} href={url} target="_blank" rel="noopener noreferrer"
               onMouseEnter={handleMouse} onMouseLeave={handleMouse}>
                {handleValue()}
            </a>
        )
    }

    return (
        <Link className={className} to={url} onMouseEnter={handleMouse} onMouseLeave={handleMouse}>
            {handleValue()}
        </Link>
    )
}

MenuLink.propTypes = {
    url: PropTypes.string.isRequired,
    icon: PropTypes.object.isRequired,
    external: PropTypes.bool,
    children: PropTypes.string.isRequired
}

MenuLink.defaultProps = {
    external: false
}
export default MenuLink;
