<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180114083714 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact CHANGE contact_type_id contact_type_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone_portable telephone_portable VARCHAR(255) DEFAULT NULL, CHANGE telephone_bureau telephone_bureau VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE house ADD larg_ext DOUBLE PRECISION DEFAULT NULL, ADD surface_hab DOUBLE PRECISION DEFAULT NULL, ADD surface_annexe DOUBLE PRECISION DEFAULT NULL, ADD nbr_chambre INT DEFAULT NULL, ADD nbr_sdb INT DEFAULT NULL, CHANGE long_ext long_ext DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact CHANGE contact_type_id contact_type_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE telephone_portable telephone_portable VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE telephone_bureau telephone_bureau VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE house DROP larg_ext, DROP surface_hab, DROP surface_annexe, DROP nbr_chambre, DROP nbr_sdb, CHANGE long_ext long_ext DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
    }
}
