<?php

class m130923_122718_init extends CDbMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE `region` (
                id INT NOT NULL AUTO_INCREMENT,
                root_id INT NULL,
                title VARCHAR(100) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB;
        ');

        $this->execute('
            CREATE TABLE `water_object` (
                id INT NOT NULL AUTO_INCREMENT,
                title VARCHAR(100) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB;
        ');

        $this->execute('
            CREATE TABLE `lake` (
                id INT NOT NULL AUTO_INCREMENT,
                water_object_id INT NULL,
                region_id INT NULL,
                title VARCHAR(255) NOT NULL,
                description text NULL,
                `lat` VARCHAR(100) NULL,
                `long` VARCHAR(100) NULL,
                `area` VARCHAR(100) NULL,
                `rent` TINYINT(1) NULL,
                create_date TIMESTAMP NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (region_id) REFERENCES `region`(id) ON DELETE CASCADE,
                FOREIGN KEY (water_object_id) REFERENCES `water_object`(id) ON DELETE CASCADE
            ) ENGINE=InnoDB;
        ');

        $this->execute('
            CREATE TABLE `photo` (
                id INT NOT NULL AUTO_INCREMENT,
                `lake_id` INT NOT NULL,
                source VARCHAR(100) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (`lake_id`) REFERENCES `lake`(id) ON DELETE CASCADE
            ) ENGINE=InnoDB;
        ');
        $this->execute('CREATE INDEX `photo_lake_id_index` ON `photo`(`lake_id`)');

    }

    public function down()
    {
        $this->dropTable('photo');
        $this->dropTable('lake');
        $this->dropTable('region');
        $this->dropTable('water_object');
    }
}