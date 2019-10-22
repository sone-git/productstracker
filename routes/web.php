<?php

Route::get('/{any}', function () {
  return view('product');
})->where('any', '.*');
