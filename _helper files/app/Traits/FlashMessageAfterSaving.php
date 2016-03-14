<?php namespace App\Traits;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait FlashMessageAfterSaving
{
	protected static function boot()
	{
		parent::boot();

		static::created(function () {
			Session::flash('success', ' تمت الإضافة بنجاح');
		});

		if (method_exists('restored', 'read')) {
			static::restored(function () {
				Session::flash('success', ' تمت الإستعادة بنجاح');
			});
		}

		static::updated(function () {
			Session::flash('success', ' تم التعديل بنجاح');
		});

		static::deleted(function () {
			Session::flash('success', ' تم الحذف بنجاح');
		});
	}
}