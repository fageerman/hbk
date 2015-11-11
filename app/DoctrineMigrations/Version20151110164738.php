<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151110164738 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
//
//        $this->addSql('CREATE TABLE redstar_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(60) NOT NULL, is_active TINYINT(1) NOT NULL, salt VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_7DDE545CF85E0677 (username), UNIQUE INDEX UNIQ_7DDE545CE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), INDEX IDX_2DE8C6A3D60322AC (role_id), PRIMARY KEY(user_id, role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE redstar_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, role VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_C5AC1F957698A6A (role), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE tblrole_collection (id INT UNSIGNED AUTO_INCREMENT NOT NULL, role VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE tblrole_collection_roles (id INT UNSIGNED AUTO_INCREMENT NOT NULL, role_collection_id INT DEFAULT NULL, role_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE tblroles (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, entity VARCHAR(45) DEFAULT NULL, operation VARCHAR(45) DEFAULT NULL, uri VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
       // $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES redstar_users (id) ON DELETE CASCADE');
     //   $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES redstar_role (id) ON DELETE CASCADE');
       
        $this->addSql('ALTER TABLE tblusers ADD role_collection_id INT DEFAULT NULL');
        
      
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3A76ED395');
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3D60322AC');
        $this->addSql('CREATE TABLE tblbatch (GUID VARCHAR(40) NOT NULL COLLATE utf8_general_ci, RegisterGUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, Batchnr INT DEFAULT NULL, Reference VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, Batchdate DATETIME DEFAULT NULL, BOD DOUBLE PRECISION DEFAULT NULL, EOD DOUBLE PRECISION DEFAULT NULL, Transactions INT DEFAULT 0, Notes LONGTEXT DEFAULT NULL COLLATE utf8_general_ci, Closed TINYINT(1) DEFAULT \'b\'0\'\', ClosesDateTime DATETIME DEFAULT NULL, Canceled TINYINT(1) DEFAULT \'b\'0\'\', InsertUser VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, TimeStamp DATETIME DEFAULT CURRENT_TIMESTAMP, UserActionDate DATETIME DEFAULT NULL, UserName VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, Locked VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, LockedDate DATETIME DEFAULT NULL, LockedUserID VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, LockedUserName VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, INDEX $Register (RegisterGUID), INDEX $BachNR (Batchnr), INDEX $Reference (Reference), INDEX $Date (Batchdate), PRIMARY KEY(GUID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tblpaymentsbatch (ID INT AUTO_INCREMENT NOT NULL, CustomerID INT DEFAULT NULL, CustomerGUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, Customer VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, Address VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, DateTransaction DATETIME DEFAULT NULL, Note VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, InvoiceNr INT DEFAULT NULL, Amount DOUBLE PRECISION DEFAULT NULL, Verified TINYINT(1) DEFAULT \'b\'0\'\', Skip TINYINT(1) DEFAULT \'b\'0\'\', Executed TINYINT(1) DEFAULT \'b\'0\'\', Contracts INT DEFAULT NULL, Message VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tblregisters (GUID VARCHAR(40) NOT NULL COLLATE utf8_general_ci, Register VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, ChangeDate TINYINT(1) DEFAULT \'b\'0\'\', Members INT DEFAULT NULL, Description VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, Memo LONGTEXT DEFAULT NULL COLLATE utf8_general_ci, NotActive TINYINT(1) DEFAULT \'b\'0\'\', InsertUser VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, TimeStamp DATETIME DEFAULT CURRENT_TIMESTAMP, UserActionDate DATETIME DEFAULT NULL, UserName VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, locked VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, LockedDate DATETIME DEFAULT NULL, LockedUserID VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, LockedUserName VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(GUID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbltaskemails (GUID VARCHAR(40) NOT NULL COLLATE utf8_general_ci, TaskGUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, User VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, Email VARCHAR(255) DEFAULT NULL COLLATE utf8_general_ci, SendType VARCHAR(10) DEFAULT NULL COLLATE utf8_general_ci, Notes LONGTEXT DEFAULT NULL COLLATE utf8_general_ci, InsertUser VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, TimeStamp DATETIME DEFAULT CURRENT_TIMESTAMP, UserAction VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, UserActionDate DATETIME DEFAULT NULL, Locked VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, LockedDate DATETIME DEFAULT NULL, LockedUserID VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, LockedUserName VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, NotActive TINYINT(1) DEFAULT \'b\'0\'\', INDEX Task (TaskGUID), PRIMARY KEY(GUID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE redstar_users');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('DROP TABLE redstar_role');
        $this->addSql('DROP TABLE tblrole_collection');
        $this->addSql('DROP TABLE tblrole_collection_roles');
        $this->addSql('DROP TABLE tblroles');
        $this->addSql('ALTER TABLE tbladdresses DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tbladdresses ADD InsertUser VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, CHANGE GUID GUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, CHANGE AddressID AddressID INT AUTO_INCREMENT NOT NULL, CHANGE IsNotCompleted IsNotCompleted TINYINT(1) DEFAULT \'0\'');
        $this->addSql('CREATE INDEX $GUID ON tbladdresses (GUID)');
        $this->addSql('ALTER TABLE tbladdresses ADD PRIMARY KEY (AddressID)');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX address TO $Address');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX streetname TO $StreetName');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX streetnameid TO $StreetNameID');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX shortname TO $ShortName');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX clasification TO $Clasification');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX addressnr TO $AddressNr');
        $this->addSql('ALTER TABLE tbladdresses RENAME INDEX addressletter TO $AddressLetter');
        $this->addSql('ALTER TABLE tblbatchprint CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcompanies CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcomplaints CHANGE GUID GUID VARCHAR(40) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcomputerlocations CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcomputerlocations RENAME INDEX loacationguid TO $LoacationGUID');
        $this->addSql('ALTER TABLE tblcomputerlocations RENAME INDEX computer TO $Computer');
        $this->addSql('ALTER TABLE tblcontacts CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcontainers CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcontracts ADD AddressChange LONGTEXT DEFAULT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX address TO $Address');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX customerno TO $CustomerNo');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX firstname TO $FirstName');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX name TO $Name');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX statusid TO $StatusID');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX dob TO $DOB');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX customerguid TO $CustomerGUID');
        $this->addSql('ALTER TABLE tblcustomers RENAME INDEX addressid TO $AddressID');
        $this->addSql('ALTER TABLE tblformssecurity RENAME INDEX form TO $Form');
        $this->addSql('ALTER TABLE tblformssecurity RENAME INDEX control TO $Control');
        $this->addSql('ALTER TABLE tblformssecurity RENAME INDEX username TO $Username');
        $this->addSql('ALTER TABLE tblformssecurity RENAME INDEX role TO $Role');
        $this->addSql('ALTER TABLE tblinvoicedetails MODIFY InvoiceDetailsID INT NOT NULL');
        $this->addSql('ALTER TABLE tblinvoicedetails DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tblinvoicedetails ADD GUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, ADD InvoiceGUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, CHANGE invoicedetailsid ID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE tblinvoicedetails ADD PRIMARY KEY (ID)');
        $this->addSql('ALTER TABLE tblinvoices CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX customerguid TO $CustomerGUID');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX date TO $Date');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX duedate TO $DueDate');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX paymentmethod TO $PaymentMethod');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX printed TO $Printed');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX period TO $Period');
        $this->addSql('ALTER TABLE tblinvoices RENAME INDEX contractid TO $ContractID');
        $this->addSql('ALTER TABLE tblmaterials CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblpaymentdetails CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblpaymentdetails RENAME INDEX paymentguid TO $PaymentGUID');
        $this->addSql('ALTER TABLE tblpaymentdetails RENAME INDEX invoiceguid TO $InvoiceGUID');
        $this->addSql('ALTER TABLE tblpaymentmethodsallowed CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblpaymentmethodsallowed RENAME INDEX paymentmethod TO $Paymentmethod');
        $this->addSql('ALTER TABLE tblpaymentmethodsallowed RENAME INDEX role TO $Role');
        $this->addSql('ALTER TABLE tblpayments CHANGE AuthNr AuthNr VARCHAR(10) DEFAULT NULL COLLATE utf8_general_ci, CHANGE NotActive NotActive TINYINT(1) DEFAULT \'b\'0\'\'');
        $this->addSql('ALTER TABLE tblpayments RENAME INDEX paymentdate TO $PaymentDate');
        $this->addSql('ALTER TABLE tblpayments RENAME INDEX customerguid TO $CustomerGUID');
        $this->addSql('ALTER TABLE tblpayments RENAME INDEX loactionguid TO $LoactionGUID');
        $this->addSql('ALTER TABLE tblpayments RENAME INDEX insertuser TO $InsertUser');
        $this->addSql('ALTER TABLE tblpayments RENAME INDEX paymentid TO $PaymentID');
        $this->addSql('ALTER TABLE tblproductbracket CHANGE GUID GUID VARCHAR(40) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblproducts CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblproducts RENAME INDEX product TO $Product');
        $this->addSql('ALTER TABLE tblreceiptitems CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblreceipts CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tblsidemenuprocs CHANGE ProcID ProcID INT NOT NULL');
        $this->addSql('ALTER TABLE tblsources CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE tbltickets DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tbltickets CHANGE TicketID TicketID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE tbltickets ADD PRIMARY KEY (TicketID, GUID)');
        $this->addSql('ALTER TABLE tbltickets RENAME INDEX ticketdate TO $TicketDate');
        $this->addSql('ALTER TABLE tbltickets RENAME INDEX vehicle TO $Vehicle');
        $this->addSql('ALTER TABLE tbltickets RENAME INDEX company TO $Company');
        $this->addSql('ALTER TABLE tbltickets RENAME INDEX material TO $Material');
        $this->addSql('ALTER TABLE tbltickets RENAME INDEX container TO $Container');
        $this->addSql('ALTER TABLE tbltickets RENAME INDEX source TO $Source');
        $this->addSql('ALTER TABLE tblusers ADD RegisterGUID VARCHAR(40) DEFAULT NULL COLLATE utf8_general_ci, ADD InsertUser VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, ADD UserAction VARCHAR(150) DEFAULT NULL COLLATE utf8_general_ci, DROP role_collection_id');
        $this->addSql('CREATE INDEX $Role ON tblusers (userAccessLevel)');
        $this->addSql('CREATE INDEX $Register ON tblusers (RegisterGUID)');
        $this->addSql('ALTER TABLE tblvehicles CHANGE GUID GUID VARCHAR(40) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci');
    }
}
