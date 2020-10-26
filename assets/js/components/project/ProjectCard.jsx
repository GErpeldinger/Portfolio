import React, { useState } from 'react';
import { useMediaQuery } from 'react-responsive';
import { LARGE_DEVICE_MIN_WIDTH, MEDIUM_DEVICE_MIN_WIDTH } from "../../utils/constants";
import { generateUrlImageResizer } from '../../utils/functions';

// TODO ADD LINK AND PROPS

const ProjectCard = () => {
    const isTablet = useMediaQuery({ query: MEDIUM_DEVICE_MIN_WIDTH })
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })
    const width = isTablet ? 400 : 280;
    const height = isTablet ? 235 : 160;
    const contentStyle = {
        backgroundImage: `url(${generateUrlImageResizer(width, height, 'build/images/Index.jpg')})`
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
                <h5>Projet</h5>
                <div className="blank-div"/>
            </div>
            <div className="content" style={contentStyle} onMouseEnter={handleMouse} onMouseLeave={handleMouse}>
                { hover && <div className="hover">
                    <ul>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                        <li className="tag">TagLong</li>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                        <li className="tag">TagPlusLong</li>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                        <li className="tag">Tag</li>
                    </ul>
                    <div className="tag">Cliquer pour voir plus...</div>
                </div>}
                { !isDesktop && <div className="tag">Cliquer pour voir plus...</div> }
            </div>
        </div>
    );
}

export default ProjectCard;
