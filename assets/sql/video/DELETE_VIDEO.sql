
/********* DELETE VIDEO *********/
-- Table: videos
-- Columns: video_id, title, description, video_url, duration, 
    -- created_at, user_id_fk, thumbnail_url, updated_at, view_count


------ DELETE SINGLE VIDEO ------
DELETE FROM videos
WHERE video_id = 1;


------ DELETE MULTIPLE VIDEOS ------
DELETE FROM videos
WHERE video_id IN (2, 3);

------ DELETE ALL VIDEOS ------
DELETE FROM videos;
