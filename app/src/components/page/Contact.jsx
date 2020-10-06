import React from 'react';
import {array} from "prop-types";
import Loading from "../Loading";

const Contact = ({load}) => {
    const [loading, setLoading] = load

    if (loading) {
        return <Loading />
    }

    return (
        <div className="Contact">

        </div>
    );
}

Contact.propTypes = {
    load: array.isRequired
}

export default Contact;
