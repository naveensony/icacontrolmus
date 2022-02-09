<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Service\Pageblock;
class RedirectPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		
		$pageblock =  new Pageblock();		
		$blockresult = $pageblock->checkPageBlock();
		dd();
		//print_r($blockresult);
		//echo $blockresult['page_name'];
//die;
		if($blockresult['page_name']=="new-submit-entry"){
			$stud_id = $blockresult['s_id'];
			//return redirect()->route('new-submit-entry',['stu_id'=>$stud_id]);
		}
		elseif($blockresult['page_name']=="getStatus"){
			$sid = $blockresult['s_id'];
			$pid = $blockresult['pid'];
			//return redirect()->route('getStatus',['sid'=>$sid,'pid'=>$pid]);
		}	
		
		return $next($request);
			
	}
  
}

