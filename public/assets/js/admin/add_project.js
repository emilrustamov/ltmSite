$(document).ready(function(){
    // ------------
    // Loader
    // ------------
    
    $(window).on('load', function(){
        $('.loaders').hide(200);
    });
    
    // ------------

    // tm button
    $('#tm-btn').click(function(){
        // button active
        $('.nav-link').removeClass('active');
        $('#tm-btn>.nav-link').addClass('active');
        // Card show
        $('.info-cards').addClass('dnone');
        $('#tm-card').removeClass('dnone');
    });
    // ru button
    $('#ru-btn').click(function(){
        // button active
        $('.nav-link').removeClass('active');
        $('#ru-btn>.nav-link').addClass('active');
        // Card show
        $('.info-cards').addClass('dnone');
        $('#ru-card').removeClass('dnone');
    });
    // eng button
    $('#eng-btn').click(function(){
        // button active
        $('.nav-link').removeClass('active');
        $('#eng-btn>.nav-link').addClass('active');
        // Card show
        $('.info-cards').addClass('dnone');
        $('#eng-card').removeClass('dnone');
    });

    // Form submit
    $("form").submit(function(){
        $('.loading-page').removeClass('dnone');
    });

    // Editor
    $('.send').click(function(){
        let langus = ['tm', 'ru', 'en']
        for (let index = 0; index < langus.length; index++) {
            let content = $('.editor[edit="editor_'+langus[index]+'"]').html();
            $('.editor_'+langus[index]).val(content);
        }
        
    });

});
