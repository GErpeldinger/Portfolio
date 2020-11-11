import React, { Fragment, useState } from 'react';
import { ADMIN_URL, API_URL, APP_LOGOUT } from '../../utils/constants';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSignOutAlt, faToolbox, faUserCog } from '@fortawesome/free-solid-svg-icons';

const AdminNavBar = () => {
    const [isOpen, setIsOpen] = useState(false)
    const toggleIsOpen = () => setIsOpen(isOpen => !isOpen)

    return (
        <Fragment>
            <div className="MainButton" onClick={toggleIsOpen}/>
            {isOpen && <Fragment>
                <a className="ChildButton" href={API_URL} target="_blank"><FontAwesomeIcon icon={faToolbox} size="xs"/></a>
                <a className="ChildButton" href={ADMIN_URL} target="_blank"><FontAwesomeIcon icon={faUserCog} size="xs"/></a>
                <a className="ChildButton" href={APP_LOGOUT}><FontAwesomeIcon icon={faSignOutAlt} size="xs"/></a>
            </Fragment>}
        </Fragment>
    );
}

export default AdminNavBar;
