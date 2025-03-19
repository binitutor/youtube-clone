CREATE TABLE THP_Users (
    User_ID int NOT NULL, -- 4 digit number starting 1001
    FullName varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Contact varchar(255),
    Username varchar(255) NOT NULL UNIQUE, -- unique email
    Password text NOT NULL, -- after token activation
    App_Submissions text, -- [10001, 10024] App_IDs
    Account_Type tinyint(3) NOT NULL DEFAULT 100 
        CHECK (Account_Type in (100, 101, 102, 103, 104, 105, 106, 107)),
    Address text,
    City varchar(255),
    State varchar(255),
    Country varchar(255),
    Zip varchar(255),
    Gender VARCHAR(6) CHECK (Gender IN ('Male', 'Female')),
    Citizenship varchar(255),
    Primary_Language varchar(255),
    Finnish_Language tinyint(1) CHECK (Finnish_Language in (0, 1)), -- 0=no, 1=yes
    User_Comment text,
    Uploaded_Filenames text NOT NULL, -- "['doc1.pdf','doc2.pdf']"
    Date_Created datetime NOT NULL DEFAULT current_timestamp(), -- current time  
    Account_Status tinyint(1) NOT NULL DEFAULT 0
        CHECK (Account_Status in (0, 1)), -- 0=inactive, 1=active
    PRIMARY KEY (User_ID)
) ENGINE=InnoDB AUTO_INCREMENT=1000;


/*

Account_Type
        107 = admin (developer)             <------ highest privilege
        106 = auditor (optional)
        105 = reviewer (tesfu)
        104 = viewer (assistant to tesfu)
        103 = teacher (course admin)
        102 = student account (activated by course admin)
        101 = user (activated using temp token)
        100 = temp user (before activation with token) <------ lowest privilege

*/

ALTER TABLE `THP_Users` AUTO_INCREMENT = 1000;

INSERT INTO `THP_Users` (FullName, Email, Contact, Username, 
`Password`, App_Submissions, Account_Type, Address, City, State, 
Country, Zip, Gender, Citizenship, Primary_Language, Finnish_Language, 
User_Comment, Uploaded_Filenames) VALUES
('Biniam Alemayehu', 'info@binitutor.com', '+1 234 567 8910', 'info@binitutor.com', 
'098f6bcd4621d373cade4e832627b4f6', '["10001","10024"]', 100, '123 Light Avenu', 
'Common', 'DC', 'USA', '12345', 'Male', 'American', 'English, Amharic', 0,
'This is my comment', '["doc1.pdf","doc2.pdf"]');


    -- Date_Created datetime NOT NULL DEFAULT current_timestamp(), -- current time  
    -- Account_Status DEFAULT 0 CHECK ( in (0, 1)), -- 0=inactive, 1=active

INSERT INTO `THP_Users` (FullName, Email, Contact, Username, 
`Password`, App_Submissions, Account_Type, Address, City, State, 
Country, Zip, Gender, Citizenship, Primary_Language, Finnish_Language, 
User_Comment, Uploaded_Filenames) VALUES
('Feven Wes', 'ft@test.com', '+1 234 567 8910', 'fw@test.com', 
'098f6bcd4621d373cade4e832627b4f6', '["10003","10004"]', 100, '123 Light Avenu', 
'Common', 'DC', 'USA', '12345', 'Female', 'Ethiopian', 'English, Amharic', 0,
'This is my comment', '["doc1.pdf","doc2.pdf"]');

