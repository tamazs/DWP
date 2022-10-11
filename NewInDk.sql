DROP DATABASE IF EXISTS NewInDkDB;
CREATE DATABASE NewInDkDB;
USE NewInDkDB;

CREATE TABLE `Role` (
    roleID int(2) NOT NULL PRIMARY KEY
);

CREATE TABLE `Location` (
    postalCode int(4) NOT NULL PRIMARY KEY,
    city varchar(50) NOT NULL
);

CREATE TABLE `Type` (
    typeID int(4) NOT NULL PRIMARY KEY
);

CREATE TABLE Media (
    mediaID int AUTO_INCREMENT NOT NULL PRIMARY KEY
);

CREATE TABLE `User` (
    userID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    gender int(2) NOT NULL,
    birthDate DATE NOT NULL,
    userName varchar(20) NOT NULL,
    email varchar(100) NOT NULL,
    `password` varchar(60) NOT NULL,
    profilePic BLOB NOT NULL,
    roleID int(2) NOT NULL,
    FOREIGN KEY (roleID) REFERENCES Role (roleID),
    postalCode int(4) NOT NULL,
    FOREIGN KEY (postalCode) REFERENCES Location (postalCode),
    `description` varchar(255) NULL,
    origin varchar(50) NULL
);

CREATE TABLE Post (
    postID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `like` int NULL,
    typeID int(4) NOT NULL,
    FOREIGN KEY (typeID) REFERENCES Type (typeID),
    mediaID int NULL,
    FOREIGN KEY (mediaID) REFERENCES Media (mediaID),
    `text` varchar(255) NOT NULL,
    `timeStamp` TIMESTAMP
);

CREATE TABLE PostHasMedia (
    mediaID INT NOT NULL,
    postID INT NOT NULL,
    CONSTRAINT PK_NewInDK PRIMARY KEY (mediaID, postID),
    FOREIGN KEY (mediaID) REFERENCES Media (mediaID),
    FOREIGN KEY (postID) REFERENCES Post (postID)
);

CREATE TABLE UserHasPost (
    userID INT NOT NULL,
    postID INT NOT NULL,
    CONSTRAINT PK_NewInDK PRIMARY KEY (userID, postID),
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (postID) REFERENCES Post (postID)
);