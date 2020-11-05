<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function index(){
        Customer::get();
    }

    public function store(){


        Customer::create($this->validateRequest());
    }

    public function edit($id){
        Customer::where('id',$id)->get();
    }

    public function update(Customer $customer){
        $customer->update($this->validateRequest());
    }

    public function validateRequest(){
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
    }
}
