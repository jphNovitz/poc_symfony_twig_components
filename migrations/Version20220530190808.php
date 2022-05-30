<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220530190808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D27D0F6B933FE08C');
        $this->addSql('DROP INDEX IDX_D27D0F6B4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredient_product AS SELECT ingredient_id, product_id FROM ingredient_product');
        $this->addSql('DROP TABLE ingredient_product');
        $this->addSql('CREATE TABLE ingredient_product (ingredient_id INTEGER NOT NULL, product_id INTEGER NOT NULL, PRIMARY KEY(ingredient_id, product_id), CONSTRAINT FK_D27D0F6B933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D27D0F6B4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ingredient_product (ingredient_id, product_id) SELECT ingredient_id, product_id FROM __temp__ingredient_product');
        $this->addSql('DROP TABLE __temp__ingredient_product');
        $this->addSql('CREATE INDEX IDX_D27D0F6B933FE08C ON ingredient_product (ingredient_id)');
        $this->addSql('CREATE INDEX IDX_D27D0F6B4584665A ON ingredient_product (product_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, comment FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, comment VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO product (id, name, comment) SELECT id, name, comment FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D27D0F6B933FE08C');
        $this->addSql('DROP INDEX IDX_D27D0F6B4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredient_product AS SELECT ingredient_id, product_id FROM ingredient_product');
        $this->addSql('DROP TABLE ingredient_product');
        $this->addSql('CREATE TABLE ingredient_product (ingredient_id INTEGER NOT NULL, product_id INTEGER NOT NULL, PRIMARY KEY(ingredient_id, product_id))');
        $this->addSql('INSERT INTO ingredient_product (ingredient_id, product_id) SELECT ingredient_id, product_id FROM __temp__ingredient_product');
        $this->addSql('DROP TABLE __temp__ingredient_product');
        $this->addSql('CREATE INDEX IDX_D27D0F6B933FE08C ON ingredient_product (ingredient_id)');
        $this->addSql('CREATE INDEX IDX_D27D0F6B4584665A ON ingredient_product (product_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, comment FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, comment VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO product (id, name, comment) SELECT id, name, comment FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }
}
