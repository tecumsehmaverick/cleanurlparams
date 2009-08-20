<?php
	
	class Extension_CleanURLParams extends Extension {
	/*-------------------------------------------------------------------------
		Definition:
	-------------------------------------------------------------------------*/
		
		public function about() {
			return array(
				'name'			=> 'Clean URL Params',
				'version'		=> '1.0.1',
				'release-date'	=> '2009-08-06',
				'author'		=> array(
					'name'			=> 'Rowan Lewis',
					'website'		=> 'http://pixelcarnage.com/',
					'email'			=> 'rowan@pixelcarnage.com'
				),
				'description'	=> 'Allows you to use /key:value/ instead of ?key=value in URLs.'
			);
		}
		
		public function getSubscribedDelegates() {
			return array(
				array(
					'page'		=> '/frontend/',
					'delegate'	=> 'FrontendPrePageResolve',
					'callback'	=> 'frontendPrePageResolve'
				)
			);
		}
		
	/*-------------------------------------------------------------------------
		Delegates:
	-------------------------------------------------------------------------*/
		
		public function frontendPrePageResolve(&$context) {
			if (is_null($context['page'])) return;
			
			$context['page'] = preg_replace_callback('~/([^:/]+):([^/]+)~i', array($this, 'replaceParam'), $context['page']);
			
			if (trim($context['page'], '/') == '') {
				$context['page'] = null;
			}
		}
		
		public function replaceParam($data) {
			if (count($data) != 3) return $data[0];
			
			$_GET[$data[1]] = $data[2];
			$_REQUEST[$data[1]] = $data[2];
			
			return '';
		}
	}
	
?>