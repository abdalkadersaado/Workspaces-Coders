<?php 


namespace App\Http\Controllers\Api ; 


use Illuminate\Http\Request;
use App\Http\Controllers\Controller ; 

use App\User ;  


class UsersController extends Controller {



	 public function index(){

		$search = request('username'); 

    	return User::where('username','LIKE',"$search%")
    		->get();
    }


}