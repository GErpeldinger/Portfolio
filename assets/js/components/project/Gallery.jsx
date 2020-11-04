import React, { Fragment, useState } from 'react';
import PropTypes from 'prop-types';
import { generateUrlImageResizer } from "../../utils/functions";
import { faYoutube } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import ImageGallery from "react-image-gallery";

// TODO : Focus on image clicked ( getRef from ImageGallery )
const Gallery = ({ video, images }) => {
    const [play, setPlay] = useState(false)
    const togglePlay = () => setPlay(play => !play)

    // Class image-gallery-image come from the package
    const _renderVideo = item => {
        return (
            <div className="RenderVideo">
                {!play ? <div>
                    <div className="playButton" onClick={togglePlay}><FontAwesomeIcon icon={faYoutube} size="6x"/></div>
                    <img className="image-gallery-image" src={item.original} alt={item.originalAlt}/>
                </div> : <div>
                    <iframe className="video" src={item.embedUrl} frameBorder='0' allowFullScreen/>
                </div>}
            </div>
        )}
    const _onSlide = () => setPlay(false)

    let items = []
    images.map((image, key) => {
        const commonProperty = {
            original: image.path,
            thumbnail: generateUrlImageResizer(250, 150, image.path),
            originalAlt: image.name,
            thumbnailAlt: image.name,
        }

        if (video && key === 0) items.push({ ...commonProperty, embedUrl: video, renderItem: _renderVideo })
        else items.push(commonProperty)
    })

    const settings = {
        items: items,
        showFullscreenButton: false,
        showPlayButton: false,
        showBullets: true,
        onSlide: _onSlide,
    }

    return (
        <Fragment>
            <ImageGallery {...settings}/>
        </Fragment>
    );
}

Gallery.propTypes = {
    video: PropTypes.string,
    images: PropTypes.arrayOf(PropTypes.exact({
        name: PropTypes.string.isRequired,
        path: PropTypes.string.isRequired
    }).isRequired).isRequired
}

export default Gallery;
