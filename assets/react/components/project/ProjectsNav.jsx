import React, { Fragment } from 'react';
import PropTypes from 'prop-types';

const ProjectsNav = ({ projectCategories }) => {
    return (
        <div className="ProjectsNav">
            <ul>
                {projectCategories.map(projectCategory => <Fragment key={projectCategory.name}>
                    <li className="title">{projectCategory.name}</li>
                    <ul>
                        {projectCategory.projects.map(project => <li key={project.slug}>
                            <a href={`#${project.slug}`}>{project.name}</a>
                        </li>)}
                    </ul>
                </Fragment>)}
            </ul>
        </div>
    );
}

ProjectsNav.propTypes = {
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

export default ProjectsNav;
