/*
table 5: thp_ecourse

** table for course creation
** enable frontend ability to generate course from template
** utilize the word UI lib
** columns
    id (auto increment)
    course_id     50001, 50002, ... 
    course_name   title/subject of the course
    course_description
    course_sections   (lists of section_id)
    course_admin    (user_id of the teacher)
    created_date
    course_status   0 or 1 (active/inactive controlled by teacher)
    enrolled_list (usernames of active students)

*/