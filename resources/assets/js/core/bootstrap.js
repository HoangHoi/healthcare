
window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token.content,
        }
    });
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

window.fixTop = (element, distanceToTopOrigin = 500, scrollElement = null, distanceToTop = 0) => {
    if (scrollElement) {
        scrollElement = $(scrollElement);
    } else {
        scrollElement = $(window);
    }

    let handleScroll = () => {
        let scrollTop = $(window).scrollTop(),
            elementOffset = $(element).offset().top;
        if (scrollTop > distanceToTopOrigin) {
            $(element).css({'top' : `${distanceToTop + scrollTop - distanceToTopOrigin}px`});
        } else {
            $(element).css({'top' : ''});
        }
    };

    $(scrollElement).on('scroll', handleScroll);
    handleScroll();
}

fixTop('.right-menu-info');
