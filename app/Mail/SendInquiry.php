<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $dataContent, $template, $to_email, $emailType, $verification;
    public $productId, $first_name, $last_name, $middle_name, $email_address, $home_address, $street_address, $country_region, $contact_number, $city, $state_province, $postal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailType, $productData)
    {

        if($emailType === "deliver"){
            $this->emailType = $emailType;
            $this->first_name = $productData['first_name'];
            $this->email_address = $productData['email'];
            $this->dataContent['transactionInfo'] = $productData['product_details'];
        }else if($emailType === "document_decline"){
            $this->emailType = $emailType;
            $this->first_name = $productData['first_name'];
            $this->email_address = $productData['email'];
            $this->dataContent['transactionInfo'] = $productData['information'];
        }else if($emailType === "document_approve"){
            $this->emailType = $emailType;
            $this->first_name = $productData['first_name'];
            $this->email_address = $productData['email'];
            $this->dataContent['transactionInfo'] = $productData['information'];
        }else if($emailType === "complete"){
            $this->emailType = $emailType;
            $this->first_name = $productData['first_name'];
            $this->email_address = $productData['email'];
            $this->dataContent['transactionInfo'] = $productData['information'];
        }else if($emailType === "verifiedDocument"){
            $this->emailType = $emailType;
            $this->first_name = $productData['first_name'];
            $this->email_address = $productData['email'];
            $this->dataContent['transactionInfo'] = $productData['information'];
        }else{
            $this->first_name = $emailType == "inquiry" ? $productData['allusersData']['first_name'] : $productData['first_name'];
            $this->last_name = $emailType == "inquiry" ? $productData['allusersData']['last_name'] : $productData['last_name'];
            $this->middle_name = $emailType == "inquiry" ?  $productData['allusersData']['middle_name'] : $productData['middle_name'];
            $this->email_address = $emailType == "inquiry" ? $productData['allusersData']['email_address']: $productData['email'];
            $this->dataContent['userInfo'] = $this->first_name ." " . $this->middle_name . " " . $this->last_name;
            $this->dataContent['productInfo'] = $productData;
            $emailType == "inquiry" ? $this->dataContent['dataCount'] = count($this->dataContent['productInfo']['specification']) : "";
            $this->emailType = $emailType;
        }

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
        $to_name                  = $this->first_name;
        $to_email                 = $this->email_address;

        return $this->from($from_email, $from_name)
                    ->subject('Notification')
                    ->to($to_email)
                    ->view($this->emailType == 'inquiry' ? 'Mail.Inquiry.index' : ($this->emailType == 'deliver' ? 'Mail.OrderNotification.index' : ($this->emailType == 'document_decline' ? 'Mail.Document.decline' : ($this->emailType == 'document_approve' ? 'Mail.Document.approve' : ($this->emailType == 'verifiedDocument' ? 'Mail.Document.verified-document' : ($this->emailType == 'complete' ? 'Mail.Document.complete' : 'Mail.Authenticate.index'))))) , $this->dataContent);
    }
}


