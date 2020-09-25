import React from 'react';
import {bool, instanceOf} from 'prop-types';

import Typography from "@material-ui/core/Typography";

const CustomDate = ({startDate, endDate, noDay, noMonth}) => {
    return (
        <Typography color="primary">
            { endDate ? (noDay ? 'De ' : 'Du ') : 'Le ' }
            { noMonth ? startDate.toLocaleString('fr-FR', {year: 'numeric'})
                : noDay ?  startDate.toLocaleString('fr-FR', {month: 'long', year: 'numeric'})
                    : startDate.toLocaleString('fr-FR', {day: '2-digit', month: 'long', year: 'numeric'})
            }
            { endDate ?
                (noMonth ? ' jusqu\'à ' + endDate.toLocaleString('fr-FR', {year: 'numeric'})
                    : noDay ? ' jusqu\'à ' + endDate.toLocaleString('fr-FR', {month: 'long', year: 'numeric'})
                        : ' jusqu\'au ' + endDate.toLocaleString('fr-FR', {day: '2-digit', month: 'long', year: 'numeric'}))
                : ''}
        </Typography>
    );
}

CustomDate.propTypes = {
    startDate: instanceOf(Date).isRequired,
    endDate: instanceOf(Date),
    noDay: bool,
    noMonth: bool
}

export default CustomDate;
