import React, { useState } from 'react';
import { useMediaQuery } from 'react-responsive';
import { LARGE_DEVICE_MIN_WIDTH, MEDIUM_DEVICE_MIN_WIDTH, ROUTES } from "../../utils/constants";
import { generateUrlImageResizer } from '../../utils/functions';
import { Link } from "react-router-dom";

import TagList from "./TagList";

const ProjectCard = ({ project }) => {
    const { image, name, slug, tags } = project

    const isTablet = useMediaQuery({ query: MEDIUM_DEVICE_MIN_WIDTH })
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })

    const width = isTablet ? 400 : 280;
    const height = isTablet ? 235 : 160;
    const path = image ? image.path : '/build/images/Index.jpg'
    const contentStyle = {
        backgroundImage: `url(${generateUrlImageResizer(width, height, path)})`
    }

    const [hover, setHover] = useState(false)
    const toggleHover = () => setHover(hover => !hover)
    const handleMouse = () => isDesktop ? toggleHover() : ''

    return (
        <div className="ProjectCard">
            <div className="title-bar">
                <div className="fake-button">
                    <div className="fake-button-red"/>
                    <div className="fake-button-orange"/>
                    <div className="fake-button-green"/>
                </div>
                <h5>{name}</h5>
                <div className="blank-div"/>
            </div>
            <div className="content" style={contentStyle} onMouseEnter={handleMouse} onMouseLeave={handleMouse}>
                {hover && <div className="hover">
                    <TagList tags={tags}/>
                    <Link to={ROUTES.projects + '/' + slug} className="tag">Cliquer pour voir plus...</Link>
                </div>}
                {!isDesktop && <div className="tag">Cliquer pour voir plus...</div>}
            </div>
        </div>
    );
}

export default ProjectCard;
