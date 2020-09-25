import React from 'react';
import PropTypes from 'prop-types';

import Timeline from '@material-ui/lab/Timeline';
import TimelineItem from '@material-ui/lab/TimelineItem';
import TimelineSeparator from '@material-ui/lab/TimelineSeparator';
import TimelineConnector from '@material-ui/lab/TimelineConnector';
import TimelineContent from '@material-ui/lab/TimelineContent';
import TimelineOppositeContent from "@material-ui/lab/TimelineOppositeContent";
import TimelineDot from '@material-ui/lab/TimelineDot';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';

const Info = ({load}) => {
    const [loading, setLoading] = load

    return (
        <div className="Info">
            <Timeline align="left">
                <TimelineItem>
                    <TimelineOppositeContent>
                        <Typography color="primary">Mars 2020 à Avril 2020</Typography>
                    </TimelineOppositeContent>
                    <TimelineSeparator>
                        <TimelineDot color="primary" />
                        <TimelineConnector className="primary-tail" />
                    </TimelineSeparator>
                    <TimelineContent>
                        <Paper elevation={3} className="paper">
                            <Typography variant="h6" component="h1">
                                Eat
                            </Typography>
                            <Typography>Because you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strengthBecause you need strength</Typography>
                        </Paper>
                    </TimelineContent>
                </TimelineItem>
                <TimelineItem>
                    <TimelineSeparator>
                        <TimelineDot color="primary" />
                        <TimelineConnector className="primary-tail" />
                    </TimelineSeparator>
                    <TimelineContent>
                        <Paper elevation={3} className="paper">
                            <Typography variant="h6" component="h1">
                                Eat
                            </Typography>
                            <Typography>Because you need strength</Typography>
                        </Paper>
                    </TimelineContent>
                </TimelineItem>

                <TimelineItem>
                    <TimelineSeparator>
                        <TimelineDot color="primary" />
                        <TimelineConnector className="primary-tail" />
                    </TimelineSeparator>
                    <TimelineContent>
                        <Paper elevation={3} className="paper">
                            <Typography variant="h6" component="h1">
                                Eat
                            </Typography>
                            <Typography>Because you need strength</Typography>
                        </Paper>
                    </TimelineContent>
                </TimelineItem>

                <TimelineItem>
                    <TimelineSeparator>
                        <TimelineDot color="primary" />
                        <TimelineConnector className="primary-tail" />
                    </TimelineSeparator>
                    <TimelineContent>
                        <Paper elevation={3} className="paper">
                            <Typography variant="h6" component="h1">
                                Eat
                            </Typography>
                            <Typography>Because you need strength</Typography>
                        </Paper>
                    </TimelineContent>
                </TimelineItem>

            </Timeline>
        </div>
    );
}

Info.propTypes = {
    load: PropTypes.array.isRequired
}

export default Info;
