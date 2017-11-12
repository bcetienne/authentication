START TRANSACTION;

DROP DATABASE IF EXISTS authentication;
CREATE DATABASE authentication;
USE authentication;

DROP TABLE IF EXISTS users, profiles, genders, cities, skills, educations;

CREATE TABLE IF NOT EXISTS users
(
  userId INT UNSIGNED AUTO_INCREMENT,
  userName VARCHAR(30),
  userSurname VARCHAR(50),
  cityId INT UNSIGNED,
  userMail VARCHAR(255),
  userPassword CHAR(32),
  CONSTRAINT PK_user PRIMARY KEY (userId)
) ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS profiles
(
  profileId INT UNSIGNED AUTO_INCREMENT,
  userId INT UNSIGNED,
  profileBio TEXT,
  profileDriverLicence BOOLEAN,
  genderId TINYINT(2) UNSIGNED,
  CONSTRAINT PK_profile PRIMARY KEY (profileId)
) ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS genders
(
  genderId TINYINT(2) UNSIGNED AUTO_INCREMENT,
  genderName VARCHAR(10),
  CONSTRAINT PK_gender PRIMARY KEY (genderId)
) ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS cities
(
  cityId INT UNSIGNED AUTO_INCREMENT,
  cityName TEXT,
  CONSTRAINT PK_city PRIMARY KEY (cityId)
) ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS skills
(
  skillId INT UNSIGNED AUTO_INCREMENT,
  skillName TEXT,
  skillLabel TEXT,
  skillLevel TEXT,
  userId INT UNSIGNED,
  CONSTRAINT PK_skill PRIMARY KEY (skillId)
) ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS educations
(
  educationId INT UNSIGNED AUTO_INCREMENT,
  educationBegin TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  educationEnded DATE DEFAULT NULL,
  educationTitle VARCHAR(255),
  educationDescription TEXT,
  userId INT UNSIGNED,
  CONSTRAINT PK_education PRIMARY KEY (educationId)
) ENGINE=InnoDB CHARSET=UTF8;

-- Foreign keys
ALTER TABLE users ADD CONSTRAINT FK_usersCities FOREIGN KEY (cityId) REFERENCES cities(cityId);
ALTER TABLE skills ADD CONSTRAINT FK_skillsUsers FOREIGN KEY (userId) REFERENCES users(userId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE profiles ADD CONSTRAINT FK_profilesUsers FOREIGN KEY (userId) REFERENCES users(userId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE profiles ADD CONSTRAINT FK_profilesGenders FOREIGN KEY (genderId) REFERENCES genders(genderId);
ALTER TABLE educations ADD CONSTRAINT FK_educationsUsers FOREIGN KEY (userId) REFERENCES users(userId) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO cities (cityId, cityName) VALUES
  (NULL, 'Lyon'),
  (NULL, 'Paris'),
  (NULL, 'Grenoble'),
  (NULL, 'Bordeaux'),
  (NULL, 'Toulouse'),
  (NULL, 'Dijon'),
  (NULL, 'Troyes');

INSERT INTO genders (genderId, genderName) VALUES
  (NULL, 'Homme'),
  (NULL, 'Femme');

INSERT INTO users (userId, userName, userSurname, cityId, userMail, userPassword) VALUES
  (NULL, 'admin', NULL, 1, 'admin@admin.com', 'c24d4b196b4c3d1f3cba4aa3ec4ff589'), -- Password = 0000
  (NULL, 'user', 'user', 1, 'user@mail.com', 'c24d4b196b4c3d1f3cba4aa3ec4ff589');

INSERT INTO educations (educationId, educationBegin, educationEnded, educationTitle, educationDescription, userId) VALUES
  (NULL, '2012-07-05 08:00:00', '2015-06-10 17:30:00', 'BAC pro SEN', 'Réseaux, télécommunications', 2),
  (NULL, CURRENT_TIMESTAMP, NULL, 'BTS SIO', 'Développement web et logiciel', 2);

INSERT INTO skills (skillId, skillName, skillLabel, skillLevel, userId) VALUES
  (NULL, 'HTML', 'Balises, formulaires etc...', 'Moyen', 2),
  (NULL, 'CSS', 'Mise en page, changement de couleurs et de formes', 'Avancé', 2),
  (NULL, 'Javascript', 'Utilisation du DOM', 'Débutant', 2);

INSERT INTO profiles (profileId, userId, profileBio, profileDriverLicence, genderId) VALUE
  (NULL, 2, 'Déveoppeur et professionnel en logistique', TRUE, 1);

COMMIT;
