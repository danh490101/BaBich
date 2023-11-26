<?php

namespace App\Listeners;

use App\Events\SendMailConfirmEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;
use PDF;

class SendMailConfirmEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMailConfirmEvent  $event
     * @return void
     */
    public function handle(SendMailConfirmEvent $event)
    {
        $order = $event->order;
        $pdfFile = $this->generatePdfFile($order);

        Mail::to($order->email)->send(new ConfirmEmail($order, $pdfFile));
    }

    public function generatePdfFile($order)
    {
        $pdf = PDF::loadView('user.mail-template.pdf-layout', ['order' => $order]);
        $pdf->setPaper('A4');

        $pdfPath = storage_path('app/pdf_output.pdf');
        $pdf->save($pdfPath);

        return $pdfPath;
    }
}
