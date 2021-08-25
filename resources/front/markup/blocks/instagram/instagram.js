import Instafeed from 'instafeed.js'

function instaFeed () {

    const feed = new Instafeed({
        accessToken: 'IGQVJWd2NUaTREbmlrU0JXTlhuUWluQVpnUEdha2N6aVBpV2xzUURta3lGTTRUUTBsdmlvYzh0NG14T3dlOXFiVGhfSmVOeEZAaNU16bk5Ub2JHcV9zLUZA5RU93Vmo4TEl3Ym1vaU9R',
        // debug: true,
        limit: 6,
        target: 'instafeed',
        template: '<figure class="instagram__item"><a class="instagram__link" href="{{link}}"><img src="{{image}}" title="{{caption}}" alt="{{caption}}"></a></figure>'
    });

    feed.run();

}


export default instaFeed
