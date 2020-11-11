import { APP_URL } from './constants';

export function generateUrlImageResizer(width, height, path) {
    path = path.replace('.jpg', '/jpg')
    return `${APP_URL}/media/resize/${width}/${height}${path}`
}
