CREATE TABLE users(
                      id varchar(19) PRIMARY KEY,
                      email varchar(60) NOT NULL UNIQUE,
                      password varchar(255) NOT NULL,
                      suspend boolean default  false,
                      role_id tinyint,
                      FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE = INNODB;