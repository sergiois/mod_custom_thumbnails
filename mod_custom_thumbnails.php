<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom_thumbnails
 *
 * @copyright	Copyright © 2023 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$layout = $params->get('layout', 'default');
switch((int)$params->get('templateframework', 1))
{
    case 2: $layout .= '_bootstrap3'; break;
    case 3: $layout .= '_uikit'; break;
    case 5: $layout .= '_bootstrap5'; break;
}

require ModuleHelper::getLayoutPath('mod_custom_thumbnails', $layout);