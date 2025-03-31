<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250325102805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acontacter (id INT AUTO_INCREMENT NOT NULL, id_urgence_id INT NOT NULL, INDEX IDX_8208394FF201FF6A (id_urgence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE antecedent (id INT AUTO_INCREMENT NOT NULL, id_eleve_id INT DEFAULT NULL, annee DATE NOT NULL, classe VARCHAR(255) NOT NULL, lv1 VARCHAR(255) NOT NULL, lv2 VARCHAR(255) DEFAULT NULL, `option` VARCHAR(255) DEFAULT NULL, school VARCHAR(255) NOT NULL, INDEX IDX_3166BE7C5AB72B27 (id_eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, financier_id INT NOT NULL, individu_id INT NOT NULL, ine VARCHAR(11) NOT NULL, secu VARCHAR(13) NOT NULL, date_entree DATE DEFAULT NULL, sexe VARCHAR(1) NOT NULL, nationality VARCHAR(255) NOT NULL, date_birth DATE NOT NULL, department_birth VARCHAR(3) NOT NULL, grade_repetition TINYINT(1) NOT NULL, regime VARCHAR(255) NOT NULL, transport VARCHAR(255) NOT NULL, imma_vehicle VARCHAR(8) DEFAULT NULL, speciality VARCHAR(255) NOT NULL, lv1 VARCHAR(255) NOT NULL, lv2 VARCHAR(255) DEFAULT NULL, mdl TINYINT(1) NOT NULL, copyright TINYINT(1) NOT NULL, bachelor VARCHAR(255) NOT NULL, vital_card VARCHAR(255) NOT NULL, id_certificate VARCHAR(255) NOT NULL, assurance VARCHAR(255) DEFAULT NULL, cours VARCHAR(255) DEFAULT NULL, redoublement TINYINT(1) DEFAULT NULL, INDEX IDX_ECA105F74A353075 (financier_id), UNIQUE INDEX UNIQ_ECA105F7480B6028 (individu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financier (id INT AUTO_INCREMENT NOT NULL, rib VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individu (id INT AUTO_INCREMENT NOT NULL, financier_id INT DEFAULT NULL, responsable_id INT DEFAULT NULL, urgence_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mobile_phone VARCHAR(15) NOT NULL, address VARCHAR(255) NOT NULL, zip VARCHAR(6) NOT NULL, city VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, name_boss VARCHAR(255) DEFAULT NULL, address_boss VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_5EE42FCE4A353075 (financier_id), UNIQUE INDEX UNIQ_5EE42FCE53C59D72 (responsable_id), INDEX IDX_5EE42FCE578B7FBD (urgence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, relation VARCHAR(255) NOT NULL, home_phone VARCHAR(255) DEFAULT NULL, work_phone VARCHAR(255) DEFAULT NULL, sms TINYINT(1) NOT NULL, job VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_responsable (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE urgence (id INT AUTO_INCREMENT NOT NULL, date_vaccine DATE NOT NULL, observation LONGTEXT DEFAULT NULL, name_doctor VARCHAR(255) NOT NULL, address_doctor VARCHAR(255) NOT NULL, phone_doctor VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acontacter ADD CONSTRAINT FK_8208394FF201FF6A FOREIGN KEY (id_urgence_id) REFERENCES urgence (id)');
        $this->addSql('ALTER TABLE antecedent ADD CONSTRAINT FK_3166BE7C5AB72B27 FOREIGN KEY (id_eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F74A353075 FOREIGN KEY (financier_id) REFERENCES financier (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7480B6028 FOREIGN KEY (individu_id) REFERENCES individu (id)');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE4A353075 FOREIGN KEY (financier_id) REFERENCES financier (id)');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE53C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE individu ADD CONSTRAINT FK_5EE42FCE578B7FBD FOREIGN KEY (urgence_id) REFERENCES urgence (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acontacter DROP FOREIGN KEY FK_8208394FF201FF6A');
        $this->addSql('ALTER TABLE antecedent DROP FOREIGN KEY FK_3166BE7C5AB72B27');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F74A353075');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7480B6028');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE4A353075');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE53C59D72');
        $this->addSql('ALTER TABLE individu DROP FOREIGN KEY FK_5EE42FCE578B7FBD');
        $this->addSql('DROP TABLE acontacter');
        $this->addSql('DROP TABLE antecedent');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE financier');
        $this->addSql('DROP TABLE individu');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE statut_responsable');
        $this->addSql('DROP TABLE urgence');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
