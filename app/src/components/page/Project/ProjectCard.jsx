import React from 'react';
import {string} from 'prop-types';
import Button from "@material-ui/core/Button";
import {PATH_PROJECT_COVER} from "../../../constants";

const ProjectCard = ({image, name, description}) => {
    return (
        <div className="ProjectCard">
            <div className="flip-card">
                <div className="flip-card-front">
                    <img src={PATH_PROJECT_COVER + image} alt="" width="400" height="275"/>
                </div>
                <div className="flip-card-back">
                    <div>
                        <h4>{name}</h4>
                        <p>{description}</p>
                    </div>
                    <Button
                        variant="contained"
                        color="primary"
                    >
                        Voir le projet
                    </Button>
                </div>
            </div>
        </div>
    );
}

ProjectCard.propTypes = {
    image: string.isRequired,
    name: string.isRequired,
    description: string.isRequired
}

export default ProjectCard;
