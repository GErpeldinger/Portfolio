import React from 'react';

const Homepage = () => {
    return (
        <div className="Homepage">
            <img src="/build/images/photo.jpg" alt="It's me" className="photo"/>
            <div>
                <p>Bonjour, je suis</p>
                <p><strong>Guillaume Erpeldinger</strong></p>
                <p><strong>Développeur web full stack</strong></p>
                <p>JavaScript | Php</p>
            </div>
        </div>
    );
}

export default Homepage;
