<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515225606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men ADD size INT NOT NULL, ADD chest INT NOT NULL, ADD hips INT NOT NULL, ADD waist_size INT NOT NULL, ADD clothing_size INT NOT NULL, ADD shoes INT NOT NULL, ADD hairs VARCHAR(255) NOT NULL, ADD eyes VARCHAR(255) NOT NULL, ADD face VARCHAR(255) NOT NULL, ADD tatoos TINYINT(1) NOT NULL, ADD piercing TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE women ADD size INT NOT NULL, ADD chest INT NOT NULL, ADD hips INT NOT NULL, ADD waist_size INT NOT NULL, ADD clothing_size INT NOT NULL, ADD shoes INT NOT NULL, ADD hairs VARCHAR(255) NOT NULL, ADD eyes VARCHAR(255) NOT NULL, ADD face VARCHAR(255) NOT NULL, ADD tatoos TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men DROP size, DROP chest, DROP hips, DROP waist_size, DROP clothing_size, DROP shoes, DROP hairs, DROP eyes, DROP face, DROP tatoos, DROP piercing');
        $this->addSql('ALTER TABLE women DROP size, DROP chest, DROP hips, DROP waist_size, DROP clothing_size, DROP shoes, DROP hairs, DROP eyes, DROP face, DROP tatoos');
    }
}
