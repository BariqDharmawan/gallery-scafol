<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        $datum = [
            'kol1' => 1,
            'kol2' => 'test'
        ];
        return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
