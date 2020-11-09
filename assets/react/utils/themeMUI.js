import { createMuiTheme } from '@material-ui/core/styles';
import { BREAKPOINTS, COLORS } from './constants';

export const THEME = createMuiTheme({
    breakpoints: {
        values: {
            xs: 0,
            sm: BREAKPOINTS.small,
            md: BREAKPOINTS.medium,
            lg: BREAKPOINTS.large,
            xl: BREAKPOINTS.extra_large,
        },
    },
    palette: {
        primary: {
            main: COLORS.primary
        },
    }
})
