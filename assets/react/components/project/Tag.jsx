import React, { useState } from 'react';
import PropTypes from 'prop-types';
import Popover from '@material-ui/core/Popover';

const Tag = ({ children, description, link, category }) => {
    const [anchorEl, setAnchorEl] = useState(null)
    const handlePopoverOpen = (event) => {
        setAnchorEl(event.currentTarget);
    };

    const handlePopoverClose = () => {
        setAnchorEl(null);
    };
    const open = Boolean(anchorEl)
    return (
        <li className="Tag" onMouseEnter={handlePopoverOpen} onMouseLeave={handlePopoverClose} aria-owns={open ? 'mouse-over-popover' : undefined}
            aria-haspopup="true">
            <a href={link} target="_blank" rel="noopener noreferrer">{children}</a>
            <Popover open={open}
                     className="Popover"
                     id="mouse-over-popover"
                     anchorEl={anchorEl}
                     anchorOrigin={{
                         vertical: 'top',
                         horizontal: 'center',
                     }}
                     transformOrigin={{
                         vertical: 'bottom',
                         horizontal: 'center',
                     }}
                     onClose={handlePopoverClose}>
                <h4>{children} - {category}</h4>
                <p>{description}</p>
                <p>Cliquer pour plus d'informations.</p>
            </Popover>
        </li>
    );
}

Tag.propTypes = {
    children: PropTypes.string.isRequired,
    description: PropTypes.string,
    link: PropTypes.string,
    category: PropTypes.string.isRequired
}

export default Tag;
