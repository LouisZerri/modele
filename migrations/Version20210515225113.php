<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515225113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men DROP FOREIGN KEY FK_DCE52DCC6570731');
        $this->addSql('ALTER TABLE women DROP FOREIGN KEY FK_1C1AA759C6570731');
        $this->addSql('DROP TABLE measurements');
        $this->addSql('DROP INDEX UNIQ_DCE52DCC6570731 ON men');
        $this->addSql('ALTER TABLE men DROP measurements_id');
        $this->addSql('DROP INDEX UNIQ_1C1AA759C6570731 ON women');
        $this->addSql('ALTER TABLE women DROP measurements_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE measurements (id INT AUTO_INCREMENT NOT NULL, size INT NOT NULL, chest INT NOT NULL, hips INT NOT NULL, waist_size INT NOT NULL, clothing_size INT NOT NULL, shoe_size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, hair VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, eyes VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, face VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tatoos TINYINT(1) NOT NULL, piercing VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE men ADD measurements_id INT NOT NULL');
        $this->addSql('ALTER TABLE men ADD CONSTRAINT FK_DCE52DCC6570731 FOREIGN KEY (measurements_id) REFERENCES measurements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DCE52DCC6570731 ON men (measurements_id)');
        $this->addSql('ALTER TABLE women ADD measurements_id INT NOT NULL');
        $this->addSql('ALTER TABLE women ADD CONSTRAINT FK_1C1AA759C6570731 FOREIGN KEY (measurements_id) REFERENCES measurements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1C1AA759C6570731 ON women (measurements_id)');
    }
}
