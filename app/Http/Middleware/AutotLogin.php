<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class AutotLogin
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
		$email = $request->email;
		//UGVqbWFuYTg1QGdtYWlsLmNvbQ==  XGiQb
		$user=User::where('email',$email)->first();
		
		if(!$user){
			//return Redirect::route('musika_alert');
			return redirect('http://musikalessons.bizbullz.com/musikanotfound');
			//return response()->view('errors.404');
		}
		
		//echo $email;
		//dd($user);
		//die;
			Auth::loginUsingId($user->id);
			if(Auth::check())
			{
				return redirect('http://musikalessons.bizbullz.com/prospectives/prospectives_request?prospectiveStudentIds='.$request->chkStudentId);
			}
			else
			{
				
			}
			//prospectives/prospectives_request	
			 return $next($request);
			
		}
		
		
		
       
    }

