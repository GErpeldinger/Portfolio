import React, {useEffect, useState} from 'react';
import {array} from "prop-types";
import Loading from "../../Loading";
import ProjectCard from "./ProjectCard";
import axios from "axios";
import {API_GET_PROJECT} from "../../../constants";

const Project = ({load}) => {
    const [loading, setLoading] = load
    const [projects, setProjects] = useState({})

    useEffect(() => {
        axios.get(API_GET_PROJECT)
            .then(response => response.data)
            .then(data => {
                setProjects(data['hydra:member'])
                setLoading(false)
            })
    }, [setLoading])

    if (loading) {
        return <Loading />
    }

    return (
        <div className="Project">
            {projects.map(project =>
                <ProjectCard
                    image={project.cover}
                    name={project.name}
                    description={project.description}
                />
            )}
        </div>
    );
}

Project.propTypes = {
    load: array.isRequired
}

export default Project;
