<?php

namespace ProAc;

use ProAc\Icons\Svg;

class SocialNetworks {

    static public function share_as_array(){
        /**
         * Text replacement tokens for urls
         * 
         * %TITLE% is the title, will be urlencoded
         * %CLEANTITLE% is the title but will not be urlencoded
         * %URI% urlencoded url
         * %URL% not urlencoded url
         * 
         */



        return [
            'facebook' => [
                        'url'       => "https://www.facebook.com/sharer.php?u=%URI%&amp;t=%TITLE%",
                        'class'     => 'spritefont-facebook',
                        'fallback'  => 'f',
                        'name'      => _x('Facebook', 'social media network name' ,  'proac'),
                    ],
            'twitter' => [
                        'url'       =>"https://twitter.com/intent/tweet?url=%URL%&amp;text=%TITLE%",
                        'class'     => 'spritefont-twitter',
                        'fallback'  => 't',
                        'name'      => _x('Twitter', 'social media network name', 'proac'),
            ],
            'whatsapp' => [
                        'url'       =>"whatsapp://send?text=%TITLE% %URI%",
                        'class'     => 'spritefont-whatsapp',
                        'fallback'  => 'w',
                        'name'      => _x('WhatsApp', 'social media network name', 'proac')
            ],
            'viber' => [
                        'url'       =>"viber://forward?text=%TITLE% %URI%",
                        'class'     => 'spritefont-viber',
                        'fallback'  => 'v',
                        'name'      => _x('Viber', 'social media network name', 'proac')
            ],
            'telegram' => [
                        'url'       =>"https://telegram.me/share/url?url=%URI%&text=%TITLE%",
                        'class'     => 'spritefont-telegram',
                        'fallback'  => 'T',
                        'name'      => _x('Telegram', 'social media network name', 'proac')
            ],
            "linkedin" => [
                        'class'     => 'spritefont-linkedin',
                        'url'       =>'https://www.linkedin.com/shareArticle?mini=true&url=%URI%&title=%TITLE%',
                        'fallback'  => 'l',
                        'name'      => _x('LinkedIn', 'social media network name', 'proac')
            ],
            "vkontakte" => [
                        'class'     => 'spritefont-vkontakte',
                        'url'       =>'https://vk.com/share.php?url=%URI%&title=%TITLE%',
                        'fallback'  => 'l',
                        'name'      => _x('Vkontakte', 'social media network name', 'proac')
            ],
            "qqzone"=> [
                        'url'       =>"http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=%URI%&summary=%TITLE%",
                        'fallback'  => 'qq',
                        'name'      => _x('QQ Zone', 'social media network name', 'proac'),
                        'class'     => 'spritefont-qqzone',
            ],
            "tencent" => [
                        'url'       =>"https://share.v.t.qq.com/index.php?c=share&a=index&title=%TITLE%&url=%URI%",
                        'fallback'  => 'tc',
                        'name'      => _x('Tencent', 'social media network name', 'proac'),
                        'class'     => 'spritefont-tencent',
            ],
            "163" =>[
                'class'     => 'spritefont-163',
                        'url'       =>"https://t.163.com/article/user/checkLogin.do?source=%E7%BD%91%E6%98%93%E5%BE%AE%E5%8D%9A&info=%TITLE%%20%URI%",
                        'fallback'  => '163',
                        'name'      => _x('163', 'social media network name', 'proac')
            ],
            "baidu" => [
                        'class'     => 'spritefont-baidu',
                        'url'       =>"https://apps.hi.baidu.com/share/?url=%URI%&title=%TITLE%&content=",
                        'fallback'  => 'b',
                        'name'      => _x('Baidu', 'social media network name', 'proac')
            ],
            "weibo" => [
                        'class'     => 'spritefont-weibo',
                        'url'       =>"https://v.t.sina.com.cn/share/share.php?title=%TITLE%&url=%URI%",
                        'fallback'  => 'w',
                        'name'      => _x('Weibo', 'social media network name', 'proac')
            ],
            "douban" => [
                        'class'     => 'spritefont-douban',
                        'url'       =>"https://www.douban.com/recommend/?url=%URI%&title=%TITLE%&sel=&v=1",
                        'fallback'  => 'd',
                        'name'      => _x('Douban', 'social media network name', 'proac')
            ],
            "kaixin" => [
                        'class'     => 'spritefont-kaixin',
                        'url'       =>"https://www.kaixin001.com/repaste/share.php?rtitle=%TITLE%&rcontent=&rurl=%URI%",
                        'fallback'  => 'k',
                        'name'      => _x('Kaixin', 'social media network name', 'proac')
            ],
            "renren" => [
                        'class'     => 'spritefont-renren',
                        'url'       =>"https://share.renren.com/share/buttonshare.do?link=%URI%&title=%TITLE%",
                        'fallback'  => 'rr',
                        'name'      => _x('Renren', 'social media network name', 'proac')
            ],

        ];
    }

    static public function follow_networks_as_array(){
        return [
            'facebook' => [
                'class'     => 'spritefont-facebook',
                'fallback'  => 'f',
                'name'      => _x('Facebook', 'social media network name', 'proac'),
            ],
            'twitter' => [
                        'class'     => 'spritefont-twitter',
                        'fallback'  => 't',
                        'name'      => _x('Twitter', 'social media network name', 'proac'),
            ],
            'whatsapp' => [
                        'class'     => 'spritefont-whatsapp',
                        'fallback'  => 'w',
                        'name'      => _x('WhatsApp', 'social media network name', 'proac')
            ],
            'youtube' => [
                'class'     => 'spritefont-youtube',
                'fallback'  => 'y',
                'name'      => _x('YouTube', 'social media network name', 'proac')
            ],
            'viber' => [
                        'class'     => 'spritefont-viber',
                        'fallback'  => 'v',
                        'name'      => _x('Viber', 'social media network name', 'proac')
            ],
            "linkedin" => [
                        'class'     => 'spritefont-linkedin',
                        'fallback'  => 'in',
                        'name'      => _x('LinkedIn', 'social media network name', 'proac')
            ],
            "vkontakte" => [
                        'class'     => 'spritefont-vkontakte',
                        'fallback'  => 'Vk',
                        'name'      => _x('Vkontakte', 'social media network name', 'proac')
            ],
            'instagram' => [
                'class'     => 'spritefont-instagram',
                'fallback'  => 'i',
                'name'      => _x('Instagram', 'social media network name', 'proac')
            ],
            'telegram' => [
                'class'     => 'spritefont-telegram',
                'fallback'  => 'T',
                'name'      => _x('Telegram', 'social media network name', 'proac')
            ],
            'pinterest' => [
                'class'     => 'spritefont-pinterrest',
                'fallback'  => 'p',
                'name'      => _x('Pinterest', 'social media network name', 'proac')
            ],
            "qqzone"=> [
                        'class'     => 'spritefont-qqzone',
                        'fallback'  => 'qq',
                        'name'      => _x('QQ Zone', 'social media network name', 'proac')
            ],
            "tencent" => [
                        'class'     => 'spritefont-tencent',
                        'fallback'  => 'tc',
                        'name'      => _x('Tencent', 'social media network name', 'proac')
            ],
            "163" =>[
                        'class'     => 'spritefont-163',
                        'fallback'  => '163',
                        'name'      => _x('163', 'social media network name', 'proac')
            ],
            "baidu" => [
                        'class'     => 'spritefont-baidu',
                        'fallback'  => 'b',
                        'name'      => _x('Baidu', 'social media network name', 'proac')
            ],
            "weibo" => [
                        'class'     => 'spritefont-weibo',
                        'fallback'  => 'w',
                        'name'      => _x('Weibo', 'social media network name', 'proac')
            ],
            "douban" => [
                        'class'     => 'spritefont-douban',
                        'fallback'  => 'd',
                        'name'      => _x('Douban', 'social media network name', 'proac')
            ],
            "kaixin" => [
                        'class'     => 'spritefont-kaixin',
                        'fallback'  => 'k',
                        'name'      => _x('Kaixin', 'social media network name', 'proac')
            ],
            "renren" => [
                        'class'     => 'spritefont-renren',
                        'fallback'  => 'rr',
                        'name'      => _x('Renren', 'social media network name', 'proac')
            ],
        ];
    }

    static public function get_selected_share_buttons(){
        return get_theme_mod('share_buttons');
    }

    static public function get_selected_buttons(){
        return  get_theme_mods();
    }

    static public function share_buttons($id = false){

        $mod = self::get_selected_share_buttons();

        $networks_wanted = explode( ',', $mod );

        if(count($networks_wanted) < 1) {
            return;
        }

        foreach($networks_wanted as $network){
            echo "<a 
                    href='". self::url_reformat($network, $id) ."'  
                    class='share-button ".self::setup_sprite_class($network)."' aria-label='"._x('Share on', 'share button', 'proac')." ".self::network_info($network, 'name'). "' data-label='".$network."' data-action='social_media' data-category='share' >
                    ".Svg::icons()[$network]."
                    <span title='"._x('Share on', 'share button', 'proac')." ". self::network_info($network, 'name'). "'>".self::network_info($network, 'fallback')."</span>
                </a>";
        }

        if( get_theme_mod('show_copy') == 'yes'){
            ?>
            <a href='<?php the_permalink($id); ?>' class='spritefont-copy' aria-label='<?php _e('copy link', 'proac') ?>' id='copy_link'><?php echo Svg::icons()['copy']?></a>
            <script>
                document.getElementById('copy_link').addEventListener('click', function(e){
                    var str = this.getAttribute("href");
                    var el = document.createElement('textarea');
                    el.value = str;
                    document.body.append(el);
                    if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
                        var editable = el.contentEditable;
                        var readOnly = el.readOnly;
                        el.contentEditable = true;
                        el.readOnly = true;
                        var range = document.createRange();
                        range.selectNodeContents(el);
                        var sel = window.getSelection();
                        sel.removeAllRanges();
                        sel.addRange(range);
                        el.setSelectionRange(0, 999999);
                        el.contentEditable = editable;
                        el.readOnly = readOnly;
                    } else {
                        el.select();
                    }
                    document.execCommand("copy");
                    e.preventDefault();
                    document.body.removeChild(el);
                    e.stopPropagation();
                });
            </script>
            <?php
        }
    }

    static public function follow_buttons(){

        $mods = self::get_selected_buttons();

        $possible_networks =  self::follow_networks_as_array() ;

        $networks_wanted = [];

        foreach ( $possible_networks as $key => $details ){
            if(isset($mods['follow_button_' . $key]) && !empty($mods['follow_button_' . $key])){
                $details ['url'] = $mods['follow_button_' . $key];
                $networks_wanted[$key] = $details;
            }
        }

        if(count($networks_wanted) < 1) {
            return;
        }

        foreach($networks_wanted as $key => $network){
            echo "<a 
                    href='". $network['url'] ."'  rel='noopener noreferrer'
                    class='share-button ".self::follow_sprite_class($key)."' target='_blank' aria-label='"._x('Follow on', 'follow button', 'proac')." ".$network['name']. "' data-label='".$network['name']."' data-action='social_media' data-category='follow'  >
                    ".Svg::icons()[$key]."
                        <span title='"._x('Follow on', 'follow button', 'proac')." ".$network['name']. "'>".$network['fallback']."</span>
                </a>";
        }
    }

    /**
     * Formats the url to change the details for sharing properly
     *
     * @param [type] $network
     * @param [type] $id
     * @return void
     */
    static public function url_reformat($network, $id){
        $perma = get_permalink($id);
        $title = get_the_title($id);
        $url = str_replace(
            [ '%URL%', '%URI%', '%TITLE%', '%CLEANTITLE%'], 
            [ $perma, urlencode($perma), urlencode($title), $title ],
            self::network_info($network, 'url'));
        return $url;
    }

    /**
     * Creates the sprite class for follow networks
     *
     * @param [type] $network
     * @return void
     */
    static public function follow_sprite_class($network){
        
        if(self::follow_network_info($network, 'class')){
            return self::follow_network_info($network, 'class');
        }

        return "spritefont-" . str_replace(" ", "-" , strtolower( self::follow_network_info($network, 'name') ) );
    }

    /**
     * Access the follow network array by key and network name. 
     *
     * @param string $network
     * @param string $key
     * @return void
     */
    static public function follow_network_info($network = '', $key=''){
        if($key=='' || $network == ''){
            return false;
        }

        $arr = self::follow_networks_as_array();

        if(isset($arr[$network][$key])){
            return $arr[$network][$key];
        } else {
            return false;
        }

    }

    /**
     * Create sprite class for social media share buttons
     *
     * @param [type] $network
     * @return void
     */
    static public function setup_sprite_class($network){
        if(self::network_info($network, 'class')){
            return self::network_info($network, 'class');
        }

        return "spritefont-" . str_replace(" ", "-" , strtolower( self::network_info($network, 'name') ) );
    }

    /**
     * Access the share array by network and key
     *
     * @param string $network
     * @param string $key
     * @return void
     */
    static public function network_info($network = '', $key=''){
        if($key=='' || $network == ''){
            return false;
        }

        $arr = self::share_as_array();

        if(isset($arr[$network][$key])){
            return $arr[$network][$key];
        } else {
            return false;
        }
    }

}