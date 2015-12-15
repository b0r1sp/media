<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add constraint to thumbnail table to prevent duplicates.
 */
class Version20151118143756 extends AbstractMigration
{
    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

        $this->addSql("CREATE UNIQUE INDEX UNIQ_B7CE141455FF41717F7CBA1A ON typo3_media_domain_model_thumbnail (originalasset, configurationhash)");
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

        $this->addSql("DROP INDEX UNIQ_B7CE141455FF41717F7CBA1A ON typo3_media_domain_model_thumbnail");
    }
}
