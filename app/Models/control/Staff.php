<?php

namespace App\Models\control;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory; 
    protected $table = 'staffcontrol';


    // function read($options = array())
    // {
    //     // default values
    //     $options = $this->_default(array('sort_direction' => 'asc', 'limit' => 20, 'offset' => 0), $options);

    //     // Add where clauses to query
    //     $qualification_array = array('staff_id', 'email', 'username', 'status');
    //     foreach($qualification_array as $qualifier)
    //     {
    //         if(isset($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
    //     }

    //     // If limit / offset are declared (usually for pagination) then we need to take them into account
    //     if(isset($options['limit']) && isset($options['offset'])) $this->db->limit($options['limit'], $options['offset']);
    //     else if(isset($options['limit'])) $this->db->limit($options['limit']);

    //     // sort
    //     if(isset($options['sort_by'])) $this->db->order_by($options['sort_by'], $options['sort_direction']);

    //     $result = $this->db->get('staff');
    //     if($result->num_rows() == 0) return false;

    //     if(isset($options['staff_id']) || isset($options['email']) || isset($options['username']))
    //     {
    //         // If we know that we're returning a singular record
    //         return $result->row_array();
    //     }
    //     else
    //     {
    //         // If we could be returning any number of records
    //         return $result;
    //     }

    // }

    // function create($options) 
    // {
    //     // required values
    //     if(!$this->_required(array('email', 'username', 'firstname', 'lastname'), $options)) return false;

    //     // default values
    //     $options = $this->_default(array('status' => 'active'), $options);

    //     // qualification (make sure that we're not allowing the site to insert data that it shouldn't)
    //     $qualification_array = array('email', 'username', 'password');
    //     foreach($qualification_array as $qualifier)
    //     {
    //         if(isset($options[$qualifier])) $this->db->set($qualifier, $options[$qualifier]);
    //     }

    //     // MD5 the password if it is set
    //     //if(isset($options['password'])) $this->db->set('password', md5($options['password']));

    //     // Execute the query
    //     $this->db->insert('staff');

    //     // Return the ID of the inserted row, or false if the row could not be inserted
    //     return $this->db->insert_id();
    // }

    // function update($options)
    // {
    //     // required values
    //     if(!$this->_required(array('staff_id'), $options)) return false;

    //     // qualification (make sure that we're not allowing the site to update data that it shouldn't)
    //     $qualification_array = array('email', 'username', 'password', 'firstname', 'lastname', 'status');
    //     foreach($qualification_array as $qualifier)
    //     {
    //         if(isset($options[$qualifier])) $this->db->set($qualifier, $options[$qualifier]);
    //     }

    //     $this->db->where('staff_id', $options['staff_id']);

    //     // MD5 the password if it is set
    //     //if(isset($options['password'])) $this->db->set('password', md5($options['password']));

    //     // Execute the query
    //     $this->db->update('staff');

    //     // Return the number of rows updated, or false if the row could not be inserted
    //     return $this->db->affected_rows();
    // }

    // function delete()
    // {
    //     // required values
    //     if(!$this->_required(array('staff_id'), $options)) return false;

    //     $this->db->where('staff_id', $options['staff_id']);
    //     $this->db->delete('staff');
    // }

    // function check_login()
    // {
    //     $staff_id = get_cookie($this->config->item('admin_cookie_salt'));
    //     if(is_numeric($staff_id))
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         //not logged in
    //         return false;
    //     }
    // }

    // function get_loged()
    // {
    //     $staff_id = get_cookie($this->config->item('admin_cookie_salt'));
    //     return $this->read(array('staff_id' => $staff_id));
    // }
}
