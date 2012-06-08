<?php 

/**
 * @package ElGolem
 * @subpackage mod_duckduckgo_search
 * @version   1.0.1 - 12/04/2012
 * @author    Emmanuel Fontan
 * @copyright (C) 2012 Emmanuel Fontan (email : fontanemmanel@gmail.com)
 *
 * @license		GNU/GPL, see LICENSE.php
 * This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program.  If not, see http://www.gnu.org/licenses/.
 *
 *
 */
 
class modDuckDuckGoSearchHelper {

/*
################################################
#            GET_DUCKDUCKGOSEARCH	           #
################################################
*/
	public static function get_duckduckgosearch(&$params) {
		
		//Get Parameters
		$width = (int)$params->get('width',200);
		$show_ducklogo = $params->get('show_ducklogo','off');
		$background_color = $params->get('background_color','');
		$site_url = $params->get('site_url','');
		$box_text = $params->get('box_text','');
		
		//Calculate the Total Width
		/*
			DUCKL LOGO OFF
			base_width: 48 --> width: 48px + user_defined_width
			
			DUCK LOGO ON
			base_width: 123 --> width: 123px + user_defined_width
		*/
		$total_width = 0;
		if($show_ducklogo == 'off') {
			$total_width = 48 + $width;
		}
		else {
			$total_width = 123 + $width;
		}
		
		//Calculate values ofthe search box
		$duck = ($show_ducklogo == 'off')? '':'&duck=yes';
		$site = '&site=' . $site_url;
		$prefill = (empty($box_text))? '':'&prefill=' . $box_text;
		$bg_color = (empty($background_color))? '':'&bgcolor=' . $background_color;
		
		
		//Generate the HTML
		
		$html = '<div class="duckduckgo_search" id="duckduckgo_search">';
		$html.= '<iframe src="http://duckduckgo.com/search.html?width=';
		$html.= $width;
		$html.= $duck;
		$html.= $site;
		$html.= $prefill;
		$html.= $bg_color;
		$html.= '" style="overflow:hidden;margin:0;padding:0;width:';
		$html.= $total_width;
		$html.= ';height:60px;" frameborder="0"></iframe>';
		$html.= '</div>';
		
	
		return $html;
	}
	
}