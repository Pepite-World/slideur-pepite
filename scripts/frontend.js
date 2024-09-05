
window.onSwiperTransitionEnd = function (data) {
    let i = $(".swiper-slide").length;
    for ( var j = 0; j < i; j++) {
        try {
            // Get jQuery iFrame
            const iframe = $(data.el).find('.pesl_pepite_slider_item').eq(j).find('iframe').eq(0)
            

            // Youtube
            if( iframe.attr('src').indexOf('youtube') !== -1 ) {

                // Test HtmlElement prop
                if ( iframe.get(0).contentWindow) {
                    // Play incoming slide
                    if ( j === data.activeIndex ) {
                        // console.log("Play " + player.attr('id') )
                        iframe.get(0).contentWindow.postMessage('{\"event\":\"command\",\"func\":\"playVideo\",\"args\":\"\"}', '*');
                    } 
                    // Pause all other slides
                    else {
                        // console.log("Pause " + player.attr('id') )
                        iframe.get(0).contentWindow.postMessage('{\"event\":\"command\",\"func\":\"pauseVideo\",\"args\":\"\"}', '*');
                    }
                }
            }
            
            // Vimeo
            else if (  iframe.attr('src').indexOf('vimeo') !== -1 ) {
                const vimeoPlayer = new Vimeo.Player(iframe);
                // Play incoming slide
                if ( j === data.activeIndex ) {
                    vimeoPlayer.play();
                }
                // Pause all other slides
                else {
                    // console.log("Pause " + player.attr('id') )
                    vimeoPlayer.pause();
                }
            }
        }
        catch(e){
            continue
        }
    }
}