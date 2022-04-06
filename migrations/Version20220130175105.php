<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130175105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('ALTER TABLE consult ADD diagone VARCHAR(255) DEFAULT NULL, ADD diagtwo VARCHAR(255) DEFAULT NULL, ADD diagthree VARCHAR(255) DEFAULT NULL, ADD diagfour VARCHAR(255) DEFAULT NULL, ADD diagcom LONGTEXT DEFAULT NULL, ADD syndrome LONGTEXT DEFAULT NULL, ADD principe_traitement LONGTEXT DEFAULT NULL');
       // $this->addSql('ALTER TABLE user CHANGE genre genre SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE consult DROP diagone, DROP diagtwo, DROP diagthree, DROP diagfour, DROP diagcom, DROP syndrome, DROP principe_traitement');
        //$this->addSql('ALTER TABLE user CHANGE genre genre SMALLINT DEFAULT 3');
    }
}
