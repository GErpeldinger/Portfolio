import React, { Fragment, useState } from 'react';
import { generateUrlImageResizer } from "../../utils/functions";
import Modal from "@material-ui/core/Modal";

const ImageCarousel = ({ image }) => {
    const [open, setOpen] = useState(false)
    const handleZoomIn = () => setOpen(true)
    const handleZoomOff = () => setOpen(false)

    return (
        <Fragment>
            <img className="ImageCarousel" alt={image.name} src={generateUrlImageResizer(400, 235, image.path)} onClick={handleZoomIn}/>
            <Modal open={open}
                   onClose={handleZoomOff}>
                <div className="Modal">
                    <img alt={image.name} src={image.path} onClick={handleZoomOff}/>
                </div>
            </Modal>
        </Fragment>

    );
}

export default ImageCarousel;
