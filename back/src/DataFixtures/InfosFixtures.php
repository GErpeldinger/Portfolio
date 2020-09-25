<?php

namespace App\DataFixtures;

use App\Entity\Infos;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InfosFixtures extends Fixture
{
    private const SURNAME = 'Erpeldinger';
    private const FORENAME = 'Guillaume';
    private const BIRTHDAY = '1992-07-10';
    private const CITY = 'Bordeaux';
    private const JOB = 'Développeur Web Full Stack';
    private const RESUME = 'Après plusieurs années de travail alimentaire, j’ai pris la décision de reprendre mes études
    et ainsi pouvoir travailler dans un métier enrichissant où je pourrais m’épanouir professionnellement. <br>
    Ayant toujours était passionné d’informatique depuis mon plus jeune âge, je me suis orienté vers une formation
    intensive de développeur web avec comme spécialisation le langage PHP et le Framework Symfony. <br>
    Le métier de développeur m’intéresse, car il me permet d’utiliser mon esprit logique et ma compétence à résoudre
    des problèmes que j’ai acquis dans l’informatique au fil des années. <br>
    C’est ainsi que je me suis retrouvé ces derniers mois à la Wild Code School. J’ai choisi de faire ma formation
    là-bas, car j’adhère à ces principes qui se basent sur un apprentissage hybride où le mot-clé est « apprendre
    à apprendre » combiné avec beaucoup de pratique. <br>
    Ma formation s\'étant terminée le 31 juillet, je recherche activement une entreprise prête à accueillir et à accompagner un
    développeur junior curieux et déterminé en alternance.';
    private const SUMMARY = 'Je suis en manque d\'idée';

    public function load(ObjectManager $manager): void
    {
        $infos = new Infos();
        $infos
            ->setSurname(self::SURNAME)
            ->setForename(self::FORENAME)
            ->setBirthday(new DateTime(self::BIRTHDAY))
            ->setCity(self::CITY)
            ->setJob(self::JOB)
            ->setResume(self::RESUME)
            ->setSummary(self::SUMMARY);

        $manager->persist($infos);
        $manager->flush();
    }
}
