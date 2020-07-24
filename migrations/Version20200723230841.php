<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723230841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, surname VARCHAR(45) NOT NULL, forename VARCHAR(45) NOT NULL, birthday DATE NOT NULL, job VARCHAR(100) NOT NULL, linked_in VARCHAR(2083) NOT NULL, github VARCHAR(2083) NOT NULL, resume VARCHAR(3000) NOT NULL, city VARCHAR(80) NOT NULL, overview VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(45) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, url VARCHAR(2083) DEFAULT NULL, is_video TINYINT(1) DEFAULT \'0\' NOT NULL, is_website TINYINT(1) DEFAULT \'0\' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, icon VARCHAR(255) NOT NULL, added_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timeline (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(80) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, no_day TINYINT(1) DEFAULT \'0\' NOT NULL, no_month TINYINT(1) DEFAULT \'0\' NOT NULL, description VARCHAR(800) DEFAULT NULL, label VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE timeline');
    }
}
