<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('tabchatwidget_write_log')) {

    function tabchatwidget_write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }
}

class tabchatwidget_dialog {

    private $admin = false;
    private $opt = null;
    private $enable = true;

    function __construct($id_admin = false) {


        $this->admin = $id_admin;
        $this->tabchatload_options('tabchat_option_name');

        if ($this->enable) {
            add_action('wp_footer', array($this, 'tabchatload_dialog_on_front'));
        }
    }
    function tabchatload_options() {
        $opt = get_option('tabchat_option_name');
        $this->opt = []; 
        $this->opt['site'] = isset($opt['site']) ? $opt['site'] : '';
        $this->opt['token'] = isset($opt['token']) ? $opt['token'] : '';
        $this->opt['cabecalho'] = isset($opt['cabecalho']) ? $opt['cabecalho'] : '';
        $this->opt['icone'] = isset($opt['icone']) ? $opt['icone'] : '';
        $this->opt['posicao'] = isset($opt['posicao']) ? $opt['posicao'] : '';
        $this->opt['corfundo'] = isset($opt['corfundo']) ? $opt['corfundo'] : '';
        $this->opt['cortexto'] = isset($opt['cortexto']) ? $opt['cortexto'] : '';
        $this->opt['ativo'] = isset($opt['ativo']) ? $opt['ativo'] : ''; 


        
        // cabecalho  
        // icone 
        // posicao
        // corfundo
        // ativo 
     
    }

    function tabchatload_dialog_on_front() {
        echo $this->tabchatloadDialog();
    }
    function tabchatloadDialog() {

        if (isset($this->opt['site'])) {
            $html = ' <tabchat id="tabchat"></tabchat>
<script id="scripttabchat" 
s="' . $this->opt['site'] . '" 
t="' . $this->opt['token'] . '" 
cabecalho="' . $this->opt['cabecalho'] . '" 
icone="' . $this->opt['icone'] . '" 
posicao="' . $this->opt['posicao'] . '" 
corfundo="' . $this->opt['corfundo'] . '"
cortexto="' . $this->opt['cortexto'] . '" 
ativo="' . $this->opt['ativo'] . '"  
src="https://code.tabchat.com.br/uc/demo/js/embed.js?v7='.rand(800,8000).'">
</script>
';

            return $html;
        } else {
            return '';
        }
    }
}
