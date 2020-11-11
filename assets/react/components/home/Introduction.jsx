import React from 'react';

const Introduction = () => {
    return (
        <div className="Introduction">
            <div className="jumbotron">
                <h2>À mon propos...</h2>
                <p>Après plusieurs années de travail alimentaire, j’ai pris la décision de reprendre mes études et ainsi pouvoir travailler dans un métier enrichissant et où je pourrais m’épanouir professionnellement.</p>
                <p>Ayant toujours était passionné d’informatique depuis mon plus jeune âge, je me suis orienté vers une formation intensive de développeur web avec comme spécialisation le langage PHP et le Framework Symfony.</p>
                <p>Le métier de développeur m’intéresse, car il me permet d’utiliser mon esprit logique et ma compétence à résoudre des problèmes que j’ai acquis dans l’informatique au fil des années.</p>
                <p>C’est ainsi que je me suis retrouvé ces derniers mois à la Wild Code School. J’ai choisi de faire ma formation là-bas, car j’adhère à ces principes qui se basent sur un apprentissage hybride où le mot-clé est « apprendre à apprendre », combiné avec beaucoup de pratique.</p>
            </div>

            <img src="/build/images/timeline.png" alt="timeline"/>
        </div>
    );
}

export default Introduction;
