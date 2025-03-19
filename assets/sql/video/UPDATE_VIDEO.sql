
/********* UPDATE VIDEO *********/
-- Table: videos
-- Columns: video_id, title, description, video_url, duration, 
    -- created_at, user_id_fk, thumbnail_url, updated_at, view_count

------- UPDATE VIDEO TITLE -------
UPDATE videos
SET title = 'New Title'
WHERE video_id = 1000;

------- UPDATE VIDEO DESCRIPTION -------
UPDATE videos
SET description = 'New Description',
WHERE video_id = 1000;

------- UPDATE ALL VIDEO PARAMETERS -------
--- !! Not allowed to update video id, created date and creator/user id
UPDATE videos
SET title = 'New Title', description = 'New Description', 
    video_url = './uploads/videos/new_video.mp4',
    duration = 200, updated_at = NOW(), 
    thumbnail_url = './uploads/thumbnails/new_thumbnail.png',
    view_count = 20
WHERE video_id = 1000;


-- ALTER TABLE videos
-- ADD thumbnail_url varchar(255);
-- ALTER TABLE videos
-- ADD updated_at DATE;
-- ALTER TABLE videos
-- ADD view_count INT;
