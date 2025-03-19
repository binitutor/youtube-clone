/*


    id (auto increment)
    enrollment_id   (random number)
    course_id
    student_id (username - unique email address)
    enrolled_classes (null or class_id)
    enrolled_date
    class_status  (0 or 1 for inactive to active)
    class_exp_date  

*/


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