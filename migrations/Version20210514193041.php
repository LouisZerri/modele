<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210514193041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men ADD measurements_id INT NOT NULL');
        $this->addSql('ALTER TABLE men ADD CONSTRAINT FK_DCE52DCC6570731 FOREIGN KEY (measurements_id) REFERENCES measurements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DCE52DCC6570731 ON men (measurements_id)');
        $this->addSql('ALTER TABLE women ADD measurements_id INT NOT NULL');
        $this->addSql('ALTER TABLE women ADD CONSTRAINT FK_1C1AA759C6570731 FOREIGN KEY (measurements_id) REFERENCES measurements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1C1AA759C6570731 ON women (measurements_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE men DROP FOREIGN KEY FK_DCE52DCC6570731');
        $this->addSql('DROP INDEX UNIQ_DCE52DCC6570731 ON men');
        $this->addSql('ALTER TABLE men DROP measurements_id');
        $this->addSql('ALTER TABLE women DROP FOREIGN KEY FK_1C1AA759C6570731');
        $this->addSql('DROP INDEX UNIQ_1C1AA759C6570731 ON women');
        $this->addSql('ALTER TABLE women DROP measurements_id');
    }
}
