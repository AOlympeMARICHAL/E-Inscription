<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250401121802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve CHANGE financier_id financier_id INT DEFAULT NULL, CHANGE individu_id individu_id INT DEFAULT NULL, CHANGE ine ine VARCHAR(11) DEFAULT NULL, CHANGE sexe sexe VARCHAR(1) DEFAULT NULL, CHANGE nationality nationality VARCHAR(255) DEFAULT NULL, CHANGE date_birth date_birth DATE DEFAULT NULL, CHANGE department_birth department_birth VARCHAR(3) DEFAULT NULL, CHANGE grade_repetition grade_repetition TINYINT(1) DEFAULT NULL, CHANGE regime regime VARCHAR(255) DEFAULT NULL, CHANGE transport transport JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE speciality speciality VARCHAR(255) DEFAULT NULL, CHANGE lv1 lv1 VARCHAR(255) DEFAULT NULL, CHANGE mdl mdl TINYINT(1) DEFAULT NULL, CHANGE copyright copyright TINYINT(1) DEFAULT NULL, CHANGE bachelor bachelor VARCHAR(255) DEFAULT NULL, CHANGE vital_card vital_card VARCHAR(255) DEFAULT NULL, CHANGE id_certificate id_certificate VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE individu CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE mobile_phone mobile_phone VARCHAR(15) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE zip zip VARCHAR(6) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individu CHANGE name name VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE mobile_phone mobile_phone VARCHAR(15) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL, CHANGE zip zip VARCHAR(6) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE commune commune VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE financier_id financier_id INT NOT NULL, CHANGE individu_id individu_id INT NOT NULL, CHANGE ine ine VARCHAR(11) NOT NULL, CHANGE sexe sexe VARCHAR(1) NOT NULL, CHANGE nationality nationality VARCHAR(255) NOT NULL, CHANGE date_birth date_birth DATE NOT NULL, CHANGE department_birth department_birth VARCHAR(3) NOT NULL, CHANGE grade_repetition grade_repetition TINYINT(1) NOT NULL, CHANGE regime regime VARCHAR(255) NOT NULL, CHANGE transport transport JSON NOT NULL COMMENT \'(DC2Type:json)\', CHANGE speciality speciality VARCHAR(255) NOT NULL, CHANGE lv1 lv1 VARCHAR(255) NOT NULL, CHANGE mdl mdl TINYINT(1) NOT NULL, CHANGE copyright copyright TINYINT(1) NOT NULL, CHANGE bachelor bachelor VARCHAR(255) NOT NULL, CHANGE vital_card vital_card VARCHAR(255) NOT NULL, CHANGE id_certificate id_certificate VARCHAR(255) NOT NULL');
    }
}
