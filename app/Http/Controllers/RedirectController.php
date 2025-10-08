<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RedirectController extends Controller
{
   public function __invoke(string $code)
   {
      $link = Link::where('code', $code)->firstOrFail();
      $link->increment('clicks');
      return redirect($link->long_url, 302);
   }
}
