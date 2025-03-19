/*
table 6: thp_ecourse_sections

** holds details on course sections 
** columns
    id (auto increment)
    section_id      (random number)
    topics          "[
                      {
                        topic_title: subtitle,
                        topic_content: long sentences
                        video_links: ["part_1.mov","part_2.mp4"],
                        doc_links: ["part_1.pdf","part_2.pdf"]
                        },
                      {},
                      {}
                    ]"
    course_id       50001, 50002, ... 

      ---------
  Coures example
    Subject: AWS Practitioner
    Description: To acquire certificate on cloud computing ...
    Course admin: Biniam H Alemayehu
    created date: 2024-03-10 at 14:33:00

    Section 1: section title
      topic 1: subtitle
        topic content: sentences
        video link
        document link
      topic 2: subtitle
        topic content: sentences
        video link
        document link

    Section 2
      topic 1: subtitle
        topic content: sentences
        video link
        document link
      ---------

*/