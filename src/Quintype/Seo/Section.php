<?php

namespace Quintype\Seo;

require "Base.php";

class Section extends Base {

	function __construct($config, $pageType, $section){
		parent::__construct($config, $pageType);
		$this->section = $section;
	}

	function tags() {
		if (sizeof($this->seoMetadata)>0){

			return [
				'title' => trim($this->getPageTitle()),
	        	'description' => trim($this->getDescription()),
	        	'og' => [
	          		'title' => trim($this->getTitle()),
	          		'description' => trim($this->getDescription())
	        	],
		        'twitter' => [
		          'title' => trim($this->getTitle()),
		          'description' => trim($this->getDescription())
		        ]
		    ];
		} else {
			return ['title' => trim($this->getPageTitle())];
		}
	}

	protected function getPageTitle(){
		if(isset($this->seoMetadata['page-title'])){
			return $this->seoMetadata['page-title'];
		} else {
			return $this->section . " - " . $this->config['title'];
		}
	}


}