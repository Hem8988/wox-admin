<?php
//Route::post('/Affiliate/signup', 'Affiliate\AgentController@signup')->name('agent.signup'); 
Route::prefix('affiliate')->group(function() {
  //Login and Logout 
Route::get('/', 'Auth\AffiliateLoginController@showLoginForm')->name('affiliate.login');
Route::get('/login', 'Auth\AffiliateLoginController@showLoginForm')->name('affiliate.login');
Route::post('/login', 'Auth\AffiliateLoginController@login')->name('affiliate.login');
Route::post('/logout', 'Auth\AffiliateLoginController@logout')->name('affiliate.logout');

}); 
?>