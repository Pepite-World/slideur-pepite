// window.swiperVideoInit = function (data) {
window.onSwiperTransitionEnd = function (data) {
    let i = $(".swiper-slide").length;
    console.log( i )
    for ( var j = 0; j < i; j++) {
        try {
            // Get jQuery iFrame
            const iframe = $(data.el).find('.pesl_pepite_slider_item').eq(j).find('iframe').eq(0)

            // Youtube
            if( iframe.attr('src').indexOf('youtube.com') !== -1 ) {

                // Test HtmlElement prop
                if ( iframe.get(0).contentWindow) {
                    // Play incoming slide
                    if ( j === data.activeIndex ) {
                        iframe.get(0).contentWindow.postMessage('{\"event\":\"command\",\"func\":\"playVideo\",\"args\":\"\"}', '*');
                    } 
                    // Pause all other slides
                    else {
                        iframe.get(0).contentWindow.postMessage('{\"event\":\"command\",\"func\":\"pauseVideo\",\"args\":\"\"}', '*');
                    }
                }
            }
            
            // Vimeo
            else if (  iframe.attr('src').indexOf('vimeo.com') !== -1 ) {
                const vimeoPlayer = new Vimeo.Player(iframe);
                // console.log( vimeoPlayer)
                // Play incoming slide
                if ( j === data.activeIndex ) {
                    vimeoPlayer.play().then(()=>{console.log("play")});
                }
                // Pause all other slides
                else {
                    vimeoPlayer.pause().then(()=>{console.log("pause")});
                }
                // console.log(j, data.activeIndex)
            }

        }
        catch(e){
            console.debug( e )
            continue
        }
    }
}
// window.onSwiperTransitionEnd = swiperVideoInit;