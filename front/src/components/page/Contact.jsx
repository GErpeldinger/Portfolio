import React from 'react';
import {array} from "prop-types";

const Contact = ({load}) => {
    const [loading, setLoading] = load

    return (
        <div className="Contact">

        </div>
    );
}

Contact.propTypes = {
    load: array.isRequired
}

export default Contact;
