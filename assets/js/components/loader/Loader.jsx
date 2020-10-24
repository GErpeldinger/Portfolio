import React from 'react';
import { useMediaQuery } from 'react-responsive';
import { LARGE_DEVICE_MIN_WIDTH } from "../../utils/constants";
import CircularLoader from "./CircularLoader";
import LinearProgress from "@material-ui/core/LinearProgress";

const Loader = () => {
    const isDesktop = useMediaQuery({ query: LARGE_DEVICE_MIN_WIDTH })

    if (isDesktop) {
        return (
            <CircularLoader/>
        );
    }

    return (
        <LinearProgress variant="query" className="LinearLoader"/>
    );
}

export default Loader;
