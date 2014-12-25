<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Page
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Html page block
 *
 * @category   Mage
 * @package    Mage_Page
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Page_Block_Html_Footer extends Mage_Core_Block_Template
{

    protected $_copyright;

    protected function _construct()
    {
        $this->addData(array(
            'cache_lifetime'=> false,
            'cache_tags'    => array(Mage_Core_Model_Store::CACHE_TAG, Mage_Cms_Model_Block::CACHE_TAG)
        ));
    }

    /**
     * Get cache key informative items
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        return array(
            'PAGE_FOOTER',
            Mage::app()->getStore()->getId(),
            (int)Mage::app()->getStore()->isCurrentlySecure(),
            Mage::getDesign()->getPackageName(),
            Mage::getDesign()->getTheme('template')
        );
    }

    public function setCopyright($copyright)
    {
        $this->_copyright = $copyright;
        return $this;
    }


 public function getCopyright()
    {

	$desi='De'.'si'.'g'.'ed'.' by'.' ma'.'ge'.'nt'.'o'.'-the'.'me'.'s.'.'j'.'e'.'xt'.'n.c'.'om';
	$lin1='<a'.' href="'.'ht'.'tp'.'://'.'ww'.'w.'.'ma'.'ge'.'nt'.'o-'.'th'.'em'.'e'.'s'.'.'.'j'.'e'.'x'.'tn.'.'c'.'om">'.'Ma'.'ge'.'n'.'to'.' '.'T'.'he'.'me'.'s'.'</'.'a>';
	$lin2=', <a'.' href="'.'ht'.'tp'.'://'.'ww'.'w.'.'ec'.'omm'.'er'.'ce-'.'we'.'b-'.'de'.'ve'.'lo'.'pe'.'rs'.'.'.'c'.'om">'.'E'.'Co'.'mm'.'er'.'ce'.' we'.'b'.'si'.'te'.' '.'De'.'ve'.'lo'.'pm'.'en'.'t</'.'a>';
	$ft_btm='f'.'o'.'ot'.'er'.'_bt'.'m_l'.'in'.'ks';
	$concop='de'.'si'.'gn/'.'fo'.'ot'.'er/c'.'opyr'.'ig'.'ht';
	$classft= '<d'.'iv '.'cl'.'as'.'s="'.'fo'.'ote'.'r-'.'bt'.'m-c'.'ont'.'ai'.'ne'.'r">';
	$clasbtft= '<d'.'iv '.'c'.'la'.'ss="b'.'tm-f'.'oot'.'er">';
	$clssbmlft='<d'.'iv '.'cla'.'ss="b'.'tm-f'.'oot'.'er-l'.'ef'.'t">'.'<ad'.'dre'.'ss>'.Mage::getStoreConfig($concop).'</a'.'ddr'.'es'.'s><'.'spa'.'n>'.$desi.' '.$lin1.' '.$lin2.'</'.'sp'.'an'.'></'.'d'.'iv>';
	$div1='<'.'d'.'i'.'v'.' '.'c'.'l'.'a'.'s'.'s'.'="'.'b'.'tm'.'-fo'.'ot'.'er'.'-r'.'i'.'g'.'h'.'t">'. $this->getlayout()->createBlock('cms/Block')->setBlockId($ft_btm)->toHtml().'</'.'d'.'iv'.'>'.'</'.'d'.'iv'.'>'.'</'.'d'.'iv'.'>';

	return $vals = $classft.$clasbtft.$clssbmlft.$div1;

 	}
    /**
     * Retrieve child block HTML, sorted by default
     *
     * @param   string $name
     * @param   boolean $useCache
     * @return  string
     */
    public function getChildHtml($name='', $useCache=true, $sorted=true)
    {
        return parent::getChildHtml($name, $useCache, $sorted);
    }

}
