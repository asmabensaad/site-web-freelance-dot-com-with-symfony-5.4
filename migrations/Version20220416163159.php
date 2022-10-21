<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220416163159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD categorie_projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9AD9E8D75 FOREIGN KEY (categorie_projet_id) REFERENCES categorie_projet (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9AD9E8D75 ON projet (categorie_projet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9AD9E8D75');
        $this->addSql('DROP INDEX IDX_50159CA9AD9E8D75 ON projet');
        $this->addSql('ALTER TABLE projet DROP categorie_projet_id');
    }
}
