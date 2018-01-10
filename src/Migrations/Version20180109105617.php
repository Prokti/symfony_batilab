<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180109105617 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact ADD nom_prenom VARCHAR(255) NOT NULL, ADD telephone_portable VARCHAR(255) NOT NULL, ADD telephone_bureau VARCHAR(255) NOT NULL, DROP prenom, DROP nom, DROP telephone');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact ADD prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, ADD nom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD telephone VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP nom_prenom, DROP telephone_portable, DROP telephone_bureau');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
    }
}
