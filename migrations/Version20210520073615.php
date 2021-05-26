<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520073615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture_men (id INT AUTO_INCREMENT NOT NULL, men_id INT NOT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_3D2AD1EF1683D908 (men_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_women (id INT AUTO_INCREMENT NOT NULL, women_id INT NOT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_9CC0201719080347 (women_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture_men ADD CONSTRAINT FK_3D2AD1EF1683D908 FOREIGN KEY (men_id) REFERENCES men (id)');
        $this->addSql('ALTER TABLE picture_women ADD CONSTRAINT FK_9CC0201719080347 FOREIGN KEY (women_id) REFERENCES women (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE picture_men');
        $this->addSql('DROP TABLE picture_women');
    }
}
