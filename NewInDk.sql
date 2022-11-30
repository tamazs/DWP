DROP DATABASE IF EXISTS NewInDkDB;
CREATE DATABASE NewInDkDB;
USE NewInDkDB;

CREATE TABLE `Role` (
    roleID int(2) NOT NULL PRIMARY KEY,
    `role` varchar(255) NOT NULL
);

INSERT INTO `Role` (
    roleID,
    `role`
)
VALUES
    (
        1,
        'user'
    ),
    (
        2,
        'admin'
    );

CREATE TABLE `Location` (
    postalCode int(4) NOT NULL PRIMARY KEY,
    city varchar(50) NOT NULL
);

INSERT INTO `Location` (
    postalCode,
    city
)
VALUES
    (
        6700,
        'Esbjerg'
    ),
    (
        8000,
        'Aarhus'
    ),
    (
        1050,
        'Copenhagen'
    ),
    (
        6400,
        'Sonderborg'
    );

CREATE TABLE `Type` (
    typeID int(4) NOT NULL PRIMARY KEY,
     `type` varchar(255) NOT NULL
);

INSERT INTO `Type` (
    typeID,
    `type`
)
VALUES
    (
        1,
        'post'
    ),
    (
        2,
        'comment'
    ),
    (
        3,
        'question'
    ),
    (
        4,
        'answer'
    );

CREATE TABLE Media (
    mediaID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `image` longblob NOT NULL,
    `created` datetime NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE `User` (
    userID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    userName varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    `password` varchar(60) NOT NULL,
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
    userID int NOT NULL,
    FOREIGN KEY (userID) REFERENCES User (userID),
    userName varchar(50) NOT NULL,
    `text` varchar(255) NOT NULL,
    `timeStamp` TIMESTAMP
);

CREATE TABLE Comment (
    commentID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    typeID int(4) NOT NULL,
    FOREIGN KEY (typeID) REFERENCES Type (typeID),
    postID int NOT NULL,
    FOREIGN KEY (postID) REFERENCES Post (postID),
    userID int NOT NULL,
    FOREIGN KEY (userID) REFERENCES User (userID),
    `content` varchar(255) NOT NULL,
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