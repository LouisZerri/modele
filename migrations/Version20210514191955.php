<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210514191955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE measurements (id INT AUTO_INCREMENT NOT NULL, size INT NOT NULL, chest INT NOT NULL, hips INT NOT NULL, waist_size INT NOT NULL, clothing_size INT NOT NULL, shoe_size VARCHAR(255) NOT NULL, hair VARCHAR(255) NOT NULL, eyes VARCHAR(255) NOT NULL, face VARCHAR(255) NOT NULL, tatoos TINYINT(1) NOT NULL, piercing VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE measurements');
    }
}
