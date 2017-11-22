$(function(){
    if(location.pathname == '/'){
        $('body').addClass('home');
    }
    if(location.pathname.indexOf('/category/') >= 0){
        $('body').addClass('category');
    }
});