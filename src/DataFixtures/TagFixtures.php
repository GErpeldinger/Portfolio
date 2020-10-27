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
            'description' => '',
            'link' => 'https://developer.mozilla.org/fr/docs/Web/HTML',
            'category' => 'tag_category_1'
        ],
        'CSS' => [
            'description' => '',
            'link' => 'https://developer.mozilla.org/fr/docs/Web/CSS',
            'category' => 'tag_category_1'
        ],
        'SCSS' => [
            'description' => '',
            'link' => 'https://fr.wikipedia.org/wiki/Sass_(langage)',
            'category' => 'tag_category_1'
        ],
        'Php' => [
            'description' => '',
            'link' => 'https://www.php.net/',
            'category' => 'tag_category_1'
        ],
        'JavaScript' => [
            'description' => '',
            'link' => 'https://developer.mozilla.org/fr/docs/Web/JavaScript',
            'category' => 'tag_category_1'
        ],
        'Symfony' => [
            'description' => '',
            'link' => 'https://symfony.com/',
            'category' => 'tag_category_2'
        ],
        'React' => [
            'description' => '',
            'link' => 'https://fr.reactjs.org/',
            'category' => 'tag_category_2'
        ],
        'Simple MVC' => [
            'description' => '',
            'link' => 'https://github.com/WildCodeSchool/simple-mvc',
            'category' => 'tag_category_2'
        ],
        'MySQL' => [
            'description' => '',
            'link' => 'https://www.mysql.com/fr/',
            'category' => 'tag_category_3'
        ],
        'Scrum' => [
            'description' => '',
            'link' => 'https://agiliste.fr/introduction-methodes-agiles/',
            'category' => 'tag_category_4'
        ],
        'Merise' => [
            'description' => '',
            'link' => 'https://fr.wikipedia.org/wiki/Merise_(informatique)',
            'category' => 'tag_category_4'
        ],
        'Easy Admin' => [
            'description' => '',
            'link' => 'https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html',
            'category' => 'tag_category_5'
        ],
        'ChartJS' => [
            'description' => '',
            'link' => 'https://www.chartjs.org/',
            'category' => 'tag_category_5'
        ],
        'RestCountries' => [
            'description' => '',
            'link' => 'https://restcountries.eu/',
            'category' => 'tag_category_6'
        ],
        'Geo Api Gouv Fr' => [
            'description' => '',
            'link' => 'https://geo.api.gouv.fr/',
            'category' => 'tag_category_6'
        ],
        'TheCocktailDB' => [
            'description' => '',
            'link' => 'https://www.thecocktaildb.com/',
            'category' => 'tag_category_6'
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
