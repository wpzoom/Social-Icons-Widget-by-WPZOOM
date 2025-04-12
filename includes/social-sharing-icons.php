<?php
/**
 * SVG Icons for Social Sharing Block
 *
 * @package WPZOOM_Social_Icons
 */

/**
 * Return SVG markup for social sharing icons
 *
 * @param string $icon_id The icon ID.
 * @param int    $size    The icon size in pixels.
 * @param string $color   The icon color.
 * @return string SVG markup.
 */
function wpzoom_social_sharing_get_svg_icon( $icon_id, $size = 24, $color = '#ffffff' ) {
    $icon_markup = '';
    
    // Set viewBox and scale based on size
    $viewbox = '0 0 24 24';
    $icon_size = $size;
    
    // Define icon paths for different social networks
    switch ( $icon_id ) {
        case 'facebook':
            $icon_markup = '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />';
            break;
        case 'x':
            $icon_markup = '<path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z" />';
            break;
        case 'linkedin':
            $icon_markup = '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />';
            break;
        case 'pinterest':
            $icon_markup = '<path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z" />';
            break;
        case 'reddit':
            $icon_markup = '<path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z" />';
            break;
        case 'pocket':
            $icon_markup = '<path d="M21.9 4.26c.1.13.1.27.1.41v6.1c0 2.47-.97 4.79-2.75 6.53l-7.19 6.66c-.57.53-1.28.8-2 .8s-1.43-.27-2-.8l-7.17-6.66C.97 15.56 0 13.24 0 10.77v-6.1c0-.15.02-.27.06-.41.11-.4.39-.74.78-.9C1.11 3.24 1.36 3.2 1.6 3.2h19.8c.22 0 .47.03.7.15.4.17.64.51.8.91zm-9.9 12.89c.18-.2.3-.57.3-.8 0-.24-.06-.44-.18-.59-.3-.4-.8-.4-1.09-.04-.19.14-.3.44-.3.69 0 .22.08.43.25.59.17.15.33.23.56.23.23 0 .41-.05.56-.15v.41c0 .41-.03.61-.06.7-.08.18-.3.36-.53.36s-.48-.18-.53-.36c0-.09-.09-.29-.09-.7v-2.72c0-.42.03-.61.06-.7.08-.19.3-.37.56-.37s.48.18.56.37c.03.09.06.28.06.7v1.28zm10.48-5.82c0 1.65-.67 3.22-1.85 4.37l-6.37 5.9c-.39.36-.85.48-1.35.31-.18-.06-.33-.17-.46-.31l-6.37-5.9c-1.12-1.15-1.79-2.71-1.79-4.37V4.66c0-.18.03-.3.09-.39.09-.18.27-.38.87-.36h3.28c.42 0 .61.03.7.06.18.08.36.35.36.56s-.18.47-.36.56c-.09.03-.28.06-.7.06H5.33c-.11 0-.25.01-.3.17-.02.07-.01.09-.01.16v5.32c0 1.31.53 2.57 1.48 3.48l6.34 5.88c.13.12.31.15.47.08.05-.02.1-.05.14-.08l6.34-5.88c.9-.92 1.45-2.17 1.45-3.48V5.21c0-.07 0-.08-.02-.16-.05-.14-.16-.16-.3-.16h-2.84c-.42 0-.61-.03-.7-.06-.18-.09-.36-.36-.36-.56s.18-.48.36-.56c.09-.03.28-.06.7-.06h3.31c.54 0 .79.17.88.36.05.09.08.21.08.39v5.17z" />';
            break;
        case 'telegram':
            $icon_markup = '<path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 11.944 0zm3.566 8.16c.166-.046.341.037.395.195.028.08.032.164.008.244 0 0-.208 2.156-.44 4.012-.236 1.804-.513 3.08-.545 3.197-.061.224-.162.42-.3.59-.217.254-.5.297-.76.213-.162-.056-1.676-.65-2.048-.802-.029-.012-.057-.027-.086-.042-.068-.04-.13-.085-.18-.138-.619-.686-.185-1.122.137-1.41.302-.346 2.268-2.112 2.435-2.27.207-.195.37-.467.17-.7-.188-.218-.546-.154-.704-.117-.297.152-3.493 2.144-4.85 2.98-.201.122-.433.177-.67.177-1.022-.02-1.374-.228-1.374-.228.43-.243 1.133-.747 1.133-.747 1.56-1.023 3.52-2.357 4.2-2.85 1.56-1.135 1.96-1.314 2.48-1.314z" />';
            break;
        case 'whatsapp':
            $icon_markup = '<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />';
            break;
        case 'viber':
            $icon_markup = '<path d="M11.398.002C9.161.057 5.179.558 3.321 2.152c-1.23 1.121-1.185 2.826-1.526 4.791-.341 1.965-.757 5.778 1.203 8.665a17.358 17.358 0 0 0 7.22 5.835c2.987 1.215 4.579-.234 4.579-.234s.617-.748-.208-1.188a39.95 39.95 0 0 1-2.89-1.656c-.594-.374-.476-1.273.036-1.589.035-.022 2.4-1.833 3.301-2.862 1.568-1.699.876-3.724-1.258-3.974 0 0-1.98-.255-3.596 1.19-.902.818-1.919 1.7-2.836 2.007-.836.279-1.629-.127-1.796-.57-.361-.966-.408-1.987-.231-3.067.333-2.023 3.56-4.827 3.56-4.827S6.457 3.04 6.007 3.076a5.398 5.398 0 0 0-1.052.23c-.394.134-2.314 1.365-3.702 2.953-1.388 1.59-3.29 4.537-2.677 8.744.613 4.207 3.146 6.942 4.408 7.98 0 0 5.031 3.836 10.744 3.623 5.713-.214 9.463-3.159 9.935-3.996 1.295-1.151 2.075-2.486 2.562-3.451 1.399-2.281 1.994-5.635 1.735-9.275-.387-5.457-3.202-8.098-5.702-9.125-2.5-1.027-8.408-1.351-10.86-.757zm-.703 2.766c3.484-.493 6.077.197 7.51.513 1.434.317 4.326 1.311 5.196 5.364.654 3.048.384 5.821-.42 7.196-.803 1.374-1.01 1.53-1.01 1.53s-3.231 3.088-9.203 3.088c-5.973 0-8.827-2.539-8.827-2.539s-2.184-1.974-2.315-5.39c-.13-3.414 1.443-5.404 1.443-5.404s3.088-3.098 4.827-3.522c1.74-.425 2.799-.835 2.799-.835z" />';
            break;
        case 'bluesky':
            $icon_markup = '<path d="M12 10.8c-1.087-1.12-2.11-2.319-3.033-3.542C8.257 6.492 7.535 5.246 6.5 4 3.6 7.122 3.5 8.427 3.5 9.5c0 3.252 4 5.5 8.5 5.5 3.09 0 6.093-1.372 7.504-3.455.704-1.04 1-2.245.996-3.455-.004-1.199-.457-2.345-1.147-3.124C18.562 4.166 17.497 3.5 16 3.5c-2.5 0-2.5 1.624-2.5 2.5 0 1.552 1.098 2.324 2 3.5.902 1.176 1.5 2.37 1.5 4.5.002.411-.12.842-.227 1.153-.107.314-.207.52-.273.597-1.02 1.213-3.864 2.247-7 2.25-4.333.004-7.5-2.748-7.5-6.5 0-3 1.214-4.44 3.5-8.5 3.48 2.556 5.5 4.96 5.5 7.5v-1.5c0-1.5 0-3-2-3s-2 1.5-2 3v1.5c0 .652.086 1.176.156 1.52.068.34.123.484.144.48s.076-.148.144-.48c.07-.343.156-.867.156-1.52v-1.5c0-1.5 0-3 2-3s2 1.5 2 3z" />';
            break;
        case 'email':
            $icon_markup = '<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-7.07 4.42c-.32.2-.74.2-1.06 0L4.4 8.25c-.25-.16-.4-.43-.4-.72 0-.67.73-1.07 1.3-.72L12 11l6.7-4.19c.57-.35 1.3.05 1.3.72 0 .29-.15.56-.4.72z" />';
            break;
        case 'copy-link':
            $icon_markup = '<path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />';
            break;
        default:
            $icon_markup = '<path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" />';
    }
    
    // Create SVG element with style attributes
    $svg = sprintf(
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="%s" width="%d" height="%d" style="fill:%s;" aria-hidden="true" focusable="false">%s</svg>',
        esc_attr( $viewbox ),
        esc_attr( $icon_size ),
        esc_attr( $icon_size ),
        esc_attr( $color ),
        $icon_markup
    );
    
    return $svg;
}

/**
 * Generate share URL for a specific platform
 *
 * @param string $platform_id The platform ID.
 * @param string $url The URL to share.
 * @param string $title The title to share.
 * @param string $featured_image The featured image URL.
 * @return string The share URL.
 */
function wpzoom_social_sharing_get_share_url( $platform_id, $url, $title, $featured_image = '' ) {
    switch ( $platform_id ) {
        case 'facebook':
            return 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $url ) . '&t=' . urlencode( $title );
        case 'x':
            return 'https://x.com/intent/tweet?url=' . urlencode( $url ) . '&text=' . urlencode( $title );
        case 'linkedin':
            return 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode( $url );
        case 'pinterest':
            return 'https://pinterest.com/pin/create/button/?url=' . urlencode( $url ) . '&media=' . urlencode( $featured_image ) . '&description=' . urlencode( $title );
        case 'reddit':
            return 'https://www.reddit.com/submit?url=' . urlencode( $url ) . '&title=' . urlencode( $title );
        case 'pocket':
            return 'https://getpocket.com/save?url=' . urlencode( $url ) . '&title=' . urlencode( $title );
        case 'telegram':
            return 'https://t.me/share/url?url=' . urlencode( $url ) . '&text=' . urlencode( $title );
        case 'whatsapp':
            return 'https://api.whatsapp.com/send?text=' . urlencode( $title . ' ' . $url );
        case 'viber':
            return 'viber://forward?text=' . urlencode( $title . ' ' . $url );
        case 'bluesky':
            return 'https://bsky.app/intent?text=' . urlencode( $title . ' ' . $url );
        case 'email':
            return 'mailto:?subject=' . urlencode( $title ) . '&body=' . urlencode( $url );
        case 'copy-link':
            return '#copy-link';
        default:
            return '#';
    }
}

/**
 * Get platform color by ID
 *
 * @param string $platform_id The platform ID.
 * @return string The platform color.
 */
function wpzoom_social_sharing_get_platform_color( $platform_id ) {
    switch ( $platform_id ) {
        case 'facebook':
            return '#0866FF';
        case 'x':
            return '#000000';
        case 'linkedin':
            return '#0966C2';
        case 'pinterest':
            return '#E60023';
        case 'reddit':
            return '#FF4500';
        case 'pocket':
            return '#EF3F56';
        case 'telegram':
            return '#0088cc';
        case 'whatsapp':
            return '#25D366';
        case 'viber':
            return '#665CAC';
        case 'bluesky':
            return '#1DA1F2';
        case 'email':
        case 'copy-link':
        default:
            return '#333333';
    }
}

/**
 * Return a success/check mark SVG icon
 *
 * @param int    $size    The icon size in pixels.
 * @param string $color   The icon color.
 * @return string SVG markup.
 */
function wpzoom_social_sharing_get_success_icon( $size = 24, $color = '#ffffff' ) {
    // Set viewBox and scale based on size
    $viewbox = '0 0 24 24';
    $icon_size = $size;
    
    // Check mark / success icon path
    $icon_markup = '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />';
    
    // Create SVG element with style attributes
    $svg = sprintf(
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="%s" width="%d" height="%d" style="fill:%s;" aria-hidden="true" focusable="false">%s</svg>',
        esc_attr( $viewbox ),
        esc_attr( $icon_size ),
        esc_attr( $icon_size ),
        esc_attr( $color ),
        $icon_markup
    );
    
    return $svg;
} 