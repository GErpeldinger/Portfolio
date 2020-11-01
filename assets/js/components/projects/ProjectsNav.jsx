import React, { Fragment } from 'react';

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
                    </Fragment>
                )}
            </ul>
        </div>
    );
}

export default ProjectsNav;
