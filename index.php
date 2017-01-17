<?php require_once ('inc/inc.php'); ?>
<?php require_once('template-parts/header.php'); ?>

<?php

$toArray[0]['email'] 	= 'alex.ankit+1@ithands.net';
$toArray[0]['name'] 	= 'Ankit1';
$toArray[0]['type'] 	= 'to';

$toArray[1]['email'] 	= 'alex.ankit+3@ithands.net';
$toArray[1]['name'] 	= 'Ankit3';
$toArray[1]['type'] 	= 'cc';

/*$toArray[2]['email'] 	= 'alex.ankit+2@ithands.net';
$toArray[2]['name'] 	= 'Ankit2';
$toArray[2]['type'] 	= 'to';

$toArray[3]['email'] 	= 'alex.ankit+2@ithands.net';
$toArray[3]['name'] 	= 'Ankit2';
$toArray[3]['type'] 	= 'bcc';*/



//print_data($toArray);

$Recipients = sparkPostRecipients($toArray);

//print_data($Recipients);


$attachments[0]['type'] = 'application/pdf';
$attachments[0]['name'] = 'document.pdf';
$attachments[0]['content'] = 'fgdfgzgfawfas45refa3afaw4e5w';

$attachments[1]['type'] = 'application/pdf';
$attachments[1]['name'] = 'document1.pdf';
$attachments[1]['content'] = 'fgdfgzgfawfas45refa3afaw4e5w';



$attachments = array_map(function($attachments) {
    return array(
        'type'  => $attachments['type'],
        'name'  => $attachments['name'],
        'data'  => (!empty($attachments['content'])) ? $attachments['content'] : $attachments['data']
    );
}, $attachments);

//print_data($attachments);




$options = [
    'content' => [
        'from' => [
            'name' => 'Ankit',
            'email' => 'alex.ankit+from@ithands.net',
        ],
        'subject' => 'Test Subject',
        'html' => 'Test Message',
        'reply_to' => 'alex.ankit+replyTo@ithands.net',
        'attachments' => $attachments
    ],
    'substitution_data' => '',
    'recipients' => [
        ['address' => 'alex.ankit@ithands.net'],
        ['address' => 'alex.ankit+1@ithands.net']
    ],
    'cc' => !empty($recipients['cc']) ? $recipients['cc'] : null,
    'bcc'=>  !empty($recipients['bcc']) ? $recipients['bcc'] : null,
];

$options = array_filter(array_map('array_filter', $options));

//$options = array_filter($options);

//print_data($options);
?>


<?php require_once('template-parts/footer.php'); ?>

