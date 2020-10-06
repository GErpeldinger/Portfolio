import React from 'react';
import {array} from "prop-types";
import Loading from "../Loading";

const Skill = ({load}) => {
    const [loading, setLoading] = load

    if (loading) {
        return <Loading />
    }

    return (
        <div className="Skills">
        </div>
    );
}

Skill.propTypes = {
    load: array.isRequired
}

export default Skill;
