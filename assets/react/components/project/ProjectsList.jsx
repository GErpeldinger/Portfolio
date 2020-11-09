import React from 'react';
import PropTypes from 'prop-types';
import { Grid } from '@material-ui/core';
import ProjectCard from './ProjectCard';

const ProjectsList = ({ projectCategories }) => {
    return (
        <div className="ProjectsList">
            {projectCategories.map(projectCategory => <div key={projectCategory.name} className="category">
                <h2>{projectCategory.title}</h2>
                <Grid container>
                    {projectCategory.projects.map(project => <Grid key={project.slug} className="card" item xs={12}
                                                                   lg={6}>
                        <ProjectCard project={project}/>
                    </Grid>)}
                </Grid>
            </div>)}
        </div>
    );
}

ProjectsList.propTypes = {
    projectCategories: PropTypes.arrayOf(PropTypes.exact({
        name: PropTypes.string.isRequired,
        title: PropTypes.string.isRequired,
        projects: PropTypes.arrayOf(PropTypes.exact({
            name: PropTypes.string.isRequired,
            slug: PropTypes.string.isRequired,
            tags: PropTypes.arrayOf(PropTypes.exact({
                name: PropTypes.string.isRequired,
                description: PropTypes.string,
                link: PropTypes.string,
                category: PropTypes.string.isRequired
            }).isRequired).isRequired,
            imagePath: PropTypes.string
        }).isRequired).isRequired
    })).isRequired
}

export default ProjectsList;
