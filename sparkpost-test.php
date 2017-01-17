<?php
use SPHelper\SparkPostApi as SPHelper;

error_reporting(E_ALL);
ini_set('display_errors',1);
require_once ('inc/inc.php');

//Default vars

$pageTitle = 'Welcome to Spark Post';




?>
<?php require_once('template-parts/header.php'); ?>

<?php

if(!empty( $_POST['sendEmail'] ) && $_POST['sendEmail'] == 'Send'){
    $pdfContent=base64_encode(file_get_contents('http://totalreg-new.dev/admin/documents/8oggvewhh_zis.pdf'));


    $toArray[0]['email'] 	= 'alex.ankit+1@ithands.net';
    $toArray[0]['name'] 	= 'Danté Belmonte';
    $toArray[0]['type'] 	= 'to';

    /*$toArray[1]['email'] 	= 'alex.ankit+3@ithands.net';
    $toArray[1]['name'] 	= 'Ankit3';
    $toArray[1]['type'] 	= 'cc';

    $toArray[3]['email'] 	= 'alex.ankit+2@ithands.net';
    $toArray[3]['name'] 	= 'Ankit2';
    $toArray[3]['type'] 	= 'bcc';*/

    //$recipients = sparkPostRecipients($toArray);


    $recipients[0]['address']['email'] 	= 'alex.ankit+1@ithands.net';
    $recipients[0]['address']['name'] 	= 'Danté Belmonte';

    $recipients[0]['substitution_data'] = [
        'NAME' => 'Clark Griswold',
        'ADDRESS' => '12 Enclave'
    ];

    /*$recipients[1]['address']['email'] 	= 'alex.ankit+1@ithands.net';
    $recipients[1]['address']['name'] 	= 'Danté Belmonte';

    $recipients[1]['substitution_data'] = [
        'NAME' => 'Clark Griswold',
        'ADDRESS' => '12 Enclave'
    ];*/

    //$check = doesRecipientExist($recipients, 'alex.ankit+1@ithands.net');

    //var_dump($check);

    /*
        $recipients[2]['email'] 	= 'alex.ankit+1@ithands.net';
        $recipients[2]['name'] 	= 'Danté Belmonte';
        $recipients[2]['type'] 	= 'cc';

        $recipients[3]['email'] 	= 'alex.ankit+1@ithands.net';
        $recipients[3]['name'] 	= 'Danté Belmonte';
        $recipients[3]['type'] 	= 'bcc';*/



    $recipients = sparkPostRecipients($recipients);

    print_data($recipients['to']);
    /*print_data($recipients['cc']);
    print_data($recipients['bcc']);*/


    /*$recipients[1]['address']['name'] = 'Ankit';
    $recipients[1]['address']['email'] = 'alex.ankit+12@ithands.net';*/


    $attachments[0]['type'] = 'application/pdf';
    $attachments[0]['name'] = 'document.pdf';
    $attachments[0]['data'] = $pdfContent;

    $options = [
        'content' => [
            'from' => [
                'name' => 'Testing',
                'email' => 'from@sparkpostbox.com',
            ],
            'subject' => 'Test Subject',
            'html' => '<html><body><h1>Congratulations, LAST {{NAME}}!,Street: {{ADDRESS}}</h1><p>You just sent your very first mailing!</p></body></html>',
            'text' => 'Congratulations, {{name}}!! 1You just sent your very first mailing!',
            'reply_to' => 'alex.ankit@ithands.net',
            'attachments' => $attachments
        ],
        'recipients' => $recipients['to'],
        'cc' => !empty($recipients['cc']) ? $recipients['cc'] : null,
        'bcc'=>  !empty($recipients['bcc']) ? $recipients['bcc'] : null,
    ];

    /*$options = [
        'content' => [
            'from' => [
                'name' => 'Testing',
                'email' => 'from@sparkpostbox.com',
            ],

            'reply_to' => 'alex.ankit@ithands.net',
            'template_id'=> 'my-first-email',
            'attachments' => $attachments
        ],
        'substitution_data' => $substitutionData,
        'recipients' => $recipients['to'],
        'cc' => !empty($recipients['cc']) ? $recipients['cc'] : null,
        'bcc'=>  !empty($recipients['cc']) ? $recipients['bcc'] : null,
    ];*/

    //print_data($options);



    $SparkPost = new SPHelper();
    $SparkPost->setOptions($options);
    $response = $SparkPost->sendEmail();
    print_data($response);
}

?>

<section class="row">
    <div class="col-md-6 col-sm-12 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Send Email Form</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Send Email</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input class="btn btn-default" type="submit" name="sendEmail" value="Send">
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>


<?php require_once('template-parts/header.php'); ?>

