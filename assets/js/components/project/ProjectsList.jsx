import React from 'react';
import ProjectCard from "./ProjectCard";
import { Grid } from "@material-ui/core";

const ProjectsList = ({ projectCategories }) => {
    return (
        <div className="ProjectsList">
            {projectCategories.map(projectCategory => <div key={projectCategory.name} className="category">
                <h2>{projectCategory.title}</h2>
                <Grid container>
                    {projectCategory.projects.map(project => <Grid key={project.slug} className="card" item xs={12} lg={6}>
                        <ProjectCard id={project.slug} project={project}/>
                    </Grid>)}
                </Grid>
            </div>)}
        </div>
    );
}

export default ProjectsList;
