<?php
/**
 * i-PMS - internet Project Management System
 * Copyright (C) 2011 by Laurent Declercq
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @package     iPMS
 * @subpackage  Dashboard
 * @category    Plugins
 * @copyright   2011 by Laurent Declercq (nuxwin)
 * @author      Laurent Declercq <l.declercq@nuxwin.com>
 * @version     0.0.1
 * @link        http://www.i-pms.net i-PMS Home Site
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GPL v2
 */

/**
 * Plugin for switching to the Dashboard layout
 *
 * @package     iPMS
 * @subpackage  Dashboard
 * @category    Plugins
 * @author      Laurent Declercq <l.declercq@nuxwin.com>
 * @version     0.0.1
 */
class Dashboard_Plugin_Layout extends Zend_Controller_Plugin_Abstract
{
	/**
	 * Sets layout and views paths for the Dasbboard if needed
	 *
	 * @param Zend_Controller_Request_Abstract $request
	 * @return void
	 */
	public function routeShutdown(Zend_Controller_Request_Abstract $request)
	{
		if(strtolower($request->getModuleName()) == 'dashboard') {
			/**
			 * @var $bootstrap Bootstrap
			 */
			$bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');

			/**
			 * @var $layout Zend_Layout
			 */
			$layout = $bootstrap->getResource('Layout');
			$layout->setLayoutPath(APPLICATION_PATH . '/modules/dashboard/layouts');

			/**
			 * @var $view Zend_View
			 */
			$view = $bootstrap->getResource('view');

	        /**
	        * @var $viewRenderer Zend_Controller_Action_Helper_ViewRenderer
	        */
	        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');

	        // Set view basePath specification
			// TODO current template based path
	        $viewRenderer->setView($view)->setViewBasePathSpec(':moduleDir/views');

			// Ensuring that error template are available
			$view->setScriptPath(THEME_PATH . '/default/templates/modules/front/scripts');
		}
	}
}
