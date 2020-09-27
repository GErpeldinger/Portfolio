import React from 'react';
import {array} from "prop-types";

const Project = ({load}) => {
    const [loading, setLoading] = load

    return (
        <div className="Project">

        </div>
    );
}

Project.propTypes = {
    load: array.isRequired
}

export default Project;
