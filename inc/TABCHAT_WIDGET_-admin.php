<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class tabchatwidget_admin {
	private $opt = null;

	public function __construct() {
		add_action('admin_menu', array($this, 'tabchat_add_plugin_page'));
		add_action('admin_init', array($this, 'tabchat_page_init'));
	}

	public function tabchat_add_plugin_page() {
		add_menu_page(
			'Tabchat', // page_title
			'Tabchat', // menu_title
			'manage_options', // capability
			'tabchat-config', // menu_slug
			array($this, 'tabchat_create_admin_page'), // function
			TABCHAT_WIDGET_URL . 'assets/img/logo.png'
			//2 // position
		);
	}

	public function tabchat_create_admin_page() {
		$this->opt = get_option('tabchat_option_name'); ?>

		<div class="wrap">
			<h2>Tabchat!</h2>
			<p>Plugins de configurações de widget para integração com Tabchat</p>
			<?php settings_errors(); ?>
			<form method="post" action="options.php">
				<?php
				settings_fields('tabchat_option_group');
				do_settings_sections('tabchat-admin');
				submit_button();
				?>
			</form>
		</div>
	<?php }

	public function tabchat_page_init() {
		register_setting(
			'tabchat_option_group', // option_group
			'tabchat_option_name', // option_name
			array($this, 'tabchat_sanitize') // sanitize_callback
		);

		add_settings_section(
			'tabchat_setting_section', // id
			'Configurações', // title
			array($this, 'tabchat_section_info'), // callback
			'tabchat-admin' // page
		);

		add_settings_field(
			'site', // id
			'Insira o site', // title
			array($this, 'site'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);

		add_settings_field(
			'token', // id
			'Insira o token', // title
			array($this, 'token'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);

		add_settings_field(
			'cabecalho', // id
			'Insira o texto de cabeçalho', // title
			array($this, 'cabecalho'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);

		add_settings_field(
			'icone', // id
			'Insira a url com sua logo', // title
			array($this, 'icone'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);

		add_settings_field(
			'posicao', // id
			'Insira a posição', // title
			array($this, 'posicao'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);
		add_settings_field(
			'corfundo', // id
			'Insira a cor de fundo', // title
			array($this, 'corfundo'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);
		add_settings_field(
			'cortexto', // id
			'Insira a cor do texto', // title
			array($this, 'cortexto'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);
		add_settings_field(
			'ativo', // id
			'Status do plugin', // title
			array($this, 'ativo'), // callback
			'tabchat-admin', // page
			'tabchat_setting_section' // section
		);
	}

	public function tabchat_sanitize($input) {
		$sanitary_values = array();
		if (isset($input['site'])) {
			$sanitary_values['site'] = sanitize_text_field($input['site']);
		}

		if (isset($input['token'])) {
			$sanitary_values['token'] = sanitize_text_field($input['token']);
		}

		if (isset($input['cabecalho'])) {
			$sanitary_values['cabecalho'] = sanitize_text_field($input['cabecalho']);
		}
		if (isset($input['icone'])) {
			$sanitary_values['icone'] = sanitize_text_field($input['icone']);
		}
		if (isset($input['posicao'])) {
			$sanitary_values['posicao'] = sanitize_text_field($input['posicao']);
		}
		if (isset($input['corfundo'])) {
			$sanitary_values['corfundo'] = sanitize_text_field($input['corfundo']);
		}
		if (isset($input['cortexto'])) {
			$sanitary_values['cortexto'] = sanitize_text_field($input['cortexto']);
		}
		if (isset($input['ativo'])) {
			$sanitary_values['ativo'] = sanitize_text_field($input['ativo']);
		}


		
        // cabecalho  
        // icone 
        // posicao
        // corfundo
        // ativo 
		return $sanitary_values;
	}

	public function tabchat_section_info() {
	}

	public function site() {
		printf(
			'<input class="regular-text" type="text" name="tabchat_option_name[site]" id="site" value="%s">',
			isset($this->opt['site']) ? esc_attr($this->opt['site']) : ''
		);
	}

	public function token() {
		printf(
			'<input class="regular-text" type="text" name="tabchat_option_name[token]" id="token" value="%s">',
			isset($this->opt['token']) ? esc_attr($this->opt['token']) : ''
		);
	}
	public function icone() {
		printf(
			'<input class="regular-text" type="text" name="tabchat_option_name[icone]" id="icone" value="%s">',
			isset($this->opt['icone']) ? esc_attr($this->opt['icone']) : ''
		);
	}
	public function corfundo() {
		printf(
			'<input class="regular-text" type="color" name="tabchat_option_name[corfundo]" id="corfundo" value="%s">',
			isset($this->opt['corfundo']) ?  ($this->opt['corfundo']) : '#031a83'
		);
	}
	public function cortexto() {
		printf(
			'<input class="regular-text" type="color" name="tabchat_option_name[cortexto]" id="cortexto" value="%s">',
			isset($this->opt['cortexto']) ?  ($this->opt['cortexto']) : '#FFFFFF'
		);
	}
	public function cabecalho() {
		printf(
			'<input class="regular-text" type="text" name="tabchat_option_name[cabecalho]" id="cabecalho" value="%s">',
			isset($this->opt['cabecalho']) ? esc_attr($this->opt['cabecalho']) : ''
		);
	}
	private function getlegenda($posicoes, $l) {
		$ret = "";
		foreach ($posicoes as $posicoes) {
			if ($posicoes['classe'] == $l) {
				$ret = $posicoes['legenda'];
			}
		}
		return $ret;
	}
	public function posicao() {

		$posicoes = [];
		array_push($posicoes, ['classe' => 'top-r-b', "legenda" => "Canto inferior direito"]);
		array_push($posicoes, ['classe' => 'top-l-b', "legenda" => "Canto inferior esquerdo"]);
		array_push($posicoes, ['classe' => 'top-r-c', "legenda" => "Canto central direito"]);
		array_push($posicoes, ['classe' => 'top-l-c', "legenda" => "Canto central esquerdo"]); 
	?>

		<select class="regular-text" type="text" name="tabchat_option_name[posicao]" id="posicao">

			<option value="<?php echo $this->opt['posicao'] ? esc_attr($this->opt['posicao']) : 'top-r-b'; ?>">
				<?php echo $this->getlegenda($posicoes, $this->opt['posicao'] ? esc_attr($this->opt['posicao']) : 'top-r-b'); ?>
			</option>
			<?php

			foreach ($posicoes as $posicoes) {
				echo '<option value="' .esc_attr( $posicoes['classe'] ). '">' .esc_html( $posicoes['legenda'] ). '</option>';
			}

			?>

		</select>
	<?php
	}
	public function ativo() {

		$posicoes = [];
		array_push($posicoes, ['classe' => 'block', "legenda" => "Ativado"]);
		array_push($posicoes, ['classe' => 'none', "legenda" => "Desativado"]);
	?>

		<select class="regular-text" type="text" name="tabchat_option_name[ativo]" id="ativo">

			<option value="<?php echo esc_attr($this->opt['ativo']) ? esc_attr($this->opt['ativo']) : esc_attr('top-r-b'); ?>">
				<?php echo $this->getlegenda($posicoes, $this->opt['ativo'] ? esc_html($this->opt['ativo']) : 'top-r-b'); ?>
			</option>
			<?php

			foreach ($posicoes as $posicoes) {
				echo '<option value="' . $posicoes['classe'] . '">' . $posicoes['legenda'] . '</option>';
			}

			?>

		</select>
<?php
	}
}
