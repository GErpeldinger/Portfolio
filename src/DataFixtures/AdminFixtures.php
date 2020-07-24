<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{
    private const EMAIL = 'erpeldinger.g@gmail.com';
    private const PASSWORD = 'password';
    private const ROLE = ['ROLE_ADMIN'];
    private const SURNAME = 'Erpeldinger';
    private const FORENAME = 'Guillaume';
    private const JOB = 'Développeur Web Full Stack';
    private const BIRTHDAY = '1992-07-10';
    private const CITY = 'Bordeaux';
    private const LINKEDIN = 'https://www.linkedin.com/in/guillaumeerpeldinger/';
    private const GITHUB = 'https://github.com/Nighter33';
    private const RESUME = 'Après plusieurs années de travail alimentaire, j’ai pris la décision de reprendre mes études
    et ainsi pouvoir travailler dans un métier enrichissant et où je pourrais m’épanouir professionnellement. <br>
    Ayant toujours était passionné d’informatique depuis mon plus jeune âge, je me suis orienté vers une formation
    intensive de développeur web avec comme spécialisation le langage PHP et le Framework Symfony. <br>
    Le métier de développeur m’intéresse, car il me permet d’utiliser mon esprit logique et ma compétence à résoudre
    des problèmes que j’ai acquis dans l’informatique au fil des années. <br>
    C’est ainsi que je me suis retrouvé ces derniers mois à la Wild Code School. J’ai choisi de faire ma formation
    là-bas, car j’adhère à ces principes qui se basent sur un apprentissage hybride où le mot-clé est « apprendre
    à apprendre » combiné avec beaucoup de pratique. <br>
    Ma formation se terminant le 31 juillet, je recherche une entreprise prête à accueillir et à accompagner un
    développeur junior curieux et déterminé.';
    private const OVERVIEW = 'Je suis en manque d\'idée';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();
        $admin
            ->setEmail(self::EMAIL)
            ->setPassword($this->passwordEncoder->encodePassword($admin,self::PASSWORD))
            ->setRoles(self::ROLE)
            ->setSurname(self::SURNAME)
            ->setForename(self::FORENAME)
            ->setJob(self::JOB)
            ->setBirthday(new DateTime(self::BIRTHDAY))
            ->setCity(self::CITY)
            ->setLinkedIn(self::LINKEDIN)
            ->setGithub(self::GITHUB)
            ->setResume(self::RESUME)
            ->setOverview(self::OVERVIEW);

        $manager->persist($admin);

        $manager->flush();
    }
}
