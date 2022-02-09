<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use App\Models\control\Staff;
use App\Models\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
   public function index(Request $request)
   {
    if(session('user') != null)
    {
        $vars = array();
        //$vars['staff'] = $this->Staff->read(array('staff_id' => get_cookie($this->config->item('admin_cookie_salt'))));
        $var['staff'] = Session::get('user')->staff_id;
        
       // $this->load->library('pagination');

        
        $config['num_links'] = 5;
        $config['page_query_string'] = TRUE;

        //$config['base_url'] = url().'customers_controller/index/?searchwords='.$request->searchwords;
        //$config['total_rows'] = $this->Customers->read(array('search_words' => $request->searchwords, 'total_only' => TRUE));;
        //$config['per_page'] = '20';

       // $vars['customers'] = $this->Customers->read(array('search_words' => $request->searchwords, 'offset' => $this->input->get('per_page'), 'sort_by' => 'firstname, lastname'));
        //$vars['customers'] = $this->Customers->read(array('search_words' => $request->searchwords, 'offset' => $this->input->get('per_page'), 'sort_by' => 'firstname, lastname'));
      if($request->has('searchwords'))
      {
        $vars['customers'] = customers::where('firstname', 'Like', '%' . $request->searchwords . '%')->orwhere('lastname', 'Like', '%' . $request->searchwords . '%')->orderby('firstname','asc')->orderby('lastname','asc')->paginate(50)->appends(['search' => $request->search_words]);
      }
      else{
        $vars['customers'] = customers::orderby('firstname','asc')->orderby('lastname','asc')->paginate(50);
    
      }
        $vars['searchwords'] = $request->searchwords;
      
        //$this->pagination->initialize($config);
      

       //$this->load->view('customers/list', $vars);

        $class = 'customer';
        return view('customers.index',compact('class','vars'));
    }
    else{
        Session::flash('message','invalid credentials');
        return  redirect()->route('control.loginpage');
    }
   }
}
