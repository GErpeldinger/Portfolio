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
        'Archives de Bordeaux Métropole' => [
            'slug' => 'archives-de-bordeaux-metropole',
            'description' => '<p>&gt;&gt;&gt; Projet statique &amp; factice &lt;&lt;&lt;</p><p>Le premier projet r&eacute;alis&eacute; en &eacute;quipe lors de ma formation.</p><p>Refonte du site des Archives de Bordeaux M&eacute;tropole.</p><p>💻 Projet d&#39;une semaine avec une &eacute;quipe de 3 d&eacute;veloppeurs.</p>',
            'category' => 'project_category_1',
            'startDate' => '09-03-2020',
            'tags' => ['tag_1', 'tag_2'],
            'link' => 'https://nighter33.github.io/Archives-Bordeaux-Metropole/',
            'github' => 'https://github.com/Nighter33/Archives-Bordeaux-Metropole',
            'video' => ''
        ],
        'Hacocktail' => [
            'slug' => 'hacocktail',
            'description' => '<p>Affiche des recettes de cocktail al&eacute;atoirement et plusieurs quizz sur les cocktails du monde.</p><p>💻 Projet r&eacute;alis&eacute; dans la cadre d&#39;un Hackathon de 24h avec une &eacute;quipe de 3 d&eacute;veloppeurs.</p><p>✈️ Th&egrave;me : Voyager depuis son canap&eacute;.</p>',
            'category' => 'project_category_1',
            'startDate' => '29-04-2020',
            'tags' => ['tag_1', 'tag_2', 'tag_4', 'tag_8', 'tag_9', 'tag_16'],
            'link' => '',
            'github' => '',
            'video' => ''
        ],
        'Joshua' => [
            'slug' => 'joshua',
            'description' => '<p>Le deuxi&egrave;me projet r&eacute;alis&eacute; en &eacute;quipe lors de ma formation.</p><p>Joshua est un site d&eacute;velopp&eacute; pour la Wild Code School o&ugrave; est organis&eacute; des comp&eacute;titions de capture de drapeau.</p><p>(Jeu consistant &agrave; exploiter des vuln&eacute;rabilit&eacute;s d&#39;applications web ou logiciels)</p><p>💻 Projet de 5 semaines avec une &eacute;quipe de 4 d&eacute;veloppeurs.</p>',
            'category' => 'project_category_1',
            'startDate' => '06-04-2020',
            'tags' => ['tag_1', 'tag_2', 'tag_4', 'tag_5', 'tag_8', 'tag_9', 'tag_10', 'tag_11'],
            'link' => '',
            'github' => 'https://github.com/Nighter33/Joshua/tree/v1',
            'video' => ''
        ],
        'Loopy' => [
            'slug' => 'loopy',
            'description' => '<p>Loopy est un outil permettant de rendre les enfants atteint de diab&egrave;te insulino d&eacute;pendant acteur de leur sant&eacute; et ceci d&#39;une fa&ccedil;on ludique.</p><p>💻 Projet r&eacute;alis&eacute; dans la cadre d&#39;un Hackathon Europ&eacute;en de 48h organis&eacute; par la Wild Code School en association avec Doctolib et Dataiku.</p><p>👨🏻&zwj;⚕️ Th&egrave;me : La sant&eacute; en remote.</p><p>🏆 Classement : Loopy ce sera hiss&eacute; &agrave; la 2&egrave;me place sur les 101 &eacute;quipes de wilders participantes.</p>',
            'category' => 'project_category_1',
            'startDate' => '25-06-2020',
            'tags' => ['tag_1', 'tag_3', 'tag_4', 'tag_5', 'tag_6', 'tag_13'],
            'link' => '',
            'github' => '',
            'video' => 'https://www.youtube.com/embed/xvNe82WsPzk?autoplay=1'
        ],
        'Wild series' => [
            'slug' => 'wild-series',
            'description' => '<p>&gt;&gt;&gt; Projet factice &lt;&lt;&lt;</p><p>Application web permettant un suivi de ses s&eacute;ries pr&eacute;f&eacute;r&eacute;s dans le style de <a href="https://www.betaseries.com/" target="_blank">Betaseries</a>.</p><p>R&eacute;alis&eacute; dans le cadre de qu&ecirc;tes destin&eacute; &agrave; l&#39;apprentissage de Symfony.</p>',
            'category' => 'project_category_1',
            'startDate' => '10-05-2020',
            'tags' => ['tag_1', 'tag_3', 'tag_4', 'tag_5', 'tag_6', 'tag_10', 'tag_11'],
            'link' => '',
            'github' => 'https://github.com/Nighter33/Wild-Series',
            'video' => ''
        ],
        'JobTech' => [
            'slug' => 'jobtech',
            'description' => '<p>Plateforme de recrutement permettant la mise en relation entre candidats et entreprises.</p><p>Son point fort &eacute;tant un syst&egrave;me de questionnaire pour &eacute;valuer les candidats.</p><p>💻 Projet r&eacute;el pour un client sur une dur&eacute;e de 8 semaines avec une &eacute;quipe de 4 d&eacute;veloppeurs.</p>',
            'category' => 'project_category_1',
            'startDate' => '28-05-2020',
            'tags' => ['tag_1', 'tag_3', 'tag_4', 'tag_5', 'tag_6', 'tag_10', 'tag_11', 'tag_12', 'tag_13', 'tag_14', 'tag_15'],
            'link' => 'https://job-tech.fr/',
            'github' => 'https://github.com/Nighter33/JobTech',
            'video' => ''
        ],
        'Portfolio' => [
            'slug' => 'portfolio',
            'description' => '<p>Mon portfolio est originalement un projet r&eacute;alis&eacute; en Symfony lors d&#39;un checkpoint (&Eacute;xercice permettant d&#39;&eacute;valuer le niveau des &eacute;l&egrave;ves) de 2 jours lors de ma formation. (<a href="https://github.com/Nighter33/Portfolio/tree/v1.0" target="_blank">v1.0 sur le repository github</a>)</p><p>Je l&#39;ai refais ensuite pour qu&#39;il corresponde plus &agrave; mes attentes.</p>',
            'category' => 'project_category_2',
            'startDate' => '23-10-2020',
            'tags' => ['tag_1', 'tag_3', 'tag_4', 'tag_5', 'tag_6', 'tag_7', 'tag_11', 'tag_12', 'tag_17', 'tag_18'],
            'link' => '',
            'github' => 'https://github.com/Nighter33/Portfolio',
            'video' => ''
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
                ->setDescription($data['description'])
                ->setCategory($category)
                ->setStartDate(new DateTime($data['startDate']))
                ->setLink($data['link'])
                ->setGithub($data['github'])
                ->setVideo($data['video']);

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
