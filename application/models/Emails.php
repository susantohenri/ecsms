<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP; -- UNCOMMENT FOR DEBUGGING

class Emails extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'email';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'email', 'sTitle' => 'Email'),

    );
    $this->form = array(
      array(
        'name' => 'email',
        'width' => 2,
        'label' => 'Email',
      ),
    );
    $this->childs = array();
  }

  function dt()
  {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('email.email');
    return parent::dt();
  }

  function sendmail($subject, $body, $attachments = array())
  {
    $recipients = array_map(function ($record) {
      return $record->email;
    }, $this->find());

    $mail = new PHPMailer(true);

    try {
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER; -- UNCOMMENT FOR DEBUGGING
      $mail->isSMTP();
      $mail->Host       = 'srv36.niagahoster.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'noreply@ecsms.sikembang.com';
      $mail->Password   = 'NppE%btE#8+Q';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;
      $mail->setFrom('noreply@ecsms.sikembang.com', 'NoReply');

      foreach ($recipients as $mailAddr) $mail->addAddress($mailAddr);
      foreach ($attachments as $attch)
      {
        $mail->addStringAttachment($attch['file_stream'], $attch['file_name']);
      }

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = strlen($body) > 0 ? $body : '&nbsp;';
      $mail->AltBody = '';

      $mail->send();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
