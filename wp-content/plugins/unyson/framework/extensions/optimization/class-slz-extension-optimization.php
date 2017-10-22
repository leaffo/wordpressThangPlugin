<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class SLZ_Extension_Optimization extends SLZ_Extension
{
    /**
     * List of register/minfied css file
     * @var array
     */
    private $css = [];
    /**
     * List of register/minfied js file
     * @var array
     */
    private $js = [];
    /**
     * List of used fonts
     * @var array
     */
    private $fonts = [];

    private $isCachable = false;

    /**
     * @var array
     */
    private $shortcodeJs = [];
    /**
     * @var array
     */
    private $shortcodeCss = [];

    /**
     * @var bool
     */
    private $isReleased = false;

	/**
	 * @internal
	 */
	protected function _init()
	{
        add_action('wp_enqueue_scripts', [$this, 'registerFrameworkJs'], 9);
        add_action('wp_enqueue_scripts', [$this, 'registerFrameworkCss'], 9);
        //add_action('init', [$this, 'getPageCache']);
        //add_action('wp_loaded', [$this, 'startOfPage']);
        //add_action('shutdown', [$this, 'endOfPage']);
        add_action('wp_footer', [$this, 'regisertFooterScript']);
        return true;
	}

    /**
     * Localize a script object
     * @param string $handle
     * @param array $data
     */
	public function localizedScript($handle = 'slz', $data = [])
    {
        wp_localize_script( $handle, '_slz_localized', empty($data) ? array(
            'SLZ_URI'     => slz_get_framework_directory_uri(),
            'SITE_URI'   => site_url(),
            'LOADER_URI' => apply_filters( 'slz_loader_image', slz_get_framework_directory_uri() . '/static/img/logo.svg' ),
            'l10n'       => array(
                'done'     => __( 'Done', 'slz' ),
                'ah_sorry' => __( 'Ah, Sorry', 'slz' ),
                'save'     => __( 'Save', 'slz' ),
                'reset'    => __( 'Reset', 'slz' ),
                'apply'    => __( 'Apply', 'slz' ),
                'cancel'   => __( 'Cancel', 'slz' ),
                'ok'       => __( 'Ok', 'slz' )
            ),
        ) : $data );
    }


    /**
     * Register common css file
     * @param $files
     * @param $name
     */
	public function registerCssFiles($files, $name = null, $depends = [])
    {
        foreach ($files as $id => $paths) {
            if (in_array($id, $this->css)) {
                unset($files[$id]);
            } else {
                $this->css[] = $id;
            }
        }
        if (!WP_DEBUG && function_exists('lema')) {
            if (empty($name)) {
                $name = 'theme-optimized-styles';
            }
            $url = lema_minify_css($files, $name);
            wp_enqueue_style($name, $url, $depends);
            $done = wp_styles()->done;
            foreach ($this->css as $id) {
                if (!in_array($id, $done)) {
                    $done[] = $id;
                }
            }
            wp_styles()->done = $done;
        } else {
            foreach ($files as $id => $url)
            {
                if (isset($url[1])) {
                    wp_enqueue_style($id, $url[1], []);
                }
            }
        }
    }

    /**
     * Register common js file
     * @param $files
     * @param $name
     */
    public function registerJsFiles($files , $name = null, $depends = [])
    {
        foreach ($files as $id => $paths) {
            if (in_array($id, $this->js)) {
                unset($files[$id]);
            } else {
                $this->js[] = $id;
            }
        }
        if (!WP_DEBUG && function_exists('lema')) {
            if (empty($name)) {
                $name = 'theme-optimized-scripts';
            }
            $url = lema_minify_js($files, $name);
            wp_enqueue_script($name, $url, $depends);
            $done = wp_scripts()->done;
            foreach ($this->js as $id) {
                if (!in_array($id, $done)) {
                    $done[] = $id;
                }
            }
            wp_scripts()->done = $done;
        } else {
            foreach ($files as $id => $url)
            {
                if (isset($url[1])) {
                    wp_enqueue_script($id, $url[1], ['jquery', 'backbone', 'underscore']);
                }
            }
        }
    }


    /**
     * Register core's scripts
     */
    public function registerFrameworkJs()
    {
        $files = $this->get_config('framework_scripts');
        $this->registerJsFiles($files, 'solazu-unyson-framework', ['jquery', 'backbone', 'underscore']);
        $this->localizedScript(WP_DEBUG ? 'slz' : 'solazu-unyson-framework');
    }

    /**
     * Register core's styles
     */
    public function registerFrameworkCss()
    {
        $files = $this->get_config('framework_styles');
        $this->registerCssFiles($files, 'solazu-unyson-framework', []);
    }


    /**
     * @param $key
     * @param $value
     */
    public function setCache($key, $value)
    {
        if (function_exists('lema')) {
            lema_set_cache($key, $value);
        }
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function getCache($key, $default = null)
    {
        if (function_exists('lema')) {
            return lema_get_cache($key, $default);
        }
        return $default;
    }

    public function getPageCache()
    {
        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $method = $_SERVER['REQUEST_METHOD'];
        if (strtolower($method) == 'get' && (!defined('DOING_AJAX')) && !WP_DEBUG) {
            $cache_key = md5($url . $method);
            $html = $this->getCache($cache_key, null);
            if (!empty($html)) {
                print $html;
                exit;
            }
            $this->isCachable =  true;
            $this->isCachable = ob_get_level();
            //ob_start();
            //ob_implicit_flush(false);
        }
    }

    public function startOfPage()
    {
        ob_start([$this, 'setPageCache']);
    }
    public function endOfPage()
    {
        if ($this->isCachable) {
            ob_end_flush();
        }
    }

    /**
     * Set cache of current page
     * @param $html
     */
    public function setPageCache($html)
    {
        if ($this->isCachable) {
            $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $method = $_SERVER['REQUEST_METHOD'];
            if (strtolower($method) == 'get' && (!defined('DOING_AJAX'))) {
                $cache_key = md5($url . $method);
                $this->setCache($cache_key, $html);
            }
        }
        return $html;
    }


    /**
     * @param $id
     * @param $url
     * @param array $depends
     * @param bool $version
     * @param bool $footer
     */
    public function enqueue_script($id, $url, $depends = [], $version = false, $footer = false, $shortcode) {
        if (!$this->isReleased) {
            $this->shortcodeJs[$id]  = [
                'id'  => $id,
                'url' => $url,
                'depends' => $depends,
                'version' => $version,
                'footer' => $footer,
                'path' => $shortcode->getStaticPath($url)
            ];
        } else {
            wp_enqueue_script($id, $url, $depends, false, true);
        }
    }

    /**
     * @param $id
     * @param $url
     * @param array $depends
     * @param bool $version
     */
    public function enqueue_style($id, $url, $depends = [], $version = false, $shortcode) {
        if (!$this->isReleased) {
            $this->shortcodeCss[$id]  = [
                'id'  => $id,
                'url' => $url,
                'depends' => $depends,
                'version' => $version,
                'path' => $shortcode->getStaticPath($url)
            ];
        }  else {
            wp_enqueue_style($id, $url, $depends);
        }
    }

    public function regisertFooterScript()
    {
        $_scripts = $this->shortcodeJs;
        $_styles = $this->shortcodeCss;
        if (!empty($_scripts)) {
            $scripts = [];
            foreach ($_scripts as $id => $option) {
                $scripts[$id] = [$option['path']];
            }
            ksort($scripts);
            $key_js = 'education-shortcode-scripts-' . md5(serialize(array_keys($scripts)));
            $shortcode_js_url = lema_minify_js($scripts, $key_js);
            wp_enqueue_script('education-shortcode-scripts', $shortcode_js_url, [], false, true);
        }

       if (!empty($_styles)) {
           $styles = [];
           foreach ($_styles as $id => $option) {
               $styles[$id] = [$option['path']];
           }
           ksort($styles);
           $key_css = 'edu-sc-' . md5(serialize(array_keys($styles)));
           $shortcode_css_url = lema_minify_css($styles, $key_css);
           wp_enqueue_style('education-shortcode-styles', $shortcode_css_url);
       }
       $this->isReleased = true;
    }
}
