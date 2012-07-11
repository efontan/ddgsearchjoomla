<?php 

/**
 * @package ElGolem
 * @subpackage mod_duckduckgo_search
 * @version   1.1.1 - 10/07/2012
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
		// Basics
		$width = (int)$params->get('width',200);
		$show_ducklogo = $params->get('show_ducklogo','off');
		$background_color = $params->get('background_color','');
		$site_url = $params->get('site_url','');
		$box_text = $params->get('box_text','');

		//Color Settings
		$header_color = $params->get('header_color','r3');
		$header_color_custom = $params->get('header_color_custom','');

		$highlight_color = $params->get('highlight_color','e');
		$highlight_color_custom = $params->get('highlight_color_custom','');

		$url_color = $params->get('url_color','r');
		$url_color_custom = $params->get('url_color_custom','');

		$bgcolor_results = $params->get('bgcolor_results','ow');
		$bgcolor_results_custom = $params->get('bgcolor_results_custom','');

		$text_color = $params->get('text_color','g');
		$text_color_custom = $params->get('text_color_custom','');

		$links_color = $params->get('links_color','b');
		$links_color_custom = $params->get('links_color_custom','');

		$visited_links_color = $params->get('visited_links_color','p');
		$visited_links_color_custom = $params->get('visited_links_color_custom','');

		$border_color = $params->get('border_color','e');
		$border_color_custom = $params->get('border_color_custom','');


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

		//Calculate values of the search box
		$duck = ($show_ducklogo == 'off')? '':'&duck=yes';
		$site = '&site=' . $site_url;
		$prefill = (empty($box_text))? '':'&prefill=' . $box_text;
		$bg_color = (empty($background_color))? '':'&bgcolor=' . $background_color;

		$header = ($header_color == '#')? '&kj=%23'.$header_color_custom:'&kj='.$header_color;
		$highlight = ($highlight_color == '#')? '&ky=%23'.$highlight_color_custom:'&ky='.$highlight_color;
		$url = ($url_color == '#')? '&kx=%23'.$url_color_custom:'&kx='.$url_color;
		$bgcolor_results = ($bgcolor_results == '#')? '&k7=%23'.$bgcolor_results_custom:'&k7='.$bgcolor_results;
		$text = ($text_color == '#')? '&k8=%23'.$text_color_custom:'&k8='.$text_color;
		$links = ($links_color == '#')? '&k9=%23'.$links_color_custom:'&k9=%23'.$links_color;
		$visited_links = ($visited_links_color == '#')? '&kaa=%23'.$visited_links_color_custom:'&kaa=%23'.$visited_links_color;
		$border = ($border_color == '#')? '&kab=%23'.$border_color_custom:'&kab='.$border_color;


		//Generate the HTML
		$html = '<div class="duckduckgo_search" id="duckduckgo_search">';
		$html.= '<iframe src="http://duckduckgo.com/search.html?width=';
		$html.= $width;
		$html.= $duck;
		$html.= $site;
		$html.= $prefill;
		$html.= $bg_color;

		$html.= $header;
		$html.= $highlight;
		$html.= $url;
		$html.= $bgcolor_results;
		$html.= $text;
		$html.= $links;
		$html.= $visited_links;
		$html.= $border;

		$html.= '" style="overflow:hidden;margin:0;padding:0;width:';
		$html.= $total_width;
		$html.= ';height:60px;" frameborder="0"></iframe>';
		$html.= '</div>';


		return $html;
	}

}