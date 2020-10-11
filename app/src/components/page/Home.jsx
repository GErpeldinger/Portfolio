import React, {useEffect, useState} from 'react';
import {array} from 'prop-types';
import parser from 'html-react-parser';
import axios from "axios";
import {API_GET_INFO} from "../../constants";

import Photo from '../../images/Photo.jpg';
import Loading from "../Loading";

const Home = ({load}) => {
    const [loading, setLoading] = load
    const [infos, setInfos] = useState({
        forename: '',
        surname: '',
        job: '',
        resume: '',
        age: 0,
        city: ''
    })

    useEffect(() => {
        axios.get(API_GET_INFO)
            .then(response => response.data)
            .then(data => {
                setInfos(data)
                setLoading(false)
            })
    }, [setLoading])

    if (loading) {
        return <Loading />
    }

    return (
        <div className="Home">
            <div className="d-flex align-items-center">
                <img src={Photo} alt="It's me" className="img-profile" />
                <div className="ml-5">
                    <h1 className="text-nowrap">
                        Bonjour !<br />
                        Je suis <span className="text-wild">{infos.forename} {infos.surname}</span>,<br />
                        {infos.job}<br />
                    </h1>
                    <h2>Symfony | React</h2>
                </div>
            </div>
            <div className="resume">
                <h3>À propos de moi...</h3>
                <h4>J'ai {infos.age}ans et je suis de {infos.city} !</h4>
                <p>{parser(String(infos.resume))}</p>
            </div>
        </div>
    );
}

Home.propTypes = {
    load: array.isRequired
}

export default Home;
