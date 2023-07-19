<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707094227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD image_file VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX uniq_2da17977e7927c74 ON user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE video ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CA76ED395 ON video (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP image_file');
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74 ON user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA17977E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CA76ED395');
        $this->addSql('DROP INDEX IDX_7CC7DA2CA76ED395 ON video');
        $this->addSql('ALTER TABLE video DROP user_id');
    }
}
