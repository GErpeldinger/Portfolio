<?php

namespace App\DataFixtures;

use App\Entity\Timeline;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TimelineFixtures extends Fixture
{
    private const TIMELINE = [
        [
            'sequence' => 1,
            'icon' => 'ChildCare',
            'title' => 'It\'s me, Guillaume !',
            'startDate' => '10-07-1992',
        ],
        [
            'sequence' => 2,
            'icon' => 'Check',
            'title' => 'BEP Électronique',
            'startDate' => '01-01-2007',
            'endDate' => '01-01-2009',
            'noDay' => true,
            'noMonth' => true,
        ],
        [
            'sequence' => 3,
            'icon' => 'Check',
            'title' => 'BAC STI Génie Électronique',
            'startDate' => '01-01-2009',
            'endDate' => '01-01-2011',
            'noDay' => true,
            'noMonth' => true,
        ],
        [
            'sequence' => 4,
            'icon' => 'Work',
            'title' => 'Travail Alimentaire',
            'startDate' => '01-01-2011',
            'endDate' => '01-01-2019',
            'noDay' => true,
            'noMonth' => true,
            'description' => 'J’ai pu grâce à l’intérim travaillé dans des nombreux secteurs comme l’alimentaire, la
             valorisation de déchets, l’automobile, les matériaux de construction et bien d\'autres.<br>J’en ai acquis
             plusieurs compétences primordiales comme le travail d’équipe, la rigueur ou encore la ponctualité.'
        ],
        [
            'sequence' => 5,
            'icon' => 'School',
            'title' => 'Formation de Développeur Web Full Stack à la Wild Code School',
            'startDate' => '02-03-2020',
            'endDate' => '31-07-2020',
            'description' => 'Une formation intensive se concentrant sur le fait d\'apprendre à apprendre en autonomie
            grâce à un système de quête et beaucoup de pratique.<br />Nous sommes aussi accompagnés par un formateur qui
            peut répondre à nos interrogations et avec qui nous apprenons à devenir des développeurs efficaces grâce à
            des cours, dojo ou live coding.<br />Le confinement ayant commencé 2 semaines après ma rentrée en formation,
            j\'ai aussi pu acquérir de l\'expérience dans le télétravail.'
        ],
        [
            'sequence' => 6,
            'icon' => 'LaptopChromebook',
            'title' => 'Projet WCS : Archives de Bordeaux Métropole',
            'startDate' => '09-03-2020',
            'endDate' => '13-03-2020',
            'description' => 'Refonte du site des Archives de Bordeaux Métropole.<br />
            💻 Projet d\'une semaine avec une équipe de 3 développeurs.<br />
            🛠 HTML - 🛠 CSS - 🛠 GIT'
        ],
        [
            'sequence' => 7,
            'icon' => 'LaptopChromebook',
            'title' => 'Hackathon WCS : Hacocktail',
            'startDate' => '29-04-2020',
            'endDate' => '30-04-2020',
            'description' => 'Générateur de cocktail aléatoire et quizz sur les cocktails du monde.<br />
            💻 Projet réalisé dans la cadre d\'un Hackathon de 24h.<br />
            ✈️ Thème : Voyager depuis son canapé.<br />
            🛠 PHP - 🛠 Javascript - 🛠 HTML - 🛠 CSS - 🛠 MySql - 🛠 API Externe<br />
            API Externe utilisé : <a href="https://www.thecocktaildb.com/api.php" target="_blank">The Cocktail DB</a><br />
            Framework : Simple MVC (Framework développé par la Wild Code School permettant un premier contact avec le
            développement orientée objet et l\'architecture MVC)'
        ],
        [
            'sequence' => 8,
            'icon' => 'LaptopChromebook',
            'title' => 'Projet WCS : Joshua',
            'startDate' => '6-04-2020',
            'endDate' => '13-05-2020',
            'description' => 'Joshua est un site où est organisé des compétitions de capture de drapeau.<br />
            (Jeu consistant à exploiter des vulnérabilités d\'applications web ou logiciels)<br />
            💻 Projet de 5 semaines avec une équipe de 4 développeurs.<br />
            🧗🏻‍️ Méthode agile Scrum - 🧗🏻‍️ Méthode Merise<br />
            🛠 PHP - 🛠 Javascript - 🛠 HTML - 🛠 CSS - 🛠 MySql<br />
            Framework : Simple MVC (Framework développé par la Wild Code School permettant un premier contact avec le
            développement orientée objet et l\'architecture MVC)'
        ],
        [
            'sequence' => 9,
            'icon' => 'LaptopChromebook',
            'title' => 'Hackathon Européen WCS : Loopy',
            'startDate' => '25-06-2020',
            'endDate' => '26-06-2020',
            'description' => 'Loopy est un outil permettant de rendre les enfants atteint de diabète insulino dépendant
            acteur de leur santé et ceci d\'une façon ludique.<br />
            💻 Projet réalisé dans la cadre d\'un Hackathon Européen de 48h organisé par la Wild Code School en
            association avec Doctolib et Dataiku.<br />
            👨🏻‍️ Thème : La santé en remote.<br />
            🏆 2ème sur 101équipes de Wilders.<br />
            🛠 PHP - 🛠 Javascript - 🛠 HTML - 🛠 CSS - 🛠 Symfony - 🛠 ChartJs'
        ],
        [
            'sequence' => 10,
            'icon' => 'LaptopChromebook',
            'title' => 'Projet Client WCS : JobTech',
            'startDate' => '29-04-2020',
            'endDate' => '30-04-2020',
            'description' => 'Plateforme de recrutement permettant la mise en relation entre candidats et entreprises.<br />
            💻 Projet pour un client sur une durée de 8 semaines avec une équipe de 4 développeurs.<br />
            🧗🏻‍️ Méthode agile Scrum - 🧗🏻‍️ Méthode Merise<br />
            🛠 PHP - 🛠 Javascript - 🛠 HTML - 🛠 SCSS - 🛠 Doctrine - 🛠 Symfony - 🛠 API Externe - 🛠 EasyAdmin - 🛠 ChartJs<br />
            API Externes utilisés :
            <a href="https://geo.api.gouv.fr/" target="_blank">Api de gouvernement Français</a> -
            <a href="https://restcountries.eu/" target="_blank">Rest Countries</a>'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TIMELINE as $event) {
            $newEvent = new Timeline();
            $newEvent
                ->setSequence($event['sequence'])
                ->setIcon($event['icon'])
                ->setTitle($event['title'])
                ->setStartDate(new DateTime($event['startDate']))
                ->setNoDay($event['noDay'] ?? false)
                ->setNoMonth($event['noMonth'] ?? false);
            isset($event['description']) ? $newEvent->setDescription($event['description']) : null;
            isset($event['endDate']) ? $newEvent->setEndDate(new DateTime($event['endDate'])) : null;

            $manager->persist($newEvent);
        }

        $manager->flush();
    }
}
