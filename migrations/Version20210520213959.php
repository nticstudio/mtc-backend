<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520213959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, age SMALLINT NOT NULL, situationfam VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, paysnai VARCHAR(255) DEFAULT NULL, nbenfant SMALLINT NOT NULL, profession VARCHAR(255) DEFAULT NULL, tabac TINYINT(1) DEFAULT NULL, alcool TINYINT(1) DEFAULT NULL, sport LONGTEXT DEFAULT NULL, medication LONGTEXT DEFAULT NULL, protese LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consult ADD created_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE consult ADD CONSTRAINT FK_4D02C9E2B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4D02C9E2B03A8386 ON consult (created_by_id)');
        $this->addSql('ALTER TABLE user DROP age, DROP situationfam, DROP paysnai, DROP nbenfant, DROP profession, DROP tabac, DROP alcool, DROP sport, DROP medication, DROP protese');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE consult DROP FOREIGN KEY FK_4D02C9E2B03A8386');
        $this->addSql('DROP INDEX IDX_4D02C9E2B03A8386 ON consult');
        $this->addSql('ALTER TABLE consult DROP created_by_id');
        $this->addSql('ALTER TABLE user ADD age SMALLINT NOT NULL, ADD situationfam VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD paysnai VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD nbenfant SMALLINT NOT NULL, ADD profession VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD tabac TINYINT(1) DEFAULT NULL, ADD alcool TINYINT(1) DEFAULT NULL, ADD sport LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD medication LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD protese LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
