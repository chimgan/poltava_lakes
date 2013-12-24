<?php

class m130923_122718_init extends CDbMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE `lakes` (
                id INT NOT NULL AUTO_INCREMENT,
                title VARCHAR(100) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB;
        ');
    }

    public function down()
    {
        $this->dropTable('lakes');
    }
}