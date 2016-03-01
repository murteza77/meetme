<?php

use App\Models\User;

//return the direction e.g ltr or rtl
function direction()
{
	return config('app.dir')[lang()];
}

//check locale direction
function isRTL()
{
	return direction() == 'rtl' ? true: false;
}

function lang()
{
	return app()->getLocale();
}

