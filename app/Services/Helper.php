<?php

namespace App\Services;

use Illuminate\Support\Facades\View;

class Helper
{
    static public function loadJavascript($include_javascript){
    	$shared = View::getShared()["include_javascript"];
    	if(is_array($shared)){
    		$shared[] = $include_javascript;
    	}else{
    		$shared = array($include_javascript);
    	}
    	View::share('include_javascript',$shared);
    }

    static public function loadCss($include_css){
    	$shared = View::getShared()["include_css"];
    	if(is_array($shared)){
    		$shared[] = $include_css;
    	}else{
    		$shared = array($include_css);
    	}
    	View::share('include_css',$shared);
    }

}
