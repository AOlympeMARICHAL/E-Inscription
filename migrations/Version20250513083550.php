<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250513083550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE responsable_eleve (responsable_id INT NOT NULL, eleve_id INT NOT NULL, INDEX IDX_8D30209553C59D72 (responsable_id), INDEX IDX_8D302095A6CC7B2 (eleve_id), PRIMARY KEY(responsable_id, eleve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_responsable (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE responsable_eleve ADD CONSTRAINT FK_8D30209553C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE responsable_eleve ADD CONSTRAINT FK_8D302095A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE7A8157F0');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE6834F81E');
        $this->addSql('DROP INDEX UNIQ_5EE42FCE6834F81E ON individu');
        $this->addSql('DROP INDEX UNIQ_5EE42FCE7A8157F0 ON individu');
        $this->addSql('ALTER TABLE individu ADD responsable_id INT DEFAULT NULL, DROP responsable1_id, DROP responsable2_id');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE53C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EE42FCE53C59D72 ON individu (responsable_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responsable_eleve DROP FOREIGN KEY FK_8D30209553C59D72');
        $this->addSql('ALTER TABLE responsable_eleve DROP FOREIGN KEY FK_8D302095A6CC7B2');
        $this->addSql('DROP TABLE responsable_eleve');
        $this->addSql('DROP TABLE statut_responsable');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE53C59D72');
        $this->addSql('DROP INDEX UNIQ_5EE42FCE53C59D72 ON individu');
        $this->addSql('ALTER TABLE individu ADD responsable2_id INT DEFAULT NULL, CHANGE responsable_id responsable1_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE7A8157F0 FOREIGN KEY (responsable2_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE6834F81E FOREIGN KEY (responsable1_id) REFERENCES responsable (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EE42FCE6834F81E ON individu (responsable1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EE42FCE7A8157F0 ON individu (responsable2_id)');
    }
}
