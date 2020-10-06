import React from 'react';
import {array} from "prop-types";
import Loading from "../Loading";

const Project = ({load}) => {
    const [loading, setLoading] = load

    if (loading) {
        return <Loading />
    }

    return (
        <div className="Project">

        </div>
    );
}

Project.propTypes = {
    load: array.isRequired
}

export default Project;
