<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $dataContent, $template, $to_email, $emailType;
    public $productId, $first_name, $last_name, $middle_name, $email_address, $home_address, $street_address, $country_region, $contact_number, $city, $state_province, $postal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailType, $productData)
    {   
        $this->first_name = $emailType == "inquiry" ? $productData['allusersData']['first_name'] : $productData['first_name'];  
        $this->last_name = $emailType == "inquiry" ? $productData['allusersData']['last_name'] : $productData['last_name'];
        $this->middle_name = $emailType == "inquiry" ?  $productData['allusersData']['middle_name'] : $productData['middle_name']; 
        $this->email_address = $emailType == "inquiry" ? $productData['allusersData']['email_address']: $productData['email'];
        $this->dataContent['userInfo'] = $this->first_name ." " . $this->middle_name . " " . $this->last_name;
        $this->dataContent['productInfo'] = $productData;
        $this->emailType = $emailType;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_name                = env('MAIL_FROM_NAME');
        $from_email               = env('MAIL_FROM_ADDRESS');
        $to_name                  = $this->first_name ." " . $this->middle_name . " " . $this->last_name;
        $to_email                 = $this->email_address;

        return $this->from($from_email, $from_name)
                    ->subject('Account Verification')
                    ->to($to_email)
                    ->view($this->emailType == 'inquiry' ? 'Mail.Inquiry.index' : 'Mail.Authenticate.index', $this->dataContent);
    }
}
                    