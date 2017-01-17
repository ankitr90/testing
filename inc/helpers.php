<?php

/**
 * @param $var
 */
function print_data($var) {
    # html pre tag
    echo "<pre>";

    # determine ouput based on type of variable
    if(gettype($var) == 'object' || 'array'){
        print_r($var);
    }
    else {
        echo $var;
    }

    # close
    echo "</pre>";
}

/**
 * Converts mandrill $toArray to SparkPost Recipients
 * @param $toArray
 * @return array
 */

function sparkPostRecipients($toArray)
{

    $recipients = [];

    foreach($toArray as $to){
        if(array_key_exists('type',$to)){

            switch($to['type']){

                case 'to':
                    unset ($to['type']);
                    $recipients['to'][]['address'] = $to;
                    break;

                case 'cc':
                    unset ($to['type']);
                    $recipients['cc'][]['address'] = $to;
                    break;

                case 'bcc':
                    unset ($to['type']);
                    $recipients['bcc'][]['address'] = $to;
                    break;

                default :
                    unset ($to['type']);
                    $recipients['to'][]['address'] = $to;
                    break;
            }

        }
        else{
            $recipients['to'][] = $to;
        }

    }
    return $recipients;
}


function doesRecipientExist($recipients, $email)
{
    if(is_array($recipients)){
        foreach($recipients as $recipient){
            if(!empty($recipient['address']['email']) && trim($email) == $recipient['address']['email'] ){
                return true;
                break;
            }
        }
    }

    return false;
}

