<?php

/**
 * a simple way to integrate Wordpress Shortcode API with Visual Composer
 */
 class CJC_ShortCode{

	public $base,
		$displayName,
		$category,
		$vcParams,
		$vcAttributes,
		$icon,
		$callback;// the shortcode

	 public function __construct() {
	 	 $this->base = '';
		 $this->displayName = '';
		 $this->category = 'Cairo Jazz Club';
		 $this->vcParams = array();
		 $this->vcAttributes = array();
		 $this->icon = has_custom_logo() ? Mcustomizer::getCustomLogoURL(): get_template_directory_uri().'/img/logo.png';
	 }

	/**
	 * get the attributes default value from the $vcAttributes
	 * @return asoc array to be passed to shortcode_atts
	 */
	public function getAttributeDefaultVal(){
		$a = array();
		foreach($this->vcAttributes as $att) {
			if($att['param_name'] != 'content'){
				$value = '';
				if( isset($att['value'])){
					// if the var is an array it gets the first value
					$value = is_array ($att['value']) ? $att['value'][0] : $att['value'];
				}
				$a[$att['param_name']] = $value;
			}
		}
		return $a;
	}
	
	/**
	 * push a attribute to the array
	 * keep in mind it's usless if u have already registered
	 * @return $this
	 */
	public function addvcAttribute(array $att){
		array_push ($this->vcAttributes,$att);
		return $this;
	}

	/**
	 * add a generic Content param
	 * @return $this
	 */
	public function addvcContent($title = "Content", $description="Enter your content.", $value=""){
		 // Important: Only one textarea_html param per content element allowed and 
		 // it should have "content" as a "param_name"
		array_push ($this->vcAttributes,
			array(
				"type" 			=> "textarea_html",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> __( $title ),
				"param_name" 	=> "content",
				"value" 		=> __( $value ),
				"description" 	=> __( $description )
			));
		return $this;
	}

	/**
	 * @return $the full vc param array
	 */
	public function getParams(){
		return $this->vcParams + array(
			"name" => __($this->displayName),
			"base" => $this->base,
			"category" => __($this->category),
			"icon" => $this->icon,
			"params" => $this->vcAttributes,
		);
	}

	/**
	 * run the callback function
	 */
	public function run( $atts, $content = null ){
		return call_user_func(
			$this->callback ,
			shortcode_atts( $this->getAttributeDefaultVal() ,$atts ),
		 	$content
		);
	}

	public function register(){
		add_shortcode($this->base,array($this, 'run'));
		// if visual composer is installed
		if(function_exists ('vc_map')){
			vc_map( $this->getParams());
		}
	}
}