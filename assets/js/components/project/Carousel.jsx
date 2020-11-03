import React from 'react';
import Slider from 'react-slick';
import ImageCarousel from "./ImageCarousel";
import { useMediaQuery } from "react-responsive/src";
import { MEDIUM_DEVICE_MIN_WIDTH } from "../../utils/constants";

const Carousel = ({ video, images }) => {
    const isTablet = useMediaQuery({query: MEDIUM_DEVICE_MIN_WIDTH})
    const nbSlides = isTablet ? 3 : 1

    const settings = {
        dots: false,
        infinite: true,
        slidesToShow: nbSlides,
        slidesToScroll: nbSlides,
    }

    return (
        <Slider {...settings}>
            {video && <div>
                <iframe className="CarouselVideo"p src={video} frameBorder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowFullScreen/>
            </div>}
            {images.map(image => <div key={image.name}><ImageCarousel image={image}/></div>)}
        </Slider>
    );
}

export default Carousel;
