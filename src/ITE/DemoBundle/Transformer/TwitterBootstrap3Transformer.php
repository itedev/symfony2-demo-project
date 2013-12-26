<?php

namespace ITE\DemoBundle\Transformer;

use JMS\RstBundle\Transformer\TransformerInterface;
use Symfony\Component\CssSelector\CssSelector;

/**
 * Class TwitterBootstrap3Transformer
 * @package ITE\DemoBundle\Transformer
 */
class TwitterBootstrap3Transformer implements TransformerInterface
{
    public function transform(\DOMDocument $doc, \DOMXPath $xpath, $rootDir)
    {
        $this->cleanUpUnusedAttributes($doc, $xpath);
        $this->rewriteConfigurationBlocks($doc, $xpath);

        $this->rewriteAdmonitions($doc, $xpath, 'note', 'alert-warning', 'icon-lightbulb');
        $this->rewriteAdmonitions($doc, $xpath, 'tip', 'alert-info', 'icon-info-sign');
        $this->rewriteAdmonitions($doc, $xpath, 'warning', 'alert-error', 'icon-exclamation-sign');

        $this->rewriteDocutils($doc, $xpath);

        $this->rewriteVersion($doc, $xpath, 'versionadded', 'label-success');

        $this->rewriteBlockquotes($doc, $xpath);

        $this->rewritePageHeader($doc, $xpath);
    }

    private function rewriteBlockquotes(\DOMDocument $doc, \DOMXPath $xpath)
    {
        foreach ($xpath->query(CssSelector::toXPath('blockquote > div')) as $divElem) {
            /** @var $divElem \DOMElement */

            $quoteElem = $divElem->parentNode;
            for ($i=0; $i<$divElem->childNodes->length;$i++) {
                $childNode = $divElem->childNodes->item($i);

                if ($childNode instanceof \DOMText) {
                    if ('' === trim($childNode->nodeValue)) {
                        continue;
                    }

                    $quoteElem->appendChild($doc->createElement('p', $childNode->nodeValue));

                    continue;
                }

                if ('attribution' === (string) $childNode->getAttribute('class')) {
                    $attrNode = $doc->createElement('small');

                    for ($k=1; $k<$childNode->childNodes->length; $k++) {
                        $attrChild = $childNode->childNodes->item($k);
                        $attrNode->appendChild($attrChild);
                    }

                    $quoteElem->appendChild($attrNode);

                    continue;
                }

                $quoteElem->appendChild($childNode);
            }

            $quoteElem->removeChild($divElem);
        }
    }

    private function rewriteVersion(\DOMDocument $doc, \DOMXPath $xpath, $versionClass, $labelClass = null)
    {
        foreach ($xpath->query(CssSelector::toXPath('p.'.$versionClass)) as $pElem) {
            $label = $xpath->query(CssSelector::toXPath('span.versionmodified'), $pElem)->item(0);
            $label->setAttribute('class', 'label'.($labelClass ? ' '.$labelClass : ''));
            $text = substr($label->nodeValue, 0, -2);
            $label->nodeValue = $text;

            $pElem->insertBefore($doc->createTextNode(' '), $label->nextSibling);
        }
    }

    private function rewriteAdmonitions(\DOMDocument $doc, \DOMXPath $xpath, $admonitionClass, $alertClass = null, $iconClass = null)
    {
        foreach ($xpath->query(CssSelector::toXPath('div.admonition.'.$admonitionClass)) as $divElem) {
            $divElem->setAttribute('class', 'alert' . ($alertClass ? ' ' . $alertClass : ''));

            $noteElem = $xpath->query(CssSelector::toXPath('p.first'), $divElem)->item(0);
            $noteContentElem = $xpath->query(CssSelector::toXPath('p.last'), $divElem)->item(0);

            if (null !== $iconClass) {
                $divElem->appendChild($iconElem = new \DOMElement('i'));
                $iconElem->setAttribute('class', $iconClass);
                $iconElem->appendChild($doc->createTextNode(''));
                $divElem->appendChild($doc->createTextNode(' '));
            }

            $divElem->appendChild($newNoteElem = new \DOMElement('strong'));
            foreach ($noteElem->childNodes as $childNode) {
                $newNoteElem->appendChild($childNode);
            }
            $newNoteElem->appendChild($doc->createTextNode(': '));

            while (null !== $firstChild = $noteContentElem->firstChild) {
                $divElem->appendChild($firstChild);

                try {
                    $noteContentElem->removeChild($firstChild);
                } catch (\DOMException $e) {
                    // Element was not found because it was removed automatically
                }
            }

            $divElem->removeChild($noteElem);
            $divElem->removeChild($noteContentElem);
        }
    }

    private function rewriteDocutils(\DOMDocument $doc, \DOMXPath $xpath)
    {
        foreach ($xpath->query(CssSelector::toXPath('tt.docutils.literal > span.pre')) as $spanElem) {
            /** @var $spanElem \DOMNode */
            $code = $spanElem->nodeValue;
            $codeElem = $doc->createElement('code', $code);

            $ttElem = $spanElem->parentNode;
            $ttParentElem = $ttElem->parentNode;
            $ttParentElem->replaceChild($codeElem, $ttElem);
        }
    }

    private function rewriteConfigurationBlocks(\DOMDocument $doc, \DOMXPath $xpath)
    {
        $i = 0;
        foreach ($xpath->query(CssSelector::toXPath('div.configuration-block')) as $divElem) {
            $divElem->setAttribute('class', 'configuration-block tabbable');

            foreach ($xpath->query('./ul', $divElem) as $ulElem) {
                $ulElem->setAttribute('class', 'nav nav-tabs');
            }

            $xpath->query(CssSelector::toXPath('ul > li:first-child'), $divElem)->item(0)->setAttribute('class', 'active');
            $divElem->appendChild($contentElem = new \DOMElement('div'));
            $contentElem->setAttribute('class', 'tab-content');

            $j = 0;
            foreach ($xpath->query(CssSelector::toXPath('ul > li'), $divElem) as $liElem) {
                $titleElem = $xpath->query('./em', $liElem)->item(0);

                $tabElem = $xpath->query('./div', $liElem)->item(0);
                $tabElem->setAttribute('class', 'tab-pane'.($j == 0 ? ' active' : ''));
                $tabElem->setAttribute('id', 'configuration-block-'.$i.'-'.$j);
                $contentElem->appendChild($tabElem);

                foreach ($liElem->childNodes as $node) {
                    $liElem->removeChild($node);
                }

                $liElem->appendChild($linkElem = new \DOMElement('a', $titleElem->nodeValue));
                $linkElem->setAttribute('href', '#configuration-block-'.$i.'-'.$j);
                $linkElem->setAttribute('data-toggle', 'tab');
                $j += 1;
            }

            $i += 1;
        }
    }

    private function cleanUpUnusedAttributes(\DOMDocument $doc, \DOMXpath $xpath)
    {
        foreach ($xpath->query('//table') as $tableElem) {
            $tableElem->setAttribute('class', 'table table-striped table-bordered table-hover table-condensed');
            $tableElem->removeAttribute('border');
        }

        foreach ($xpath->query('//thead') as $theadElem) {
            $theadElem->removeAttribute('valign');
        }

        foreach ($xpath->query('//tbody') as $tbodyElem) {
            $tbodyElem->removeAttribute('valign');
        }

        foreach ($xpath->query('//th') as $thElem) {
            $thElem->removeAttribute('class');
        }

        foreach ($xpath->query('//tr') as $trElem) {
            $trElem->removeAttribute('class');
        }
    }

    private function rewritePageHeader(\DOMDocument $doc, \DOMXpath $xpath)
    {
        /** @var $bodyElem \DOMNode */
        $bodyElem = $doc->documentElement->childNodes->item(0);
        if (1 === $bodyElem->childNodes->length && $bodyElem->childNodes->item(0)->childNodes->length > 0) {
            /** @var $divElem \DOMNode */
            $divElem = $bodyElem->childNodes->item(0);
            if (null !== $firstElem = $xpath->query('./h1', $divElem)->item(0)) {
                /** @var $firstElem \DOMNode */
//                foreach ($xpath->query('./a', $firstElem) as $node) {
//                    $firstElem->removeChild($node);
//                }
//
//                $divPageHeaderElem = $doc->createElement('div');
//                $divPageHeaderElem->setAttribute('class', 'page-header');
//                $divPageHeaderElem->appendChild(new \DOMElement('h1', $firstElem->nodeValue));

                $divElem->removeChild($firstElem);

//                $bodyElem->insertBefore($divPageHeaderElem, $divElem);
            }
        }
    }
}