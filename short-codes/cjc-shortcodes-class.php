<?php

 class CJC_ShortCode{

	 var $base;
	 var $displayName;
	 var $category;
	 var $vcParams;
	 var $vcAttributeParams;
	 var $icon;
	 var $callback;// the shortcode

	 function __construct() {
	 	 $this->base = '';
		 $this->displayName = '';
		 $this->category = 'Cairo Jazz Club';
		 $this->vcParams = array();
		 $this->vcAttributeParams = array();
		 $this->icon = has_custom_logo() ? Mcustomizer::getCustomLogoURL(): get_template_directory_uri().'/img/logo.png';
	 }

	/**
	 * @return the result from shortcode string
	 */
	function run( $atts, $content = null ){

	}

	function addvcAttribute(array $att){
		array_push ($this->vcAttributeParams,$att);
	}

	function addvcContent($title = "Content",$description="Enter your content.",$value=""){
		 // Important: Only one textarea_html param per content element allowed and 
		 // it should have "content" as a "param_name"
		array_push ($this->vcAttributeParams,
			array(
				"type" 			=> "textarea_html",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> __( $title ),
				"param_name" 	=> "content",
				"value" 		=> __( $value ),
				"description" 	=> __( $description )
			));
	}

	function getParams(){
		$ret = $this->vcParams;

		$ret["name"] = __($this->displayName);
		$ret["base"] = $this->base;
		$ret["category"] = __($this->category);
		$ret["icon"] = $this->icon;
		$ret["params"] = $this->vcParams;

		return $ret;
	}

	function register(){

		add_shortcode($this->base,$this->callback);
		
		// if visual composer is installed
		if(function_exists ('vc_map')){
			vc_map( $this->getParams());
		}
		//static::class.'::run';
	}
}