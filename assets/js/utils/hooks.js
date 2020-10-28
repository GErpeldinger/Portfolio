import { useCallback, useState } from "react";
import axios from 'axios';

export function useGetAxios(url, getLd = true) {
    const [loading, setLoading] = useState(true)
    const [items, setItems] = useState({})

    const load = useCallback(() => {
        axios.get(url, {
            headers: {
                'accept': `application/${getLd ? 'ld+' : ''}json`
            }
        })
            .then(response => response.data)
            .then(data => {
                if (!getLd || url.match(/\/\d$/g)) {
                    setItems(data)
                } else {
                    setItems(data['hydra:member'])
                }
                setLoading(false)
            })
    }, [url])


    return {
        items,
        load,
        loading
    }
}
