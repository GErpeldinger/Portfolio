import React, { useEffect } from 'react';
import { useMediaQuery } from 'react-responsive';
import { useGetWithAxios } from '../utils/hooks';
import { API_LINKS, EXTRA_LARGE_DEVICE_MIN_WIDTH } from '../utils/constants';
import Loader from '../components/loader/Loader';
import ProjectsList from '../components/project/ProjectsList';
import ProjectsNav from '../components/project/ProjectsNav';

const Projects = () => {
    const isExtraLargeDesktop = useMediaQuery({ query: EXTRA_LARGE_DEVICE_MIN_WIDTH })
    const { items: projectCategories, load, loading } = useGetWithAxios(API_LINKS.projects)

    useEffect(() => {
        load()
    }, [])

    if (loading) return <Loader/>

    return (
        <div className="Projects">
            <ProjectsList projectCategories={projectCategories}/>
            { isExtraLargeDesktop && <ProjectsNav projectCategories={projectCategories}/> }
        </div>
    );
}

export default Projects;
