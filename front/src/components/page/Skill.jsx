import React from 'react';
import {array} from "prop-types";

const Skill = ({load}) => {
    const [loading, setLoading] = load

    return (
        <div className="Skills">
        </div>
    );
}

Skill.propTypes = {
    load: array.isRequired
}

export default Skill;
