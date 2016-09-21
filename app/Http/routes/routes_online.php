<?php

/**
 * 在线创作路由
 */

//用户自己的创作房间
Route::group(['prefix'=>'online','middleware' =>'MemberAuth','namespace'=>'Online'],function(){
    Route::get('u','HomeController@userlist');
    //单帧编辑路由
    Route::resource('{pid}/frame','FrameController');
    Route::get('{pid}/frame/con/{attrid}','FrameController@setCon');
    Route::get('{pid}/frame/style/{attrid}','FrameController@setStyle');
    Route::get('{pid}/frame/layer/{layerid}','FrameController@setLayer');
    //当前动画设置的路由
    Route::get('{pid}/frame/timecurr/{layerid}','FrameController@setTimeCurr');
    Route::get('{pid}/frame/timecurr2/{timecurr}','FrameController@setTimeCurr2');
});

//创作效果样片大厅
Route::group(['prefix'=>'','namespace'=>'Online'],function() {
    //在线预览
    Route::get('online', 'HomeController@index');
    //动画模板
    Route::get('p/lay', 'HomeController@lay');
});

//用户参数路由
Route::group(['prefix'=>'','middleware' =>'MemberAuth','namespace'=>'Common'],function() {
    Route::get('footSwitch/set/{footSwitch}', 'UserParamsController@setFootSwitch');
});