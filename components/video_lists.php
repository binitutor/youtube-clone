<?php 

/****** GET ALL VIDEOS *******/

$video_cards = array();
foreach ($videos as $video) {    
    if(!$video['thumbnail_url']){
        $video['thumbnail_url'] = './assets/img/default_thumbnail.png';
    }  
    if(!$video['description']){
        $video['description'] = 'No description available';
    }

    if(!$video['view_count']){
        $views = 0;
    } else {
        // sepearate by comma in 3 digits
        $views = number_format($video['view_count'], 2, '.', ',');
    }

    if($video['created_at']){
        // calculate the date uploaded.
        $upload_dt = new DateTime( $video['created_at'] ); // "2007-03-24"
        $today = new DateTime();
        // echo 'upload_dt= ' . $upload_dt->format('Y-m-d') . '<br>'; 
        // echo 'date2= ' . $today->format('Y-m-d') . '<br>'; 

        $interval = $upload_dt->diff($today);
        // echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
        // difference 0 years, 3 months, 19 days 

        // shows the total amount of days (not divided into years, months and days like above)
        // echo "difference " . $interval->days . " days ";
        // difference 111 days
        $interval_total_days = $interval->days;
        $interval_days = $interval->d;
        $interval_months = $interval->m;
        $interval_years = $interval->y;
        $crtd_dt = '';
        if( $interval_total_days < 30 ){
            $crtd_dt .= $interval->d . ' days ';
        } else if( $interval_total_days < 365 ){            
            if ( $interval->m > 0 ){
                $crtd_dt .= $interval->m . ' months, ';
            }
            if ( $interval->d > 0 ){
                $crtd_dt .= $interval->d . ' days ';
            }
        }
        else {
            if ( $interval->y > 0 ){
                $crtd_dt .= $interval->y . ' years, ';
            }
            if ( $interval->m > 0 ){
                $crtd_dt .= $interval->m . ' months, ';
            }
            if ( $interval->d > 0 ){
                $crtd_dt .= $interval->d . ' days ';
            }
        }
    } 


    //     <p>'. $video['description'] .'</p> 

    $v_card = '
        <div class="vid-list">
            <a href="./?vid_id=' . $video['video_id'] . '"> 
                <img src="'.$video['thumbnail_url'].'" class="thumbnail" >
            </a>
            <div class="flex-div">
                <img src="./uploads/profiles/profile1.jpg" alt="$video->ppurl">
                <div class="vid-info">
                    <a href="' . $video['video_url'] . '">'.$video['title'].'</a>
                    <p>BiniTutor</p>
                    <p>'. $views .' views • ' . $crtd_dt . ' ago</p>
                </div>
            </div>
        </div>
    ';
    array_push($video_cards, $v_card);
}

?>
