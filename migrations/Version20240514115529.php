<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514115529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('
            CREATE TABLE reservations (
                id VARCHAR(36) NOT NULL, 
                service_id VARCHAR(36) NOT NULL, 
                customer_name VARCHAR(100) NOT NULL, 
                customer_email VARCHAR(255) NOT NULL, 
                day VARCHAR(10) NOT NULL,
                start_at VARCHAR(5) NOT NULL, 
                price DOUBLE PRECISION NOT NULL, 
                PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT service_id_fk FOREIGN KEY (service_id) REFERENCES spa_services (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservations');
    }
}
