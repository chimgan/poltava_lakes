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

        $this->execute("
            INSERT INTO `region` (`id`, `root_id`, `title`, `create_date`)
            VALUES (1,  NULL, 'Великобагачанский район', CURRENT_TIMESTAMP),
                   (2,  NULL, 'Гадячский район',         CURRENT_TIMESTAMP),
                   (3,  NULL, 'Глобинский район',        CURRENT_TIMESTAMP),
                   (4,  NULL, 'Гребёнковский район',     CURRENT_TIMESTAMP),
                   (5,  NULL, 'Диканьский район',        CURRENT_TIMESTAMP),
                   (6,  NULL, 'Зеньковский район',       CURRENT_TIMESTAMP),
                   (7,  NULL, 'Карловский район',        CURRENT_TIMESTAMP),
                   (8,  NULL, 'Кобелякский район',       CURRENT_TIMESTAMP),
                   (9,  NULL, 'Козельщинский район',     CURRENT_TIMESTAMP),
                   (10, NULL, 'Котелевский район',       CURRENT_TIMESTAMP),
                   (11, NULL, 'Кременчугский район',     CURRENT_TIMESTAMP),
                   (12, NULL, 'Лохвицкий район',         CURRENT_TIMESTAMP),
                   (13, NULL, 'Лубенский район',         CURRENT_TIMESTAMP),
                   (14, NULL, 'Машевский район',         CURRENT_TIMESTAMP),
                   (15, NULL, 'Миргородский район',      CURRENT_TIMESTAMP),
                   (16, NULL, 'Новосанжарский район',    CURRENT_TIMESTAMP),
                   (17, NULL, 'Оржицкий район',          CURRENT_TIMESTAMP),
                   (18, NULL, 'Пирятинский район',       CURRENT_TIMESTAMP),
                   (19, NULL, 'Полтавский район',        CURRENT_TIMESTAMP),
                   (20, NULL, 'Решетиловский район',     CURRENT_TIMESTAMP),
                   (21, NULL, 'Семёновский район',       CURRENT_TIMESTAMP),
                   (22, NULL, 'Хорольский район',        CURRENT_TIMESTAMP),
                   (23, NULL, 'Чернухинский район',      CURRENT_TIMESTAMP),
                   (24, NULL, 'Чутовский район',         CURRENT_TIMESTAMP),
                   (25, NULL, 'Шишацкий район',          CURRENT_TIMESTAMP);
        ");

        $this->execute('
            CREATE TABLE `water_object` (
                id INT NOT NULL AUTO_INCREMENT,
                title VARCHAR(100) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB;
        ');

        $this->execute("
            INSERT INTO `region` (`id`, `title`, `create_date`)
            VALUES (1, 'Водохранилище', CURRENT_TIMESTAMP),
                   (2, 'Источник',      CURRENT_TIMESTAMP),
                   (3, 'Озеро',         CURRENT_TIMESTAMP),
                   (4, 'Река',          CURRENT_TIMESTAMP);
        ");

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