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
		   	$data['msg']='Gagal';
		   	$data['errors']=$errors;
		   	$data['code']=403;
		   	// echo json_encode($data);
		   	return \Response::make(json_encode($data), 403);
	   }
	 public function forbiddenResponse()
	 {
	     return \Response::make('Permission denied foo!', 200);
	 }

}
