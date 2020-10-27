<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\ProjectCategory;
use App\Entity\Tag;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    private const PROJECTS = [
        'JobTech' => [
            'slug' => 'jobtech',
            'category' => 'project_category_1',
            'startDate' => '29-04-2020',
            'tags' => ['tag_1', 'tag_3', 'tag_4', 'tag_5', 'tag_6', 'tag_10', 'tag_11', 'tag_12', 'tag_13', 'tag_14', 'tag_15']
        ]
    ];

    public function getDependencies(): array
    {
        return [TagFixtures::class, ProjectCategoryFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $i = 1;
        foreach (self::PROJECTS as $name => $data) {
            /* @var ProjectCategory $category */
            $category = $this->getReference($data['category']);

            $project = new Project();
            $project
                ->setName($name)
                ->setSlug($data['slug'])
                ->setCategory($category)
                ->setStartDate(new DateTime($data['startDate']));

            foreach ($data['tags'] as $tag) {
                /* @var Tag $tag */
                $tag = $this->getReference($tag);
                $project->addTag($tag);
            }

            $this->addReference('project_' . $i, $project);
            $i++;

            $manager->persist($project);
        }

        $manager->flush();
    }
}
