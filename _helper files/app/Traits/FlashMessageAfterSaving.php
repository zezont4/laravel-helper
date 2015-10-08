<?php namespace App\Traits;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait FlashMessageAfterSaving
{
	protected static function boot()
	{
		parent::boot();

		static::created(function () {
			Session::flash('success', 'Created Successfully  -  تمت الإضافة بنجاح');
		});

		if (method_exists('restored', 'read')) {
			static::restored(function () {
				Session::flash('success', 'Restored Successfully  -  تمت الإستعادة بنجاح');
			});
		}

		static::updated(function () {
			Session::flash('success', 'Updated Successfully  -  تم التعديل بنجاح');
		});

		static::deleted(function () {
			Session::flash('success', 'Deleted Successfully  -  تم الحذف بنجاح');
		});
	}
}