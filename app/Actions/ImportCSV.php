<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

use App\Models\Campaign;
use App\Models\Family;
use App\Models\Wishlist;

class ImportCSV
{
    use AsAction;

    public function handle($filename, Campaign $campaign)
    {
        $file = fopen($filename->getRealPath(), "r"); $i = 1;
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            if($i != 1)
            {
                $family = Family::firstOrCreate(
                    ['name' => $getData[1],
                        'slug' => $getData[0],
                        'name' => $getData[1]
                    ]
                );
                
                $donee = $family->donees()->create([
                    'slug' => $getData[0],
                    'firstname' => $getData[2],
                    'lastname' => $getData[2],
                    'description' => $getData[5],
                    'age' => $getData[3],
                    'gender' => $getData[4]
                ]);
    
                $wishlist = new Wishlist([
                    'slug' => $getData[0] . '-wishlist', 
                    'wishlist' => $getData[6]
                ]);
                $donee->wishlists()->attach($wishlist);
                $campaign->wishlists()->attach($wishlist);
                $wishlist->save();
            }
            $i++;
        }

        return 'success';
    }

    public function asController(Request $request, Campaign $campaign)
    {
        return $this->handle($request->file('file'), $campaign);
    }
}
