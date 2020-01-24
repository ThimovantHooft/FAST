<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123211933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donatie CHANGE user_id user_id INT DEFAULT NULL, CHANGE winkel_id winkel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE foto foto VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE regel CHANGE donatie_id donatie_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL, CHANGE aantal aantal INT DEFAULT NULL');
        $this->addSql('ALTER TABLE uitje CHANGE prijs prijs INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(25) NOT NULL, ADD password VARCHAR(64) NOT NULL, ADD is_active TINYINT(1) NOT NULL, DROP name, CHANGE email email VARCHAR(254) NOT NULL, CHANGE points points INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE winkel CHANGE besch besch VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donatie CHANGE user_id user_id INT DEFAULT NULL, CHANGE winkel_id winkel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE foto foto VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regel CHANGE donatie_id donatie_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL, CHANGE aantal aantal INT DEFAULT NULL');
        $this->addSql('ALTER TABLE uitje CHANGE prijs prijs INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP username, DROP password, DROP is_active, CHANGE email email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE winkel CHANGE besch besch VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
