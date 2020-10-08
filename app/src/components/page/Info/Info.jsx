import React, {useEffect, useState} from 'react';
import {array} from 'prop-types';
import axios from 'axios';
import {API_URL} from "../../../constants";

import Timeline from '@material-ui/lab/Timeline';
import TimelineObject from './TimelineObject';
import Loading from "../../Loading";

const Info = ({load}) => {
    const [loading, setLoading] = load
    const [timeline, setTimeline] = useState({})

    useEffect(() => {
        axios.get(API_URL + 'api/timelines')
            .then(response => response.data)
            .then(data => {
                setTimeline(data['hydra:member'])
                setLoading(false)
            })
    }, [setLoading])

    if (loading) {
        return <Loading />
    }

    return (
        <div className="Info">
            <Timeline align="alternate">
                {timeline.map(event => <TimelineObject event={event} key={event.sequence}/>)}
            </Timeline>
        </div>
    );
}

Info.propTypes = {
    load: array.isRequired
}

export default Info;
