<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\TagCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture implements DependentFixtureInterface
{
    private const TAGS = [
        'HTML' => [
            'description' => 'Le HyperText Markup Language, généralement abrégé HTML ou dans sa dernière version HTML5, est le langage de balisage conçu pour représenter les pages web.',
            'link' => 'https://developer.mozilla.org/fr/docs/Web/HTML',
            'category' => 'tag_category_1'
        ],
        'CSS' => [
            'description' => 'Les feuilles de style en cascade, généralement appelées CSS de l\'anglais Cascading Style Sheets, forment un langage informatique qui décrit la présentation des documents HTML et XML.',
            'link' => 'https://developer.mozilla.org/fr/docs/Web/CSS',
            'category' => 'tag_category_1'
        ],
        'SCSS' => [
            'description' => 'Sass est un préprocesseur CSS. C\'est un langage de description compilé en CSS. Deux syntaxes existent. La syntaxe originale, nommée « syntaxe indentée ». Et la nouvelle syntaxe se nomment SCSS. Elle a un formalisme proche de CSS.',
            'link' => 'https://fr.wikipedia.org/wiki/Sass_(langage)',
            'category' => 'tag_category_1'
        ],
        'Php' => [
            'description' => 'PHP: Hypertext Preprocessor, plus connu sous son sigle PHP, est un "langage de programmation" libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP. PHP est un langage impératif orienté objet.',
            'link' => 'https://www.php.net/',
            'category' => 'tag_category_1'
        ],
        'JavaScript' => [
            'description' => 'JS est un langage de programmation de scripts principalement employé dans les pages web interactives et est une partie essentielle des applications web. Avec le HTML et le CSS, JavaScript est parfois considéré comme \'une des technologies cœur du Web.',
            'link' => 'https://developer.mozilla.org/fr/docs/Web/JavaScript',
            'category' => 'tag_category_1'
        ],
        'Symfony' => [
            'description' => 'Symfony est un ensemble de composants PHP ainsi qu\'un framework MVC libre écrit en PHP. Il fournit des fonctionnalités modulables et adaptables qui permettent de faciliter et d’accélérer le développement d\'un site web.',
            'link' => 'https://symfony.com/',
            'category' => 'tag_category_2'
        ],
        'React' => [
            'description' => 'React est une bibliothèque JavaScript libre développée par Facebook. Son but principal est de faciliter la création d\'application web monopage, via la création de composants dépendant d\'un état et générant une page HTML à chaque changement d\'état. ',
            'link' => 'https://fr.reactjs.org/',
            'category' => 'tag_category_2'
        ],
        'Simple MVC' => [
            'description' => 'Simple MVC est un mini framework développé par la Wild Code School permettant aux élèves PHP d\'avoir un premier contact avec le développement orientée objet et l\'architecture MVC.',
            'link' => 'https://github.com/WildCodeSchool/simple-mvc',
            'category' => 'tag_category_2'
        ],
        'MySQL' => [
            'description' => 'MySQL est un système de gestion de bases de données relationnelles. Il est distribué sous une double licence GPL et propriétaire.',
            'link' => 'https://www.mysql.com/fr/',
            'category' => 'tag_category_3'
        ],
        'Scrum' => [
            'description' => 'La méthodologie Scrum inspirée du rugby est un cadre de travail permettant de mener de façon agile la gestion d\'un projet.',
            'link' => 'https://agiliste.fr/introduction-methodes-agiles/',
            'category' => 'tag_category_4'
        ],
        'Merise' => [
            'description' => 'Merise est une méthode de conception, de développement et de réalisation de projets informatiques. Le but de cette méthode est d\'arriver à concevoir un système d\'information.',
            'link' => 'https://fr.wikipedia.org/wiki/Merise_(informatique)',
            'category' => 'tag_category_4'
        ],
        'Easy Admin' => [
            'description' => 'Easy Admin permet de créer facilement une belle administration backend dans une application Symfony. Elle est gratuite, rapide et a une documentation complète.',
            'link' => 'https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html',
            'category' => 'tag_category_5'
        ],
        'ChartJS' => [
            'description' => 'Chart.js est une bibliothèque JavaScript open source gratuite pour la visualisation des données, qui prend en charge 8 types de graphiques.',
            'link' => 'https://www.chartjs.org/',
            'category' => 'tag_category_5'
        ],
        'RestCountries' => [
            'description' => 'RestCountries est une Api permettant de recevoir des informations à propos de tous les pays du monde.',
            'link' => 'https://restcountries.eu/',
            'category' => 'tag_category_6'
        ],
        'Geo Api Gouv Fr' => [
            'description' => 'C\'est un ensemble de deux Api du gouvernement Français permettant de récupérer des informations sur communes, départements et régions et sur les adresses et lieux-dits.',
            'link' => 'https://geo.api.gouv.fr/',
            'category' => 'tag_category_6'
        ],
        'TheCocktailDB' => [
            'description' => 'Une base de données ouverte, alimentée par la foule, sur les boissons et les cocktails du monde entier.',
            'link' => 'https://www.thecocktaildb.com/',
            'category' => 'tag_category_6'
        ],
        'API Platform' => [
            'description' => 'Construisez une API Rest ou une API GraphQL en quelques minutes. Tirez parti de ses fonctionnalités impressionnantes pour développer des projets complexes et performants en API. Étendez ou remplacez tout ce que vous voulez.',
            'link' => 'https://api-platform.com/',
            'category' => 'tag_category_5'
        ],
        'Glide' => [
            'description' => 'Glide est une bibliothèque de manipulation d\'images à la demande merveilleusement facile, écrite en PHP.',
            'link' => 'https://glide.thephpleague.com/',
            'category' => 'tag_category_5'
        ]
    ];

    public function getDependencies(): array
    {
        return [TagCategoryFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $i = 1;
        foreach (self::TAGS as $name => $data) {
            /* @var TagCategory $category */
            $category = $this->getReference($data['category']);

            $tag = new Tag();
            $tag
                ->setName($name)
                ->setDescription($data['description'])
                ->setLink($data['link'])
                ->setCategory($category);

            $this->addReference('tag_' . $i, $tag);
            $i++;

            $manager->persist($tag);
        }

        $manager->flush();
    }
}
