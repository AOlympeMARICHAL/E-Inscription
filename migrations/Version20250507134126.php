<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250507134126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE acontacter ADD CONSTRAINT FK_8208394FF201FF6A FOREIGN KEY (id_urgence_id) REFERENCES urgence (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE antecedent ADD CONSTRAINT FK_3166BE7C5AB72B27 FOREIGN KEY (id_eleve_id) REFERENCES eleve (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD email VARCHAR(180) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE acontacter DROP FOREIGN KEY FK_8208394FF201FF6A
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_8D93D649E7927C74 ON user
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP email
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE antecedent DROP FOREIGN KEY FK_3166BE7C5AB72B27
        SQL);
    }
}
