<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526203222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE face (id INT AUTO_INCREMENT NOT NULL, morphology VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE men ADD face_id INT NOT NULL, DROP face');
        $this->addSql('ALTER TABLE men ADD CONSTRAINT FK_DCE52DCFDC86CD0 FOREIGN KEY (face_id) REFERENCES face (id)');
        $this->addSql('CREATE INDEX IDX_DCE52DCFDC86CD0 ON men (face_id)');
        $this->addSql('ALTER TABLE women ADD face_id INT NOT NULL, DROP face');
        $this->addSql('ALTER TABLE women ADD CONSTRAINT FK_1C1AA759FDC86CD0 FOREIGN KEY (face_id) REFERENCES face (id)');
        $this->addSql('CREATE INDEX IDX_1C1AA759FDC86CD0 ON women (face_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men DROP FOREIGN KEY FK_DCE52DCFDC86CD0');
        $this->addSql('ALTER TABLE women DROP FOREIGN KEY FK_1C1AA759FDC86CD0');
        $this->addSql('DROP TABLE face');
        $this->addSql('DROP INDEX IDX_DCE52DCFDC86CD0 ON men');
        $this->addSql('ALTER TABLE men ADD face VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP face_id');
        $this->addSql('DROP INDEX IDX_1C1AA759FDC86CD0 ON women');
        $this->addSql('ALTER TABLE women ADD face VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP face_id');
    }
}
