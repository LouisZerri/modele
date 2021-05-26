<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210514190834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men ADD native_language VARCHAR(255) NOT NULL, ADD second_language VARCHAR(255) DEFAULT NULL, ADD third_language VARCHAR(255) DEFAULT NULL, ADD fourth_language VARCHAR(255) DEFAULT NULL, ADD fifth_language VARCHAR(255) DEFAULT NULL, ADD comments LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE women ADD native_language VARCHAR(255) NOT NULL, ADD second_language VARCHAR(255) DEFAULT NULL, ADD third_language VARCHAR(255) DEFAULT NULL, ADD fourth_language VARCHAR(255) DEFAULT NULL, ADD fifth_language VARCHAR(255) DEFAULT NULL, ADD comments LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men DROP native_language, DROP second_language, DROP third_language, DROP fourth_language, DROP fifth_language, DROP comments');
        $this->addSql('ALTER TABLE women DROP native_language, DROP second_language, DROP third_language, DROP fourth_language, DROP fifth_language, DROP comments');
    }
}
