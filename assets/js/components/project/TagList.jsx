import React from 'react';
import Tag from "./Tag";

const TagList = ({ tags }) => {
    return (
        <ul className="TagList">
            {tags.map(tag => <Tag key={tag.name} category={tag.category} description={tag.description}
                                  link={tag.link}>{tag.name}</Tag>)}
        </ul>
    );
}

export default TagList;
