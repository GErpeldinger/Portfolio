import React, { useState } from 'react';
import Popover from "@material-ui/core/Popover";

const Tag = ({ category, description, link, children }) => {
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
            <a href={link} target="_blank">{children}</a>
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
                     onClose={handlePopoverClose}
                     disableRestoreFocus
            >
                <p>{children} - {category}</p>
                <p>{description}</p>
                <p>Cliquer pour plus d'informations.</p>
            </Popover>
        </li>
    );
}

export default Tag;
