<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230720114403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, band_name_id INT DEFAULT NULL, album_title VARCHAR(255) NOT NULL, album_year DATE DEFAULT NULL, album_cover VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_39986E43803A3BA9 (band_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE band (id INT AUTO_INCREMENT NOT NULL, band_name VARCHAR(255) NOT NULL, band_genre VARCHAR(255) NOT NULL, band_picture VARCHAR(255) DEFAULT NULL, band_country VARCHAR(255) NOT NULL, band_year VARCHAR(255) DEFAULT NULL, band_logo VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, song_album_id INT DEFAULT NULL, song_title VARCHAR(255) NOT NULL, song_number INT NOT NULL, song_duration TIME DEFAULT NULL, song_lyrics LONGTEXT DEFAULT NULL, INDEX IDX_33EDEEA1BAEBFD87 (song_album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song_tracklist (id INT AUTO_INCREMENT NOT NULL, album_id INT NOT NULL, song_number INT NOT NULL, song_duration TIME DEFAULT NULL, song_lyrics LONGTEXT DEFAULT NULL, INDEX IDX_F5505E931137ABCF (album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43803A3BA9 FOREIGN KEY (band_name_id) REFERENCES band (id)');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA1BAEBFD87 FOREIGN KEY (song_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE song_tracklist ADD CONSTRAINT FK_F5505E931137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43803A3BA9');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA1BAEBFD87');
        $this->addSql('ALTER TABLE song_tracklist DROP FOREIGN KEY FK_F5505E931137ABCF');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE band');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE song_tracklist');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
