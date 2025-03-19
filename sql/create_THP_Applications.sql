CREATE TABLE THP_Applications (
    App_ID int NOT NULL, -- 5 digit number starting 10001
    FullName varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Contact varchar(255),
    Address text,
    City varchar(255),
    State varchar(255),
    Country varchar(255),
    Zip varchar(255),
    Gender VARCHAR(6) CHECK (Gender IN ('Male', 'Female')),
    Citizenship varchar(255),
    Primary_Language varchar(255),
    Finnish_Language tinyint(1) CHECK (Finnish_Language in (0, 1))
        COMMENT '0=no, 1=yes', -- 0=no, 1=yes
    User_Comment text,
    Username varchar(255) NOT NULL UNIQUE, -- unique email
    TempToken varchar(255) NOT NULL, -- long char
    Account_Type tinyint(3) NOT NULL DEFAULT 100 
        CHECK (Account_Type in (100, 101, 102, 103, 104, 105, 106, 107))
        COMMENT '100=temp user, 101=active user, 
        102=student, 103=teacher, 104=viewer, 
        105=reviewer, 106=auditor, 107=admin',
        /* range -128 to 127 (use 100 to 107)
        107 = admin (developer)             <------ highest privilege
        106 = auditor (optional)
        105 = reviewer (tesfu)
        104 = viewer (assistant to tesfu)
        103 = teacher (course admin)
        102 = student account (activated by course admin)
        101 = user (activated using temp token)
        100 = temp user (before activation with token) <------ lowest privilege
        */
    Uploaded_Filenames text NOT NULL, -- "['doc1.pdf','doc2.pdf']"
    Date_Created datetime NOT NULL DEFAULT current_timestamp(), -- current time    
    PRIMARY KEY (App_ID)
) ENGINE=InnoDB AUTO_INCREMENT=10000;

/***** 
    unable to add comments on current sql version of phpmyadmin.
    can be done manually under structures
*****/
ALTER TABLE THP_Users
-- ADD product_description VARCHAR2(20)
COMMENT ON COLUMN THP_Users.Finnish_Language 
     IS '0=no, 1=yes';
and
COMMENT ON COLUMN THP_Users.Account_Type 
     IS '100=temp user, 101=active user, 
        102=student, 103=teacher, 104=viewer, 
        105=reviewer, 106=auditor, 107=admin';




ALTER TABLE `THP_Applications` AUTO_INCREMENT = 10000;

INSERT INTO `THP_Applications` (FullName, Email, Contact, Address, City, State, 
Country, Zip, Gender, Citizenship, Primary_Language, Finnish_Language, 
User_Comment, Username, TempToken, Account_Type, Uploaded_Filenames) VALUES
('Biniam Alemayehu', 'info@binitutor.com', '+1 234 567 8910', '123 Light Avenu', 
'Common', 'DC', 'USA', '12345', 'Male', 'American', 'English, Amharic', 
0, 'This is my comment', 'info@binitutor.com', '098f6bcd4621d373cade4e832627b4f6', 
100, '["doc1.pdf","doc2.pdf"]');
