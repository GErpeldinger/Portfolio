import variablesSCSS from './../../scss/app.scss';

// URLS
export const ROUTES = {
    home: '/',
    skill: '/competences',
    project: '/projets',
}

export const LINKS = {
    email: 'mailto:erpeldinger.g@gmail.com',
    linkedin: 'https://www.linkedin.com/in/guillaumeerpeldinger/',
    github: 'https://github.com/Nighter33'
}

// BREAKPOINTS
export const MEDIUM_DEVICE_MIN_WIDTH = `(min-device-width: ${variablesSCSS.mediumDeviceMinWidth})`;
export const LARGE_DEVICE_MIN_WIDTH = `(min-device-width: ${variablesSCSS.largeDeviceMinWidth})`;
export const EXTRA_LARGE_DEVICE_MIN_WIDTH = `(min-device-width: ${variablesSCSS.extraLargeDeviceMinWidth})`;
