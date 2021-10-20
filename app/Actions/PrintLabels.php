<?php

namespace App\Actions;

use App\Models\Campaign;
use App\Models\Wishlist;
use App\Traits\QRcode;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class PrintLabels extends FPDF
{
    use AsAction, QRcode;

    public function handle(Campaign $campaign)
    {
        $this->AddPage();
        $this->SetMargins(4, 13, 4);
        $this->SetLineWidth(0);

        $i = 0;
        foreach($campaign->wishlists as $wishlist)
        {
            $cords = $this->grid($i);
            $this->Rect($cords[0], $cords[1], 101, 51);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('Arial', '', 18);
            $this->buildQR(route('wishlist.qr', $wishlist->slug), 'H');
            $this->displayFPDF($this, $cords[0] + 50, $cords[1], 51, [255, 255, 255], [0, 0, 0]);
            $this->Text($cords[0] + 3, $cords[1] + 10, $this->buildName($wishlist));
            $this->SetFontSize(8);
            $this->SetTextColor(33, 33, 33);
            $this->Text($cords[0] + 3, $cords[1] + 17, Str::ucfirst($wishlist->donee->gender) . ' | Age: ' . $wishlist->donee->age . ' | Clothing Size');
            $this->Text($cords[0] + 3, $cords[1] + 47, $wishlist->campaign->name);
            $this->SetTextColor(88, 88, 88);
            $this->SetXY($cords[0] + 3, $cords[1] + 19);
            $this->MultiCell(47, 3, $wishlist->wishlist, 0, 'L');

            if($i == 9)
            {
                $this->AddPage();
                $this->SetMargins(4, 13, 4);
                $this->SetLineWidth(0);

                $i = 0;
            } else {
                $i++;
            }
        }

        $this->Rect(108, 21, 101, 51);
        $this->Output();
        exit;
    }

    private function buildName(Wishlist $wishlist)
    {
        if($wishlist->donee->privacy == true || $wishlist->campaign->private == true)
        {
            return $wishlist->donee->firstname . ' ' . substr($wishlist->donee->lastname, 0, 1);
        }

        return $wishlist->donee->firstname . ' ' . $wishlist->donee->lastname;
    }

    private function grid(int $index)
    {
        $cords = [
            0 => [2, 21],
            1 => [108, 21],
            2 => [2, 72],
            3 => [108, 72],
            4 => [2, 123],
            5 => [108, 123],
            6 => [2, 174],
            7 => [108, 174],
            8 => [2, 225],
            9 => [108, 225],
        ];

        return $cords[$index];
    }
}
