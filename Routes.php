<?php

    Route::set('index.php', function(){
        Index::CreateView('Index');
    });

    Route::set('password_recovery', function(){
        Password_recovery::CreateView('password_recovery');
        Password_recovery::change();
        //Password_recovery::forget();

    });

    Route::set('logout', function(){
        logout::CreateView('Logout');
        logout::out('Logout');
        Logout::preferance_logout();
    });

    Route::set('change_password', function(){
        Change_password::CreateView('Change_password');
        Change_password::change('Change_password');
    });
    Route::set('change_particulars', function(){
        Change_particulars::CreateView('Change_particulars');
        Change_particulars::change_email();
        Change_particulars::change_user_name();
        Change_particulars::preferance_update();
    });

    Route::set('forgot_password', function(){
        Forgot_password::CreateView('Forgot_password');
        Forgot_password::forget('Forgot_password');
    });
    
    Route::set('workarea', function(){
        Workarea::CreateView('Workarea');
        //Workarea::saveImage('Workarea');
        Workarea::ImgDel('Workarea');
        //Save::do_save();
        
    });

    Route::set('upload', function(){
        Workarea::CreateView('Upload');
        //Workarea::saveImage('Workarea');
        Workarea::ImgDel();
        //Workarea::Upload();
        
    });

    Route::set('deshbord', function(){
        Creata_account::CreateView('Creata_account');
        Creata_account::test('Creata_account');

    });
    Route::set('finish', function(){
        Finish::CreateView('Finish');
        //Finish::test('Finish');

    });

    Route::set('welcome', function(){
        Welcome::CreateView('Welcome');
    });

    Route::set('confirm', function(){
        Welcome::CreateView('Confirmed');
    });

    Route::set('gallary', function(){
        Image_posts::CreateView('Image_posts');
        Image_posts::ImgPost('Image_posts');
    });

    Route::set('user-profile', function () {
    UserProfile::CreateView('UserProfile');
    });

    Route::set('login', function(){
        Login::CreateView('Login');
        Login::log('Login');
        Login::preferance_login();
    });
?>