import React, { useState } from 'react';
import PropTypes from 'prop-types';
import { useMediaQuery } from 'react-responsive';
import { Link } from 'react-router-dom';
import { LARGE_DEVICE_MIN_WIDTH, MEDIUM_DEVICE_MIN_WIDTH, ROUTES } from '../../utils/constants';
import { generateUrlImageResizer } from '../../utils/functions';
import TagsList from './TagsList';

const ProjectCard = ({ project }) => {
    const { imagePath, name, slug, tags } = project

    const isTablet = useMediaQuery({ query: MEDIUM_DEVICE_MIN_WIDTH })
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })

    const width = isTablet ? 400 : 280;
    const height = isTablet ? 235 : 160;
    const path = imagePath ?? '/build/images/coming-soon.jpg'
    const contentStyle = {
        backgroundImage: `url(${generateUrlImageResizer(width, height, path)})`
    }

    const [hover, setHover] = useState(false)
    const toggleHover = () => setHover(hover => !hover)
    const handleMouse = () => isDesktop ? toggleHover() : ''

    const className = checkUrlIfHashMatchProject(slug)

    return (
        <div className={className} id={slug}>
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
                    <TagsList tags={tags}/>
                    <Link to={ROUTES.projects + '/' + slug} className="tag">Cliquer ici pour voir plus...</Link>
                </div>}
                {!isDesktop && <Link to={ROUTES.projects + '/' + slug} className="tag">Cliquer ici pour voir plus...</Link>}
            </div>
        </div>
    );
}

const checkUrlIfHashMatchProject = (slug) => {
    let className = 'ProjectCard'
    let hash = window.location.hash
    if (hash) {
        hash = hash.slice(1)
        if (hash === slug) {
            className += ' showCardAnimation'
        }
    }

    return className;
}

ProjectCard.propTypes = {
    project: PropTypes.exact({
        name: PropTypes.string.isRequired,
        slug: PropTypes.string.isRequired,
        tags: PropTypes.arrayOf(PropTypes.exact({
            name: PropTypes.string.isRequired,
            description: PropTypes.string,
            link: PropTypes.string,
            category: PropTypes.string.isRequired
        }).isRequired).isRequired,
        imagePath: PropTypes.string
    }).isRequired
}

export default ProjectCard;
