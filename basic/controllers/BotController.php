<?php

namespace app\controllers;

use models\Message;
use yii\web\Controller;
use app\models\Product;

/**
 * Bot controller
 */
class BotController extends Controller
{
    // Handles messages events
    private function handleMessage($sender_psid, $received_message)
    {
        $response;

        // Check if the message contains text
        if (!empty($received_message->text)) {
            // Create the payload for a basic text message
            $text = strtolower($received_message->text);
            switch ($text) {
                case 'hello':
                case 'hi':
                case 'привіт':
                case 'привет':
                case 'start':
                case 'начать':
                case 'Начать':
                    $response = '
                    "attachment":{
                        "type":"template",
                        "payload":{
                          "template_type":"generic",
                          "elements":[
                             {
                              "title":"Hello! Welcome to the store \"Name\"",
                              "image_url":"https://www.jumblebee.co.uk/site/wp-content/uploads/2014/06/JB-FE-Shop_10.png",
                              "subtitle":"Nice shopping",
                              "buttons":[
                                {
                                    "type":"postback",
                                    "title":"Commands",
                                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                },{
                                  "type":"postback",
                                  "title":"Products",
                                  "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                }
                                ,{
                                    "type":"postback",
                                    "title":"Site",
                                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                  }
                              ]
                            }
                          ]
                        }
                      }';
                    break;
                case "products":
                    $response = '"text" : "Proddd"';
                    break;
                case "help":
                case "commands":
                    $response = '"text" : 
                    "Bot comands list:\nhelp, commands - give bot commands\nhello, hi, start - start chating bot\nproducts - show products"';
                    break;
                default:
                    $response = '"text" : "I do not understand you"';
                    break;
            }
        }
        // Sends the response message
        $this->callSendAPI($sender_psid, $response);
    }

    // Handles messaging_postbacks events
    private function handlePostback($sender_psid, $received_postback)
    {
        $response;

        // Check if the message contains text
        if (!empty($received_postback->title)) {
            // Create the payload for a basic text message
            $text = strtolower($received_postback->title);
            switch ($text) {
                case 'hello':
                case 'hi':
                case 'привіт':
                case 'привет':
                case 'start':
                case 'начать':
                case 'Начать':
                    $response = '
                    "attachment":{
                        "type":"template",
                        "payload":{
                          "template_type":"generic",
                          "elements":[
                             {
                              "title":"Hello! Welcome to the store \"Name\"",
                              "image_url":"https://www.jumblebee.co.uk/site/wp-content/uploads/2014/06/JB-FE-Shop_10.png",
                              "subtitle":"Nice shopping",
                              "buttons":[
                                {
                                    "type":"postback",
                                    "title":"Commands",
                                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                },{
                                  "type":"postback",
                                  "title":"Products",
                                  "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                }
                                ,{
                                    "type":"postback",
                                    "title":"Site",
                                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                  }
                              ]
                            }
                          ]
                        }
                      }';
                    break;
                case "products":
                    $model = Product::find()->where('idbot = 1')->all();
                    $product_json = '';
                    foreach ($model as $product) {
                        $product_json = $product_json . '{
                            "title": "'.$product->name.'",
                            "subtitle": "'.$product->price.'$ '.$product->content.'",
                            "image_url": "'.$product->path.'",
                            "buttons": [
                                {
                                    "type":"postback",
                                    "title":"Buy",
                                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                }
                            ]
                          },';
                    }
                    $response = '
                    "attachment":{
                        "type":"template",
                        "payload": {
                            "template_type": "list",
                            "top_element_style": "large",
                            "elements": [
                              '.$product_json.'
                            ],
                            "buttons": [
                                {
                                    "type":"postback",
                                    "title":"Commands",
                                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                                },
                            ]
                          }
                      }';
                    break;
                case "help":
                case "commands":
                    $response = '"text" : 
                    "Bot comands list:\nhelp, commands - give bot commands\nhello, hi, start - start chating bot\nproducts - show products"';
                    break;
                default:
                    $response = '"text" : "I do not understand you"';
                    break;
            }
        }
        // Sends the response message
        $this->callSendAPI($sender_psid, $response);
    }

    // Sends response messages via the Send API
    private function callSendAPI($sender_psid, $response)
    {
        $access_token = "EAAfmZBAqaDZBYBAJtLTizGyC4w1CN0EpQVIpHSq5vdhIVNCe99hLJSpbE689wr8iqZA0oQaLiyYv9WFeBBMqGQeaY9ZBL6St5ACZAIniyL1ZBCqo0IiZBEI5GcPDOBxmaqnTjvpcQSHgfZAVUZAIfPhIuTIzqmWqEBualsTorDPSzcQZDZD";
        //API Url
        $url = "https://graph.facebook.com/v2.6/me/messages?access_token=" . $access_token;

        // Construct the message body
        $jsonData = '{
            "recipient": {
                "id": "' . $sender_psid . '"
            },
            "message" : {
                ' . $response . '
            }
           }';

        $ch = curl_init($url);

        //Encode the array into JSON.
        $jsonDataEncoded = $jsonData;

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array(‘Content-Type: application/x-www-form-urlencoded’));
        //Execute the request
        $result = curl_exec($ch);
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }
    /**
     * Bot.
     *
     * @return string
     */
    public function actionIndex()
    {
        $verify_token = "iG4mpcda5m2bb27hyYVU";
        if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' &&
            $_REQUEST['hub_verify_token'] == $verify_token) {
            echo $_REQUEST['hub_challenge'];
        }

        $input = json_decode(file_get_contents('php://input', true));

        // //$message = new Message();

        // $sender = $input->entry[0]->messaging[0]->sender->id;
        // $message = $input->entry[0]->messaging[0]->message->text;

        if ($input->object === "page") {
            foreach ($input->entry as $entry) {
                $webhook_event = $entry->messaging[0];
                //var_dump($webhook_event);

                $sender_psid = $webhook_event->sender->id;

                if (!empty($webhook_event->message)) {
                    $this->handleMessage($sender_psid, $webhook_event->message);
                } else if (!empty($webhook_event->postback)) {
                    $this->handlePostback($sender_psid, $webhook_event->postback);
                }
            }
        }
    }
}
