import React, { useState } from 'react';
import { COLORS } from "../../utils/constants";
import Loader from 'react-loader-spinner'

const CircularLoader = () => {
    const [positionX, setPositionX] = useState(0)
    const [positionY, setPositionY] = useState(0)

    const handleMouseMove = (e) => {
        setPositionX(e.pageX)
        setPositionY(e.pageY)
    }

    const handleMouseLeave = () => {
        setPositionX(undefined)
        setPositionY(undefined)
    }

    const style = {
        left: positionX <= 125 || positionX === undefined ? '50px' : positionX + 'px',
        top: positionX <= 125 || positionY === undefined ? '50%' : positionY + 'px'
    }

    return (
        <div className="CircularLoader" onMouseMove={handleMouseMove} onMouseLeave={handleMouseLeave}>
            <Loader className='CircularLoaderSpinner' style={style} type='Puff' height={40} width={40}
                    color={COLORS.primary}/>
        </div>
    );
}

export default CircularLoader;
