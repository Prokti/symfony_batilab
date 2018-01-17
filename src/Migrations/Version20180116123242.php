<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180116123242 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE house_product (id INT AUTO_INCREMENT NOT NULL, house_id INT NOT NULL, produt_id INT NOT NULL, quantity NUMERIC(10, 2) NOT NULL, INDEX IDX_479D82B06BB74515 (house_id), INDEX IDX_479D82B05A2B7480 (produt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE house_product ADD CONSTRAINT FK_479D82B06BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
        $this->addSql('ALTER TABLE house_product ADD CONSTRAINT FK_479D82B05A2B7480 FOREIGN KEY (produt_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE contact CHANGE contact_type_id contact_type_id INT DEFAULT NULL, CHANGE societe societe VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone_portable telephone_portable VARCHAR(255) DEFAULT NULL, CHANGE telephone_bureau telephone_bureau VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE house CHANGE long_ext long_ext DOUBLE PRECISION DEFAULT NULL, CHANGE larg_ext larg_ext DOUBLE PRECISION DEFAULT NULL, CHANGE surface_hab surface_hab DOUBLE PRECISION DEFAULT NULL, CHANGE surface_annexe surface_annexe DOUBLE PRECISION DEFAULT NULL, CHANGE nbr_chambre nbr_chambre INT DEFAULT NULL, CHANGE nbr_sdb nbr_sdb INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE house_product');
        $this->addSql('ALTER TABLE contact CHANGE contact_type_id contact_type_id INT DEFAULT NULL, CHANGE societe societe VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE prenom prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE telephone_portable telephone_portable VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE telephone_bureau telephone_bureau VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE house CHANGE long_ext long_ext DOUBLE PRECISION DEFAULT \'NULL\', CHANGE larg_ext larg_ext DOUBLE PRECISION DEFAULT \'NULL\', CHANGE surface_hab surface_hab DOUBLE PRECISION DEFAULT \'NULL\', CHANGE surface_annexe surface_annexe DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nbr_chambre nbr_chambre INT DEFAULT NULL, CHANGE nbr_sdb nbr_sdb INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE category_id category_id INT DEFAULT NULL');
    }
}
