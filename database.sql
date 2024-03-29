
CREATE TABLE car
(
  car_id      INT         NOT NULL AUTO_INCREMENT,
  category_id INT         NOT NULL DEFAULT FOREIGN,
  brand       VARCHAR(30) NOT NULL,
  model       VARCHAR(50) NOT NULL,
  PRIMARY KEY (car_id)
);

ALTER TABLE car
  ADD CONSTRAINT UQ_car_id UNIQUE (car_id);

CREATE TABLE category
(
  category_id INT         NOT NULL AUTO_INCREMENT,
  name        VARCHAR(30) NOT NULL,
  car_doors   INT         NOT NULL,
  car_boot    VARCHAR(30) NOT NULL,
  seats       INT         NOT NULL,
  PRIMARY KEY (category_id)
);

ALTER TABLE category
  ADD CONSTRAINT UQ_category_id UNIQUE (category_id);

CREATE TABLE city
(
  city_id   INT         NOT NULL AUTO_INCREMENT,
  city_name VARCHAR(30) NOT NULL,
  country   VARCHAR(30) NOT NULL,
  car_stock INT         NOT NULL,
  PRIMARY KEY (city_id)
);

ALTER TABLE city
  ADD CONSTRAINT UQ_city_id UNIQUE (city_id);

CREATE TABLE city_car
(
  city_car_id INT NOT NULL AUTO_INCREMENT,
  city_id     INT NOT NULL DEFAULT PRIMARY,
  car_id      INT NOT NULL DEFAULT PRIMARY,
  PRIMARY KEY (city_car_id)
);

ALTER TABLE city_car
  ADD CONSTRAINT UQ_city_car_id UNIQUE (city_car_id);

CREATE TABLE driver
(
  driver_id       INT         NOT NULL AUTO_INCREMENT,
  first_name      VARCHAR(30) NOT NULL,
  last_name       VARCHAR(50) NOT NULL,
  drivers_license VARCHAR(9)  NOT NULL,
  age             INT         NOT NULL,
  email           VARCHAR(50) NOT NULL,
  password        VARCHAR(60) NOT NULL,
  PRIMARY KEY (driver_id)
);

ALTER TABLE driver
  ADD CONSTRAINT UQ_driver_id UNIQUE (driver_id);

ALTER TABLE driver
  ADD CONSTRAINT UQ_drivers_license UNIQUE (drivers_license);

ALTER TABLE driver
  ADD CONSTRAINT UQ_email UNIQUE (email);

CREATE TABLE reservation
(
  reservation_id INT      NOT NULL AUTO_INCREMENT,
  start_date     DATETIME NOT NULL,
  end_date       DATETIME NOT NULL,
  driver_id      INT      NOT NULL DEFAULT FOREIGN,
  car_id         INT      NOT NULL DEFAULT FOREIGN,
  PRIMARY KEY (reservation_id)
);

ALTER TABLE reservation
  ADD CONSTRAINT UQ_reservation_id UNIQUE (reservation_id);

ALTER TABLE reservation
  ADD CONSTRAINT FK_driver_TO_reservation
    FOREIGN KEY (driver_id)
    REFERENCES driver (driver_id);

ALTER TABLE reservation
  ADD CONSTRAINT FK_car_TO_reservation
    FOREIGN KEY (car_id)
    REFERENCES car (car_id);

ALTER TABLE car
  ADD CONSTRAINT FK_category_TO_car
    FOREIGN KEY (category_id)
    REFERENCES category (category_id);

ALTER TABLE city_car
  ADD CONSTRAINT FK_city_TO_city_car
    FOREIGN KEY (city_id)
    REFERENCES city (city_id);

ALTER TABLE city_car
  ADD CONSTRAINT FK_car_TO_city_car
    FOREIGN KEY (car_id)
    REFERENCES car (car_id);
