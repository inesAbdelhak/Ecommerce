<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305190845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse_user (id INT AUTO_INCREMENT NOT NULL, identifiant_user_id INT NOT NULL, type VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel VARCHAR(10) NOT NULL, adresse VARCHAR(100) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, INDEX IDX_7D95019FED558FA9 (identifiant_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, num_categorie VARCHAR(50) NOT NULL, description VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, identifiant_user_id INT NOT NULL, num_panier_id INT DEFAULT NULL, num_commande VARCHAR(50) NOT NULL, valide TINYINT(1) NOT NULL, date DATETIME NOT NULL, INDEX IDX_6EEAA67DED558FA9 (identifiant_user_id), UNIQUE INDEX UNIQ_6EEAA67D85A3E6A0 (num_panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, num_commande_id INT NOT NULL, num_produit_id INT DEFAULT NULL, quantite VARCHAR(50) NOT NULL, INDEX IDX_3170B74BF80F63BC (num_commande_id), INDEX IDX_3170B74B80233E70 (num_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_panier (id INT AUTO_INCREMENT NOT NULL, num_produit_id INT NOT NULL, num_panier_id INT DEFAULT NULL, quantite VARCHAR(50) NOT NULL, INDEX IDX_21691B480233E70 (num_produit_id), INDEX IDX_21691B485A3E6A0 (num_panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, num_produit_id INT DEFAULT NULL, num_categorie_id INT DEFAULT NULL, type VARCHAR(50) NOT NULL, lien VARCHAR(100) NOT NULL, alt VARCHAR(50) NOT NULL, INDEX IDX_6A2CA10C80233E70 (num_produit_id), INDEX IDX_6A2CA10C125E682A (num_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, identifiant_user_id INT DEFAULT NULL, num_panier VARCHAR(50) NOT NULL, INDEX IDX_24CC0DF2ED558FA9 (identifiant_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, num_categorie_id INT NOT NULL, num_produit VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, couleur VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, taille VARCHAR(50) NOT NULL, prix INT NOT NULL, disponible TINYINT(1) NOT NULL, INDEX IDX_29A5EC27125E682A (num_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, identifiant_user VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, tel VARCHAR(10) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse_user ADD CONSTRAINT FK_7D95019FED558FA9 FOREIGN KEY (identifiant_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DED558FA9 FOREIGN KEY (identifiant_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D85A3E6A0 FOREIGN KEY (num_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BF80F63BC FOREIGN KEY (num_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B80233E70 FOREIGN KEY (num_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_panier ADD CONSTRAINT FK_21691B480233E70 FOREIGN KEY (num_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_panier ADD CONSTRAINT FK_21691B485A3E6A0 FOREIGN KEY (num_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C80233E70 FOREIGN KEY (num_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C125E682A FOREIGN KEY (num_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2ED558FA9 FOREIGN KEY (identifiant_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27125E682A FOREIGN KEY (num_categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_user DROP FOREIGN KEY FK_7D95019FED558FA9');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DED558FA9');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D85A3E6A0');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BF80F63BC');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B80233E70');
        $this->addSql('ALTER TABLE ligne_panier DROP FOREIGN KEY FK_21691B480233E70');
        $this->addSql('ALTER TABLE ligne_panier DROP FOREIGN KEY FK_21691B485A3E6A0');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C80233E70');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C125E682A');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2ED558FA9');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27125E682A');
        $this->addSql('DROP TABLE adresse_user');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE ligne_panier');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
    }
}
