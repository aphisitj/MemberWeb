<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

class LocaleController extends Controller
{
    public function lang($lang){
        $available = ['th','en'];
        if(!in_array($lang, $available)) $lang = config()->get('app.locale');
        session()->put('locale',$lang);
        return redirect()->back();
    }
}
