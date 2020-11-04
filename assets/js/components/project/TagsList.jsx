import React from 'react';
import PropTypes from "prop-types";
import Tag from "./Tag";

const TagsList = ({ tags }) => {
    return (
        <ul className="TagsList">
            {tags.map(tag => <Tag key={tag.name} category={tag.category} description={tag.description}
                                  link={tag.link}>{tag.name}</Tag>)}
        </ul>
    );
}

TagsList.propTypes = {
    tags: PropTypes.arrayOf(PropTypes.exact({
        name: PropTypes.string.isRequired,
        description: PropTypes.string,
        link: PropTypes.string,
        category: PropTypes.string.isRequired
    }).isRequired).isRequired
}

export default TagsList;
