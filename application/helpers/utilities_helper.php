<?php

function loadProjectsSession()
{
	$CI = &get_instance();
	$CI->load->model('projects_model');
    if(!$CI->session->userdata('user')){
	   $projects = $CI->projects_model->get_all();
    }else{
        $user = $CI->session->userdata('user');
        $projects = $CI->projects_model->get_by_team_member($user['id']);
    }
	$CI->session->set_userdata('projects', $projects);
	if(!$CI->session->userdata('flag')){
        if(isset($projects[0])){
            $CI->session->set_userdata('currentProject', $projects[0]);
        }
        $flag = 1;
        $CI->session->set_userdata('flag',$flag);
    }
}

function setMessage($message, $type = 'success')
{
	$CI = &get_instance();
	$CI->session->set_flashdata('message', $message);
	$CI->session->set_flashdata('message_type', $type);
}		

function sendEmail($to_name, $to_email, $subject, $message, 
	$from_name = 'Task Tracker', $from_email='rs@saiashirwad.com'){
	try{
	$mandrill = new Mandrill('6MVsLDKElI9ZekGRBV9q7g');
    $message = array(
        'html' => '<p>' . $message . '</p>',
        /*'text' => 'Example text content',*/
        'subject' => $subject,
        'from_email' => $from_email,
        'from_name' =>  $from_name,
        'to' => array(
            array(
                'email' => $to_email,
                'name' =>  $to_name,
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => $from_email),
        'important' => false,
        'track_opens' => true,
        'track_clicks' => true,
        'auto_text' => true,
        /*'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        preserve_recipients' => null,
        'view_content_link' => null,
        'bcc_address' => 'message.bcc_address@example.com',
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'merge1',
                'content' => 'merge1 content'
            )
        ),
        'merge_vars' => array(
            array(
                'rcpt' => 'recipient.email@example.com',
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content'
                    )
                )
            )
        ),
        'tags' => array('password-resets'),
        'subaccount' => 'customer-123',
        'google_analytics_domains' => array('example.com'),
        'google_analytics_campaign' => 'message.from_email@example.com',
        'metadata' => array('website' => 'www.example.com'),
        'recipient_metadata' => array(
            array(
                'rcpt' => 'recipient.email@example.com',
                'values' => array('user_id' => 123456)
            )
        ),
        'attachments' => array(
            array(
                'type' => 'text/plain',
                'name' => 'myfile.txt',
                'content' => 'ZXhhbXBsZSBmaWxl'
            )
        ),
        'images' => array(
            array(
                'type' => 'image/png',
                'name' => 'IMAGECID',
                'content' => 'ZXhhbXBsZSBmaWxl'
            )
        )*/
    );
    $async = true;
    $result = $mandrill->messages->send($message, $async);
    return $result;
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
}