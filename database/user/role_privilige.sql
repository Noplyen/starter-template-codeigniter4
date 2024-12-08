CREATE TABLE role_privileges(
                                role_id tinyint,
                                privilege_id tinyint,
                                FOREIGN KEY (role_id) references roles(id) ON UPDATE CASCADE ON DELETE CASCADE,
                                FOREIGN KEY (privilege_id) references privileges(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB;