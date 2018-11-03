CREATE DATABASE dbusers;
USE dbusers;

CREATE TABLE users(
    id_user BIGINT UNSIGNED AUTO_INCREMENT,
    role VARCHAR(30),
    username VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
		name VARCHAR(50),
		surname VARCHAR(50),
		dni VARCHAR(50),
    id_facebook BIGINT,
		id_twitter BIGINT,
		id_google BIGINT,
		CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE,
		CONSTRAINT unq_dni UNIQUE (dni)
    CONSTRAINT pk_id_user PRIMARY KEY (id_user),
    CONSTRAINT uniq_username UNIQUE (username),
    CONSTRAINT uniq_email UNIQUE (email,username)
);

CREATE TABLE categories(
	id_category BIGINT UNSIGNED AUTO_INCREMENT,
	description VARCHAR(50),
	CONSTRAINT pk_id_category PRIMARY KEY (id_category)
);

CREATE TABLE events(
	id_event BIGINT UNSIGNED AUTO_INCREMENT,
	id_category BIGINT UNSIGNED,
	title VARCHAR(50) NOT NULL,
	CONSTRAINT pk_id_event PRIMARY KEY (id_event),
	CONSTRAINT fk_id_category FOREIGN KEY (id_category) REFERENCES categories(id_category) ON DELETE CASCADE
);

CREATE TABLE artists(
	id_artist BIGINT UNSIGNED AUTO_INCREMENT,
	nickname VARCHAR(50),
	name VARCHAR(50),
	surname VARCHAR(50),
	CONSTRAINT id_artist PRIMARY KEY (id_artist),
	CONSTRAINT nickname UNIQUE (nickname)
);

CREATE TABLE place_events(
	id_place_event BIGINT UNSIGNED AUTO_INCREMENT,
	capacity BIGINT NOT NULL,
	description VARCHAR(50),
	CONSTRAINT pk_id_place_event PRIMARY KEY (id_place_event)
);

CREATE TABLE type_areas(
	id_type_area BIGINT UNSIGNED AUTO_INCREMENT,
	description VARCHAR(50),
	CONSTRAINT pk_id_type_areas PRIMARY KEY (id_type_area)
);

CREATE TABLE calendars(
	id_calendar BIGINT UNSIGNED AUTO_INCREMENT,
	id_event BIGINT UNSIGNED,
	id_place_event BIGINT UNSIGNED,
	date_start DATE NOT NULL,
	date_end DATE NOT NULL,
	CONSTRAINT pk_id_calendar PRIMARY KEY (id_calendar),
	CONSTRAINT fk_id_event FOREIGN KEY (id_event) REFERENCES events(id_event) ON DELETE CASCADE,
	CONSTRAINT fk_id_place_event FOREIGN KEY (id_place_event) REFERENCES place_events(id_place_event) ON DELETE CASCADE
);

CREATE TABLE events_area(
	id_event_area BIGINT UNSIGNED AUTO_INCREMENT,
	id_type_area BIGINT UNSIGNED,
	id_calendar BIGINT UNSIGNED,
	quantity_avaliable INT UNSIGNED NOT NULL,
	price FLOAT UNSIGNED NOT NULL,
	remainder INT UNSIGNED NOT NULL,
	CONSTRAINT pk_id_event_area PRIMARY KEY (id_event_area),
	CONSTRAINT fk_id_type_area FOREIGN KEY (id_type_area) REFERENCES type_areas(id_type_area) ON DELETE CASCADE,
	CONSTRAINT fk_id_calendar FOREIGN KEY (id_calendar) REFERENCES calendars(id_calendar) ON DELETE CASCADE
);

CREATE TABLE calendars_x_artists(
	id_calendar_x_artist BIGINT UNSIGNED AUTO_INCREMENT,
	id_calendar BIGINT UNSIGNED,
	id_artist BIGINT UNSIGNED,
	CONSTRAINT pk_id_calendar_x_artist PRIMARY KEY (id_calendar_x_artist),
	CONSTRAINT fk_id_calendar_x_artist_calendar FOREIGN KEY (id_calendar) REFERENCES calendars(id_calendar) ON DELETE CASCADE,
	CONSTRAINT fk_id_calendar_x_artist_artist FOREIGN KEY (id_artist) REFERENCES artists (id_artist) ON DELETE CASCADE
);


CREATE TABLE purchases(
	id_purchase BIGINT UNSIGNED AUTO_INCREMENT,
	id_user BIGINT UNSIGNED,
	date_purchase DATE NOT NULL,
	CONSTRAINT pk_id_purchase PRIMARY KEY (id_purchase),
	CONSTRAINT fk_id_customer FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);

CREATE TABLE lines_purchases(
	id_line_purchase BIGINT UNSIGNED AUTO_INCREMENT,
	id_purchase BIGINT UNSIGNED,
	id_event_area BIGINT UNSIGNED,
	quantity INT,
	price INT,
	CONSTRAINT pk_id_line_purchase PRIMARY KEY (id_line_purchase),
	CONSTRAINT fk_id_purchase FOREIGN KEY (id_purchase) REFERENCES purchases (id_purchase) ON DELETE CASCADE,
	CONSTRAINT fk_id_area_event FOREIGN KEY (id_event_area) REFERENCES events_area(id_event_area) ON DELETE CASCADE
);

CREATE TABLE tickets(
	id_ticket_number BIGINT UNSIGNED AUTO_INCREMENT,
	id_line_purchase BIGINT UNSIGNED,
	code_qr VARCHAR(50) NOT NULL,
	CONSTRAINT pk_id_ticket PRIMARY KEY (id_ticket),
	CONSTRAINT uniq_code_qr UNIQUE (code_qr),
	CONSTRAINT fk_id_line_purchase FOREIGN KEY (id_line_purchase) REFERENCES lines_purchases (id_line_purchase) ON DELETE CASCADE
);
