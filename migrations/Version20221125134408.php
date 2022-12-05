<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125134408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD administrateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652607EE5403C FOREIGN KEY (administrateur_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_CFF652607EE5403C ON compte (administrateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652607EE5403C');
        $this->addSql('DROP INDEX IDX_CFF652607EE5403C ON compte');
        $this->addSql('ALTER TABLE compte DROP administrateur_id');
    }
}
