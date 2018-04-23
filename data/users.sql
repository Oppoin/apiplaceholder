CREATE TABLE users (
    `id` INT,
    `name` VARCHAR(24) CHARACTER SET utf8,
    `username` VARCHAR(16) CHARACTER SET utf8,
    `email` VARCHAR(25) CHARACTER SET utf8,
    `address_street` VARCHAR(17) CHARACTER SET utf8,
    `address_suite` VARCHAR(9) CHARACTER SET utf8,
    `address_city` VARCHAR(14) CHARACTER SET utf8,
    `address_zipcode` VARCHAR(10) CHARACTER SET utf8,
    `address_geo_lat` NUMERIC(6, 4),
    `address_geo_lng` NUMERIC(7, 4),
    `phone` VARCHAR(21) CHARACTER SET utf8,
    `website` VARCHAR(13) CHARACTER SET utf8,
    `company_name` VARCHAR(18) CHARACTER SET utf8,
    `company_catchPhrase` VARCHAR(40) CHARACTER SET utf8,
    `company_bs` VARCHAR(36) CHARACTER SET utf8
);

INSERT INTO users VALUES (1,'Leanne Graham','Bret','Sincere@april.biz','Kulas Light','Apt. 556','Gwenborough','92998-3874',-37.3159,81.1496,'1-770-736-8031 x56442','hildegard.org','Romaguera-Crona','Multi-layered client-server neural-net','harness real-time e-markets');
INSERT INTO users VALUES (2,'Ervin Howell','Antonette','Shanna@melissa.tv','Victor Plains','Suite 879','Wisokyburgh','90566-7771',-43.9509,-34.4618,'010-692-6593 x09125','anastasia.net','Deckow-Crist','Proactive didactic contingency','synergize scalable supply-chains');
INSERT INTO users VALUES (3,'Clementine Bauch','Samantha','Nathan@yesenia.net','Douglas Extension','Suite 847','McKenziehaven','59590-4157',-68.6102,-47.0653,'1-463-123-4447','ramiro.info','Romaguera-Jacobson','Face to face bifurcated interface','e-enable strategic applications');
INSERT INTO users VALUES (4,'Patricia Lebsack','Karianne','Julianne.OConner@kory.org','Hoeger Mall','Apt. 692','South Elvis','53919-4257',29.4572,-164.2990,'493-170-9623 x156','kale.biz','Robel-Corkery','Multi-tiered zero tolerance productivity','transition cutting-edge web services');
INSERT INTO users VALUES (5,'Chelsey Dietrich','Kamren','Lucio_Hettinger@annie.ca','Skiles Walks','Suite 351','Roscoeview','33263',-31.8129,62.5342,'(254)954-1289','demarco.info','Keebler LLC','User-centric fault-tolerant solution','revolutionize end-to-end systems');
INSERT INTO users VALUES (6,'Mrs. Dennis Schulist','Leopoldo_Corkery','Karley_Dach@jasper.info','Norberto Crossing','Apt. 950','South Christy','23505-1337',-71.4197,71.7478,'1-477-935-8478 x6430','ola.org','Considine-Lockman','Synchronised bottom-line interface','e-enable innovative applications');
INSERT INTO users VALUES (7,'Kurtis Weissnat','Elwyn.Skiles','Telly.Hoeger@billy.biz','Rex Trail','Suite 280','Howemouth','58804-1099',24.8918,21.8984,'210.067.6132','elvis.io','Johns Group','Configurable multimedia task-force','generate enterprise e-tailers');
INSERT INTO users VALUES (8,'Nicholas Runolfsdottir V','Maxime_Nienow','Sherwood@rosamond.me','Ellsworth Summit','Suite 729','Aliyaview','45169',-14.3990,-120.7677,'586.493.6943 x140','jacynthe.com','Abernathy Group','Implemented secondary concept','e-enable extensible e-tailers');
INSERT INTO users VALUES (9,'Glenna Reichert','Delphine','Chaim_McDermott@dana.io','Dayna Park','Suite 449','Bartholomebury','76495-3109',24.6463,-168.8889,'(775)976-6794 x41206','conrad.com','Yost and Sons','Switchable contextually-based project','aggregate real-time technologies');
INSERT INTO users VALUES (10,'Clementina DuBuque','Moriah.Stanton','Rey.Padberg@karina.biz','Kattie Turnpike','Suite 198','Lebsackbury','31428-2261',-38.2386,57.2232,'024-648-3804','ambrose.net','Hoeger LLC','Centralized empowering task-force','target end-to-end models');
