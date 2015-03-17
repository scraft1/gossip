<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmailRequest extends Request {

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
		return [
			//
			'subject' => 'required|min:3',  // at least 3 characters long
			'to' => 'required',
			'from' => 'required',
			'body' => 'required',
			'sent_at' => 'required|date'
		];
	}

}
