import React from 'react';
import {object} from 'prop-types';
import parser from 'html-react-parser';

import CustomDate from "./CustomDate";
import TimelineItem from "@material-ui/lab/TimelineItem";
import TimelineOppositeContent from "@material-ui/lab/TimelineOppositeContent";
import Typography from "@material-ui/core/Typography";
import TimelineSeparator from "@material-ui/lab/TimelineSeparator";
import TimelineDot from "@material-ui/lab/TimelineDot";
import TimelineConnector from "@material-ui/lab/TimelineConnector";
import TimelineContent from "@material-ui/lab/TimelineContent";
import Paper from "@material-ui/core/Paper";

const TimelineObject = ({event}) => {
    const Icon = require(`@material-ui/icons/${event.icon}.js`).default
    const startDate = new Date(event.startDate)
    const endDate = event.endDate ? new Date(event.endDate) : null

    return (
        <TimelineItem>
            <TimelineOppositeContent className="date">
                <CustomDate startDate={startDate} endDate={endDate} noDay={event.noDay} noMonth={event.noMonth} />
            </TimelineOppositeContent>
            <TimelineSeparator>
                <TimelineDot color="primary">
                    <Icon />
                </TimelineDot>
                <TimelineConnector className="primary-tail" />
            </TimelineSeparator>
            <TimelineContent>
                <Paper elevation={3} className="paper">
                    <Typography variant="h6" component="h1" className="text-center">
                        {event.title}
                    </Typography>
                    <Typography className="text-left">
                        {event.description && parser(String(event.description))}
                    </Typography>
                </Paper>
            </TimelineContent>
        </TimelineItem>
    );
}

TimelineObject.propTypes = {
    event: object.isRequired
}

export default TimelineObject;
