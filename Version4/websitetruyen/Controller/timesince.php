<?php
function humanTiming($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'năm',
        2592000 => 'tháng',
        604800 => 'tuần',
        86400 => 'ngày',
        3600 => 'giờ',
        60 => 'phút',
        1 => 'giây'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? '' : '');
    }
}
function get_time_ago( $time )
{
    $time_difference = time() - $time;

    // if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    if( $time_difference  < 1){
        return 'ko cập nhập được';
    }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'năm',
                30 * 24 * 60 * 60       =>  'tháng',
                24 * 60 * 60            =>  'ngày',
                60 * 60                 =>  'giờ',
                60                      =>  'phút',
                1                       =>  'giây'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return   $t . ' ' . $str . ( $t > 1 ? '' : '' ) . ' trước';
        }
    }
}
function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}
function print_processed_html($string)
{ 
    $search  = Array("--", "*", "\*", "^", "\^");
    $replace = Array("<\hr>", "<b>", "<\b>", "<sup>", "<\sup>");

    $processed_string = str_replace($search, $replace , $string);

    echo $processed_string;
 }