import React, { useEffect } from 'react';
import ProjectCard from "../components/project/ProjectCard";
import { useGetAxios } from "../utils/hooks";
import { API_URL } from "../utils/constants";
import Loader from "../components/loader/Loader";

const Project = () => {
    const { items: projectCategories, load, loading } = useGetAxios(API_URL.projects, false)

    useEffect(() => {
        load()
    }, [])

    if (loading) {
        return <Loader/>
    }

    return (
        <div className="Project">
            {projectCategories.map(projectCategory => <div key={projectCategory.name}>
                <p>{projectCategory.title}</p>
                {projectCategory.projects.map(project => <ProjectCard key={project.name} project={project}/>)}
            </div>)}
        </div>
    );
}

export default Project;