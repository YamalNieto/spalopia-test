<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240513122218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('
            CREATE TABLE timeslots (
                id VARCHAR(36) NOT NULL, 
                service_id VARCHAR(36) NOT NULL, 
                day VARCHAR(10) NOT NULL, 
                start VARCHAR(5) NOT NULL, 
                "end" VARCHAR(5) NOT NULL, 
                available BOOLEAN NOT NULL, 
                PRIMARY KEY(id)
           )
       ');
        $this->addSql('ALTER TABLE timeslots ADD CONSTRAINT service_id_fk FOREIGN KEY (service_id) REFERENCES spa_services (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE timeslots');
    }
}
