<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124222011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD restaurateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849553B311E56 FOREIGN KEY (restaurateur_id) REFERENCES restaurateur (id)');
        $this->addSql('CREATE INDEX IDX_42C849553B311E56 ON reservation (restaurateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849553B311E56');
        $this->addSql('DROP INDEX IDX_42C849553B311E56 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP restaurateur_id');
    }
}
