import React from 'react';
import CircularProgress from "@material-ui/core/CircularProgress";

const Loading = () => {
    return (
        <div className="d-flex align-items-center justify-content-center min-h-100">
            <CircularProgress size="25%"/>
        </div>
    );
}

export default Loading;
