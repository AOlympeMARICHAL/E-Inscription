<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007152915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE antecedent (id INT AUTO_INCREMENT NOT NULL, annee DATE NOT NULL, classe VARCHAR(255) NOT NULL, lv1 VARCHAR(255) NOT NULL, lv2 VARCHAR(255) DEFAULT NULL, `option` VARCHAR(255) DEFAULT NULL, school VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, ine VARCHAR(11) NOT NULL, secu VARCHAR(13) NOT NULL, date_entree DATE DEFAULT NULL, sexe VARCHAR(1) NOT NULL, nationality VARCHAR(255) NOT NULL, date_birth DATE NOT NULL, department_birth VARCHAR(3) NOT NULL, grade_repetition TINYINT(1) NOT NULL, regime VARCHAR(255) NOT NULL, transport VARCHAR(255) NOT NULL, imma_vehicle VARCHAR(8) DEFAULT NULL, speciality VARCHAR(255) NOT NULL, lv1 VARCHAR(255) NOT NULL, lv2 VARCHAR(255) DEFAULT NULL, mdl TINYINT(1) NOT NULL, copyright TINYINT(1) NOT NULL, bachelor VARCHAR(255) NOT NULL, vital_card VARCHAR(255) NOT NULL, id_certificate VARCHAR(255) NOT NULL, assurance VARCHAR(255) DEFAULT NULL, cours VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financier (id INT AUTO_INCREMENT NOT NULL, rib VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mobile_phone VARCHAR(15) NOT NULL, address VARCHAR(255) NOT NULL, zip VARCHAR(6) NOT NULL, city VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, name_boss VARCHAR(255) DEFAULT NULL, address_boss VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, relation VARCHAR(255) NOT NULL, home_phone VARCHAR(255) DEFAULT NULL, work_phone VARCHAR(255) DEFAULT NULL, sms TINYINT(1) NOT NULL, job VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_responsable (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE urgence (id INT AUTO_INCREMENT NOT NULL, date_vaccine DATE NOT NULL, observation LONGTEXT DEFAULT NULL, name_doctor VARCHAR(255) NOT NULL, address_doctor VARCHAR(255) NOT NULL, phone_doctor VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
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
