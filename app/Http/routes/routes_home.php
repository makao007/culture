<?php
/**
 * 这里是前台页面路由
 */

//Route::get('home',function(){
//    return 'home';
//});

Route::group(['prefix'=>'/','namespace'=>'Home'],function(){
    //前台首页路由
    Route::any('/','HomeController@index');
    Route::any('home','HomeController@index');
    Route::any('creation','CreationController@index');
    //产品样片
    Route::any('product','ProductController@index');
    Route::get('product/{id}','ProductController@show');
    Route::get('product/click/{id}/{num}','ProductController@setClick');
    Route::get('product/video/{id}/{videoid}','ProductController@video');
    //在线作品
    Route::any('creation','CreationController@index');
    //创意脚本
    //分镜画面
    Route::get('storyboard/like/{way}/{id}','StoryBoardController@like');
    Route::get('{way}/storyboard','StoryBoardController@index');
    Route::get('storyboard/{id}','StoryBoardController@show');
    Route::any('storyboard','StoryBoardController@index');
    //供应单位
    Route::get('{genre}/supply','SupplyController@index');
    Route::any('supply','SupplyController@index');
    //需求信息
    Route::get('demand/genre/{genre}','DemandController@index');
    Route::any('demand','DemandController@index');
    //娱乐频道
    Route::get('entertain/{genre0}/{genre}','EntertainController@index');
    Route::any('entertain','EntertainController@index');
    Route::get('entertain/{id}','EntertainController@show');
    Route::get('entertain/staff/show/{id}','EntertainController@staffShow');
    //租赁频道
    Route::get('rent/SD/{genre}','RentController@index');
    Route::get('rent/m/{from}/{to}','RentController@index');
    Route::resource('rent','RentController');
    //设计频道
    Route::any('design','DesignController@index');
    //关于我们
    Route::any('about','AboutController@index');
    Route::get('about/join','AboutController@join');
    //用户对本站的意见栏
    Route::get('opinion/create/{reply}','OpinionController@create');
    Route::get('opinion/create','OpinionController@create');
    Route::post('opinion/{id}','OpinionController@update');
    Route::get('{status}/opinion','OpinionController@index');
    Route::resource('opinion','OpinionController');
    //创意路由
    Route::get('idea/click/{id}/{click}','IdeaController@click');
    Route::get('idea/collect/{id}/{collect}','IdeaController@collect');
    Route::resource('idea','IdeaController');
    //话题路由
    Route::post('talk/{id}','TalkController@update');
    Route::get('talk/mytalk','TalkController@mytalk');
    Route::get('talk/follow','TalkController@follow');
    Route::get('talk/theme','TalkController@theme');
    Route::get('talk/collect','TalkController@collect');
    Route::get('talk/tofollow','TalkController@tofollow');
    Route::get('talk/tothank','TalkController@tothank');
    Route::get('talk/toclick','TalkController@toclick');
    Route::get('talk/toshare','TalkController@toshare');
    Route::get('talk/toreport','TalkController@toreport');
    Route::get('talk/tocollect','TalkController@tocollect');
    Route::get('talk/mycollect/{id}','TalkController@tomycollect');
    Route::get('talk/{id}/destroy','TalkController@destroy');
    Route::get('talk/{id}/restore','TalkController@restore');
    Route::get('talk/{id}/forceDelete','TalkController@forceDelete');
    Route::resource('talk','TalkController');
    //新手帮助路由
    Route::resource('newuser','NewUserController');
});