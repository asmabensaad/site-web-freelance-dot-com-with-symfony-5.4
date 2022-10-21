<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420224806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projet_freelancer (projet_id INT NOT NULL, freelancer_id INT NOT NULL, INDEX IDX_CDB339C2C18272 (projet_id), INDEX IDX_CDB339C28545BDF5 (freelancer_id), PRIMARY KEY(projet_id, freelancer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projet_freelancer ADD CONSTRAINT FK_CDB339C2C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_freelancer ADD CONSTRAINT FK_CDB339C28545BDF5 FOREIGN KEY (freelancer_id) REFERENCES freelancer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE projet_freelancer');
    }
}
