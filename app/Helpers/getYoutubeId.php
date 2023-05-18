<?php

     function getThumb($link)
     {
        $video_id = explode('?v=', $link);
        $video_id = $video_id[1];

        return $video_id;
    }
