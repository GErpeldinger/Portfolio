import { APP_URL } from "./constants";

export function generateUrlImageResizer(width, height, path) {
    let extension = path.match(/(?<=.)[a-z]*$/g)[0]
    path = path.replace('.' + extension, '')
    return `${APP_URL}/media/resize/${width}/${height}/${path}/${extension}`
}
