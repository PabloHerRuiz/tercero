<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116100334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB06153397707A');
        $this->addSql('DROP INDEX fk_a7bb06153397707a ON producto');
        $this->addSql('CREATE INDEX IDX_A7BB06153397707A ON producto (categoria_id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06153397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB06153397707A');
        $this->addSql('DROP INDEX idx_a7bb06153397707a ON producto');
        $this->addSql('CREATE INDEX FK_A7BB06153397707A ON producto (categoria_id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06153397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
    }
}
