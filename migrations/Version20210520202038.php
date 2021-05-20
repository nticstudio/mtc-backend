<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520202038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD age SMALLINT NOT NULL, ADD situationfam VARCHAR(255) DEFAULT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD paysnai VARCHAR(255) DEFAULT NULL, ADD nbenfant SMALLINT NOT NULL, ADD profession VARCHAR(255) DEFAULT NULL, ADD tabac TINYINT(1) DEFAULT NULL, ADD alcool TINYINT(1) DEFAULT NULL, ADD sport LONGTEXT DEFAULT NULL, ADD medication LONGTEXT DEFAULT NULL, ADD protese LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, DROP age, DROP situationfam, DROP phone, DROP paysnai, DROP nbenfant, DROP profession, DROP tabac, DROP alcool, DROP sport, DROP medication, DROP protese');
    }
}
