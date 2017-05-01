<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use GuzzleHttp\Exception\RequestException;
use Abraham\TwitterOAuth\TwitterOAuth;

require '../vendor/autoload.php';
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$app = new \Slim\App;

//----------------------------------------
// Subscribe method - /subscribe
// ---------------------------------------
$app->post('/subscribe', function ($request, $response, $args) {
  $email = $request->getParam('email'); //The email the user entered
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $data = array('error' => 'Email is invalid.');
    //Return error to the AJAX call
    return $response->withHeader('Content-type', 'application/json')->withJson($data);
  } else {
    try {
      $options = json_decode(mailChimp()); //Options you set in the mailChimp function
      //Guzzle client options
      //Reference: http://docs.guzzlephp.org/en/latest/
      $client = new GuzzleHttp\Client([
        'base_uri' => $options->apiUrl,
        'auth' => ['apiKey', $options->apikey]
      ]);
      $body = array('json' => array('email_address' => $email, 'status'=> $options->status)); //Send the email and status in body
      $res = $client->request('POST', "lists/{$options->list_id}/members", $body); //Make POST call to MailChimp API
      $json = json_decode($res->getBody()->getContents()); //Response from MailChimp
      $data = array('success' => "Subscribed using {$email}!", 'message' => $json);
      //Return to the AJAX call
      return $response->withHeader('Content-Type', 'application/json')->withJson($data);
    } catch (RequestException $e) {
      $data = array('error' => 'Unable to subscribe email to newsletter.', 'message' => $e->getMessage());
      //Return to the AJAX call
      return $response->withHeader('Content-Type', 'application/json')->withJson($data);
      exit;
    }
  }
});

//----------------------------------------
// Contact method - /contact
// ---------------------------------------
$app->post('/contact', function ($request, $response, $args) {
  $params = $request->getParams();
  $name = $request->getParam('firstName');
  //Set up rules for the form fields
  //Reference: https://github.com/cangelis/simple-validator
  $rules = array(
    'firstName' => array('required'),
    'lastName' => array('required'),
    'email' => array('required', 'email'),
    'subject' => array('required'),
    'message' => array('required')
  );
  $result = SimpleValidator\Validator::validate($params, $rules);
  $errors = $result->getErrors();
  if(!$result->isSuccess()) {
    $data = array('error' => 'Please correct the errors.');
    //Return error message to the AJAX call
    return $response->withHeader('Content-type', 'application/json')->withJson($data);
  } else {
    //Uncomment the code below to use PHPMailer
    $mail = new PHPMailer;
    $formData = json_encode($params);
    if(!sendMail($mail, $formData)->send()) {
      $data = array('error' => 'Could not send message.', 'message' => $errors);
      //Return error message to the AJAX call
      return $response->withHeader('Content-type', 'application/json')->withJson($data);
    } else {
      $data = array('success' => "Message sent! Thank you {$name}!");
      //Return success message to the AJAX call
      return $response->withHeader('Content-type', 'application/json')->withJson($data);
    }
  }
});

//----------------------------------------
// Get latest tweets method - /getTweets
// ---------------------------------------
$app->get('/getTweets', function($request, $response, $args){
  $options = json_decode(twitter()); //Twitter options you set earlier
  //Set Twitter OAuth Settings
  //Reference: https://github.com/abraham/twitteroauth
  $connection = new TwitterOAuth($options->consumer_key, $options->consumer_secret, $options->access_token, $options->access_token_secret);
  $data = $connection->get("/statuses/user_timeline", array("count" => 2)); //Show only 2 tweets, but change the count to show more or less
  if ($connection->getLastHttpCode() == 200) {
    return $response->withHeader('Content-type', 'application/json')->withJson($data);
  } else {
    $errors = array('error' => $data);
    return $response->withHeader('Content-type', 'application/json')->withJson($errors);
  }
});



//----------------------------------------
// MailChimp Settings
// ---------------------------------------
function mailChimp() {
  $dataCenter = 'us1';                                                  //Reference: https://status.mailchimp.com/which_datacenter_am_i_using
  $options = array(
    'apiUrl' => "https://{$dataCenter}.api.mailchimp.com/3.0/",          //API URL
	  'status' => 'subscribed',                                            //Status
	  'apikey' => 'YOUR_API_KEY',                                          //Api Key Reference: http://kb.mailchimp.com/integrations/api-integrations/about-api-keys
    'list_id' => 'YOUR_LIST_ID'                                          //List ID Reference: http://kb.mailchimp.com/lists/manage-contacts/find-your-list-id
    );
    return json_encode($options);
}

//----------------------------------------
// PHPMailer Settings
// ---------------------------------------
function sendMail($mail, $data) {
  $formData = json_decode($data);
  //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
  $mail->isSMTP();                                        // Set mailer to use SMTP
  $mail->Host = 'smtp.example.com';                       // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                                 // Enable SMTP authentication
  $mail->Username = 'username';                           // SMTP username
  $mail->Password = 'password';                           // SMTP password
  //$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 25;                                       // TCP port to connect to

  $mail->setFrom($formData->email, "{$formData->firstName} {$formData->lastName}");
  $mail->addAddress('johndoe@gmail.com', 'John Doe');                     // Add a recipient

  $mail->isHTML(true);                                    // Set email format to HTML

  $mail->Subject = $formData->subject;
  $mail->Body    = $formData->message;
  $mail->AltBody = $formData->message;
  return $mail;
}

//----------------------------------------
// MailChimp Settings
// ---------------------------------------
// Create Twitter app here: https://apps.twitter.com/
// Video Tutorial: https://www.youtube.com/watch?v=WrZqF7qqvJ0
function twitter() {
  $options = array(
    'apiUrl' => "https://api.twitter.com/1.1/",
	  'consumer_key' => 'YOUR_CONSUMER_KEY',
	  'consumer_secret' => 'YOUR_CONSUMER_SECRET',
    'access_token' => 'YOUR_ACCESS_TOKEN',
    'access_token_secret' => 'YOUR_ACCESS_TOKEN_SECRET'
    );
    return json_encode($options);
}

$app->run();
