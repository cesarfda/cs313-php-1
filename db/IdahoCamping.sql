

CREATE TABLE member
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE camp_site
(
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
    image VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    creation_date TIMESTAMP NOT NULL,
    author INT NOT NULL REFERENCES member(id)
);