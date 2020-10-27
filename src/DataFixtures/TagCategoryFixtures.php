<?php

namespace App\DataFixtures;

use App\Entity\TagCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagCategoryFixtures extends Fixture
{
    private const CATEGORIES = [
        'Langage de programmation',
        'Framework & Bibliothèque',
        'Database',
        'Méthode de travail',
        'Bundle Symfony',
        'API Externe'
    ];

    public function load(ObjectManager $manager): void
    {
        $i = 1;
        foreach (self::CATEGORIES as $categoryName) {
            $category = new TagCategory();
            $category->setName($categoryName);

            $this->addReference('tag_category_' . $i, $category);
            $i++;

            $manager->persist($category);
        }

        $manager->flush();
    }
}
