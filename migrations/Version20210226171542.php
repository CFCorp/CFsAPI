<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226171542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_13045942F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, user_token VARCHAR(120) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', UNIQUE INDEX UNIQ_C2502824F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE baguette (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D765813BF47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dva (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F34F3550F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hentai (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C43E170FF47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hug (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_381B3AC2F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE neko (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EFA59842F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nsfwneko (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_267D3090F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trap (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BE8F7F33F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE yuri (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4C2E5839F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('DROP TABLE baguette');
        $this->addSql('DROP TABLE dva');
        $this->addSql('DROP TABLE hentai');
        $this->addSql('DROP TABLE hug');
        $this->addSql('DROP TABLE neko');
        $this->addSql('DROP TABLE nsfwneko');
        $this->addSql('DROP TABLE trap');
        $this->addSql('DROP TABLE yuri');
    }
}
