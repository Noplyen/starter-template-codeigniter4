INSERT INTO roles(name) VALUES ('ADMIN'),('USER');

INSERT INTO privileges(name)
VALUES ('ADMIN_READ'),
       ('ADMIN_CREATE'),
       ('ADMIN_UPDATE'),
       ('ADMIN_DELETE'),
       ('USER');

INSERT INTO role_privileges(role_id, privilege_id)
VALUES (1,1),(1,2),(1,3),(1,4),(2,5);

# all password is `haslam`
INSERT INTO users(id,password,email,suspend,role_id)
VALUES
    ('yi232-sd1s21-13as21','$2y$10$4RznFz9IdUO8fkbP1bDfKObwGYno2.3cSGL35YbNk/PMQfvL/Sg9S',
     'admin@gmail.com',false,1),
    ('7sad2-56sd22-23s333','$2y$10$4RznFz9IdUO8fkbP1bDfKObwGYno2.3cSGL35YbNk/PMQfvL/Sg9S',
     'user@gmail.com',false,2);