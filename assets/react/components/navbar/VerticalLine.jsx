import React from 'react';
import PropTypes from 'prop-types';

const VerticalLine = ({ position }) => {
    return (
        <div className={position === 'bottom' ? 'VerticalLineBottom' : 'VerticalLineTop'}/>
    );
}

VerticalLine.propTypes = {
    position: PropTypes.oneOf(['top', 'bottom'])
}

VerticalLine.defaultProps = {
    position: 'top'
}

export default VerticalLine;
