import React, { useEffect } from 'react';
import { Link, useParams } from 'react-router-dom';
import { useGetWithAxios } from '../utils/hooks';
import { API_LINKS, ROUTES } from '../utils/constants';
import parser from 'html-react-parser';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faArrowCircleLeft, faExternalLinkSquareAlt } from '@fortawesome/free-solid-svg-icons';
import { faGithubSquare } from '@fortawesome/free-brands-svg-icons';
import Loader from '../components/loader/Loader';
import TagsList from '../components/project/TagsList';
import Carousel from '../components/project/Carousel';

const Project = () => {
    const { slug } = useParams()
    const { items: project, load, loading } = useGetWithAxios(API_LINKS.project + slug)

    useEffect(() => {
        load()
    }, [])

    if (loading) return <Loader/>

    return (
        <div className="Project">
            <Link to={ROUTES.projects}><FontAwesomeIcon icon={faArrowCircleLeft}/> Revenir à la liste des projets</Link>
            <div>
                <div className="jumbotron">
                    <h1>{project.name}</h1>
                    {parser(project.description)}
                    <div>
                        {project.github && <a href={project.github} target="_blank"><FontAwesomeIcon icon={faGithubSquare} size="2x"/></a>}
                        {project.link && <a href={project.link} target="_blank"><FontAwesomeIcon icon={faExternalLinkSquareAlt} size="2x"/></a>}
                    </div>
                </div>
                <TagsList tags={project.tags}/>
                <Carousel video={project.video} images={project.images}/>
            </div>
        </div>
    );
}

export default Project;
