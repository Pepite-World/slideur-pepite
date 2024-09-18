window.onSwiperInit = function (data) { 

    // Play video on Swiper init if necessary (Vimeo won't start alone)

    // Get jQuery iFrame
    const iframe = $(data.el).find('.pesl_pepite_slider_item').eq(0).find('iframe').eq(0)

    // Youtube
    if( iframe.attr('src').indexOf('youtube.com') !== -1 ) {

        // Test HtmlElement prop
        if ( iframe.get(0).contentWindow) {
            iframe.get(0).contentWindow.postMessage('{\"event\":\"command\",\"func\":\"playVideo\",\"args\":\"\"}', '*');
        }
    }
    
    // Vimeo
    else if (  iframe.attr('src').indexOf('vimeo.com') !== -1 ) {
        const vimeoPlayer = new Vimeo.Player(iframe);
        vimeoPlayer.play()

    }
}

window.onSwiperTransitionEnd = function (data) {
    let i = $(".swiper-slide").length;
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
                // Play incoming slide
                if ( j === data.activeIndex ) {
                    vimeoPlayer.play()
                }
                // Pause all other slides
                else {
                    vimeoPlayer.pause()
                }
            }

        }
        catch(e){
            continue
        }

    }
}
// $('.et_pb_module.pesl_pepite_slider.swiper').on("mousemove", (e)=>{
//     var rect = e.target.getBoundingClientRect();
//     var x = e.clientX - rect.left;
//     var centerX = (rect.right - rect.left) / 2;
//     var zone = x < centerX ? console.log('Left') : console.log('Right');
// })
// window.onSwiperTransitionEnd = swiperVideoInit;