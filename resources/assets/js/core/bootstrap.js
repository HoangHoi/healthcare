
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

window.fixTop = (element, scrollElement = null, distanceToTop = 0, condition = null) => {
    if (scrollElement) {
        scrollElement = $(scrollElement);
    } else {
        scrollElement = $(window);
    }
    let elementOffsetOrigin = $(element).offset();
    if (!elementOffsetOrigin) {
        return;
    }
    let handleScroll = () => {
        let scrollTop = $(window).scrollTop();
        let distance = (elementOffsetOrigin.top - scrollTop);
        let conditionVa = true;
        if (typeof condition == 'function') {
            conditionVa = condition();
        }
        if (distance < 0 && conditionVa) {
            $(element).css({'top' : `${Math.abs(distance + distanceToTop)}px`});
        } else {
            $(element).css({'top' : ''});
        }
    };

    $(scrollElement).on('resize', () => {
        $(element).css({'top' : ''});
        elementOffsetOrigin = $(element).offset();
        handleScroll();
    });
    $(scrollElement).on('scroll', handleScroll);
    handleScroll();
}

fixTop('.right-menu-info');
// fixTop('.left-menu-description');
fixTop('.filter-tool-bar', null, 0, () => {
    return $(window).width() > 768;
});
