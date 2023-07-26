<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230726091438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, member_name VARCHAR(255) NOT NULL, member_picture VARCHAR(255) DEFAULT NULL, member_birthday DATE DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_band (member_id INT NOT NULL, band_id INT NOT NULL, INDEX IDX_B4578EB77597D3FE (member_id), INDEX IDX_B4578EB749ABEB17 (band_id), PRIMARY KEY(member_id, band_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_band ADD CONSTRAINT FK_B4578EB77597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_band ADD CONSTRAINT FK_B4578EB749ABEB17 FOREIGN KEY (band_id) REFERENCES band (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member_band DROP FOREIGN KEY FK_B4578EB77597D3FE');
        $this->addSql('ALTER TABLE member_band DROP FOREIGN KEY FK_B4578EB749ABEB17');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE member_band');
    }
}
