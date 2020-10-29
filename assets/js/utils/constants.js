import { primary, secondary, mediumDeviceMinWidth, largeDeviceMinWidth } from './../../scss/app.scss';

export const APP_URL = 'http://localhost:8000'
export const API_URL = APP_URL + '/api'
export const ADMIN_URL = APP_URL + '/admin'
export const APP_LOGOUT = APP_URL + '/logout'

export const ROUTES = {
    home: '/',
    skill: '/competences',
    projects: '/projets',
    project: '/projets/:slug',
}

export const API_LINKS = {
    projects: API_URL + '/project_categories'
}

export const LINKS = {
    email: 'mailto:erpeldinger.g@gmail.com',
    linkedin: 'https://www.linkedin.com/in/guillaumeerpeldinger/',
    github: 'https://github.com/Nighter33'
}

export const COLORS = {
    primary: primary,
    secondary: secondary
}

export const MEDIUM_DEVICE_MIN_WIDTH = `(min-device-width: ${mediumDeviceMinWidth})`;
export const LARGE_DEVICE_MIN_WIDTH = `(min-device-width: ${largeDeviceMinWidth})`;
