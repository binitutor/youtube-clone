
/********* CREATE/UPLOAD VIDEO *********/
-- Table: videos
-- Columns: video_id, title, description, video_url, duration, 
    -- created_at, user_id_fk, thumbnail_url, updated_at, view_count

INSERT INTO videos(title, description, 
    video_url, duration, created_at, user_id_fk,
    thumbnail_url, updated_at, view_count)
VALUES ('Video 1', 'Description to first video', 
    './uploads/videos/video1.mp4', 100, NOW(), 10004,
    './uploads/thumbnails/thumbnail1.png', NOW(), 10),
    
    ('Video 2', 'Description to second video', 
    './uploads/videos/video2.mp4', 100, NOW(), 10004,
    './uploads/thumbnails/thumbnail2.png', NOW(), 10),
    
    ('Video 3', 'Description to third video', 
    './uploads/videos/video3.mp4', 100, NOW(), 10004,
    './uploads/thumbnails/thumbnail3.png', NOW(), 10);

-- ALTER TABLE videos
-- ADD thumbnail_url varchar(255);
-- ALTER TABLE videos
-- ADD updated_at DATE;
-- ALTER TABLE videos
-- ADD view_count INT;
