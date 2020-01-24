<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123211313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE donatie (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, winkel_id INT DEFAULT NULL, INDEX IDX_64B0D6F8A76ED395 (user_id), INDEX IDX_64B0D6F8BDF765A7 (winkel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, besch VARCHAR(255) NOT NULL, foto VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regel (id INT AUTO_INCREMENT NOT NULL, donatie_id INT DEFAULT NULL, product_id INT DEFAULT NULL, aantal INT DEFAULT NULL, INDEX IDX_58DE2CB7C1953629 (donatie_id), INDEX IDX_58DE2CB74584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uitje (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, besch VARCHAR(255) NOT NULL, email VARCHAR(30) NOT NULL, prijs INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(254) NOT NULL, tel INT NOT NULL, is_active TINYINT(1) NOT NULL, points INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE winkel (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, besch VARCHAR(255) DEFAULT NULL, email VARCHAR(30) NOT NULL, adress VARCHAR(20) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donatie ADD CONSTRAINT FK_64B0D6F8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE donatie ADD CONSTRAINT FK_64B0D6F8BDF765A7 FOREIGN KEY (winkel_id) REFERENCES winkel (id)');
        $this->addSql('ALTER TABLE regel ADD CONSTRAINT FK_58DE2CB7C1953629 FOREIGN KEY (donatie_id) REFERENCES donatie (id)');
        $this->addSql('ALTER TABLE regel ADD CONSTRAINT FK_58DE2CB74584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE regel DROP FOREIGN KEY FK_58DE2CB7C1953629');
        $this->addSql('ALTER TABLE regel DROP FOREIGN KEY FK_58DE2CB74584665A');
        $this->addSql('ALTER TABLE donatie DROP FOREIGN KEY FK_64B0D6F8A76ED395');
        $this->addSql('ALTER TABLE donatie DROP FOREIGN KEY FK_64B0D6F8BDF765A7');
        $this->addSql('DROP TABLE donatie');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE regel');
        $this->addSql('DROP TABLE uitje');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE winkel');
    }
}
