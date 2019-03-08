<?php

namespace App\Http\ViewComposers;

use Illuminate\ {
    View\View,
    Support\Facades\Route
};

class HeaderComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Breadcrumb
        $elements = config ('breadcrumbs');
        $segments = request()->segments();

        foreach ($segments as $segment) {
            if (!is_numeric($segment)) {
            	if(isset($elements[$segment])){
                	$elements[$segment]['name'] = __('admin.breadcrumbs.' . $elements[$segment]['name'] . '-name');
            	}else{
            		$elements[$segment]['name'] = 'unknow';
            	}
                if($segment === end($segments)) {
                    $elements[$segment]['url'] = '#';
                }
                $breadcrumbs[] = $elements[$segment];
            }
        }

        // Title
        //file_put_contents('php://stderr', PHP_EOL.print_r(Route::currentRouteName(),true).PHP_EOL, FILE_APPEND);
        $title = config('titles.' . Route::currentRouteName());
        $title = __('admin.titles.' . $title);
        file_put_contents('php://stderr', PHP_EOL.print_r($title,true).PHP_EOL, FILE_APPEND);

        // Notifications
        $countNotifications = auth()->user()->unreadNotifications()->count();

        if (strpos($title, 'admin.titles') !== false) {
			$title = ucwords(str_replace(".", " ", Route::currentRouteName()));
        	$view->with(compact('breadcrumbs', 'title', 'countNotifications'));
		}else{
        	$view->with(compact('breadcrumbs', 'title', 'countNotifications'));
		}

    }
}