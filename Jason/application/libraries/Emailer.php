<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

class Emailer {

    public function sendmail($to, $subject, $content){

        # Instantiate the client.
        $mgClient = new Mailgun('key-848d410b733a5a7c27f9efda53a02ef2');
        $domain = "mg.aipipis.com";

        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => 'W0206 <postmaster@mg.aipipis.com>',
            'to'      => $to,
            'subject' => $subject,
            'text'    => $content
        ));

    }

}
?>