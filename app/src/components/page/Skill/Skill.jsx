import React, {useEffect, useState} from 'react';
import {array} from "prop-types";
import parser from 'html-react-parser';
import axios from "axios";
import {API_GET_INFO, API_GET_SKILL} from "../../../constants";

import Loading from "../../Loading";
import SkillIcon from "./SkillIcon";

const Skill = ({load}) => {
    const [loading, setLoading] = load
    const [summary, setSummary] = useState('')
    const [skills, setSkills] = useState({
        icon: '',
        name: ''
    })

    useEffect(() => {
        axios.get(API_GET_INFO)
            .then(response => response.data)
            .then(data => setSummary(data.summary))
        axios.get(API_GET_SKILL)
            .then(response => response.data)
            .then(data => {
                setSkills(data['hydra:member'])
                setLoading(false)
            })
    }, [setLoading])

    if (loading) {
        return <Loading />
    }

    return (
        <div className="d-flex align-items-center justify-content-center vh-100">
            <div className="col-12 col-lg-5 text-center">
                <p>{parser(String(summary))}</p>
            </div>
            <div className="col-12 col-lg-3 d-flex flex-wrap justify-content-center align-items-center">
                {skills.map(skill => <SkillIcon name={skill.name} icon={skill.icon} key={skill.name} />)}
            </div>
        </div>
    );
}

Skill.propTypes = {
    load: array.isRequired
}

export default Skill;
