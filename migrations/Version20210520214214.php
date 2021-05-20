<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520214214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consult ADD patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consult ADD CONSTRAINT FK_4D02C9E26B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_4D02C9E26B899279 ON consult (patient_id)');
        $this->addSql('ALTER TABLE patient ADD created_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBB03A8386 ON patient (created_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consult DROP FOREIGN KEY FK_4D02C9E26B899279');
        $this->addSql('DROP INDEX IDX_4D02C9E26B899279 ON consult');
        $this->addSql('ALTER TABLE consult DROP patient_id');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBB03A8386');
        $this->addSql('DROP INDEX IDX_1ADAD7EBB03A8386 ON patient');
        $this->addSql('ALTER TABLE patient DROP created_by_id');
    }
}
