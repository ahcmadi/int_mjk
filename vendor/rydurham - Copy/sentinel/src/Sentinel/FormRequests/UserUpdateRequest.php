<?php namespace Sentinel\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return config('sentinel.additional_user_fields');
	}
	public function response(array $errors)
	   {
	       // If you want to customize what happens on a failed validation,
	       // override this method.
	       // See what it does natively here: 
	       // https://github.com/laravel/framework/blob/master/src/Illuminate/Foundation/Http/FormRequest.php
	   		// return ($errors);
	   	// $result['total']=$entries->toArray()['total'];
	   	// $result['rows']=$entries->toArray()['data'];
	   	// return json_encode($result);


		   	$data['msg']='Gagal';
		   	$data['errors']=$errors;
		   	$data['code']=403;
		   	// echo json_encode($data);
		   	return \Response::make(json_encode($data), 403);
	   }
	 public function forbiddenResponse()
	 {
	     // Optionally, send a custom response on authorize failure 
	     // (default is to just redirect to initial page with errors)
	     // 
	     // Can return a response, a view, a redirect, or whatever else
	     return \Response::make('Permission denied foo!', 200);
	 }

}
