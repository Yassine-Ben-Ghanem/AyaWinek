<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210605132420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, driver_id_id INT NOT NULL, model VARCHAR(255) NOT NULL, registration_number INT NOT NULL, number_places INT NOT NULL, UNIQUE INDEX UNIQ_773DE69DFFC6537A (driver_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE driver (id INT AUTO_INCREMENT NOT NULL, first_mame VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, number_tel INT NOT NULL, account_email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ride (id INT AUTO_INCREMENT NOT NULL, driver_id INT NOT NULL, pick_up_time DATE NOT NULL, pick_up_from VARCHAR(255) NOT NULL, drop_to VARCHAR(255) NOT NULL, type_ride VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_9B3D7CD0C3423909 (driver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DFFC6537A FOREIGN KEY (driver_id_id) REFERENCES driver (id)');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DFFC6537A');
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD0C3423909');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE driver');
        $this->addSql('DROP TABLE ride');
    }
}
