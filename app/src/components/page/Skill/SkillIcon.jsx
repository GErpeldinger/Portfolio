import React from 'react';
import {PATH_SKILL_ICON} from "../../../constants";

const SkillIcon = ({name, icon}) => {
    return (
        <div className="m-3">
            <p className="text-center">{name}</p>
            <img src={PATH_SKILL_ICON + icon}
                 alt={name}
                 width="75px"
                 height="75px"/>
        </div>
    );
}

export default SkillIcon;
