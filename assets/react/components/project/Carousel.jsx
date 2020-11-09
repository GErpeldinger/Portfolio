import React, { Fragment, useState } from 'react';
import PropTypes from "prop-types";
import { useMediaQuery } from "react-responsive/src";
import { MEDIUM_DEVICE_MIN_WIDTH } from "../../utils/constants";
import { generateUrlImageResizer } from "../../utils/functions";
import Slider from 'react-slick';
import Modal from "@material-ui/core/Modal";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faTimesCircle } from "@fortawesome/free-solid-svg-icons";
import Gallery from "./Gallery";
import { faYoutube } from "@fortawesome/free-brands-svg-icons";

const Carousel = ({ video, images }) => {
    const [open, setOpen] = useState(false)
    const handleZoomIn = () => setOpen(true)
    const handleZoomOff = () => setOpen(false)

    const isTablet = useMediaQuery({query: MEDIUM_DEVICE_MIN_WIDTH})
    const nbSlides = isTablet ? 3 : 1

    const settings = {
        dots: false,
        infinite: true,
        slidesToShow: nbSlides,
        slidesToScroll: nbSlides,
    }

    return (
        <Fragment>

            <Slider {...settings}>
                {images.map((image, index) => <div key={image.name} className="ImageCarousel">
                    {video && index === 0 && <div className="video"><FontAwesomeIcon icon={faYoutube} size="3x"/></div>}
                    <img alt={image.name} src={generateUrlImageResizer(400, 235, image.path)} onClick={handleZoomIn}/>
                </div>)}
            </Slider>

            <Modal open={open} onClose={handleZoomOff} className="ModalCarousel">
                <div>
                    <div className="exitButton" onClick={handleZoomOff}><FontAwesomeIcon icon={faTimesCircle} size="2x"/></div>
                    <Gallery video={video} images={images}/>
                </div>
            </Modal>

        </Fragment>
    );
}

Carousel.propTypes = {
    video: PropTypes.string,
    images: PropTypes.arrayOf(PropTypes.exact({
        name: PropTypes.string.isRequired,
        path: PropTypes.string.isRequired
    }).isRequired)
}

export default Carousel;
