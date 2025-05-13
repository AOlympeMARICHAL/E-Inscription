<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250507123911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE statut_responsable');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE53C59D72');
        $this->addSql('DROP INDEX UNIQ_5EE42FCE53C59D72 ON individu');
        $this->addSql('ALTER TABLE individu ADD responsable2_id INT DEFAULT NULL, CHANGE responsable_id responsable1_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE6834F81E FOREIGN KEY (responsable1_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE7A8157F0 FOREIGN KEY (responsable2_id) REFERENCES responsable (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EE42FCE6834F81E ON individu (responsable1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EE42FCE7A8157F0 ON individu (responsable2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut_responsable (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE6834F81E');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE7A8157F0');
        $this->addSql('DROP INDEX UNIQ_5EE42FCE6834F81E ON individu');
        $this->addSql('DROP INDEX UNIQ_5EE42FCE7A8157F0 ON individu');
        $this->addSql('ALTER TABLE individu ADD responsable_id INT DEFAULT NULL, DROP responsable1_id, DROP responsable2_id');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE53C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EE42FCE53C59D72 ON individu (responsable_id)');
    }
}
